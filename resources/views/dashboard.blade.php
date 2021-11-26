<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscricao') }}
        </h2>
    </x-slot>
    
   <div class="container">
    <form class="mt-5" action="{{ route('store')}}" method="post">
   
    
        @csrf
       
       
              
              <div class="row">
                 <div class="mb-3 col-6">
                   
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                    @if($errors->has('nome'))
                      <div class="error">{{ $errors->first('nome') }}</div>
                    @endif
                  </div>

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Data Nascimento</label>
                    <input type="date" class="form-control" name="datanasc" id="datanasc" onchange="validaDataInstrumento()">
                    @if($errors->has('datanasc'))
                    <div class="error">{{ $errors->first('datanasc') }}</div>
                    @endif
                  </div>

                </div>

                <div class="row">
                

                    <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Turno</label>
                        <select class="form-select" name="turno" id="turno" aria-label="Default select example" onchange="validaHorarioInstrumento()">
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

                    <label for="texto" class="form-label" required>Instrumento</label>
                    <select class="form-select" name="instrumento"  id="instrumento"  aria-label="Default select example">
                        <option  value="">Selecione um instrumento</option>
                        <option value="Saxofone">Saxofone</option>
                        <option value="Clarinete">Clarinete</option>
                        <option value="Canto Popular">Canto Popular</option>
                        <option value="Canto Lirico">Canto Lirico</option>
                        <option value="Piano">Piano</option>
                        <option value="Percusao/Bateria">Percusao/Bateria</option>
                        <option value="Flauta Doce">Flauta Doce</option>
                        <option value="Violao Popular">Violao Popular</option>
                        <option value="Viola Caipira">Viola Caipira</option>
                        <option value="Trompete">Trompete</option>
                        <option value="Trombone ">Trombone</option>
                        <option value="Trombone de Vara">Trombone de Vara</option>
                        <option value="Bombardino">Bombardino</option>
                        <option value="Bombardão">Bombardão</option>
                      </select>
                    @if($errors->has('instrumento'))
                    <div class="error">{{ $errors->first('instrumento') }}</div>
                    @endif
                  </div>
                 
                </div>
                    
                <div class="row">
                    <div class="mb-3  col-6">
                      <label for="tags" class="form-label">Cursando escola publica</label>
                      <input type="text" class="form-control" name="cursandoensino" id="cursandoensino">
                      @if($errors->has('cursandoensino'))
                      <div class="error">{{ $errors->first('cursandoensino') }}</div>
                      @endif
                    </div>
                     
                    <div class="mb-3  col-6">
                        <label for="tags" class="form-label">telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone">
                        @if($errors->has('telefone'))
                        <div class="error">{{ $errors->first('telefone') }}</div>
                        @endif
                      </div>
    
                  </div>


                  <div class="row">
                    <div class="mb-3  col-6">
                      <label for="tags" class="form-label">Ja toca instrumento Escolhido</label>
        
                      <select class="form-select" name="jatocainstrumento" id="jatocainstrumento" aria-label="Default select example" onchange="validaHorarioInstrumento()">
                        <option value="">Selecione uma opcao</option>
                        <option value="Sim">Sim</option>
                        <option value="Nao">Nao</option>
                      </select>
                      @if($errors->has('jatocainstrumento'))
                      <div class="error">{{ $errors->first('jatocainstrumento') }}</div>
                      @endif
                    </div>
   

                    <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Cursando qual instituicao </label>
                        <input type="text" class="form-control" name="nomeinstituicao" id="nomeinstituicao">
                        @if($errors->has('nomeinstituicao'))
                        <div class="error">{{ $errors->first('nomeinstituicao') }}</div>
                        @endif
                      </div>
                  </div>


                

                  <button class="btn btn-danger mt-10" style="display:inline"  type="submit">Inscrever-se</button>
                  
           
        </form>
    </div>
</x-app-layout>
<script>

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
        
        if(idade > 10){
            document.getElementById("instrumento").disabled = false;
            document.getElementById("turno").disabled = false;   
        }
        if(idade <=15)
        {
           
           for(i=0;i<=select.options.length;i++){ 
               if(select.options[i].value == "Canto Popular" || select.options[i].value == "Canto Lirico" ){
                   select.options[i].disabled = true;
               }
           }

       }
         
       
     }
    }  


    function validaHorarioInstrumento()
   {
    var data=document.getElementById("turno").value;

    if(data !=null){
        
        
        //pega o instrumento
        var select = document.getElementById('instrumento');
          

        if(data == "Manha"){
           
            for(i=0;i<=select.options.length;i++){ 
                if(select.options[i].value == "Canto Popular" || select.options[i].value == "Viola Caipira" ){
                    select.options[i].disabled = true;
                }
            }

        }
     }
    }  
    

</script>