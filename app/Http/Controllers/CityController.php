<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cities;

    public function __construct()
    {
        $this->cities = collect([
            ['id' => 35, 'title' => 'İzmir'],
            ['id' => 34, 'title' => 'İstanbul'],
            ['id' => 6, 'title' => 'Ankara'],
            ['id' => 10, 'title' => 'Antalya'],
        ]);
    }

    public function index()
    {
        return json_encode($this->cities->toArray());
    }
}
