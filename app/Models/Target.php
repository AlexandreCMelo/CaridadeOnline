<?php

namespace Charis\Models;

/**
 * Class Target
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 */
class Target extends Model
{

    const TABLE_NAME = 'targets';

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
     * Default targets
     */
    const ADULTS = 10;
    const COMMUNITY = 20;
    const CHILDREN = 30;
    const ENVIRONMENT = 40;
    const ELDERLY = 50;
    const TEENAGER = 60;
    const SPECIAL_CONDITIONS = 70;
    const GENERAL = 80;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

    /**
     * @return Organization
     */
    public function organizations(){
        return $this->belongsToMany(Organization::class, OrganizationTarget::TABLE_NAME,OrganizationTarget::ID_TARGET, self::ID);
    }


}
