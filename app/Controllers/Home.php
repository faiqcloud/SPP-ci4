<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'=>'Home | Web Spp'
        ];
        return view('dasboard/index',$data);
    }
}
