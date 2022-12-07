<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('funcionarios');
    } 

    public function getAll()
    {
        $result = employee::all();//->with("vacina")->get();
        $list= Array();

        foreach ($result as  $value) {
            $list[] = $value::with("vacina")->get();
        }


        return    response()->json($list);
    }
    
    public function store(Request $request)
    {  
        $employee = DB::table('employees')->where('CPF', $request->CPF)->first();
        //$result = "";
        if($employee){
            return "error";
        }else{//não existe o funcionario então posso inserir

            employee::create($request->all());       
            return "success";            
        }

       //dd($result);
        

       /* $funcionario = new employee();
        $result =  $funcionario->ifExistEmployee($request->CPF);*/

        //dd($result);


        

    }

    public function show(employee $funcionario)
    {       
       return $funcionario;
    } 

    public function update(Request $request)
    {
                
        $student = employee::find($request->id)->update($request->except("id"));
        return "success";

    }

    public function destroy($id)
    {
        $student = employee::find($id)->delete();
        return "success";
    }
}
