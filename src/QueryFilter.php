<?php

namespace Sundrigast\LaravelFilters;

abstract class QueryFilter
{
    /**
     * Request with array of keys.
     */
    protected $request;

    /**
     * Current query builder for the model.
     */
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Main process of filtering.
     *
     * @param $builder
     * @return self
     */
    protected function apply($builder)
    {
        $this->builder = $builder;
        $this->fieldsCheck();

        return $this->builder;
    }

    /**
     * Check all additional filters.
     *
     * @return void
     */
    private function fieldsCheck(): void
    {
        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
    }

    /**
     * Get from request array of keys.
     *
     * @return array
     */
    public function filters(): array
    {
        return $this->request->all();
    }
}
