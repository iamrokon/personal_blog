<?php
use Illuminate\Support\Collection;

if(!function_exists('getNames')){
    function getNames(Collection $collection): string
    {
        return implode(', ', $collection->pluck('name')->toArray());
    }
}
