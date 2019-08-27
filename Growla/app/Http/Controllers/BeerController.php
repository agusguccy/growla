<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Color;
class BeerController extends Controller
{

    public function listado(){
      $beers = Beer::all();
      $vac = compact("beers");
      return view ("beers-list", $vac);
    }

    public function detalle($id){
      $beer = Beer::find($id);
      $vac = compact("beer");
      return view("productsdetails", $vac);
    }


//CREAR BIRRA

    public function createBeer(){

      $colors=Color::all();
      $vac = compact("colors");
      return view ("new-beer",$vac);
    }

    public function uploadBeer(Request $req){

      $rules=[
        "type"=>"required|string|min:3|unique:beers",
        // no hace falta aclarar el nombre de la col porque se llama igual
        "description"=>"required|string|min:20|unique:beers",
        "IBUs"=>"required|string|min:0",
        "alcohol_content"=>"required|string|min:0",
        "image" => "required|image",
        //"color_id"=>"numeric"
      ];
      $msj=[
        "required" => "El campo :attribute se encuentra repetido",
        "string" => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute tiene un minimo  de :min",
        "required" => "El campo :attribute debe ser obligatorio",
        "numeric" => "El campo :attribute debe ser un numero",
        "image" => "El campo :attribute debe ser una imagen"
      ];

      $this->validate($req,$rules,$msj);

//LLEVA LA IMAGEN A LA CARPETA "uploads" EN  Storage/app/public

$imagePath= $req["image"]->store("uploads","public");

//INGRESA LOS VALORES REDACTADOS EN EL FORMULARIO

      $newBeer = new Beer();
      $newBeer->type= $req["type"];
      $newBeer->description= $req["description"];
      $newBeer->IBUs= $req["IBUs"];
      $newBeer->alcohol_content= $req["alcohol_content"];
      $newBeer->color_id= $req["color_id"];
      $newBeer->image= $imagePath;
      $newBeer->save();
      $beers = Beer::all();
      $vac = compact("beers");

      return view ("beers-list",$vac);
    }

//BORRAR BIRRA

public function delete(Request $req){
  $id = $req["id"];
  $beer = Beer::find($id);
  $beer->delete();
  return redirect('beers-list');
}

//EDITA LOS DATOS DE LA BASE

public function edit(Beer $beer){
  $colors = Color::all();
  $vac = compact("colors");
  return view ("beer-edit",compact('beer'),$vac);
}

//ACTUALIZA LOS DATOS DE LA BASE

public function updateBeer(Beer $beer){
//TOMA Y VALIDA LOS VALORES DEL FORMULARIO
$data = request()->validate([
"type"  => "required",
"description" => "required",
"IBUs" => "required",
"alcohol_content" => "required",
"image" => "",
"color_id" => ""
]);
//SI RECIBE UNA IMAGEN LA GUARDA EN LA CARPETA "uploads" EN  Storage/app/public
if (request("image")) {
$imagePath = request("image")->store("uploads","public");
//Lo GUARDA EN UNA VARIABLE PARA USARLA DESPUES
$beer->update(array_merge(
  $data,
  ["image"=> $imagePath],
));
}
// ARRAY MERGE PERMITE MODIFICAR EL VALOR DE "IMAGE" PARA PASARLE EL DE $IMAGEPATH
 $beer->update($data);
 
 $beers = Beer::all();
 $vac = compact("beers");
return view("beers-list",$vac);
 }
 }
