<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//AGREGADOS
use App\Http\Controllers\Controller; //Necesario agregar
use App\Models\group; //Modelo a utilizar

class GroupController extends Controller
{

    //CONSTRUCTOR
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['updateGroup']]);
        // $this->middleware('auth:api', ['except' => ['login', 'register']]); // Necesario para excepciones
        //$this->middleware('auth:api'); // Sin excepciones
    }

    //CREATE (INSERT)
    public function createGroup(Request $request)
    {    
        $group = new group;
        $group->name = $request->nombre;
        $group->save();
        return $group; //Devolver respuesta
    }

    //READ (SELECT)
    public function getGroups(){
        return group::all();
    }

    //UPDATE
    public function updateGroup(Request $request, $id){
        group::where('id', $id)
        ->update(['name' => $request->nombre]);
        return group::find($id);
    }

    //DELETE
    public function deleteGroup($id){
        $group = group::find($id);
        $group->delete();
        return $group;
    }
}
