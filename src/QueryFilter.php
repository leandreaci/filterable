<?php
/**
 * Created by: leandro
 * Datetime: 13/09/16 10:18
 */

namespace Leandreaci\Filterable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{

    protected $request;
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     *
     */
    public function filters()
    {
        return $this->request->all();
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value)
        {

            if( $this->invalid($name, $value) )
            {
                continue;
            }

            if (! is_null($value) ) {
                $this->$name($value);
            } else {
                $this->$name();
            }
        }

        return $this->builder;
    }

    /**
     * @param $name
     * @param $value
     * @return bool
     */
    private function invalid($name, $value)
    {
        return !method_exists($this, $name) ||
            is_null($value) ||
        $this->isValidArray($value);
    }

    /**
     * @param $array
     * @return bool
     */
    private function isValidArray($array)
    {
        if(is_array($array))
        {
            return strlen(implode($array)) == 0;
        }

        return false;
    }
}