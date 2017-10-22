<?php

namespace Charis\Http\Controllers\Auth;

use Charis\Models\User;
use Charis\Http\Controllers\Controller;
use Charis\Service\MailService;
use Charis\Traits\ActivationTrait;
use Charis\Traits\CaptureIpTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Charis\Models\Role;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use ActivationTrait;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Mail service
     *
     * @var MailService
     */
    protected $mailService = null;

    /**
     * RegisterController constructor.
     * @param MailService $maiLService
     */
    public function __construct(MailService $maiLService)
    {
        $this->middleware('guest');
        $this->mailService = $maiLService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Charis\Models\User
     */
    protected function create(array $data)
    {
        $ipAddress = new CaptureIpTrait();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token'    => str_random(64),
            'system_role_id'    => \Charis\Models\Role::ID_REGISTERED_USER,
            'signup_ip_address' => $ipAddress->getClientIp()
        ]);

        if(!empty($user)){
            $this->mailService->sendUserWelcomeMail($user);
        }

        return $user;
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('Auth.register');
    }

}
