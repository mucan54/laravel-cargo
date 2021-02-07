<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\CargoListLayout;
use App\Models\Cargo;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;


class CargoListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Kargo Listeleme Ekranı';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'kargolarınız.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'cargos' => Cargo::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Yeni')
                ->icon('pencil')
                ->route('platform.cargo.edit')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [CargoListLayout::class];
    }
}
