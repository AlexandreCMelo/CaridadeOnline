<?php
namespace Charis\Repositories\Target;

use Charis\Models\Target;

/**
 * Interface TargetRepository
 * @package Charis\Repositories\Target
 */
interface ITargetRepository
{
    public function findById($id);
    public function all();
}