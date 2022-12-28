<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;

class CRUD extends Controller
{

    function comandos() {

        $animals = Animal::all();

        return view('welcome', ['animals' => $animals]);
    }

    public function destroy($id){

        Animal::findOrFail($id)->delete();
        
        return redirect('/');
    }
}
