<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\CargoListLayout;
use App\Orchid\Layouts\CargoFiltersLayout;
use App\Models\Cargo;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\TaskCompleted;


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
                ->route('platform.cargo.edit'),
            DropDown::make('Toplu İşlemler')
                ->icon('options-vertical')
                ->list([
                Link::make(__('Edit'))
                        ->route('platform.systems.users.edit',1)
                        ->icon('pencil'),
                Button::make(__('Delete'))
                        ->method('test')
                        ->icon('trash')
                        ->confirm(__('Are you sure you want to delete the user?'))
                        ->parameters([
                            'id' => 'users[]',
                        ]),
                ])
        ];
    }

    public function test($params){

        User::find(Auth::user()->id)->notify(new TaskCompleted);

    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            CargoFiltersLayout::class,
            CargoListLayout::class];
    }
}
