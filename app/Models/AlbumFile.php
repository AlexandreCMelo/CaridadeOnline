<?php

namespace Charis\Models;
use \Illuminate\Database\Eloquent\Relations\Pivot;

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
class AlbumFile extends Pivot
{

    const TABLE_NAME = 'album_file';

    protected $table = self::TABLE_NAME;
    public $timestamps = true;

    const ID_ALBUM = 'album_id';
    const ID_FILE = 'file_id';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return Album
     */
    public function album()
    {
        $this->hasOne(Album::class);
    }

    /**
     * @return File
     */
    public function file()
    {
        $this->hasOne(File::class);
    }

}
