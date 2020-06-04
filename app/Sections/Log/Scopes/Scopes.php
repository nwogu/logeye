<?php

namespace App\Sections\Log\Scopes;

use AwesIO\Repository\Scopes\ScopesAbstract;
use AwesIO\Repository\Scopes\Clauses\WhereScope;

class Scopes extends ScopesAbstract
{
    protected $scopes = [
        'site' => SiteScope::class,
        'period_start' => PeriodStartScope::class,
        'period_end' => PeriodEndScope::class,
        'message'   => LooseLikeScope::class
    ];
}
