<?php

namespace Charis\Http\Controllers\Auth;

use Charis\Http\Controllers\Controller;
use Charis\Models\Social;
use Charis\Models\User;
use Charis\Service\SocialService;
use Charis\Traits\ActivationTrait;
use Charis\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    use ActivationTrait;

    /**
     * @var SocialService|null
     */
    protected $socialService = null;

    /**
     * SocialController constructor.
     * @param SocialService $socialService
     */
    public function __construct(SocialService $socialService)
    {
        $this->socialService = $socialService;
    }

    /**
     * @param $provider
     * @return $this
     */
    public function getSocialRedirect($provider)
    {
        $providerKey = Config::get('services.'.$provider);

        if (empty($providerKey)) {
            return view('pages.status')
                ->with('error', trans('socials.noProvider'));
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function socialLogin($provider) {

        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', trans('socials.denied'));
        }

        auth()->login($this->socialService->getSocialProviderUser($provider), true);

        return $this->socialService->isNewAccount() ? redirect('home')->with('success', trans('socials.registerSuccess')) : redirect('home');


    }

    public function getSocialHandle($provider)
    {
        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', trans('socials.denied'));
        }


        die('a');


        $socialUserObject = Socialite::driver($provider)->user();

        $socialUser = null;

        // Check if email is already registered
        $userCheck = User::where('email', '=', $socialUserObject->email)->first();

        $email = $socialUserObject->email;

        if (!$socialUserObject->email) {
            $email = 'missing'.str_random(10);
        }

        if (empty($userCheck)) {
            $sameSocialId = Social::where('social_id', '=', $socialUserObject->id)
                ->where('provider', '=', $provider)
                ->first();

            if (empty($sameSocialId)) {
                $ipAddress = new CaptureIpTrait();
                $socialData = new Social();
                $profile = new Profile();
                $role = Role::where('slug', '=', 'user')->first();
                $fullname = explode(' ', $socialUserObject->name);
                if (count($fullname) == 1) {
                    $fullname[1] = '';
                }
                $username = $socialUserObject->nickname;

                if ($username == null) {
                    foreach ($fullname as $name) {
                        $username .= $name;
                    }
                }

                $user = User::create([
                    'name'                  => $username,
                    'first_name'            => $fullname[0],
                    'last_name'             => $fullname[1],
                    'email'                 => $email,
                    'password'              => bcrypt(str_random(40)),
                    'token'                 => str_random(64),
                    'activated'             => true,
                    'signup_sm_ip_address'  => $ipAddress->getClientIp(),

                ]);

                $socialData->social_id = $socialUserObject->id;
                $socialData->provider = $provider;


                $user->social()->save($socialData);
                $user->attachRole($role);
                $user->activated = true;

                //$user->profile()->save($profile);
                $user->save();

                if ($socialData->provider == 'github') {
                    $user->profile->github_username = $socialUserObject->nickname;
                }
                if ($socialData->provider == 'twitter') {
                    $user->profile()->twitter_username = $socialUserObject->username;
                }
                $user->profile->save();

                $socialUser = $user;
            } else {
                $socialUser = $sameSocialId->user;
            }

            auth()->login($socialUser, true);

            return redirect('home')->with('success', trans('socials.registerSuccess'));
        }

        $socialUser = $userCheck;

        auth()->login($socialUser, true);

        return redirect('home');
    }
}
