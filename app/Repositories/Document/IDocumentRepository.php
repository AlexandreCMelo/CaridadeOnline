<?php
namespace Charis\Repositories\Document;

/**
 * Interface IDocumentRepository
 * @package Charis\Repositories\Document
 */
interface IDocumentRepository
{
    public function findById($id);
    public function add($typeId, $ownerTypeId, $ownerType, $value);
    public function remove($id);
    public function findByValue($value);
    public function findByDocument($ownerType,  $ownerId, $documentTypeId = false, $value = false);
    public function findByUser($userId, $documentTypeId);
    public function findByOrganization($organizationId, $documentTypeId);
    public function removeCommentById($id);
}