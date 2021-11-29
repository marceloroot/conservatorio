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
    protected $fillable = ['nome','cpf','telefone', 'instrumento', 'turno','cursandoensino','jatocainstrumento', 'datanasc','nomeinstituicao','user_id'];
      
    static $rules =[
        'nome'=>'required',
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
