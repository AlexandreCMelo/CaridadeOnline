<?php
namespace Charis\Repositories\Address;

/**
 * Interface IAddressRepository
 * @package Charis\Repositories\Address
 */
interface IAddressRepository
{
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
        $long= false
    );
    public function remove($id);
    public function getOwnerId($id);
    public function isOrganizationAddress($id);
    public function isUserAddress($id);
    public function getByAddress($ownerType, $address = false, $countryId = false, $state = false, $city = false);
    public function getCityUsers($city);
    public function getCityOrganizations($city);
}