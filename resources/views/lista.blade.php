
   

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Histórico') }}
      </h2>
  </x-slot>


  @push('styles')
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
  @endpush




<div class="row mt-4 mb-4 mr-4 ml-4">
<table class="table" id="minhaTabela">
    <thead>
      <tr>
        <th>Cadastro de  Notas</th>
        <th>CODIGO</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>TELEFONE</th>
        <th>DATA NASCIMENTO</th>
        <th>IDADE</th>
        <th>CURSO</th>
        <th>TURNO</th>
        <th>PCD</th>
        <th>CURSANDO ESCOLA PUBLICA</th>
        <th>NOME DA INSTITUICAO</th>
        <th>JA TOCA INSTRUMENTO</th>
        <th>Pontuacao 1 fase</th>
        <th>Pontuacao 2 fase</th>
        <th>Pontuacao Final</th>
      </tr>
    </thead>
    <tbody>
        @foreach( $data as $item)
        @php
      
          list($ano, $mes, $dia) = explode('-', $item->datanasc);
          $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
          $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
          $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
          
     
         @endphp
        <tr>
            <td><a href="{{ route('cadastronotas',['id'=>$item->id])}}" class="btn btn-primary btn-sm">Cadastrar</a></td>
            <td>{{$item->id}}</td>
            <td>{{Str::upper($item->nome)}}</td>
            <td>{{Str::upper($item->cpf)}}</td>
            <td>{{Str::upper($item->telefone)}}</td>
            <td>{{ Str::upper(date('d/m/Y', strtotime($item->datanasc))) }}</td>
            <td>{{$idade}}</td>
            <td>{{Str::upper($item->instrumento)}}</td>
            <td>{{Str::upper($item->turno)}}</td>
            <td>{{Str::upper($item->pcd)}}</td>
            <td>{{Str::upper($item->cursandoensino)}}</td>
            <td>{{Str::upper($item->nomeinstituicao)}}</td>
            <td>{{Str::upper($item->jatocainstrumento)}}</td>
            <td>{{Str::upper($item->nota1)}}</td>
            <td>{{Str::upper($item->nota2)}}</td>
            <td>{{Str::upper($item->notafinal)}}</td>
          </tr>
        
        @endforeach
     
     
    </tbody>
  </table>
            
</div>


  @section('scripts')

 
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="//code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#minhaTabela').DataTable({
              "language": {
                  "lengthMenu": "Mostrando _MENU_ registros por página",
                  "zeroRecords": "Nada encontrado",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "Nenhum registro disponível",
                  "infoFiltered": "(filtrado de _MAX_ registros no total)"
              },
              dom: 'Bfrtip',
             buttons: [
              {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                },
                
            },
            'colvis'
             ],
             columnDefs: [ {
            targets: 1,
            visible: false
        } ]
          });
    });
    </script>

@stop

</x-app-layout>
