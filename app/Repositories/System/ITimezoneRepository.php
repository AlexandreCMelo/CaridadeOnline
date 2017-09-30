<?php
interface ITimezoneRepository
{
    public function findById($id);
    public function all();

}