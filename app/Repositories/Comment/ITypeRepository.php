<?php
namespace Charis\Repositories\Comment;

/**
 * Interface ICommentTypeRepository
 * @package Charis\Repositories\Category
 */
interface ICommentTypeRepository
{
    public function findTypes();
    public function add($name);
    public function findById($id);
    public function removeTypeById($id);
}