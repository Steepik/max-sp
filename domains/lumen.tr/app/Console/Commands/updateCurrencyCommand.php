<?php
namespace App\Console\Commands;

/**
 * Class updateCurrencyCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

use App\Currency;
use Illuminate\Console\Command;

class updateCurrencyCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "currency:update";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update currency information";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $englishCurrText = [];
            $date = date('d/m/Y');
            $xml = new \XMLReader();
            $doc = new \DOMDocument();
            $xml->open('http://www.cbr.ru/scripts/XML_val.asp?d=0'); // For translate currency from russian to english

            // Get currency in english translate
            while($xml->read()) {
                if ($xml->name === 'Item') {
                    $node = simplexml_import_dom($doc->importNode($xml->expand(), true));

                    if (! empty($node->Name)) {
                        $englishCurrText[] = [
                            'rusName' => (string)$node->Name,
                            'engName' => (string)$node->EngName,
                        ];
                    }
                }
            }

            // Get xml file with currencies info
            $xml->open('http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date);

            while($xml->read()) {
                if ($xml->name === 'Valute') {
                    $node = simplexml_import_dom($doc->importNode($xml->expand(), true));

                    // Search for match to translate
                    $currencyName = (string)$node->Name;
                    foreach ($englishCurrText as $item) {
                        if ($item['rusName'] == $currencyName) {
                            if ( ! empty($item['engName']))
                                $node->addChild('EngName', $item['engName']);
                        }
                    }

                    // Create or if exists update
                    Currency::updateCurrency($node);
                }
            }


        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}