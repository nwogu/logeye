<?php

namespace App\Sections\Log\Controllers;

use Illuminate\Http\Request;
use App\Sections\Log\Resources\Log;
use App\Http\Controllers\Controller;
use App\Sections\Log\Traits\SiteFilter;
use App\Sections\Log\Criteria\UserCriteria;
use App\Sections\Log\Repositories\LogRepository;

class LogController extends Controller
{
    use SiteFilter;
    
    /**
     * log repository instance.
     *
     * @return string
     */
    protected $logs;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LogRepository $logs)
    {
        $this->logs = $logs;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('sections.log.index', [
            'h1' => _p('pages.logs.h1', 'Logs'),
            'logs' => $this->scope($request)->response()->getData(),
            'site_filters' => $this->getSiteFilterJson($request->user()) 
        ]);
    }

    public function show(Request $request, $id)
    {
        $log = $this->logs->findOrFail($id);

        return view('sections.log.show', [
            'h1' => $log->log_header,
            'log' => $log
        ]);
    }

    public function scope(Request $request)
    {
        return Log::collection(
            $this->logs->withCriteria([
                new UserCriteria([
                    'user_id' => $request->user()->id
                ])
            ])->scope($request)->smartPaginate()
        );
    }
}
