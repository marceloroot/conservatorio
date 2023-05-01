<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DOMDocument;
use DOMXPath;

class Inscricao extends Model
{
    use HasFactory;
    protected $fillable = ['nome','email','cpf','telefone', 'instrumento', 'turno','cursandoensino','jatocainstrumento', 'datanasc','nomeinstituicao','pcd','nota1','nota2','notafinal','user_id'];
      
    static $rules =[
        'nome'=>'required',
        'email'=>'required',
        'cpf' =>'required|unique:inscricaos',
        'telefone'=>'required',
        'instrumento'=>'required|',
        'turno'=>'required|',
        'cursandoensino'=>'required|',
        'jatocainstrumento'=>'required|',
        'datanasc'=>'required|',
    ];

    static $rulesUpdade =[
        'nome'=>'required',
        'email'=>'required',
        'cpf' =>'required',
        'telefone'=>'required',
        'instrumento'=>'required|',
        'turno'=>'required|',
        'cursandoensino'=>'required|',
        'jatocainstrumento'=>'required|',
        'datanasc'=>'required|',
    ];
      public function usuario(){
            // return $this->hasOne('App\Models\Atividades','i_atividades','id');
             return $this->belongsTo('App\Models\User','user_id');
     
         }
}
