<?php

namespace App\Sections\Log\Traits;


trait SiteFilter
{
    public function getSiteFilterJson($user)
    {
        return $user->sites->map(function ($site) {
            return ['name' => $site->name, 'value' => $site->id];
        })->toJson();
    }
}
