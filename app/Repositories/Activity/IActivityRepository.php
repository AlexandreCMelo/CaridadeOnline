<?php
namespace Charis\Repositories\Activity;

use Charis\Models\Organization;

/**
 * Interface UserRepository
 * @package Charis\Repositories\Organization
 */
interface IActivityRepository
{
    public function findById($id);
    public static function all();

}
