<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformer\InfoTransformer;

class InfoController extends ApiController
{
    public function index(InfoTransformer $transformer)
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
        return $this->respondWithCollection($data, $transformer);
    }

}
