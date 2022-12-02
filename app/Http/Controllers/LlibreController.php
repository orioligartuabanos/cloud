<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Llibre;
use App\Models\Autor;

class LlibreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list()
    {
        $llibres = Llibre::all();
        return view('llibre.list', ['llibres' => $llibres]);
    }

    function new(Request $request)
    {
        if ($request->isMethod('post')) {

            $llibre = new Llibre;
            $llibre->titol = $request->titol;
            $llibre->dataP = $request->dataP;
            $llibre->vendes = $request->vendes;
            $llibre->autor_id = $request->autor_id;
            $validated = $request->validate([
                'titol' => 'required|min:2|max:20',
                'vendes' => 'required',
                'dataP' => 'date_format:Y-m-d|before:today',],
                [
                    'required' => 'Nescessites escriure :attribute!',
                    'min' => 'El :attribute no pot ser més petit de 2 caràcters!',
                    'max' => 'El :attribute no pot ser més gran de 20 caràcters!',
                    'before:today' => 'La data ha de ser abans que avui',

               
            ]);
            $llibre->save();

            if ($llibre->autor_id == null) {
                return redirect()->route('llibre_list')->with('status', 'Nou llibre ' . $llibre->titol . ' creat!')->withoutCookie('autor');
            } else {
                return redirect()->route('llibre_list')->with('status', 'Nou llibre ' . $llibre->titol . ' creat!')->cookie('autor', $llibre->autor_id, 60);
            }
        }
        $autors = Autor::all();
        $autorId = $request->cookie('autor');

        // Llegir Cookie
        return view('llibre.new', [
            'autors' => $autors,
            'autorId' => $autorId
        ]);
    }

    public function Search(Request $request)
    {$search = $request->get('cerca');
        //echo $search; exit;
      $lli = Llibre::where('titol','like','%'.$search.'%')
      ->where('vendes','>','num')
      ->get();
      return view('llibre.list',['llibres' => $lli]);
      
    }
 

    function edit(Request $request, $id)

    {
        $llibre = Llibre::find($id);
        if ($request->isMethod('post')) {
            // $llibre = Llibre::find($id);
            $llibre->titol = $request->titol;
            $llibre->dataP = $request->dataP;
            $llibre->vendes = $request->vendes;
            $llibre->autor_id = $request->autor_id;

            $validated = $request->validate([
                'titol' => 'required|min:2|max:20',
                'vendes' => 'required',
                'dataP' => 'date_format:Y-m-d|before:today',],
                [
                    'required' => 'Nescessites escriure :attribute!',
                    'min' => 'El :attribute no pot ser més petit de 2 caràcters!',
                    'max' => 'El :attribute no pot ser més gran de 20 caràcters!',
                    'before:today' => 'La data ha de ser abans que avui',

                ]);

            $llibre->save();

            return redirect()->route('llibre_list')->with('status', 'Edit llibre ' . $llibre->titol . ' modificat!');
        }
        $autors = Autor::all();

        return view('llibre.edit', ['autors' => $autors, 'llibre' => $llibre]);
    }



    function delete($id)
    {
        $llibre = Llibre::find($id);
        $llibre->delete();

        return redirect()->route('llibre_list')->with('status', 'Llibre ' . $llibre->titol . ' eliminat!');
    }

    function deleteWithAutor($autorid)
    {
        $llibres = Llibre::all();

        foreach ($llibres as $llibre) {
            if ($llibre->autor_id == $autorid) {
                $llibre->delete();
            }
        }
    }
}
