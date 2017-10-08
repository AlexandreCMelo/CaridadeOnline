<?php

namespace Charis\Service;

use Charis\Models\File;
use Charis\Models\FileType;
use Charis\Models\Organization;
use Charis\Models\User;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Charis\Repositories\File\FileRepository;

class FileService extends AbstractService
{

    const DIRECTORY_FORMAT = '/y/m/d';
    const APP_PATH = 'app/';

    protected $organizationDefaultPath = 'organization';
    protected $userDefaultPath = 'users';
    protected $systemDefaultPath = 'system/';
    protected $publicDefaultPath = 'public/';
    protected $organizationId = null;
    protected $userId = null;


    /**
     * @var FileRepository
     */
    protected $fileRepository = null;

    /**
     * @param $path
     * @return bool
     */
    protected function createDirectory($path)
    {
        if (!Storage::exists($path)) {
            return Storage::makeDirectory($path, 0775);
        }

        return false;
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param bool $createdById
     * @param bool $ownerId
     * @param bool $owner
     * @return bool
     */
    public function addFileFromRequestProtoType(\Illuminate\Http\Request $request, $createdById = false, $ownerId = false, $owner = false)
    {
        switch ($request->multipleselect) {
            case 'usr':
                $owner = 7;
                $storagePath = $this->getStorageDirectory($ownerId, User::class);
                $ownerType = User::class;
                break;
            case 'org':
                $owner = 13;
                $storagePath = $this->getStorageDirectory($ownerId, Organization::class);
                $ownerType = Organization::class;

                break;
            case 'sys':
                $storagePath = $this->getSystemStorageDirectory();
                break;
        }

        $finalName = mt_rand(1,1000).'-'.$request->image->getClientOriginalName();
        $mime = $request->image->getMimeType();
        $size = $request->image->getSize();
        $name = $request->name;
        $fileTypeId = 30;
        $attributes = null;

        if($path = $request->image->storeAs($this->publicDefaultPath.$storagePath, $finalName)){
            if(!$this->getFileRepository()->add(
                $name,
                $path,
                $size,
                $mime,
                $attributes,
                $fileTypeId,
                $createdById,
                $ownerId,
                $ownerType
            )){
                Storage::delete($path);
                return false;
            }
            return true;
        }

        return false;
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param bool $createdById
     * @param bool $ownerId
     * @param bool $owner
     * @return bool
     */
    public function addFileFromRequest(\Illuminate\Http\Request $request, $fileTypeId, $createdById = false, $ownerId = false, $owner = false)
    {

        switch ($owner) {
            case User::class:
                $storagePath = $this->getStorageDirectory($ownerId, User::class);
                break;
            case Organization::class:
                $storagePath = $this->getStorageDirectory($ownerId, Organization::class);
                break;
            default:
                $storagePath = $this->getSystemStorageDirectory();
                break;
        }

        $fileName = mt_rand(1,1000).'-'.$request->image->getClientOriginalName();
        $name = $request->name ? $request->name : $fileName;
        $size = $request->image->getSize();
        $mime = $request->image->getMimeType();
        $attributes = null;

        if($path = $request->image->storeAs($this->publicDefaultPath.$storagePath, $fileName)){
            if(!$this->getFileRepository()->add(
                $name,
                $storagePath.$fileName,
                $size,
                $mime,
                $attributes,
                $fileTypeId,
                $createdById,
                $ownerId,
                $owner
            )){
                Storage::delete($path);
                return false;
            }
            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @param $owner
     * @return null|string
     */
    public function getDirectory($id = false, $owner = false)
    {
        if (!$owner) {
            $path = $this->systemDefaultPath;
        }

        if ($owner == User::class) {
            $path = $this->userDefaultPath;
        }

        if ($owner == Organization::class) {
            $path = $this->organizationDefaultPath;
        }

        if($id) {
            $path = $path .'/'. $id;
        }

        $this->createDirectory($path);

        return $path;
    }

    /**
     * @param $request
     * @param $userId
     * @param $fileTypeId
     * @param $createdBy
     * @return bool
     */
    public function addFileToSystemFromRequest(Request $request, $fileTypeId, $createdBy)
    {
       return $this->addFileFromRequest($request, $fileTypeId, $createdBy);
    }

    /**
     * @param $request
     * @param $userId
     * @param $fileTypeId
     * @param $createdBy
     * @return bool
     */
    public function addFileToUserFromRequest(Request $request, $userId, $fileTypeId, $createdBy)
    {
       return $this->addFileFromRequest($request, $fileTypeId, $createdBy, $userId, User::class);
    }


    /**
     * @param Request $request
     * @param $userId
     * @param $createdBy
     * @return bool
     */
    public function addImageToUserFromRequest(Request $request, $userId, $createdBy)
    {
       return $this->addFileToUserFromRequest($request,$userId,FileType::IMAGE, $createdBy);
    }

    /**
     * @param Request $request
     * @param $userId
     * @param $createdBy
     * @return bool
     */
    public function addAvatarToUserFromRequest(Request $request, $userId, $createdBy)
    {
       return $this->addFileToUserFromRequest($request,$userId, FileType::AVATAR, $createdBy);
    }


    /**
     * @param $request
     * @param $organizationId
     * @param $fileTypeId
     * @param $createdBy
     * @return bool
     */
    public function addFileToOrganizationFromRequest(Request $request, $organizationId, $fileTypeId, $createdBy)
    {
        return $this->addFileFromRequest($request, $fileTypeId, $createdBy, $organizationId, Organization::class);
    }

    /**
     * @param Request $request
     * @param $organizationId
     * @param $createdBy
     * @return bool
     */
    public function addImageToOrganizationFromRequest(Request $request, $organizationId, $createdBy)
    {
       return $this->addFileFromRequest($request, $organizationId, FileType::IMAGE, $createdBy);
    }

    /**
     * @param Request $request
     * @param $organizationId
     * @param $createdBy
     * @return bool
     */
    public function addLogoToOrganizationFromRequest(Request $request, $organizationId, $createdBy)
    {
       return $this->addFileFromRequest($request, $organizationId, FileType::LOGO, $createdBy);
    }

    /**
     * @param Request $request
     * @param $organizationId
     * @param $createdBy
     * @return bool
     */
    public function addVideoToOrganizationFromRequest(Request $request, $organizationId, $createdBy)
    {
       return $this->addFileFromRequest($request, $organizationId, FileType::VIDEO, $createdBy);
    }

    /**
     * @param bool $path
     * @return null|string
     */
    public function getSystemStorageDirectory($path = false)
    {
        return $path ? $this->getDirectory() . $path : $this->getDirectory();
    }


    /**
     * @param $id
     * @param $owner
     * @return bool|string
     */
    public function getStorageDirectory($id, $owner = false)
    {

        $directory = $this->getDirectory($id, $owner);
        $directoryDate = null;

        if (empty($directory)) {
            return false;
        }

        if($owner) {
            $directoryDate = (New \DateTime())->format(self::DIRECTORY_FORMAT);
        }


        return $directory . $directoryDate;

    }

    /**
     * @param $organizationId
     * @return null
     */
    protected function createOrganizationDirectory($organizationId)
    {
        return $this->createDirectory($this->organizationDefaultPath.$organizationId);
    }

    /**
     * @param $userId
     * @return null
     */
    protected function createUserDirectory($userId)
    {
        return $this->createDirectory($this->organizationDefaultPath.$userId);
    }

    /**
     * @return FileRepository
     */
    protected function getFileRepository()
    {
        if (null == $this->fileRepository) {
            $this->fileRepository = new FileRepository();
        }
        return $this->fileRepository;
    }


}