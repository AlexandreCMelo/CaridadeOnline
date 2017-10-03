<?php namespace Charis\Repositories\Document;

use Charis\Models\Comment;
use Charis\Models\CommentType;
use Auth;
use Charis\Models\Document;
use Charis\Models\Organization;
use Charis\Models\User;

/**
 * Class DocumentRepository
 * @package Charis\Repositories\Category
 */
class DocumentRepository implements IDocumentRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Document::find($id)->get();
    }

    /**
     * @param $typeId
     * @param $ownerTypeId
     * @param $ownerType
     * @param $value
     * @return bool
     */
    public function add($typeId, $ownerTypeId, $ownerType, $value)
    {
        $document = new Document();

        $document->{Document::ID_TYPE} = $typeId;
        $document->{Document::ID_OWNER} = $ownerTypeId;
        $document->{Document::OWNER_TYPE} = $ownerType;
        $document->{Document::ID_TYPE} = $value;

        if ($document->save()) {
            return $document->id;
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return Document::find($id)->delete();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findByValue($value)
    {
        return $this->findByDocument(false, false, false, $value);
    }

    /**
     * @param $ownerType
     * @param $ownerId
     * @param bool $documentTypeId
     * @param bool $value
     * @return mixed
     */
    public function findByDocument($ownerType, $ownerId, $documentTypeId = false, $value = false)
    {
        $data = Document::query();


        if ($ownerType) {
            $data->where(Document::OWNER_TYPE, $ownerType);
        }

        if ($ownerId) {
            $data->where(Document::ID_OWNER, $ownerId);
        }

        if ($documentTypeId) {
            $data->where(Document::ID_TYPE, $documentTypeId);
        }

        if ($documentTypeId) {
            $data->where(Document::VALUE, $value);
        }

        return $data->get();
    }

    /**
     * @param $userId
     * @param bool $documentTypeId
     * @return mixed
     */
    public function findByUser($userId, $documentTypeId = false)
    {
        return $this->findByDocument(User::class, $userId, $documentTypeId);
    }

    /**
     * @param $organizationId
     * @param bool $documentTypeId
     * @return mixed
     */
    public function findByOrganization($organizationId, $documentTypeId = false)
    {
        return $this->findByDocument(Organization::class, $organizationId, $documentTypeId);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function removeCommentById($id)
    {
       return $this->find($id)->delete();
    }


}