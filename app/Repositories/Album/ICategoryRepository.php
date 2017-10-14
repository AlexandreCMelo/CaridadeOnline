<?php
namespace Charis\Repositories\Category;

use Charis\Models\Category;

/**
 * Interface CategoryRepository
 * @package Charis\Repositories\Category
 */
interface ICategoryRepository
{
    public function findById($id);
    public function all();
}