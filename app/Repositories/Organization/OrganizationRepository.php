<?php namespace Charis\Repositories\Organization;

use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Organization;
use Auth;
use Charis\Models\Timezone;

class OrganizationRepository implements IOrganizationRepository
{

    const DEFAULT_LIMIT = 10;

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
     */
    public function findByEmail($email)
    {
        return Organization::where(Organization::EMAIL, $email);
    }

    /**
     * @param $targetId
     */
    public function findManyByTarget($targetId)
    {
        // TODO: Implement findManyByTarget() method.
    }

    /**
     * @param $activitiesId
     */
    public function findManyByActivities($activitiesId)
    {
        // TODO: Implement findManyByActivities() method.
    }

    /**
     * @param $categoryId
     */
    public function findManyByCategory($categoryId)
    {
        // TODO: Implement findManyByCategory() method.
    }

    /**
     * @param $roleId
     */
    public function findUsersByRole($roleId)
    {
        // TODO: Implement findUsersByRole() method.
    }

    /**
     *
     */
    public function findUsers()
    {
        // TODO: Implement findUsers() method.
    }

    /**
     *
     */
    public function findComments()
    {
        // TODO: Implement findComments() method.
    }

    /**
     *
     */
    public function findFollowersUsers()
    {
        // TODO: Implement findFollowersUsers() method.
    }

    /**
     *
     */
    public function findContactUsers()
    {
        // TODO: Implement findContactUsers() method.
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
    public function addOrganization(
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

        if($idCountry == false){
            $idCountry = Country::DEFAULT_COUNTRY_BRAZIL;
        }

        if($idTimezone == false){
            $idTimezone = Timezone::DEFAULT_TIMEZONE_BRAZIL;
        }

        if($idLocale == false){
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

        if($organization->save()){
            return $organization->id;
        }

        return false;
    }

    /**
     *
     */
    public function findManagerUsers()
    {
        // TODO: Implement findManagerUsers() method.
    }


}