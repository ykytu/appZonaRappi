<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->responseOK(Site::all());
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
            'direccion' => 'required',
            'city' => 'required',

        ]);

       if($validator-> fails()){
        return $this->responseError(400, 'Bad request', $validator->errors());
       }
       $item = Site::create($input);
       return $this-> responseOK($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return $this-> responseOK($site);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $input = $request -> all();
        $validator = Validator::make($input, [ 
            'nombre' => 'required',
            'direccion' => 'required',
            'city' => 'required',
        ]);

        if($validator->fails()){
            return $this->responseError(400, 'Bad request', $validator->errors());
        }

        $site->nombre = $input['nombre'];
        $site->direccion = $input['direccion'];
        $site->city = $input['city'];
        $site->save();
        return $this->responseOK($site);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return $this->responseOK();
    }
}
