<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//AGREGADOS
use App\Http\Controllers\Controller; //Necesario agregar
use App\Models\student; //Modelo a utilizar


class StudentController extends Controller
{
    //CREATE (INSERT)
    public function createStudent(Request $request)
    {    
        $student = new student;

        $student->name = $request->nombre;
        $student->lastname = $request->apellido;
        $student->birth = $request->nac;
        $student->group = $request->grupo;

        $student->save();
        return $student; //Devolver respuesta
    }
}
