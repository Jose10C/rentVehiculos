<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Vehicle;
use DateTime;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /* Views for the Clients */
    public function viewMain()
    {
        $v_vehiculos = Vehicle::all();
        return view('welcome', ['v_vehiculos' => $v_vehiculos]);
    }

    public function usernewRent(Request $request, $id_veh){
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

        $date1 = new DateTime($request->input('a_inicio'));
        $date2 = new DateTime($request->input('a_fin'));
        $diff = $date1->diff($date2);
        $dias = $diff->days;

        $u_vehiculo = Vehicle::find($id_veh);
        $u_vehiculo->status = 0;
        $u_vehiculo->save();

        $v_precio = Vehicle::find($id_veh);
        $alquiler->a_precio = floatval($v_precio->precio_d)*floatval($dias);

        $alquiler->status = 0;
        $alquiler->vehicles_id = $id_veh;
        $alquiler->users_id = auth()->user()->id;
        $alquiler->save();

        $notificacion = 'El alquiler se realizó correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }
}
