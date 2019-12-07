<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseOK(Reservation::all());
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
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'room' => 'required',
            'user' => 'required',
            
        ]);

       if($validator-> fails()){
        return $this->responseError(400, 'Bad request', $validator->errors());
       }
       $item = Reservation::create($input);
       return $this-> responseOK($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
      //  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return $this-> responseOK($reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
            $input = $request -> all();
            $validator = Validator::make($input, [ 
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'room' => 'required',
            'user' => 'required',
        ]);

        if($validator->fails()){
            return $this->responseError(400, 'Bad request', $validator->errors());
        }

        $room->fecha_inicio = $input['fecha_inicio'];
        $room->fecha_fin = $input['fecha_fin'];
        $room->room = $input['room'];
        $room->user = $input['user'];
        $room->created_at = $input['created_at'];
        $room->updated_at = $input['updated_at'];
        $room->save();
        return $this->responseOK($reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return $this->responseOK();
    }
}
