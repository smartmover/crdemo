<?php

namespace App\Repository;

use League\Csv\Reader;
use League\Csv\Writer;

class CsvInfoRepository implements InfoRepository
{

    /**
     * this order of element is responsible
     * for display and saving
     *
     * @var mixed
     */
    public $attribute = [
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'nationality',
        'dob',
        'edu_background',
        'prefer_moc'
    ];

    public function get($limit, $offset)
    {
        $reader = Reader::createFromPath(storage_path(env('CSV_PATH')));

        $count = $reader->each(function () {
            return true;
        });

        return [
            'data' => $reader->setLimit($limit)
                        ->setOffset($offset)
                        ->fetchAssoc($this->attribute),
            'total_count' => $count
        ];
    }

    public function save($data)
    {
        $writer = Writer::createFromFileObject(new \SplTempFileObject());
        $writer->insertOne($data);
        return \File::append(storage_path(env('CSV_PATH')), $writer->__toString());
    }
}
