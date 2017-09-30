<?php

namespace Charis\Models;

/**
 * Class Category
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method setName($name)
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'categories';
    const ID = 'id';
    const NAME = 'name';

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
        return $this->belongsToMany(Organization::class)->using(OrganizationActivity::class);
    }

}

