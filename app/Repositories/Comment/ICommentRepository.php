<?php
namespace Charis\Repositories\Category;

use Charis\Models\Category;

/**
 * Interface CategoryRepository
 * @package Charis\Repositories\Category
 */
interface ICommentRepository
{
    public function findOrganizationComments($organizationId = false, $userId = false, $keyword = false);
    public function findComments($organizationId = false, $typeId = false, $userId = false, $keyword = false);
    public function findUserComments($userId, $keyword = false);
    public function addComment($organizationId, $userId, $typeId, $content);
    public function removeCommentById($id);
}