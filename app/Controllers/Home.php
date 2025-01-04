<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1'
        ];
    
        return view('home', $data);
    }
}
