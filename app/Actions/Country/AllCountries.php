<?php
namespace App\Actions\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
class AllCountries{
    public function run(){
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'ajayakv-rest-countries-v1.p.rapidapi.com',
            // 'x-rapidapi-key' => 'cd2ebe6ddamsha65bfa4121d1237p1aa8aajsn0ff705bd7db1',
            'x-rapidapi-key' => 'f3ce039065msh6fcae99fdb4a389p147ad0jsn58936fd7cac2',
        ])->get('https://ajayakv-rest-countries-v1.p.rapidapi.com/rest/v1/all');
        
        return $response->collect()->pluck('name')
        ->all();
    }
}
