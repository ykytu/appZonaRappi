<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseOK(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request ->all();
        $validator = Validator:: make($input, [
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'password' => 'required',
            'foto' => 'required',
        ]);

       if($validator-> fails()){
        return $this->responseError(400, 'Bad request', $validator->errors());
       }
       $item = User::create($input);
       return $this-> responseOK($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $this-> responseOK($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request -> all();
        $validator = Validator::make($input, [ 
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'password' => 'required',
            'foto' => 'required',
        ]);

        if($validator->fails()){
            return $this->responseError(400, 'Bad request', $validator->errors());
        }

        $user->name = $input['name'];
        $user->apellido = $input['apellido'];
        $user->email = $input['email'];
        $user->celular = $input['celular'];
        $user->password = $input['password'];
        $user->foto = $input['foto'];
        $user->save();
        return $this->responseOK($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->responseOK();
    }
}

