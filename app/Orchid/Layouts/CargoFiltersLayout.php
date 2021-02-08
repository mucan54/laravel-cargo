<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\CargoFilter;
use App\Orchid\Filters\CargoCityFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class CargoFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            CargoFilter::class,
            CargoCityFilter::class
        ];
    }
}
