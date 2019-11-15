<?php

class ownTest extends TestCase
{
    public function testShowCurrencies()
    {
        $this->get('/currencies');

        $this->seeJsonStructure([
            [
                'id',
                'name',
                'english_name',
                'alphabetic_code',
                'digit_code',
                'rate',
            ]
        ]);
    }

    public function testShowCurrency()
    {
        $this->get('/currencies/1');

        $this->seeJsonStructure([
            'id',
            'name',
            'english_name',
            'alphabetic_code',
            'digit_code',
            'rate',
        ]);
    }
}
