<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TownController extends Controller
{
    public function __construct()
    {
        $this->towns = collect([
            ['id' => 1, 'title' => 'Karşıyaka', 'city_id' => 35],
            ['id' => 2, 'title' => 'Konak', 'city_id' => 35],
            ['id' => 3, 'title' => 'Maslak', 'city_id' => 34],
            ['id' => 4, 'title' => 'Ataköy', 'city_id' => 34],
            ['id' => 5, 'title' => 'Mamak', 'city_id' => 6],
            ['id' => 6, 'title' => 'Kızılay', 'city_id' => 6],
        ]);
    }

    public function index(Request $request)
    {
        return json_encode($this->towns->where('city_id', $request->input('cityId'))->toArray());
    }
}
