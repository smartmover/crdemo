<?php

namespace App\Repository;

interface InfoRepository
{
    public function get($limit, $offset);
    public function save($data);
}
