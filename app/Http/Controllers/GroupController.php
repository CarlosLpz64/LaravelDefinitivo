<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//AGREGADOS
use App\Http\Controllers\Controller; //Necesario agregar
use App\Models\group; //Modelo a utilizar

class GroupController extends Controller
{

    //CREATE (INSERT)
    public function createGroup(Request $request)
    {    
        $group = new group;
        $group->name = $request->nombre;
        $group->save();
        return $group; //Devolver respuesta
    }
}
