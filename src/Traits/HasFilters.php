<?php

namespace Sundrigast\LaravelFilters;

trait HasFilters
{
    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }
}
