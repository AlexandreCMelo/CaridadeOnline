<?php namespace Charis\Repositories\Organization;

use Charis\Models\Activity;
use Charis\Models\Category;
use Charis\Models\Comment;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Organization;
use Charis\Models\OrganizationRole;
use Charis\Models\OrganizationRoleUser;
use Charis\Models\Target;
use Charis\Models\Timezone;
use Charis\Repositories\Comment\CommentRepository;
use Auth;

/**
 * Class OrganizationRepository
 * @package Charis\Repositories\Organization
 */
class OrganizationRepository implements IOrganizationRepository
{

    const DEFAULT_LIMIT = 10;

    /**
     * @var RoleRepository
     */
    protected $organizationRoleRepository = null;

    /**
     * @var CommentRepository
     */
    protected $commentsRepository = null;

    /**
     * Get a paginated list of all users
     *
     * @param int $howMany
     *
     * @param string $byName
     *
     * @return mixed
     */
    public function getPaginated($howMany = 10, $byName = null)
    {
        if (is_null($byName)) {
            return Organization::whereNotIn(Organization::ID, [Auth::user()->id])->orderBy(Organization::NAME,
                'asc')->paginate($howMany);
        }

        return Organization::whereNotIn(Organization::ID, [Auth::user()->id])->where(Organization::NAME, 'like',
            '%' . $byName . '%')->orderBy(Organization::NAME, 'asc')->paginate($howMany);

    }

    /**
     * Fetch a user by id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return Organization::find($id);
    }

    /**
     * Fetch many users by id
     *
     * @param array $ids
     * @param boolean $asArray
     *
     * @return mixed
     */
    public function findManyById(array $ids, $asArray = false)
    {
        $data = Organization::findMany($ids);

        if ($asArray) {
            return $data->toArray();
        }

        return $data;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return Organization::where(Organization::EMAIL, $email)->get();
    }

    /**
     * @param $targetId
     * @return mixed
     */
    public function findManyByTargetId($targetId)
    {
        return Target::where(Target::ID, $targetId)->first()->organizations()->get();

    }

    /**
     * @param $activityId
     * @return mixed
     */
    public function findManyByActivityId($activityId)
    {
        return Activity::where(Activity::ID, $activityId)->first()->organizations()->get();
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function findManyByCategoryId($categoryId)
    {
        return Category::where(Category::ID, $categoryId)->first()->organizations()->get();
    }

    /**
     * @param $organizationId
     * @param $roleId
     * @return bool
     */
    public function findUsersByRole($organizationId, $roleId)
    {
        return $this->getOrganizationRoleRepository()->findUsersByOrganizationRole($organizationId, $roleId);
    }

    /**
     * @param $organizationId
     * @return bool
     */
    public function findUsers($organizationId)
    {
        $data = OrganizationRoleUser::where(OrganizationRoleUser::ID_ORGANIZATION,
            $organizationId)->pluck(OrganizationRoleUser::ID_USER)->all();

        if (!empty($data)) {
            return $data;
        }

        return false;
    }

    /**
     * @param bool $organizationId
     * @param bool $userId
     * @param bool $keyword
     * @return Comment
     */
    public function findComments($organizationId = false, $userId = false, $keyword = false)
    {
        return $this->getCommentRepository()->findOrganizationComments($organizationId, $userId, $keyword);
    }

    /**
     * @param $organizationId
     * @return bool
     */
    public function findFollowersUsers($organizationId)
    {
        return $this->getOrganizationRoleRepository()->findUsersByOrganizationRole($organizationId, OrganizationRole::ID_ORGANIZATION_FOLLOWER);
    }

    /**
     * @param $organizationId
     * @return bool
     */
    public function findPartnerUsers($organizationId)
    {
        return $this->getOrganizationRoleRepository()->findUsersByOrganizationRole($organizationId, OrganizationRole::ID_ORGANIZATION_PARTNER);
    }


    /**
     * @param $organizationId
     * @return bool
     */
    public function findManagerUsers($organizationId)
    {
        return $this->getOrganizationRoleRepository()->findUsersByOrganizationRole($organizationId, OrganizationRole::ID_ORGANIZATION_MANAGER);
    }

    public function remove($id)
    {
        return Organization::find($id)->delete();
    }

    /**
     * @param $name
     * @param $description
     * @param $shortDescription
     * @param $email
     * @param $phone
     * @param $website
     * @param $status
     * @param array $attributes
     * @param bool $idCountry
     * @param bool $idTimezone
     * @param bool $idLocale
     * @param bool $src
     * @return bool|Organization
     */
    public function add(
        $name,
        $description,
        $shortDescription,
        $email,
        $phone,
        $website,
        $status,
        $attributes = [],
        $idCountry = false,
        $idTimezone = false,
        $idLocale = false,
        $src = false
    ) {

        $organization = new Organization();

        if ($idCountry == false) {
            $idCountry = Country::DEFAULT_COUNTRY_BRAZIL;
        }

        if ($idTimezone == false) {
            $idTimezone = Timezone::DEFAULT_TIMEZONE_BRAZIL;
        }

        if ($idLocale == false) {
            $idLocale = Locale::DEFAULT_LOCALE_BRAZIL;
        }

        $organization->{Organization::NAME} = $name;
        $organization->{Organization::DESCRIPTION} = $description;
        $organization->{Organization::SHORT_DESCRIPTION} = $shortDescription;
        $organization->{Organization::EMAIL} = $email;
        $organization->{Organization::PHONE} = $phone;
        $organization->{Organization::WEBSITE} = $website;
        $organization->{Organization::ID_COUNTRY} = $idCountry;
        $organization->{Organization::ID_TIMEZONE} = $idTimezone;
        $organization->{Organization::ID_LOCALE} = $idLocale;

        if ($organization->save()) {
            return $organization->id;
        }

        return false;
    }

    /**
     * @return RoleRepository
     */
    public function getOrganizationRoleRepository()
    {

        if ($this->organizationRoleRepository == null) {
            $this->organizationRoleRepository = new RoleRepository();
        }

        return $this->organizationRoleRepository;
    }

    /**
     * @return CommentRepository
     */
    public function getCommentRepository()
    {

        if ($this->commentsRepository == null) {
            $this->commentsRepository = new CommentRepository();
        }

        return $this->commentsRepository;
    }


}