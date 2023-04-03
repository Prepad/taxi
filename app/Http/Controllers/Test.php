<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Test extends Controller
{
    public function testing()
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://api.geotree.ru/address.php?term=Барнаул балтийская 13&key=' . env('GEO_KEY') . '&limit=1'
        );
        dump(json_decode($response->getBody()->getContents(), true)[0]['geo_inside']);
    }

}
