<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Inscricao;
class InscricaoController extends Controller
{
  
  
    public function store(Request $request){
        $validator =Validator::make($request->all(),Inscricao::$rules);
     
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $request['user_id'] = auth()->user()->id;
         $resultado = Inscricao::Create($request->all());
         if($resultado){
            return View('dashboard');
         }

        return View('dashboard');
    }
}
