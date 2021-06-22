<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Freshwork\ChileanBundle\Rut;
use App\Models\Alumno;
use App\Models\Profesor;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'rut' => 'required|string|max:12|unique:users',

        ]);

        $rut = Rut::parse($request->rut)->validate();
        $rut = Rut::parse($request->rut)->normalize();
        $numero = Rut::parse($request->rut)->number();

        $user = User::create([
            'rut' => $rut,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($numero),

        ]);

        if($request->role == "alumno"){

            $alumno = Alumno::create([
                'rut_alumno' => $rut,
                'correo' => $request->email,
                'nombre' => $request->name,
                'estado' => true,
                'es_ayudante' =>false,
                'password' => Hash::make($numero),
            ]);
        }
        
        elseif($request->role == "docente"){

                $profesor = Profesor::create([
                    'rut_profesor' => $rut,
                    'nombre_profesor' => $request->name,
                    'correo' => $request -> email,
                    'es_encargado' => true,
                    'estado'=> true,
                    'password' => Hash::make($numero),
            ]);  
        }
        else{
            if($request->role == "ayudante"){
                $alumno = Alumno::create([
                'rut_alumno' => $rut,
                'correo' => $request->email,
                'nombre' => $request->name,
                'estado' => true,
                'es_ayudante' =>true,
                'password' => Hash::make($numero),
                ]);
            }
        }
        
        $role = $request->role;

        $user->roles()->attach(Role::where('name', $role)->first());

        event(new Registered($user));

        Auth::login($user);


       return redirect(RouteServiceProvider::HOME);
    }
}
