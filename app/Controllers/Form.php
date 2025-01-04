<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1'
        ];

        return view('Form/form', $data);
    }
}