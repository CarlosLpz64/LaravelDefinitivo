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

    //READ (SELECT)
    public function getStudents(){
        return student::all();
    }

    //UPDATE
    public function updateStudent(Request $request, $id){
        student::where('id', $id)
        ->update(['name' => $request->nombre, 
        'lastname' => $request->apellido]);
        return student::find($id);
    }

    //DELETE
    public function deleteStudent($id){
        $student = student::find($id);
        $student->delete();
        return $student;
    }
}
