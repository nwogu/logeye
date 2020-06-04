<?php

namespace App\Sections\Log\Scopes;

use AwesIO\Repository\Scopes\ScopeAbstract;


class PeriodStartScope extends ScopeAbstract
{
    public function scope($builder, $scope, $value)
    {
        return $builder->whereDate('date', '>=', $scope);
    }
}
