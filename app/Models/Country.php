<?php

namespace Charis\Models;

/**
 * Class Country
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getCountryName()
 * @method getIso3166Code()
 * @method getIsoCode()
 * @method getPhoneCode()
 * @method getSeq()
 * @method setId()
 * @method setName($name)
 * @method setCountryName($countryName)
 * @method setIso3166Code($iso3166Code)
 * @method setIsoCode($isoCode)
 * @method setPhoneCode($phoneCode)
 * @method setSeq($seq)
 */
class Country extends Model
{

    const TABLE_NAME = 'country';

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
    const COUNTRY_NAME = 'country_name';
    const NAME = 'name';
    const ISO_3166_CODE = 'iso3_code';
    const NUM_CODE = 'num_code';
    const ISO_CODE = 'iso_code';
    const PHONE_CODE = 'phone_code';
    const SEQ = 'seq';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];


}