<?php
namespace Charis\Repositories\Target;

/**
 * Interface TargetRepository
 * @package Charis\Repositories\Target
 */
interface ITargetRepository
{
    public function findById($id);
    public function all();
}