<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InfoController extends ApiController
{
    public function index()
    {
        return [
            'name'           => 'sachin',
            'gender'         => 'test',
            'phone'          => 'test',
            'email'          => 'test',
            'address'        => 'test',
            'nationality'    => 'test',
            'dob'            => 'test',
            'edu_background' => 'test',
            'prefer_moc'     => 'test',
        ];
    }

}
