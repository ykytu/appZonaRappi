<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseOK(City::all());
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
        ]);

       if($validator-> fails()){
        return $this->responseError(400, 'Bad request', $validator->errors());
       }
       $item = City::create($input);
       return $this-> responseOK($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        
       return $this-> responseOK($city);

    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $input = $request -> all();
        $validator = Validator::make($input, [ 
            'nombre' => 'required'
        ]);

        if($validator->fails()){
            return $this->responseError(400, 'Bad request', $validator->errors());
        }

        $city->nombre = $input['nombre'];
        $city->save();
        return $this->responseOK($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return $this->responseOK();
    }
}
