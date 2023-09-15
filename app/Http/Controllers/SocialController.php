<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Log;
use Session;
use Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            log::info('Operation Failed,' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function callback($provider)
    {
        $username = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        if (!isset($_GET['error'])) {
            $userSocial = Socialite::driver($provider)->stateless()->user();

            $users = User::where(['email' => $userSocial->getEmail(), 'status' => 1])->first();
            if ($users == null) {
                $users = User::where(['username' => $userSocial->getId(), 'status' => 1])->first();
            }

            $session_data = [
                'name' => $userSocial->getName(),
                'username' => $users ? $users->username : $userSocial->getId(),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'mob_no' => $users ? $users->mob_no : '',
                'plan' => 'free',
                'member_type' => 'individual',
                'user_status' => $users ? $users->user_status : 1,
                'role' => 'user',
            ];
            Session::put($session_data);
            if ($users) {
                Auth::login($users);

                return redirect('/dashboard');
            } else {
                if ($userSocial->getEmail()) {
                    $mailData = [
                        'to_email' => $userSocial->getEmail(),
                        'subject' => 'Welcome to Liv Ezy',
                    ];
                    $mail = \Illuminate\Support\Facades\Mail::send('sign_up_mail', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        //$message->bcc('admin@livezy.com');
                        $message->subject($mailData['subject']);
                    });
                }

                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail() ? $userSocial->getEmail() : '',
                    'image' => $userSocial->getAvatar(),
                    'provider_id' => $userSocial->getId(),
                    'provider' => $provider,
                    'username' => $userSocial->getId(),
                    'plan' => 'free',
                    'member_type' => 'individual',
                    'user_status' => 1,
                    'short_country_name' => isset($_COOKIE['s_c_nane']) ? $_COOKIE['s_c_nane'] : 'in',
                    'country' => isset($_COOKIE['ralcountry']) ? $_COOKIE['ralcountry'] : 'India',
                    'city' => isset($_COOKIE['city']) ? $_COOKIE['city'] : 'Bangalore',
                ]);
                return redirect('/dashboard');
            }
        } else {
            return redirect('/');
        }
    }

}
