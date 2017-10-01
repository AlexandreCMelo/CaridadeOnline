<?php
namespace Charis\Repositories\Category;

use Charis\Models\Category;

/**
 * Interface CategoryRepository
 * @package Charis\Repositories\Category
 */
interface ICommentRepository
{
    public function findOrganizationCommentByKeyword();
    public function addComment($organizationId, $userId, $typeId, $content);
    public function removeCommentById();
    public function addOrganizationComment();
    public function removeOrganizationCommentById();
    public function addAlbumComment();
    public function removeAlbumCommentById();
}