<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    const ID = 'id';
    const ID_FILE_OWNER = 'fk_file_owner';
    const ID_FILE_TYPE = 'fk_tile_type';
    const FILE_OWNER = 'file_owner';
    const NAME = 'Name';
    const PATH = 'Path';
    const SIZE = 'size';
    const MIME_TYPE = 'mime_type';
    const ATTRIBUTES = 'attributes';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    const RELATION_SLUG = 'ownable';
    const TABLE_NAME = 'files';


    /**
     * @return mixed
     */
    public function user()
    {
        return $this->morphMany(
            User::class,
            self::RELATION_SLUG,
            self::ID_FILE_OWNER,
            self::FILE_OWNER
        );
    }

    /**
     * @return mixed
     */
    public function organization()
    {
        return $this->morphMany(
            Organization::class,
            self::RELATION_SLUG,
            self::ID_FILE_OWNER,
            self::FILE_OWNER
        );
    }



}
