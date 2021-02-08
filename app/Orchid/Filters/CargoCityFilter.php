<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use App\Models\Cargo;

class CargoCityFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = ['il'];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'İl';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->whereIn('il', $this->request->get('il'));

    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Select::make('il')
                ->fromModel(Cargo::class, 'il', 'il')
                ->empty()
                ->multiple()
                ->value($this->request->get('il')?$this->request->get('il'):null)
                ->title(__('İl')),
        ];
    }
}
