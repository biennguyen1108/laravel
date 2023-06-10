<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidDataController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.covid19api.com/summary');
        $data = $response->json()['Countries'];

        // Chia dữ liệu theo khu vực
        $regions = [
            'Asia' => [],
            'Europe' => [],
            'North America' => [],
            'South America' => [],
            'Africa' => [],
            'Australia/Oceania' => [],
        ];
        foreach ($data as $country) {
            if (isset($country['Continent'])) {
                $region = $country['Continent'];
                $regions[$region][] = $country;
            }
        }

        return view('covid-data', ['regions' => $regions]);
    }
}
