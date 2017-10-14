<?php namespace Charis\Repositories\System;

interface ILocaleRepository
{
    public function findById($id);
    public function all();

}