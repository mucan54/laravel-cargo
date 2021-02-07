<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Cargo extends Model
{
    use AsSource,Filterable;

    protected $guarded = ['id'];

    protected $table = 'cargo';

    protected $allowedFilters = [
        'productName',
        'customerName',
        'phone',
        'il',
        'ilce',
        'postaKodu',
        'kargoFirmasi',
        'gonderimSekli',
        'tahsilatTutari',
        'kargoTipi'
    ];

    protected $allowedSorts = [
        'productName',
        'customerName',
        'phone',
        'il',
        'ilce',
        'postaKodu',
        'kargoFirmasi',
        'gonderimSekli',
        'tahsilatTutari',
        'kargoTipi'
    ];

    protected $casts = [
        'desi' => 'array',
    ];
}
