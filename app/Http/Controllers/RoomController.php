<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseOK(Room::all());
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
            'nombre' => 'required',
            'ubicacion' => 'required',
            'precio' => 'required',
            'contacto' => 'required',
            'descripcion' => 'required',
            'foto_principal' => 'required',
            'site' => 'required',

        ]);

       if($validator-> fails()){
        return $this->responseError(400, 'Bad request', $validator->errors());
       }
       $item = Room::create($input);
       return $this-> responseOK($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return $this-> responseOK($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $input = $request -> all();
        $validator = Validator::make($input, [ 
           'nombre' => 'required',
            'ubicacion' => 'required',
            'precio' => 'required',
            'contacto' => 'required',
            'descripcion' => 'required',
            'foto_principal' => 'required',
            'site' => 'required',
        ]);

        if($validator->fails()){
            return $this->responseError(400, 'Bad request', $validator->errors());
        }

        $room->nombre = $input['nombre'];
        $room->ubicacion = $input['ubicacion'];
        $room->precio = $input['precio'];
        $room->contacto = $input['contacto'];
        $room->descripcion = $input['descripcion'];
        $room->foto_principal = $input['foto_principal'];
        $room->foto_principal = $input['foto_secundaria'];
        $room->foto_principal = $input['foto_auxiliar'];
        $room->site = $input['site'];
        $room->save();
        return $this->responseOK($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return $this->responseOK();
    }
}
