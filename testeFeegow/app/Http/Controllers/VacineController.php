<?php

namespace App\Http\Controllers;

use App\Models\vacine;
use Illuminate\Http\Request;
use stdClass;

class VacineController extends Controller
{
    
    public function index()
    {
        return view('vacines');
    }   
    
    public function getAll()
    {
        $result = vacine::all();
        return $result;
    }

   
    public function store(Request $request)
    {
        
        
        $result = $request->validate([
            'nome' => ['required'],
            'lote' => ['required'],
            'data_validade' => ['required']
        ]);

        if (in_array("message", $result)) { 
            return  "errors";
        }      

        vacine::create($request->all());
        return "success";
    }

    
    public function show(vacine $vacina)
    {       
       return $vacina;
    }   
   
  
    public function update(Request $request)
    {
                
        $student = vacine::find($request->id)->update($request->except("id"));

        return "success";

    }

    
    public function destroy($id)
    {
        $student = vacine::find($id)->delete();

        return "success";
    }
}
