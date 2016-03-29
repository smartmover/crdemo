<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repository\InfoRepository;
use App\Transformer\InfoTransformer;
use App\Http\Requests\InfoPostRequest;

class InfoController extends ApiController
{
    public function index(InfoRepository $info, InfoTransformer $transformer)
    {
        $limit = $this->request->get('limit', 6);
        $page = (int) $this->request->get('page', 1);
        $offset = ($page >= 1) ? ($page-1) * $limit : 0;
        $results = $info->get($limit, $offset);
        return $this->respondWithCollection($results['data'], $transformer, $limit, $offset, $results['total_count']);
    }

    public function store(InfoPostRequest $request, InfoRepository $info)
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
