<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function ulasan() {
        // $ulasan = Ulasan::all();
        $response = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJ-4NA1pSdeC4R5ik3KRItaq8&key=AIzaSyBGr_Mzjw025m1jTs-YnbWMXVNeQ1WgCjw');
        $response = json_decode($response);
        return view('ulasan.ulasan',[
            'ulasan'=>$response->result->reviews
        ]);
    }
}
