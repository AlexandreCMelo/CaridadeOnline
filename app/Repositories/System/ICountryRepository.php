<?php

interface ICountryRepository
{
    public function findById($id);
    public function all();

}