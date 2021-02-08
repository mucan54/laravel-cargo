<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use App\Models\Cargo;

class CargoFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = ['productName'];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Ürün Adı';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        
        return $builder->whereIn('productName', explode(',',$this->request->get('productName')[0]));

    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Select::make('productName')
                ->fromModel(Cargo::class, 'productName', 'productName')
                ->empty()
                ->multiple()
                ->value($this->request->get('productName')?explode(',',$this->request->get('productName')[0]):null)
                ->title(__('Ürün Adı')),
        ];
    }
}
