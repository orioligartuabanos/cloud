<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\LlibreController;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


use App\Models\Autor;

class AutorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  

    function list()
    {
        $autors = Autor::all();
        return view('autor.list', ['autors' => $autors]);
    }

    function new(Request $request)
    {
        if ($request->isMethod('post')) {

            $autor = new Autor();
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
          
            $validated = $request->validate([
                'nom' => 'required|max:20',
                'cognoms' => 'required|max:30',],
                [
                    'required' => 'Nescessites escriure :attribute!',
                    'min' => 'El :attribute no pot ser més petit de 2 caràcters!',
                    'max' => 'El :attribute no pot ser més gran de 20 caràcters!',
                   

            ]);
            $autor->save();
         
        
            return redirect()->route('autor_list')->with('status', 'Nou autor ' . $autor->nomCognoms() . ' creat!');
        }

        $autors = Autor::all();

        return view('autor.new', ['autors' => $autors]);
    }

    function edit(Request $request, $id)
    {
        $autor = Autor::find($id);
        if ($request->isMethod('post')) {
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
           
            $validated = $request->validate([
                'nom' => 'required|max:20',
                'cognoms' => 'required|max:30',
            ],
            [
                'required' => 'Nescessites escriure :attribute!',
                'min' => 'El :attribute no pot ser més petit de 2 caràcters!',
                'max' => 'El :attribute no pot ser més gran de 20 caràcters!',
            ]);
            $autor->save();
           
        
            return redirect()->route('autor_list')->with('status', 'Edit autor ' . $autor->nomCognoms() . ' done!');
        }

        return view('autor.edit', ['autor' => $autor]);
    }

    function delete($id)
    {
        $autor = Autor::find($id);

        (new LlibreController)->deleteWithAutor($id);

        $autor->delete();

        return redirect()->route('autor_list')->with('status', 'Autor ' . $autor->nomCognoms() . ' eliminat!');
    }

}

 