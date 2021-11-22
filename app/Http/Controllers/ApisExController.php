<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//AGREGADOS
use App\Http\Controllers\Controller; //Necesario agregar
use Illuminate\Support\Facades\Http; //NECESARIO PARA CONSUMIR APIS


class ApisExController extends Controller
{
    //CONSULTAR API JSONPLACEHOLDER
    public function getApiAjena(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($response->body());

        $postUser1 = array();
        
        foreach($posts as $post){
            if ($post->userId==1){
                $postUser1[] = $post;
            }
        }
        //return $posts[0]->title; //DEVUELVE EL TÍTULO DEL PRIMER ELEMENTO
        //return $posts; //DEVUELVE TODO EL ARREGLO
        return ($postUser1); //DEVUELVE VALOR FILTRADO
    }
}
