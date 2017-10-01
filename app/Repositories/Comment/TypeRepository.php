<?php namespace Charis\Repositories\Comment;

use Auth;
use Charis\Models\CommentType;

/**
 * Class TypeRepository
 * @package Charis\Repositories\Category
 */
class TypeRepository implements ICommentTypeRepository
{
    const DEFAULT_LIMIT = 10;

    /**
     * @return mixed
     */
    public function findTypes()
    {
        return CommentType::all()->paginate(self::DEFAULT_LIMIT);
    }

    /**
     * @return mixed
     */
    public function findById($id)
    {
        return CommentType::find($id)->get();
    }

    /**
     * @param $name
     * @return bool|CommentType
     */
    public function add($name)
    {
       $type = new CommentType();

       $type->{CommentType::NAME} = $name;

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
        return CommentType::find($id)->delete();
    }


}