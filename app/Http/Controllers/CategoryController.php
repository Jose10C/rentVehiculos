<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categoria = Category::all();

        return view('categories.index', ['categoria' => $categoria]);
    }

    public function newCategory(Request $request){
        $rules=[
            'model' => 'required|min:4'
        ];
        $messages=[
            'model.required' => 'El nombre del modelo es obligatorio.',
            'model.min' => 'El nombre del modelo debe tener más de 4 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $categoria = new Category();
        $categoria->model = $request->input('model');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        $notificacion = 'La Categoría se a creado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function updateCategory(Request $request, Category $id){
        $rules=[
            'model' => 'required|min:4'
        ];
        $messages=[
            'model.required' => 'El nombre del modelo es obligatorio.',
            'model.min' => 'El nombre del modelo debe tener más de 4 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $id->model = $request->input('model');
        $id->descripcion = $request->input('descripcion');
        $id->save();

        $notificacion = 'La Categoría se a actualizado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }

    public function deleteCategory(Category $id){
        $deleteName = $id->model;
        $id->delete();
        $notificacion = 'La Categoría '.$deleteName.' se a eliminado correctamente.';
        return redirect()->back()->with(compact('notificacion'));
    }
}
