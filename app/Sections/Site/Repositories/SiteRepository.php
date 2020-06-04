<?php

namespace App\Sections\Site\Repositories;

use App\Sections\Site\Models\Site;
use AwesIO\Repository\Eloquent\BaseRepository;

class SiteRepository extends BaseRepository
{
    /**
     * The attributes that can be searched by.
     *
     * @var array
     */
    protected $searchable = ['name'];

    /**
     * Returns site model's full class name.
     *
     * @return string
     */
    public function entity()
    {
        return Site::class;
    }
}
