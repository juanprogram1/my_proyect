<?php

namespace App\Http\Controllers;

use App\Models\Empleado;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    public function index() {

       $empleados = Empleado::get();

       return view('Empleados.index', ['empleados' => $empleados]);
    }
       
    public function show(Empleado $empleado)
    {
       return view('Empleados.show', ['empleado' => $empleado]);
    }

    public function create(){

      return view('empleados.create', ['empleado' => new Empleado]);

    }
//Request: viene del use Illuminate\Http\Request;
    public function store(SavePostRequest $request){
//title, proviene de name del form

      Empleado::create($request->validated());

      return to_route('Empleados.index')->with('status', 'empleado registrado');
    }

    public function edit(Empleado $empleado){

      return view('Empleados.edit', ['empleado' => $empleado]);

    }

    public function update(SavePostRequest $request, Empleado $empleado){

      $empleado->update($request->validated());

      return to_route('Empleados.index')->with('status', 'actualizado correctamente');

    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return to_route('Empleados.index')->with('status', 'empleado eliminado');
    }

    
}
