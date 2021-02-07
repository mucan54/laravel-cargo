<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Matrix;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Models\Cargo;

class CargoEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Yeni kargo oluştur.';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'kargo düzenleme ekranı.';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Post $post
     *
     * @return array
     */
    public function query(Cargo $post): array
    {
        $this->exists = $post->exists;

        if($this->exists){
            $this->name = 'Kargo Düzenle';
        }

        return [
            'cargo' => $post
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create post')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('cargo.productName')
                    ->title('Ürün Adı')
                    ->placeholder('Ürün Adı')
                    ->help('Ürün Adı.'),

                Input::make('cargo.customerName')
                    ->title('İsim Soyisim')
                    ->placeholder('İsim Soyisim')
                    ->help('İsim Soyisim'),

                Input::make('cargo.phone')
                    ->title('Telefon Numarası')
                    ->placeholder('Telefon Numarası'),

                Input::make('cargo.il')
                    ->title('İl')
                    ->placeholder('İl'),

                Input::make('cargo.ilce')
                    ->title('İlçe')
                    ->placeholder('İlçe'),

                Input::make('cargo.postaKodu')
                    ->title('Posta Kodu')
                    ->placeholder('Posta Kodu'),

                Input::make('cargo.kargoFirmasi')
                    ->title('Kargo Firması')
                    ->placeholder('Kargo Firması'),

                Input::make('cargo.gonderimSekli')
                    ->title('Gönderim Şekli')
                    ->placeholder('Gönderim Şekli'),

                Input::make('cargo.tahsilatTutari')
                    ->title('Tahsilat Tutarı')
                    ->placeholder('Tahsilat Tutarı'),

                Input::make('cargo.kargoTipi')
                    ->title('Kargo Tipi')
                    ->placeholder('Kargo Tipi'),

                TextArea::make('cargo.adres')
                    ->title('Adres')
                    ->placeholder('Adres')
                    ->rows(3)
                    ->maxlength(200),

                Matrix::make('cargo.desi')
                    ->title('Desi')
                    ->columns(['Desi'])])
        ];
    }

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Cargo $post, Request $request)
    {

        $post->fill($request->get('cargo'))->save();

        Alert::info('Başarıyla kaydedildi.');

        return redirect()->route('platform.cargo.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Cargo $post)
    {
        $post->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.cargo.list');
    }
}
