<?php
namespace Charis\Repositories\Organization;

/**
 * Interface UserRepository
 * @package Charis\Repositories\Organization
 */
interface IOrganizationRepository
{
    public function getPaginated($howMany, $byKeyword);
    public function findById($id);
    public function findByEmail($email);
    public function findManyByTargetId($targetId);
    public function findManyByActivityId($activitiesId);
    public function findManyByCategoryId($categoryId);
    public function findUsersByRole($organizationId, $roleId);
    public function findUsers($organizationId);
    public function findComments($organizationId);
    public function findFollowersUsers($organizationId);
    public function findPartnerUsers($organizationId);
    public function findManagerUsers($organizationId);
}