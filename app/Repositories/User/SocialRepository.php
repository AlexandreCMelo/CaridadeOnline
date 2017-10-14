<?php namespace Charis\Repositories\User;

use Charis\Models\Social;
use Charis\Models\User;
use Charis\Repositories\Organization\RoleRepository;

/**
 * Class SocialRepository
 * @package Charis\Repositories\User
 */
class SocialRepository implements ISocialRepository
{
    /**
     * @param $provider
     * @param $id
     * @return mixed
     */
    public function findByProviderAndId($provider, $id)
    {
        return Social::where(Social::PROVIDER, $provider)->where(Social::SOCIAL_ID, $id);
    }

    /**
     * @param $provider
     * @param $userId
     * @param $socialId
     * @return bool
     */
    public function add($provider, $userId, $socialId)
    {
        $userSocialData = new Social();

        $userSocialData->{Social::PROVIDER} = $provider;
        $userSocialData->{Social::USER_ID} = $userId;
        $userSocialData->{Social::SOCIAL_ID} = $socialId;

        if($userSocialData->save()){
            return true;
        }

        return false;
    }

}