<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'rol' => $request->input('rol'),
            'password' => Hash::make($request->input('password'))
        ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response(['message'=>'invalid credentials'], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
        }

        $user=Auth::user();

        $token=$user->createToken($user->email)->plainTextToken;

        $cookie=cookie('jwt',$token,60*24,null,null,true,false,false,'none');

        return response(['message'=>$token])->withCookie($cookie);
    }

    public function resetPassword(Request $request)
    {
//        $email= $request->input('email');
        $user = new User();

//        $usario = $user->query()->where('email', $email)->first();
//
//        $valor = $user->where('email', $usario->email)->update(
//            [ 'password' => Hash::make($request->input('password'))]
//        );
//
//        if ($valor) {
//            $mensaje = "REGISTRO ACTUALIZADO";
//        } else {
//            $mensaje = "REGISTRO SIN CAMBIOS";
//        }

//        return $mensaje;
        return $user->all();
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {

        $cookie = cookie('jwt', '', 0, null, null, true, false, false, 'none');

        return response(['message' => 'success'])->withCookie($cookie);
    }
}
