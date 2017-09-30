<?php

namespace Charis\Models;

/**
 * Class Activity
 * @package Charis\Models
 *
 * @method getId($id)
 * @method getName()
 * @method setName($name)
 */
class Activity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'activities';
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
    public function organizations(){
        return $this->belongsToMany(Organization::class)->using(OrganizationActivity::class);
    }

}
