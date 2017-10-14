<?php namespace Charis\Repositories\System;
interface ITimezoneRepository
{
    public function findById($id);
    public function all();

}