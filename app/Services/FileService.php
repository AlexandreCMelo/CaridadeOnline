<?php

namespace Charis\Service;

use Charis\Models\User;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class FileService extends AbstractService
{

    const DIRECTORY_FORMAT = '/y/m/d/';

    protected $organizationDefaultPath = 'public/organization/';
    protected $userDefaultPath = 'public/users/';
    protected $organizationId = null;
    protected $userId = null;

    /**
     * @param $name
     * @param $path
     * @return null
     */
    protected function createDirectory($name, $path)
    {
        if (!Storage::exists($path . $name)) {
            return Storage::makeDirectory($path.$name, 0775);
        }

        return false;
    }

    /**
     * @param $id
     * @param $owner
     * @return null|string
     */
    public function getDirectory($id, $owner)
    {
        $path = $this->organizationDefaultPath;

        if($owner == User::class){
            $path = $this->userDefaultPath;
        }

        if (!Storage::exists(storage_path($path) . $id)) {
            return $path.$id;
        }

        return null;
    }


    public function getUploadDirectory($id, $owner) {

        $directory = $this->getDirectory($id, $owner);

        if(empty($directory)){
            return false;
        }

        $directoryDate = (new \DateTime())->format(self::DIRECTORY_FORMAT);

        $this->createDirectory($directoryDate, $directory);

        return storage_path('app/'.$directory).$directoryDate;

    }

    /**
     * @param $organizationId
     * @return null
     */
    protected function createOrganizationDirectory($organizationId)
    {
        return $this->createDirectory($this->organizationDefaultPath, $organizationId);
    }

    /**
     * @param $userId
     * @return null
     */
    protected function createUserDirectory($userId)
    {
        return $this->createDirectory($this->organizationDefaultPath, $userId);
    }





}