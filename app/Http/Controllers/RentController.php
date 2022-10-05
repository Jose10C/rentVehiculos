<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $vehiculo = Vehicle::all();
        $alquiler = Rent::all();
        $usuarios = User::all();

        return view('rents.index', ['alquiler' => $alquiler, 'vehiculo' => $vehiculo, 'usuarios' => $usuarios]);
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

    public function updateRent(Request $request, Rent $renta)
    {
        DB::beginTransaction();
        $rules = [
            'a_inicio' => 'required',
            'a_fin' => 'required'
        ];
        $messages = [
            'a_inicio.required' => 'La Fecha es obligatorio.',
            'a_fin.required' => 'La Fecha es obligatorio.',
        ];

        $this->validate($request, $rules, $messages);

        try {
            $renta->a_inicio = $request->input('a_inicio');
            $renta->a_fin = $request->input('a_fin');

            $date1 = new DateTime($request->input('a_inicio'));
            $date2 = new DateTime($request->input('a_fin'));
            $diff = $date1->diff($date2);
            $dias = $diff->days;

            if($request->input('status') == 0){
                $u_vehiculo = Vehicle::find($request->input('vehicles_id'));
                $u_vehiculo->status = 1; //Habilitando el Vehículo
                $u_vehiculo->save();
            } else {
                $u_vehiculo = Vehicle::find($request->input('vehicles_id'));
                $u_vehiculo->status = 0; //Reservar el Vehículo
                $u_vehiculo->save();
            }
            $v_precio = Vehicle::find($request->input('vehicles_id'));

            $renta->a_precio = floatval($v_precio->precio_d) * floatval($dias);

            $renta->status = $request->input('status');
            $renta->vehicles_id = $request->input('vehicles_id');
            $renta->users_id = $request->input('users_id');
            $renta->save();

            DB::commit();
            $notificacion = 'El renta se actualizó correctamente.';
            return redirect()->back()->with(compact('notificacion'));
        } catch (\Exception $e) {
            DB::rollback();

            $notificacion = 'Ocurrio un error inesperado, comuníquese con el administrador. ' . $e;
            return redirect()->back()->with(compact('notificacion'));
        }
    }

    public function deleteRent(Rent $id){
        $deleteName = $id->precio;
        $id->delete();
        $notificacion = 'El alquiler '.$deleteName.' se a eliminado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }
}
