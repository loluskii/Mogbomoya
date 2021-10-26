<?php
namespace App\Actions\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
class AllCountries{
    public function run(){
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'world-geo-data.p.rapidapi.com',
            'x-rapidapi-key' => '1fa601995fmshcc1d2fcc97ee24cp1ac29djsn9b9b11cc10ec',
            //'x-rapidapi-key' => config('app.rapid_api_key'),
        ])->get('https://world-geo-data.p.rapidapi.com/countries');
        
        $arr = $response->json(['countries']);
        $array = array();
        foreach($arr as $key){
            $array[] = $key['name'];
        }
        return $array;
        
        // return $response->collect()->pluck('name')
        // ->all();
    }
}
