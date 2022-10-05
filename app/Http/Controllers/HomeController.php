<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $v_vehiculos = Vehicle::all();
        $viewrentado = Rent::latest()->first();
        /* dd($viewrentado->id); */
        return view('home', ['v_vehiculos' => $v_vehiculos, 'viewrentado' => $viewrentado]);
    }

    public function listClientes(){
        $cliente = User::all();

        return view('clients.index', ['cliente' => $cliente]);
    }

    public function deleteClientes(User $id){
        if (auth()->user()->id == 1 || auth()->user()->id == 2){
            //
            $deleteName = $id->name;
            $id->delete();
            $notificacion = 'El usuario '.$deleteName.' se a eliminado correctamente.';
        } else {
            $notificacion = 'Usted NO ESTÁ AUTORIZADO para eliminar, comuníquese con el Administrador por favor.';
        }
        return redirect()->back()->with(compact('notificacion'));
    }

    public function inicial()
    {
        return view('dashboard');
    }

    public function viewPedidos(){
        $ide = auth()->user()->id;
        $ver = Rent::where("users_id","=",$ide)->get();
        /* dd($ver); */
        return view('pedidos', ['ver' => $ver]);
    }

}
