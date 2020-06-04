<?php

namespace App\Sections\Log\Criteria;

use AwesIO\Repository\Contracts\CriterionInterface;


class UserCriteria implements CriterionInterface
{
    protected $conditions;
    
    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }
 
    public function apply($entity)
    {
        return $entity->where('user_id', $this->conditions['user_id']);
    }
}
