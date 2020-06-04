<?php

namespace App\Sections\Site\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sections\Site\Resources\Site;
use App\Sections\Site\Requests\StoreSite;
use App\Sections\Log\Criteria\UserCriteria;
use App\Sections\Site\Repositories\SiteRepository;

class SiteController extends Controller
{
    /**
     * site repository instance.
     *
     * @return string
     */
    protected $sites;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SiteRepository $sites)
    {
        $this->sites = $sites;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('sections.sites.index', [
            'h1' => _p('pages.sites.h1', 'sites'),
            'sites' => $this->scope($request)->response()->getData()
        ]);
    }

    public function scope(Request $request)
    {
        return Site::collection(
            $this->sites->withCriteria([
                new UserCriteria([
                    'user_id' => $request->user()->id
                ])
            ])->scope($request)->smartPaginate()
        );
    }

    public function show(Request $request, $id)
    {
        $site = $this->sites->findOrFail($id);

        return view('sections.sites.show', [
            'h1' => $site->name,
            'site' => $site
        ]);
    }

    public function store(StoreSite $request)
    {
        $this->sites->create($request->retrieve());

        return notify(_p('pages.sites.notify.store', 'New site was successfully created'));
    }

    public function update(StoreSite $request, $id)
    {
        $this->sites->update($request->all(), $id);

        return notify(
            _p('pages.sites.notify.update', 'site was successfully updated'), 
            new Site($this->sites->find($id))
        );
    }
}
