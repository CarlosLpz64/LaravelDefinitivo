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

    public function getAPIGuzzler(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $response = json_decode($response->body());
        return $response;
    }

    //ADAFRUIT
    public function getNFC(){
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_hYoR31zPLFG6x8Sv1xZ5cHl4DeNl'])
        ->get('https://io.adafruit.com//api/v2/CarlosLpz/feeds/codigosnfc/data');
        $response = json_decode($response->body());
        return $response;
    }

    public function getFirstNFC(){
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_hYoR31zPLFG6x8Sv1xZ5cHl4DeNl'])
        ->get('https://io.adafruit.com//api/v2/CarlosLpz/feeds/codigosnfc/data?limit=1');
        $response = json_decode($response->body());
        return $response;
    }

    public function getDateNFC(){
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_hYoR31zPLFG6x8Sv1xZ5cHl4DeNl'])
        ->get('https://io.adafruit.com//api/v2/CarlosLpz/feeds/codigosnfc/data?limit=3&end_time=2021-12-04T17:54:38Z');
        $response = json_decode($response->body());
        return $response;
    }

    public function getRangeNFC(){
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_hYoR31zPLFG6x8Sv1xZ5cHl4DeNl'])
        ->get('https://io.adafruit.com//api/v2/CarlosLpz/feeds/codigosnfc/data?start_time=2019-05-04T00:00Z&end_time=2021-12-05T00:00Z');
        $response = json_decode($response->body());
        return $response;
    }

    public function getJustNFC(){
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_hYoR31zPLFG6x8Sv1xZ5cHl4DeNl'])
        ->get('https://io.adafruit.com//api/v2/CarlosLpz/feeds/codigosnfc/data');
        $response = json_decode($response->body());
        $arregloaux = array();
        foreach($response as $post){
            $arregloaux[] = $post->value;
        }
        return $arregloaux;
    }
}
