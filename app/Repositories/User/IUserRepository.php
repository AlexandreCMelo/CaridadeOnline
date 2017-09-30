<?php
namespace Charis\Repositories\Target;

/**
 * Interface TargetRepository
 * @package Charis\Repositories\Target
 */
interface IUserRepository
{
    public function findById($id);
    public function all();
}