<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {

    protected $fillable = [
        'name', 'english_name', 'alphabetic_code', 'digit_code', 'rate'
    ];

    protected $hidden = [];

    public static function updateCurrency($data)
    {
        if (! empty($data) && ! empty($data->Name)) {
            Currency::updateOrCreate(['name' => $data->Name], [
                'name' => $data->Name,
                'english_name' => $data->EngName,
                'alphabetic_code' => $data->CharCode,
                'digit_code' => $data->NumCode,
                'rate' => floatval(str_replace(",",".", $data->Value)),
            ]);
        }
    }
}