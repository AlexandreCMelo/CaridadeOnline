<?php namespace Charis\Repositories\File;

use Auth;
use Charis\Models\File;

/**
 * Class FileRepository
 * @package Charis\Repositories\File
 */
class FileRepository implements IFileRepository
{
    public function add($name, $path, $size, $mime, $attributes, $fileTypeId, $createdById ,$ownerId = false, $owner = false)
    {
        $file = new File();

        $file->{File::NAME} = $name;
        $file->{File::PATH} = $path;
        $file->{File::SIZE} = $size;
        $file->{File::MIME_TYPE} = $mime;
        $file->{File::ATTRIBUTES} = $attributes;
        $file->{File::ID_FILE_TYPE} = $fileTypeId;
        $file->{File::CREATED_BY} = $createdById;

        if($ownerId && $owner){
            $file->{File::ID_FILE_OWNER} = $ownerId;
            $file->{File::FILE_OWNER} = $owner;
        }

        if($file->save()){
            return $file->id;
        }

        return false;
    }

    public function remove($id)
    {
        return File::find($id)->delete();
    }

    public function getUserFiles($userId)
    {
        // TODO: Implement getUserFiles() method.
    }

    public function getOrganizationLogo($organizationId)
    {
        // TODO: Implement getOrganizationLogo() method.
    }

    public function getOrganizationFiles($organizationId)
    {
        // TODO: Implement getOrganizationFiles() method.
    }

    public function getOrganizationAlbums($organizationId)
    {
        // TODO: Implement getOrganizationAlbums() method.
    }

    public function getAlbumFiles($albumId)
    {
        // TODO: Implement getAlbumFiles() method.
    }

    public function getUserAvatar($userId)
    {
        // TODO: Implement getUserAvatar() method.
    }


}