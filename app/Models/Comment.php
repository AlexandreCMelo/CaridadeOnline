<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getTypeId()
 * @method getUserId()
 * @method getContent()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 * @method setId()
 * @method setOrganizationId()
 * @method setTypeId()
 * @method setUserId()
 * @method setContent()
 * @method setCreatedAt()
 * @method setUpdatedAt()
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'comments';
    const ID = 'id';
    const ID_ORGANIZATION = 'id_organization';
    const ID_TYPE = 'id_type';
    const ID_USER = 'id_user';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * @return Organization
     */
    public function organization()
    {
        return $this->hasOne(Organization::class, Organization::ID, self::ID_ORGANIZATION);

    }

    /**
     * @return Type
     */
    public function type()
    {
        return $this->hasOne(CommentType::class, CommentType::ID, self::ID_TYPE);

    }

    /**
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, User::ID, self::ID_USER);

    }
}
