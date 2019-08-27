<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $message = [
        'required' => 'El campo es obligatorio',
        'string' => 'El campo debe ser un texto',
        'max' => 'El campo debe tener como maximo :max carácteres',
        'min' => 'El campo debe tener como minimo :min carácteres',
        'email' => 'El campo debe ser de formato Email',
        'unique' => 'La información ya se encuentra registrada',
        'file' => 'El archivo  debe ser de tipo jgp/jpeg/png',
      ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required'],
            'city' => ['required'],
            'foto' => ['required', 'image']
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $request = request();
      $imagen = $request->file('foto');

		if ($imagen) {
			// Creo un nombre único para archivo imagen
			$imagenFinal = uniqid("img_") . "." . $imagen->extension();
			// Subo el archivo en la carpeta elegida
			$imagen->storePubliclyAs("/public/fotos", $imagenFinal);
		};

    //dd($imagenFinal);

        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'country' => $data['country'],
            'city' => $data['city'],
            'avatar' => $imagenFinal,
            'password' => Hash::make($data['password']),
        ]);


    }
}
