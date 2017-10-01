<?php namespace Charis\Repositories\Category;

use Charis\Models\Comment;
use Auth;
use Charis\Models\CommentType;
use Charis\Repositories\Comment\TypeRepository;

/**
 * Class CommentRepository
 * @package Charis\Repositories\Category
 */
class CommentRepository implements ICommentRepository
{

    /**
     * @param bool $organizationId
     * @param bool $userId
     * @param bool $keyword
     * @return mixed
     */
    public function findOrganizationComments($organizationId = false, $userId = false, $keyword = false){
        return $this->findComments($organizationId, CommentType::ORGANIZATION, $userId, $keyword);
    }


    /**
     * @param $userId
     * @param bool $keyword
     * @return mixed
     */
    public function findUserComments($userId, $keyword = false)
    {
        return $this->findComments(false, false, $userId, $keyword);

    }

    /**
     * @param $organizationId
     * @param bool $typeId
     * @param bool $userId
     * @param bool $keyword
     * @return mixed
     */
    public function findComments($organizationId = false, $typeId = false, $userId = false, $keyword = false)
    {
        $data = Comment::query();

        if($organizationId) {
            $data->where(Comment::ID_ORGANIZATION, $organizationId);
        }

        if($userId) {
            $data->where(Comment::ID_USER, $typeId);
        }

        if($typeId) {
            $data->where(Comment::ID_TYPE, $typeId);
        }

        if($keyword) {
            $data->where(Comment::CONTENT, 'like', '%' . $keyword . '%');
        }

        return $data->get();
    }

    /**
     * @param $organizationId
     * @param $userId
     * @param $typeId
     * @param $content
     * @return bool|Comment
     */
    public function addComment($organizationId, $userId, $typeId, $content)
    {
        $comment = New Comment();

        $comment->{Comment::ID_ORGANIZATION} = $organizationId;
        $comment->{Comment::ID_USER} = $userId;
        $comment->{Comment::ID_TYPE} = $typeId;
        $comment->{Comment::CONTENT} = $content;

        if ($comment->save()) {
            return $comment;
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function removeCommentById($id)
    {
        return Comment::find($id)->delete();
    }


}