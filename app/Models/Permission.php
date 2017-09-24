<?php

namespace Charis\Models;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'permissions';
    const ID = 'id';
    const CODE = 'code';
    const DESCRIPTION = 'description';

    /**
     * Permission table parameters
     */
    const CAN_MANAGE_ORGANIZATION_INFO = 10;
    const CAN_MANAGE_ORGANIZATION_COMMENTS = 20;
    const CAN_MANAGE_ORGANIZATION_USERS = 30;
    const CAN_UPDATE_ORGANIZATION_PICTURE = 40;

    const CAN_MANAGE_ORGANIZATION_INFO_CODE = 'can-manage-organization-info';
    const CAN_MANAGE_ORGANIZATION_COMMENTS_CODE = 'can-manage-organization-comments-info';
    const CAN_MANAGE_ORGANIZATION_USERS_CODE = 'can-manage-organization-users-info';
    const CAN_UPDATE_ORGANIZATION_PICTURE_CODE = 'can-manage-organization-picture-info';

}
