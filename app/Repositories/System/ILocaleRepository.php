<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 28/09/17
 * Time: 22:55
 */

interface ILocaleRepository
{
    public function findById($id);
    public function all();

}