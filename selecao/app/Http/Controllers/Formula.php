<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;

class formula extends Controller
{

    function formular() {

        $animals = Animal::all();

        $edt = false;

        return view('formulario',['animals' => $animals, 'edt' => $edt]);
    }

    public function store(Request $request) {

        $animals = new Animal;

        $animals -> nome = $request -> nome;
        $animals -> resumo = $request -> resumo;
        $animals -> status = $request -> status;
        //$animals -> image = base64_encode($request->image);

        //Recebendo imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/animals'), $imageName);
            
            $animals->image = $imageName;
        }

        $animals -> save();

        return redirect('/');
    }

    public function edit($id){

        $animals = Animal::findOrFail($id);
        
        $edt = true;

        return view('formulario',['animals' => $animals, 'edt' => $edt]);
    }

    public function update(Request $request){

        Animal::findOrFail($request->id)->update($request->all());

        return redirect('/');

    }

}
