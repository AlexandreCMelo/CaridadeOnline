<?php
namespace Charis\Repositories\Organization;

use Charis\Models\Organization;

/**
 * Interface UserRepository
 * @package Charis\Repositories\Organization
 */
interface IActivityRepository
{
    public function findById($id);
    public function all();

}