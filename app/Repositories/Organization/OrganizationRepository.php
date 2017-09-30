<?php namespace Charis\Repositories\Organization;

use Charis\Models\Organization;
use Auth;

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

        $organization->setName($name);
        $organization->setDescription($description);
        $organization->setShortDescription($shortDescription);
        $organization->setEmail($email);
        $organization->setPhone($phone);
        $organization->setWebsite($website);
        $organization->setStatus($status);
        $organization->setSrc($src);
        $organization->setAttributes($attributes);
        $organization->setCountry($idCountry);
        $organization->setTimezone($idTimezone);
        $organization->setLocale($idLocale);

        if($organization->save()){
            return $organization;
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