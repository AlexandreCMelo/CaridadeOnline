<?php

namespace Charis\Models;

/**
 * Class AlbumFile
 * @package Charis\Models
 *
 * @method getId()
 * @method getAlbumId()
 * @method getFileId()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 */
class AlbumFile extends Model
{

    const TABLE_NAME = 'album_files';

    protected $table = self::TABLE_NAME;

    const ID_ALBUM = 'album_id';
    const ID_FILE = 'file_id';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

    /**
     * @return Album
     */
    public function album()
    {
        $this->hasOne(Album::class, Album::ID, self::ID_ALBUM);
    }

    /**
     * @return File
     */
    public function file()
    {
        $this->hasOne(File::class, File::ID, self::ID_FILE);
    }

}
