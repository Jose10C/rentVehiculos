<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    /* Views for the Clients */

    public function viewMain()
    {
        $v_vehiculos = Vehicle::all();
        return view('welcome', ['v_vehiculos' => $v_vehiculos]);
    }

    public function usernewRent(Request $request, $id_veh)
    {
        DB::beginTransaction();
        $rules = [
            'a_inicio' => 'required',
            'a_fin' => 'required',
            'dni' => 'required|min:8',
            'telefono' => 'required|min:9',
            'direccion' => 'required|min:4',
        ];
        $messages = [
            'a_inicio.required' => 'La Fecha Inicial es obligatorio.',
            'a_fin.required' => 'La Fecha Final es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'direccion.required' => 'La dirección es obligatorio.',
            'dni.min|telefono.min|direccion.min' => 'Debe llenar los campos vacíos',
        ];


        $this->validate($request, $rules, $messages);

        try {
            /* updated infomation of user */
            $u_user = User::find(auth()->user()->id);
            $u_user->dni = $request->input('dni');
            $u_user->telefono = $request->input('telefono');
            $u_user->direccion = $request->input('direccion');
            $u_user->save();

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
            $alquiler->a_precio = floatval($v_precio->precio_d) * floatval($dias);

            $alquiler->status = 1;
            $alquiler->vehicles_id = $id_veh;
            $alquiler->users_id = auth()->user()->id;
            $alquiler->save();

            DB::commit();
            $notificacion = 'El alquiler se realizó correctamente.';
            return redirect()->back()->with(compact('notificacion'));
        } catch (\Exception $e) {
            DB::rollback();

            $notificacion = 'Ocurrio un error inesperado, comuníquese con el administrador. ' . $e;
            return redirect()->back()->with(compact('notificacion'));
        }
    }
}
