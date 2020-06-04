<?php

namespace App\Sections\Log\Repositories;

use App\Sections\Log\Models\Log;
use App\Sections\Log\Scopes\Scopes;
use App\Sections\Log\Scopes\SiteScope;
use AwesIO\Repository\Eloquent\BaseRepository;

class LogRepository extends BaseRepository
{
    /**
     * The attributes that can be searched by.
     *
     * @var array
     */
    protected $searchable = [
        'date', 'level',
    ];

    /**
     * Returns log model's full class name.
     *
     * @return string
     */
    public function entity()
    {
        return Log::class;
    }

    public function scope($request)
    {
        parent::scope($request);

        $this->entity = (new Scopes($request))->scope($this->entity);
    
        return $this;
    }
}
