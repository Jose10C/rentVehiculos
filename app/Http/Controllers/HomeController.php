<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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
        return view('home', ['v_vehiculos' => $v_vehiculos]);
    }

    public function listClientes(){
        $cliente = User::all();

        return view('clients.index', ['cliente' => $cliente]);
    }
}
