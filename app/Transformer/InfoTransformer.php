<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class InfoTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform($info)
    {
        return [
            'name'           => $info->name,
            'gender'         => $info->gender,
            'phone'          => $info->phone,
            'email'          => $info->email,
            'address'        => $info->address,
            'nationality'    => $info->nationality,
            'dob'            => $info->dob,
            'edu_background' => $info->edu_background,
            'prefer_moc'     => $info->prefer_moc,
        ];
    }
}
