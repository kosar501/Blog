<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {


        $validator = Validator::make($request->all(),
            [
                'password'=>'required|min:8',
            'email'=>'email|required',
            'name'=>'required',
                'phone'=>'regex:/(09)[0-9]{9}',
        ],
            [
            'email.email'=>'فرمت ایمیل اشتباه است',
            'name.required'=>'فیلد نام اشتباه است',
            'name.text'=>'فیلد اسم باید حروفی باشد',
                'phone.regex'=>'فرمت شماره تلفن اشتباه است'
        ]
        );

        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }

//        $validate = $request->validate([
//            'email'=>'email',
//            'name'=>'required|text'
//        ],[
//           'email.email'=>'فرمت ایمیل اشتباه است',
//            'name.required'=>'فیلد نام اشتباه است',
//            'name.text'=>'فیلد اسم باید حروفی باشد'
//        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $token = $user->createToken('blog')->accessToken;
        $user->save();

        return response()->json(['token'=>$token],201);

    }

    public function info()
    {
        $user = Auth::user();

        return response()->json(new UserResource($user),200);
   }
}
