<?php

namespace Charis\Repositories\User;

/**
 * Interface ISocialRepository
 * @package Charis\Repositories\User
 */
interface ISocialRepository
{
    public function findByProviderAndId($provider, $id);
}
