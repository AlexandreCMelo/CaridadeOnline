<?php
namespace Charis\Repositories\File;

/**
 * Interface IFileRepository
 * @package Charis\Repositories\File
 */
interface IFileRepository
{

    public function add($name, $path, $size, $mime, $attributes, $fileTypeId, $createdById, $ownerId = false, $owner = false);
    public function remove($id);
    public function getUserFiles($userId);
    public function getOrganizationLogo($organizationId);
    public function getOrganizationFiles($organizationId);
    public function getUserAvatar($userId);

}