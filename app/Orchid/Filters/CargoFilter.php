<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class CargoFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = ['cargo'];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Fatura';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Select::make('fatura')
                ->fromModel(Role::class, 'name', 'slug')
                ->empty()
                ->value($this->request->get('fatura'))
                ->title(__('Fatura Durumu')),
        ];
    }
}
