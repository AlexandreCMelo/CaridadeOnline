<?php namespace Charis\Repositories\Document;

use Charis\Models\DocumentType;

/**
 * Class TypeRepository
 * @package Charis\Repositories\Document
 */
class TypeRepository implements ICommentTypeRepository
{
    const DEFAULT_LIMIT = 10;

    /**
     * @return mixed
     */
    public function findTypes()
    {
        return DocumentType::all()->paginate(self::DEFAULT_LIMIT);
    }

    /**
     * @return mixed
     */
    public function findById($id)
    {
        return DocumentType::find($id)->get();
    }

    /**
     * @param $name
     * @return bool|CommentType
     */
    public function add($name)
    {
       $type = new DocumentType();

       $type->{DocumentType::NAME} = $name;

       if($type->save()){
           return $type;
       }

       return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function removeTypeById($id)
    {
        return DocumentType::find($id)->delete();
    }


}