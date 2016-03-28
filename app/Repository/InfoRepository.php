<?php

namespace App\Repository;

interface InfoRepository
{
    public function get();
    public function save($data);
}
