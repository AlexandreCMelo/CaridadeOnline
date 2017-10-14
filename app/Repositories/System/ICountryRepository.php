<?php namespace Charis\Repositories\System;

interface ICountryRepository
{
    public function findById($id);
    public function all();

}