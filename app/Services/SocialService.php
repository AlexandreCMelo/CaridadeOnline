<?php

namespace Charis\Service;

use Charis\Models\Social;
use Charis\Repositories\User\UserRepository;
use Charis\Repositories\User\SocialRepository;
use Socialite;
use Charis\Traits\CaptureIpTrait;
use Charis\Traits\ActivationTrait;
use Charis\Models\User;

/**
 * Class SocialService
 * @package Charis\Service
 */
class SocialService extends AbstractService
{

    use ActivationTrait;

    /**
     * @var UserRepository
     */
    protected $userRepository = null;

    /**
     * @var SocialRepository
     */
    protected $socialRepository = null;

    /**
     * @var Register attr
     */
    protected $register = false;

    /**
     * SocialService constructor.
     * @param UserRepository $userRepository
     * @param SocialRepository $socialRepository
     */
    public function __construct(UserRepository $userRepository, SocialRepository $socialRepository)
    {
        $this->userRepository = $userRepository;
        $this->socialRepository = $socialRepository;
    }

    /**
     * @param $provider
     * @return bool|User
     */
    public function getSocialProviderUser($provider){

        $user = Socialite::driver($provider)->user();

        $userExists = $this->userRepository->findByEmail($user->email)->first();

        if(!empty($userExists)) {
            return $userExists->id;
        }

        $userSocialData = $this->socialRepository->findByProviderAndId(
            $provider,
            $user->id
        );

        if(!empty($userSocialData)){
            return $userSocialData->{Social::USER_ID};
        }

        $ipAddr = $ipAddress = new CaptureIpTrait();

        $enabled = true;

        $userId = $this->userRepository->add(
            $user->name,
            $user->email,
            $enabled,
            str_random(64),
            bcrypt(str_random(40))
        );

        $this->socialRepository->add($provider, $userId, $user->id);

        $this->register = true;

        return $userId;
    }

    /**
     *
     */
    public function isNewAccount()
    {
        return $this->register;
    }

}