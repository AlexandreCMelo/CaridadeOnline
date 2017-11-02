<?php

namespace Charis\Repositories\Organization;

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
use Charis\Repositories\Album\CategoryRepository;
use Charis\Repositories\Comment\CommentRepository;
use Charis\Repositories\Activity\ActivityRepository;
use Charis\Repositories\Target\TargetRepository;
use MAbadir\ElasticLaravel\ElasticSearcher;
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
     * @var TargetRepository
     */
    protected $targetRepository = null;

    /**
     * @var $activityRepository
     */
    protected $activityRepository = null;

    /**
     * @var $categoryRepository
     */
    protected $categoryRepository = null;


    public static function all()
    {
      return Organization::all();
    }

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
     * Fetch a user by id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function findAll()
    {
        return Organization::all();
    }

    public function findByKeyword($keyword)
    {
        return ElasticSearcher::search($keyword, Organization::class);
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
     * Adds an organization
     * @param $name
     * @param $description
     * @param $shortDescription
     * @param $email
     * @param $phone
     * @param $website
     * @param $status
     * @param array $attributes
     * @param array $categories
     * @param array $targets
     * @param array $activities
     * @param bool $idCountry
     * @param bool $idTimezone
     * @param bool $idLocale
     * @param bool $src
     * @return bool
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
        $categories = [],
        $targets = [],
        $activities = [],
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

            $this->getActivityRepository()->addToOrganization($organization->id, $activities);
            $this->getTargetRepository()->addToOrganization($organization->id, $targets);
            $this->getCategoryRepository()->addToOrganization($organization->id, $categories);

            return $organization->id;
        }

        return false;
    }

    /**
     * @return RoleRepository
     */
    protected function getOrganizationRoleRepository()
    {
        if ($this->organizationRoleRepository == null) {
            $this->organizationRoleRepository = new RoleRepository();
        }
        return $this->organizationRoleRepository;
    }

    /**
     * @return CommentRepository
     */
    protected function getCommentRepository()
    {
        if ($this->commentsRepository == null) {
            $this->commentsRepository = new CommentRepository();
        }
        return $this->commentsRepository;
    }

    /**
     * @return TargetRepository
     */
    protected function getTargetRepository()
    {
        if ($this->targetRepository == null) {
            $this->targetRepository = new TargetRepository();
        }
        return $this->targetRepository;
    }

    /**
     * @return ActivityRepository
     */
    protected function getActivityRepository()
    {
        if ($this->activityRepository == null) {
            $this->activityRepository = new ActivityRepository();
        }
        return $this->activityRepository;
    }

    /**
     * @return CategoryRepository
     */
    protected function getCategoryRepository()
    {
        if ($this->categoryRepository == null) {
            $this->categoryRepository = new CategoryRepository();
        }
        return $this->categoryRepository;
    }


}
