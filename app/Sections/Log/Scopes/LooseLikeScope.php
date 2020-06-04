<?php

namespace App\Sections\Log\Scopes;

use AwesIO\Repository\Scopes\ScopeAbstract;


class LooseLikeScope extends ScopeAbstract
{
    public function scope($builder, $scope, $value)
    {
        [$firstTerm, $searchTerms] = $this->pieces($scope);
        
        $builder->where($value, 'like', "%$firstTerm%");

        foreach ($searchTerms as $searchTerm) {
            $builder->orWhere($value, 'like', "%$searchTerm%");
        }

        return $builder;
    }

    protected function pieces($word)
    {
        $split = explode(" ", trim($word));

        $first = array_shift($split);

        return [$first, $split];
    }
}
