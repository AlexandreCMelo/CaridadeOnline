<?php

namespace Charis\Models;

/**
 * Class Activity
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method setId($id)
 * @method setName($name)
 */
class Activity extends Model
{

    const TABLE_NAME = 'activities';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const ID = 'id';
    const NAME = 'name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
    ];

    /**
     * @return Organization
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
}
