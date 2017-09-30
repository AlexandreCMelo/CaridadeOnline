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
 * @method setAlbumId()
 * @method setFileId()
 * @method setCreatedAt()
 * @method setUpdatedAt()
 */
class AlbumFile extends Model
{
    const ID = 'id';
    const ID_ALBUM = 'fk_album';
    const ID_FILE = 'fk_file';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TABLE_NAME = 'album_files';


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
