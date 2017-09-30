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
    public function findManyByTarget($targetId);
    public function findManyByActivities($activitiesId);
    public function findManyByCategory($categoryId);
    public function findUsersByRole($roleId);
    public function findUsers();
    public function findComments();
    public function findFollowersUsers();
    public function findContactUsers();
    public function findManagerUsers();
}