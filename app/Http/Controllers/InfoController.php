<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repository\InfoRepository;
use App\Transformer\InfoTransformer;

class InfoController extends ApiController
{
    public function index(InfoRepository $info, InfoTransformer $transformer)
    {
        $results = $info->get();
        return $this->respondWithCollection($results, $transformer);
    }

    public function store(Request $request, InfoRepository $info)
    {
        $data = [];
        foreach ($info->attribute as $attr) {
            array_push($data, $request->get($attr));
        }
        $info->save($data);
        return $this->setStatusCode(201)
            ->respondWithArray([
                'message' => 'Successfully Saved'
            ]);
    }
}
