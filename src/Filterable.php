<?php

namespace Leandreaci\Filterable;


trait Filterable
{
    /**
     * @param $query
     * @param QueryFilter $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, QueryFilter $filter)
    {
        return $filter->apply($query);
    }
}