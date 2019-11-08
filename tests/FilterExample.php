<?php


namespace Leandreaci\Tests;


use Leandreaci\Filterable\QueryFilter;

class FilterExample extends QueryFilter
{

    public function id()
    {
        return $this->builder->where('teste',1);
    }

}