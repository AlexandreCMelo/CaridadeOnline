<?php namespace Charis\Repositories\File;

use Auth;
use Charis\Models\Album;
use Charis\Models\File;
use Charis\Models\FileType;
use Charis\Models\Organization;
use Charis\Models\User;

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

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return File::find($id)->delete();
    }

    /**
     * @param $name
     * @param bool $path
     * @param bool $mime
     * @param bool $fileTypeId
     * @param bool $ownerId
     * @param bool $owner
     */
    public function find($name = false, $path = false, $mime = false, $fileTypeId = false, $ownerId = false, $owner = false){
        $data = File::query();

        if($name) {
            $data->where(File::NAME, $name);
        }

        if($path) {
            $data->where(File::PATH, $name);
        }

        if($mime) {
            $data->where(File::MIME_TYPE, $name);
        }

        if($fileTypeId) {
            $data->where(File::ID_FILE_TYPE, $name);
        }

        if($ownerId || $owner) {
            $data->where(File::FILE_OWNER, $owner);
            $data->where(File::ID_FILE_OWNER, $ownerId);
        }

        return $data->get();
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getUserFiles($userId)
    {
        return $this->find(false,false,false,false, $userId, User::class);
    }

    /**
     * @param $organizationId
     * @return mixed
     */
    public function getOrganizationLogo($organizationId)
    {
        return $this->find(false,false,false,FileType::LOGO, $organizationId, Organization::class);
    }

    /**
     * @param $organizationId
     * @return mixed
     */
    public function getOrganizationFiles($organizationId)
    {
        return $this->find(false,false,false,false, $organizationId, Organization::class);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getUserAvatar($userId)
    {
        return $this->find(false,false,false,FileType::AVATAR, $userId, User::class);
    }


}