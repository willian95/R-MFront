<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SocialAuthController extends Controller
{
    
    // Metodo encargado de la redireccion a Facebook
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderFacebookCallback()
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver('facebook')->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
                'password' => bcrypt(uniqid()),
                'role_id' => 2
            ]);
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/');
    }

}
