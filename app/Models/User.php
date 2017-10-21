<?php

namespace Charis\Models;

use Charis\Service\FileService;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cmgmyr\Messenger\Traits\Messagable;

/**
 * Class User
 * @package Charis\Models
 *
 * @method getName()
 * @method getEmail()
 * @method getPhone()
 * @method getEnabled()
 * @method getPassword()
 * @method getSrc()
 * @method getActivated()
 * @method getCountry()
 * @method getTimezone()
 * @method getLocale()
 * @method getDeletedAt()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 * @method getToken()
 * @method getRememberToken()
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Messagable;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'users';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [self::DELETE_AT];

    const ID = 'id';
    const ID_COUNTRY = 'country_id';
    const ID_TIMEZONE = 'timezone_id';
    const ID_LOCALE = 'locale_id';
    const ID_SYSTEM_ROLE = 'system_role_id';
    const SRC = 'origin_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const PHONE = 'phone';
    const ACTIVATED = 'enabled';
    const DELETE_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const REMEMBER_TOKEN = 'remember_token';
    const TOKEN = 'token';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'enabled',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
    ];

    /**
     * @var FileService
     */
    protected $fileService;

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->{self::ID_SYSTEM_ROLE} == Role::ID_SYSTEM_ADMIN_USER;
    }

    /**
     * @return mixed
     */
    public function address()
    {
        return $this->morphMany(
            Address::class,
            'addressable',
            Address::OWNER_TYPE,
            Address::ID_OWNER
        );
    }

    /**
     * @return mixed
     */
    public function documents()
    {
        return $this->morphMany(
            Document::class,
            'addressable',
            Document::OWNER_TYPE,
            Document::ID_OWNER
        );
    }

    /**
     * @return Organization
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, OrganizationRoleUser::TABLE_NAME);
    }

    /**
     * @return Social
     */
    public function social()
    {
        return $this->hasOne(Social::class);
    }


    public function avatar()
    {
        return $this->getFileService()->getUserAvatar($this->{self::ID});
    }

    /**
     * @return FileService
     */
    public function getFileService()
    {
        if ($this->fileService == null) {
            $this->fileService = new FileService();
        }

        return $this->fileService;
    }

}
