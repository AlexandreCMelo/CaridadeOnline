<?php namespace Charis\Repositories\Address;

use Charis\Models\Address;
use Charis\Models\Organization;
use Charis\Models\User;

/**
 * Class AddressRepository
 * @package Charis\Repositories\Address
 */
class AddressRepository implements IAddressRepository
{

    /**
     *
     */
    const DEFAULT_LIMIT = 10;

    /**
     * @param $typeId
     * @param $ownerId
     * @param $owner
     * @param $countryId
     * @param $address
     * @param $state
     * @param $city
     * @param bool $district
     * @param bool $zipcode
     * @param bool $latitude
     * @param bool $long
     * @return bool
     */
    public function add(
        $typeId,
        $ownerId,
        $owner,
        $countryId,
        $address,
        $state,
        $city,
        $district = false,
        $zipcode = false,
        $latitude = false,
        $long = false
    )
    {
        $address = new Address();

        $address->{Address::ID_TYPE} = $typeId;
        $address->{Address::ID_OWNER} = $ownerId;
        $address->{Address::OWNER_TYPE} = $owner;
        $address->{Address::ID_COUNTRY} = $countryId;
        $address->{Address::ADDRESS} = $address;
        $address->{Address::STATE} = $state;
        $address->{Address::CITY} = $city;

        if (isset($district)) {
            $address->{Address::DISTRICT} = $district;
        }
        if (isset($zipcode)) {
            $address->{Address::ZIP_CODE} = $zipcode;
        }
        if (isset($latitude)) {
            $address->{Address::LATITUDE} = $latitude;
        }
        if (isset($long)) {
            $address->{Address::LONGITUDE} = $long;
        }

        if ($address->save()) {
            return $address->id;
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return Address::find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOwnerId($id)
    {
        return Address::find($id)->pluck(Address::ID_OWNER);
    }

    /**
     * @param $id
     * @return bool
     */
    public function isOrganizationAddress($id)
    {
        return Address::find($id)->pluck(Address::OWNER_TYPE) == Organization::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function isUserAddress($id)
    {
        return Address::find($id)->pluck(Address::OWNER_TYPE) == User::class;
    }

    /**
     * @param $ownerType
     * @param bool $address
     * @param bool $countryId
     * @param bool $state
     * @param bool $city
     * @return mixed
     */
    public function getByAddress($ownerType, $address = false, $countryId = false, $state = false, $city = false)
    {
        $data = Address::where(Address::OWNER_TYPE, $ownerType);


        if ($address) {
            $data->where(Address::ADDRESS, 'like', '%' . $address . '%');
        }

        if ($countryId) {
            $data->where(Address::ID_COUNTRY, $countryId);
        }
        if ($state) {
            $data->where(Address::STATE, $state);
        }
        if ($city) {
            $data->where(Address::CITY, $city);
        }

        return $data;

    }

    /**
     * @param $city
     * @return mixed
     */
    public function getCityUsers($city)
    {
        return $this->getByAddress(User::class, false,false,false, $city);
    }

    /**
     * @param $city
     * @return mixed
     */
    public function getCityOrganizations($city)
    {
        return $this->getByAddress(Organization::class, false,false,false, $city);
    }


}