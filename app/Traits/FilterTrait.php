<?php

namespace App\Traits;

trait FilterTrait {

    /**
     * add filtering.
     *
     * @param  $builder: query builder.
     * @param  $filters: array of filters.
     * @return query builder.
     */
    public function scopeFilter($builder, $filters = [])
    {
        if(!$filters) {
            return $builder;
        }
        
        $exactFilters = $this->exactFilters ?? [];
        $scopeFilters = $this->scopeFilters ?? [];
        
        if (!empty($exactFilters)) {
            foreach ($exactFilters as $value) {
                foreach ($filters as $key => $filterVal) {
                    if ($value == $key) {
                        $builder = $builder->where($value, $filterVal);
                    }
                }
            }
        }

        if (!empty($scopeFilters)) {
            foreach ($scopeFilters as $value) {
                if (array_key_exists($value, $filters)) {
                    $builder = $builder->{$value}($filters[$value]);
                }
            }
        }
        return $builder;
    }
}