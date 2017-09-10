<?php

namespace Charis;

use Illuminate\Database\Eloquent\SoftDeletes;
use \Eloquent;

class Entity extends Eloquent
{
    use SoftDeletes;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity';
    const ID_COUNTRY = 'fk_country';
    const ID_TIMEZONE = 'fk_timezone';
    const ID_LOCALE = 'fk_locale';
    const ID = 'id';
    const SRC = 'src';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const SHORT_DESCRIPTION = 'short_description';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const WEBSITE = 'website';
    const ENABLED = 'enabled';
    const ATTRIBUTES = 'attributes';
    const DELETED_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [self::DELETE_AT];

    /**
     * @return mixed
     */
    public function address(){
        return $this->morphMany('Address', 'addressable');
    }


}
