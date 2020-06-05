<?php

namespace App\Sections\Log\Criteria;

use AwesIO\Repository\Contracts\CriterionInterface;


class OrderCriteria implements CriterionInterface
{
    protected $conditions;
    
    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }
 
    public function apply($entity)
    {
        return $entity->orderBy('date', 'desc');
    }
}
