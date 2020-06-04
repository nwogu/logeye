<?php

namespace App\Console\Commands;

use App\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Sections\Log\Models\Log;
use App\Sections\Site\Repositories\SiteRepository;

class FetchLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all available logs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(SiteRepository $site)
    {
        $client = new Client(['verify' => false]);
        $sites =  $site->get();

        foreach ($sites as $site) {

            try {
                $response = $client->request('GET', $site->callback . "/logeye/register_logs");
                $this->resolveResponse($response, $site);
            } catch (Exception $e) { throw $e; continue ;}
        }
    }

    protected function resolveResponse($response, $site)
    {
        if ($response->getStatusCode() !== 200) return;

        $result = json_decode($response->getBody());

        $api_key = $result->logeye_api_key;
        $logs = $result->logs;

        $user = User::fromToken($api_key);

        if ($user && $user->_token == $site->user->_token) {
            foreach ($logs as $log) {
                $log->user_id = $user->id;
                $log->site_id = $site->id;
                $log = new Log((array)$log);

                $log->hasSimilar() ?: $log->save();
            }
        }
    }
}
