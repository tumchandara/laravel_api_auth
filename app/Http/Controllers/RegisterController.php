<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        // dd($request->all());
        $user = User::create($request->all());

    
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        // return response()->json([
        //     'message' => 'Successfully created user!',
        //     'accessToken'=> $token,
        // ],201);
       
        
        auth()->login($user);

        return redirect('/')->with('success', "Account API successfully registered with token key:.". $token,);
    }
}