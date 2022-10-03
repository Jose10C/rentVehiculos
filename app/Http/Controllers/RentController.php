<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $vehiculo = Vehicle::all();
        $alquiler = Rent::all();

        return view('rents.index', ['alquiler' => $alquiler, 'vehiculo' => $vehiculo]);
    }

    public function newRent(Request $request){
        $rules=[
            'a_inicio' => 'required',
            'a_fin' => 'required'
        ];
        $messages=[
            'a_inicio.required' => 'La Fecha es obligatorio.',
            'a_fin.required' => 'La Fecha es obligatorio.',
        ];
        $this->validate($request, $rules, $messages);

        $alquiler = new Rent();
        $alquiler->a_inicio = $request->input('a_inicio');
        $alquiler->a_fin = $request->input('a_fin');
        $alquiler->a_precio = $request->input('a_precio');
        $alquiler->status = $request->input('status');
        $alquiler->clients_id = $request->input('clients_id');
        $alquiler->vehicles_id = $request->input('vehicles_id');
        $alquiler->users_id = $request->input('users_id');
        $alquiler->save();

        $notificacion = 'El alquiler se realizó correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function updateRent(Request $request, Rent $id){
        $rules=[
            'a_inicio' => 'required',
            'a_fin' => 'required'
        ];
        $messages=[
            'a_inicio.required' => 'La Fecha es obligatorio.',
            'a_fin.required' => 'La Fecha es obligatorio.',
        ];
        $this->validate($request, $rules, $messages);

        $id->a_inicio = $request->input('a_inicio');
        $id->a_fin = $request->input('a_fin');
        $id->a_precio = $request->input('a_precio');
        $id->status = $request->input('status');
        $id->clients_id = $request->input('clients_id');
        $id->vehicles_id = $request->input('vehicles_id');
        $id->users_id = $request->input('users_id');
        $id->save();

        $notificacion = 'El alquiler se actualizó correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function deleteRent(Rent $id){
        $deleteName = $id->precio;
        $id->delete();
        $notificacion = 'El alquiler '.$deleteName.' se a eliminado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }
}
