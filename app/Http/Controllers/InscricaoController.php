<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Inscricao;
use PDF;

class InscricaoController extends Controller
{
    public function dashboard()
    {
      if(auth()->user()->can('admin')){
        return redirect()->route('lista');
      }

        $curso = Inscricao::Where('user_id', auth()->user()->id)->first();
        if ($curso) {
            return redirect()->route('atualiza');
        }
        return View('dashboard');
    }

    public function store(Request $request)
    {

        $curso = Inscricao::Where('user_id', auth()->user()->id)->first();
        if ($curso) {
            return redirect()->route('dashboard');
        }

        $validator = Validator::make($request->all(), Inscricao::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        //Verifica se ja tem um inscricao feita por esse usuario se sim ele manda para pagina pdf




        $request['user_id'] = auth()->user()->id;
        $resultado = Inscricao::Create($request->all());
        if ($resultado) {
            return redirect()->route('pdf');
        }

        return redirect()->route('dashboard');
    }

    public function atualiza()
    {
        $inscricao  = Inscricao::Where('user_id', auth()->user()->id)->first();
        if($inscricao){
        return View('atualiza', ['inscricao' => $inscricao]);
        }
        return redirect()->route('dashboard');

    }



    public function put(Request $request)
    {


        $inscricao = Inscricao::Where('user_id', auth()->user()->id)->first();
        $cpfExiste = Inscricao::where('cpf', $request->cpf);




        if ($cpfExiste) {
            if ($request->cpf != $inscricao->cpf) {
                $validator = Validator::make($request->all(), Inscricao::$rules);
                return redirect()->back()->withErrors($validator);
            }
        }



        $validatorUpdate = Validator::make($request->all(), Inscricao::$rulesUpdade);

        if ($validatorUpdate->fails()) {
            return redirect()->back()->withErrors($validatorUpdate);
        }
        //Verifica se ja tem um inscricao feita por esse usuario se sim ele manda para pagina pdf



        if ($inscricao) {
            $inscricao->fill($request->all());
            if ($inscricao->save()) {
                
                return redirect()->route('pdf');
            }
        }
        return redirect()->route('dashboard');
    }


    public function guia()
    {


        $data  = Inscricao::Where('user_id', auth()->user()->id)->first();

        return view('guia', compact('data'));
    }

    public function pdf()
    {
        $data  = Inscricao::Where('user_id', auth()->user()->id)->first();
        if($data){
        // share data to view
        view()->share('guia', $data);
        $pdf = PDF::loadView('guia', ['data' => $data]);

        // download PDF file with download method
        return $pdf->stream();
      }
      return redirect()->route('dashboard');

    }

    public function lista(){
        if(auth()->user()->can('user')){
            return redirect()->route('dashboard');
          }
         
        $data  = Inscricao::all();
        return View('lista',compact('data'));
    }


    public function cadastronotas($id){
        if(auth()->user()->can('user')){
            return redirect()->route('dashboard');
          }
         
        if($id){
            $inscricao = Inscricao::find($id);
            
           return View('cadastronotas',['inscricao'=> $inscricao]);
        }

        return redirect()->route('lista');
    }

    public function storenotas($id,Request $request){

        if(auth()->user()->can('user')){
            return redirect()->route('dashboard');
          }
         
        if($id){
            $resultado =Inscricao::where('id',$id)->first();

            $resultado->fill($request->all());
            if($resultado->save()){
              return redirect()->route('lista');
            }
         }

        return View('cadastronotas');
    }
}
