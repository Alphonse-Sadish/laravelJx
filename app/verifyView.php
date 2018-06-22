<?php
/**
 * Created by PhpStorm.
 * User: alpho
 * Date: 21/06/2018
 * Time: 21:42
 */

namespace App;
use Illuminate\Support\Facades\Auth;
use App\User;


class verifyView
{

    public static function verify(){
        if(Auth::id() !== null){
            $auth = Auth::id();
            $user = User::where('id',$auth)->first();
            if($user->role === 'admin'){

                return "<li><a class=\"nav-link\" href=\"{{ route('categories.index') }}\">{{ __('Categories') }}</a></li>
                        <li><a class=\"nav-link\" href=\"{{ route('users.index') }}\">{{ __('Utilisateurs') }}</a></li>
                        <li><a class=\"nav-link\" href=\"{{ route('plateformes.index') }}\">{{ __('Plateformes') }}</a></li> 
                        <li><a class=\"nav-link\" href=\"{{ route('avis.index') }}\">{{ __('Avis') }}</a></li>            
                        
                        ";
            }else
                return '';
        }


    }


}