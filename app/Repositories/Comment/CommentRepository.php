<?php namespace Charis\Repositories\Category;

use Charis\Models\Comment;
use Auth;

class CommentRepository implements ICommentRepository
{
    public function findOrganizationCommentByKeyword()
    {
        // TODO: Implement findOrganizationCommentByKeyword() method.
    }

    public function addComment($organizationId, $userId, $typeId, $content)
    {
        $comment = New Comment();

        $comment->{Comment::ID_ORGANIZATION} = $organizationId;
        $comment->{Comment::ID_USER} = $userId;
        $comment->{Comment::ID_TYPE} = $typeId;
        $comment->{Comment::CONTENT} = $content;

        if($comment->save()){
            return $comment;
        }

        return false;
    }

    public function removeCommentById()
    {
        // TODO: Implement removeComment() method.
    }

    public function addOrganizationComment()
    {
        // TODO: Implement addOrganizationComment() method.
    }

    public function removeOrganizationCommentById()
    {
        // TODO: Implement removeOrganizationComment() method.
    }

    public function addAlbumComment()
    {
        // TODO: Implement addAlbumComment() method.
    }

    public function removeAlbumCommentById()
    {
        // TODO: Implement removeAlbumComment() method.
    }


}