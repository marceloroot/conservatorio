<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscrição (A idade para inscrever-se tem que ser maior que 10 anos e canto maior que 15 anos)') }}
           
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Campos com <span style="color:red">*</span> sao obrigatório
         
      </h2>
    </x-slot>
    
   <div class="container">
    <form class="mt-5" action="{{ route('store')}}" method="post">
   
      @csrf
       
       
              
              <div class="row">
                 <div class="mb-3 col-6">
                   
                    <label for="nome" class="form-label">Nome <span style="color:red">*</span> </label>
                    <input type="text" class="form-control"  id="nome" name="nome">
                    @if($errors->has('nome'))
                      <div class="error">{{ $errors->first('nome') }}</div>
                    @endif
                  </div>

                  <div class="mb-3 col-6">
                   
                    <label for="nome" class="form-label">CPF <span style="color:red">*</span></label>
                    <input type="text" class="form-control" onblur="isOnblurCpf()" required id="cpf" name="cpf">
                    @if($errors->has('cpf'))
                      <div class="error">{{ $errors->first('cpf') }}</div>
                    @endif
                  </div>


                </div>

                <div class="row">
                

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Data Nascimento <span style="color:red">*</span></label>
                    <input type="date" class="form-control" required name="datanasc" id="datanasc" onchange="validaDataInstrumento()" onblur="onBlurDataNasc()">
                    @if($errors->has('datanasc'))
                    <div class="error">{{ $errors->first('datanasc') }}</div>
                    @endif
                  </div>

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">telefone <span style="color:red">*</span></label>
                    <input type="text" class="form-control" required name="telefone" id="telefone">
                    @if($errors->has('telefone'))
                    <div class="error">{{ $errors->first('telefone') }}</div>
                    @endif
                  </div>


                   
                 
                </div>
                    
                <div class="row">

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Turno <span style="color:red">*</span></label>
                    <select class="form-select" name="turno" required id="turno" aria-label="Default select example" >
                        <option  value="">Selecione um Turno</option>
                        <option value="Manha">Manha</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                      </select>
                    @if($errors->has('turno'))
                    <div class="error">{{ $errors->first('turno') }}</div>
                    @endif
                  </div>
               

              <div class="mb-3  col-6">

                <label for="texto" class="form-label">Instrumento <span style="color:red">*</span></label>
                <select class="form-select" name="instrumento" required  id="instrumento"  aria-label="Default select example">
                    <option  value="">Selecione um instrumento</option>
                    <option value="Saxofone">Saxofone</option>
                    <option value="Clarinete">Clarinete</option>
                    <option value="Canto Popular">Canto Popular</option>
                    <option value="Canto Lirico">Canto Lirico</option>
                    <option value="Piano">Piano</option>
                    <option value="Percusao/Bateria">Percusao/Bateria</option>
                    <option value="Flauta Doce">Flauta Doce</option>
                    <option value="Violao Popular">Violao Popular</option>
                    <option value="Violao Eurudito">Violao Eurudito</option>
                    <option value="Viola Caipira">Viola Caipira</option>
                    <option value="Metais">Metais</option>
                  </select>
                @if($errors->has('instrumento'))
                <div class="error">{{ $errors->first('instrumento') }}</div>
                @endif
              </div>

    
                  </div>


                  <div class="row">
                    <div class="mb-3  col-6">
                      <label for="tags" class="form-label">Cursando escola publica <span style="color:red">*</span></label>
                      <select class="form-select" name="cursandoensino" required id="cursandoensino" aria-label="Default select example">
                        <option value="">Selecione uma opcao</option>
                        <option value="Sim">Sim</option>
                        <option value="Nao">Nao</option>
                      </select>
                      @if($errors->has('cursandoensino'))
                      <div class="error">{{ $errors->first('cursandoensino') }}</div>
                      @endif
                    </div>
                     


                  
   

                    <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Cursando qual instituicao </label>
                        <input type="text" class="form-control" name="nomeinstituicao" id="nomeinstituicao">
                        @if($errors->has('nomeinstituicao'))
                        <div class="error">{{ $errors->first('nomeinstituicao') }}</div>
                        @endif
                      </div>



                      <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Ja toca instrumento Escolhido <span style="color:red">*</span></label>
          
                        <select class="form-select" name="jatocainstrumento" required id="jatocainstrumento" aria-label="Default select example">
                          <option value="">Selecione uma opcao</option>
                          <option value="Sim">Sim</option>
                          <option value="Nao">Nao</option>
                        </select>
                        @if($errors->has('jatocainstrumento'))
                        <div class="error">{{ $errors->first('jatocainstrumento') }}</div>
                        @endif
                      </div>


                      <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Pessoa com Deficiência<span style="color:red">*</span></label>
                        <select class="form-select" name="pcd" required id="pcd" aria-label="pcd">
                          <option value="">Selecione uma opcao</option>
                          <option value="Sim">Sim</option>
                          <option value="Nao">Nao</option>
                        </select>
                        @if($errors->has('pcd'))
                        <div class="error">{{ $errors->first('pcd') }}</div>
                        @endif
                      </div>
                  </div>


                

                  <button class="btn btn-danger mt-10" style="display:inline"  type="submit">Inscrever-se</button>
                  
           
        </form>
    </div>


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>

