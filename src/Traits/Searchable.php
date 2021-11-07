<?php

namespace Raahin\HumanResource\Traits;

trait Searchable
{

    /**
     * @param $query
     * @param string $search
     * @param array|string|null $columns
     * @return mixed
     */
    public function scopeSearch($query, string $search, ...$columns)
    {
        if (count($columns) == 0)
            return $this->scopeSearchInArrayOfColumns($query, $search, $this->searchable);

        if (is_null($columns[0]))
            return $this->scopeSearchInArrayOfColumns($query, $search, $this->searchable);

        if (is_array($columns[0]) and count($columns) == 1)
            return $this->scopeSearchInArrayOfColumns($query, $search, $columns[0]);

        return $this->scopeSearchInArrayOfColumns($query, $search, $columns);
    }


    /**
     * @param $query
     * @param string $search
     * @param array $columns
     * @return mixed
     */
    private function scopeSearchInArrayOfColumns($query, string $search, array $columns)
    {
        if (!$search)
            return $query;

        foreach ($columns as $column)
            if ($this->isSearchable($column))
                $query->orWhere($column, "LIKE", "%$search%");


        return $query;
    }

    private function isSearchable($column)
    {
        return in_array($column, $this->searchable);
    }

}
