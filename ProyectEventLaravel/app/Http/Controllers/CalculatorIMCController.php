<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorIMCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($weight, $height)
    {
        //
        $imc = round($weight / ($height * $height));

        if($imc < 19){
            $condition = "Debes comer más";
        }else if($imc >= 20 && $imc <= 25){
            $condition = "normal";
        }else if($imc >= 26 && $imc <= 30){
            $condition = "gordito";
        }else if($imc > 30){
            $condition = "pasadito";
        }

        $query = DB::insert('insert into results(imc, current_condition) values(?, ?)',[$imc, $condition]);
        
if($query){
    return "Data registered!"; 
}else{
    return "Error trying to register new data";
}

        
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        DB::select('select * from results');
        DB::select('select * from results where imc=?', [$imc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DB::update('update results set columna1=?, columna2=?, columna3=? where columna4=?', [$valor1, $valor2, $valor3, $valor4]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
