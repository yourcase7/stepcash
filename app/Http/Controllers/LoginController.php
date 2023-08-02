<?php

namespace App\Http\Controllers;

use App\Repositories\TokenRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    protected $userRepository, $tokenRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        TokenRepositoryInterface $tokenRepository
    ) {
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes([
                'https://www.googleapis.com/auth/fitness.activity.read',
                'https://www.googleapis.com/auth/fitness.location.read'
            ])
            ->with(["access_type" => "offline", "prompt" => "consent select_account"])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            DB::beginTransaction();

            $userAuth = Socialite::driver('google')->user();

            $findUser = $this->userRepository->getByGoogleId($userAuth->id);

            if ($findUser) {



                Auth::login($findUser);
                DB::commit();
                return redirect('/dashboard');

            } else {
                $user = $this->userRepository->create([
                    'name' => $userAuth->name,
                    'email' => $userAuth->email,
                    'password' => password_hash('', PASSWORD_BCRYPT),
                    'google_id' => $userAuth->id,
                    'coin' => 0,
                    'level_id' => 1
                ]);

                $this->tokenRepository->create($user, [
                    'token' => $userAuth->token,
                    'refresh_token' => $userAuth->refreshToken,
                    'expired_at' => now()->addMinutes($userAuth->expiresIn)
                ]);

                Auth::login($user);
                DB::commit();
                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
}
