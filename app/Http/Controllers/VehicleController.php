<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categoria = Category::all();
        $vehiculo = Vehicle::all();

        return view('vehicles.index', ['categoria' => $categoria, 'vehiculo' => $vehiculo]);
    }

    public function newVehicle(Request $request){
        $rules=[
            'placa' => 'required|min:4'
        ];
        $messages=[
            'placa.required' => 'El numero de Placa es obligatorio.',
            'placa.min' => 'El numero de Placa debe tener más de 4 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $vehiculo = new Vehicle();
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->marca = $request->input('marca');
        $vehiculo->nro_asientos = $request->input('nro_asientos');
        $vehiculo->anio = $request->input('anio');
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->recorrido = $request->input('recorrido');
        $vehiculo->aire_acondicionado = $request->input('aire_acondicionado');
        $vehiculo->precio_d = $request->input('precio_d');
        $vehiculo->foto_r = $request->input('foto_r');
        $vehiculo->clasifica = $request->input('clasifica');
        $vehiculo->status = $request->input('status');
        $vehiculo->category_id = $request->input('category_id');
        $vehiculo->save();

        $notificacion = 'El vehículo se a creado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function updateVehicle(Request $request, Vehicle $id){
        $rules=[
            'placa' => 'required|min:4'
        ];
        $messages=[
            'placa.required' => 'El numero de Placa es obligatorio.',
            'placa.min' => 'El numero de Placa debe tener más de 4 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $id->nombre = $request->input('nombre');
        $id->placa = $request->input('placa');
        $id->marca = $request->input('marca');
        $id->nro_asientos = $request->input('nro_asientos');
        $id->anio = $request->input('anio');
        $id->tipo = $request->input('tipo');
        $id->recorrido = $request->input('recorrido');
        $id->aire_acondicionado = $request->input('aire_acondicionado');
        $id->precio_d = $request->input('precio_d');
        $id->foto_r = $request->input('foto_r');
        $id->clasifica = $request->input('clasifica');
        $id->status = $request->input('status');
        $id->category_id = $request->input('category_id');
        $id->save();

        $notificacion = 'El vehículo se a actualizado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function deleteVehicle(Vehicle $id){
        $deleteName = $id->placa;
        $id->delete();
        $notificacion = 'El vehículo '.$deleteName.' se a eliminado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }
}
