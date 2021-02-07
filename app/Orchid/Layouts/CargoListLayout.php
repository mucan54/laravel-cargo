<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use App\Models\Cargo;

class CargoListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'cargos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('productName', 'Ürün Adı')->render(function (Cargo $post) {
                return Link::make($post->productName)
                    ->route('platform.cargo.edit', $post);
            })->sort()->filter(TD::FILTER_TEXT),
            TD::make('customerName', 'İsim')->sort()->filter(TD::FILTER_TEXT),
            TD::make('phone', 'Telefon')->sort()->filter(TD::FILTER_TEXT),
            TD::make('il', 'İl')->sort()->filter(TD::FILTER_TEXT),
            TD::make('ilce', 'İlçe')->sort()->filter(TD::FILTER_TEXT),
            TD::make('postaKodu', 'Posta Kodu')->sort()->filter(TD::FILTER_TEXT),
            TD::make('kargoFirmasi', 'Kargo Firması')->sort()->filter(TD::FILTER_TEXT),
            TD::make('gonderimSekli', 'Gönderim Şekli')->sort()->filter(TD::FILTER_TEXT),
            TD::make('tahsilatTutari', 'Tahsilat Tutarı')->sort()->filter(TD::FILTER_TEXT),
            TD::make('kargoTipi', 'Kargo Tipi')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Tarih')->sort()->filter(TD::FILTER_TEXT),
        ];
    }
}
