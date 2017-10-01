<?php

namespace Charis\Models;

/**
 * Class Category
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 */
class Category extends Model
{

    const TABLE_NAME = 'categories';

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
     * Avaliable categories
     */
    const SOCIAL_ASSISTANCE = 10;
    const CITIZENSHIP = 20;
    const CULTURE_ARTS_AND_SPORT = 30;
    const EDUCATION = 40;
    const ENVIRONMENTAL_HEALTH = 50;
    const HEALTH = 70;
    const ANIMAL_HEALTH = 80;

    /**
     * @return Organization
     */
    public function organizations(){
        return $this->belongsToMany(Organization::class, OrganizationCategory::TABLE_NAME,OrganizationCategory::ID_CATEGORY, self::ID);
    }

}

