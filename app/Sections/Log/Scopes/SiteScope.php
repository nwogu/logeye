<?php

namespace App\Sections\Log\Scopes;

use AwesIO\Repository\Scopes\ScopeAbstract;


class SiteScope extends ScopeAbstract
{
    public function scope($builder, $scope, $value)
    {
        return $builder->whereIn('site_id', $scope);
    }
}
