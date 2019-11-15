<?php

namespace App\Http\Controllers;

use App\Currency;

class CurrencyController extends Controller {
    /**
     * Return all currencies
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showCurrencies()
    {
        $currencies = Currency::all();
        return $currencies->isNotEmpty()
            ? response()->json($currencies)
            : response()->json(['response' => 404], 404);
    }

    /**
     * Return currency by id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showCurrency($id)
    {
        return response()->json(Currency::find($id) ?? ['response' => 404], 404);
    }
}