<script>

function onBlurDataNasc(){
  document.getElementById("instrumento").value = "";
  document.getElementById("turno").value = "";


  var dataNasc = document.getElementById('datanasc').value;

  var dataNascimento = new Date(dataNasc);

  var dataMinima = new Date();
  //Data Minima
  dataMinima.setFullYear(dataMinima.getFullYear() -10);
 
  if(dataNascimento >= dataMinima){
    document.getElementById("datanasc").value =" ";
  }
}


function isValidCPF(cpf) {
    if (typeof cpf !== 'string') return false
    cpf = cpf.replace(/[^\d]+/g, '')
    if (cpf.length !== 11 || !!cpf.match(/(\d)\1{10}/)) return false
    cpf = cpf.split('')
    const validator = cpf
        .filter((digit, index, array) => index >= array.length - 2 && digit)
        .map( el => +el )
    const toValidate = pop => cpf
        .filter((digit, index, array) => index < array.length - pop && digit)
        .map(el => +el)
    const rest = (count, pop) => (toValidate(pop)
        .reduce((soma, el, i) => soma + el * (count - i), 0) * 10) % 11 % 10
    return !(rest(10,2) !== validator[0] || rest(11,1) !== validator[1])
}

function isOnblurCpf(){
  var cpf = document.getElementById('cpf').value;
  if(!isValidCPF(cpf)){
    document.getElementById("cpf").value =' ';
  }
  
}
$('#cpf').mask('000.000.000-00', {
  onKeyPress : function(cpfcnpj, e, field, options) {
    const masks = ['000.000.000-000', '00.000.000/0000-00'];
    const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
    $('#cpfcnpj').mask(mask, options);
  }
});

function calculaIdade(nascimento, hoje){
    return Math.floor(Math.ceil(Math.abs(nascimento.getTime() - hoje.getTime()) / (1000 * 3600 * 24)) / 365.25);
}
  document.getElementById("instrumento").disabled = true;
  document.getElementById("turno").disabled = true;

   function validaDataInstrumento()
   {
    var data=document.getElementById("datanasc").value;
    if(data !=null){
   
        //pega o instrumento
        var select = document.getElementById('instrumento');
        
        var dataNascimento = new Date(data);
        var dataatual = new Date();
        //Caucula idade
        var idade=  calculaIdade(dataNascimento,dataatual);
        
        if(idade >= 10){
            document.getElementById("instrumento").disabled = false;
            document.getElementById("turno").disabled = false;   
        }
        else {
            document.getElementById("instrumento").disabled = true;
            document.getElementById("turno").disabled = true; 
        }

        if(idade <= 15 )
        {
           
           for(i=0;i<=select.options.length -1;i++){ 
               if(select.options[i].value == "Canto Popular" || select.options[i].value == "Canto Lirico" ){
                   select.options[i].disabled = true;
               }
           }

       }
       else{
        for(i=0;i<=select.options.length-1;i++){ 
               if(select.options[i].value == "Canto Popular" || select.options[i].value == "Canto Lirico" ){
                   select.options[i].disabled = false;
               }
           }
       }
         
       
     }
    }  


    function validaHorarioInstrumento()
   {
    var data=document.getElementById("turno").value;
    document.getElementById("instrumento").value = "";
    if(data !=null){
        
        
        //pega o instrumento
        var select = document.getElementById('instrumento');
          

        if(data == "Manha"){
           
            for(i=0;i<=select.options.length -1;i++){ 
                if(select.options[i].value == "Canto Popular" || select.options[i].value == "Viola Caipira" ){
                    select.options[i].disabled = true;
                }
            }

        }
        else{
          for(i=0;i<=select.options.length-1;i++){ 
                if(select.options[i].value == "Canto Popular" || select.options[i].value == "Viola Caipira" ){
                    select.options[i].disabled = false;
                }
            }

        }
     }
    }  
    

</script>

@stop
</x-app-layout>