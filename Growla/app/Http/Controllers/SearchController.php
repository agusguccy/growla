<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Beer;

class SearchController extends Controller
{
    public function search(Request $request)
    {
      //$searchBar = Input::get('searchBar');

      $searchBar = $request->get('searchBar');

       if ($searchBar){
         $beer = Beer::where('type', 'LIKE', '%' . $searchBar . '%')
                      ->orWhere ('description', 'LIKE', '%' . $searchBar . '%')
                      ->orWhere ('IBUs', 'LIKE', '%' . $searchBar . '%')
                      ->orWhere ('alcohol_content', 'LIKE', '%' . $searchBar . '%')
                      ->get();

               if(count($beer) > 0){
                  //return view('search-results')->withDetails($beer)->withQuery($searchBar);
                //  return view('search-results')->with('beer',$beer);
                return view('search-results', compact('beer'));
               } else {
                 return view('search-results')->withMessage("No se encontró ningún resultado");
               }
          return view('search-results')->withMessage('No se registró la búsqueda, pruebe nuevamente');
       }


    }
};
