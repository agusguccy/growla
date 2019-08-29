<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    // public function createUser(){
    //
    //   $user=Users::all();
    //   $vac= compact('users');
    //   return view('profile',$vac);
    // }
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = \Auth::user();
      return view('profile')->with('user', $user);
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
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return \Illuminate\Http\Response
   */
  // public function edit()
  // {
  //     return view('profile')->with('user', auth()->user());
  // }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */


  public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','La imagen se ha subido correctamente');

    }


    public function edit(User $user)
    {
        $users = User::all();
        $vac = compact('users')
        return view('user-edit', compact('user'),$vac);
    }

    public function update(User $user)
    {
      $data = request()->validate([
      "email"  => "required",
      "avatar" => ""

      ]);



        if (request("avatar")) {
        $imagePath = request("avatar")->store("uploads","public");
        //Lo GUARDA EN UNA VARIABLE PARA USARLA DESPUES

        }
        // ARRAY MERGE PERMITE MODIFICAR EL VALOR DE "IMAGE" PARA PASARLE EL DE $IMAGEPATH
        $user->update(array_merge(
          $data,
          ["avatar"=> $imagePath],
        ));

        return back();
    }
}
