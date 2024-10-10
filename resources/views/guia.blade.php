<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comprovante</title>

    

   

</head>
<body>
   <div style="flex:1">
    <div sytle="flex-direction: row">
      <img src="https://www.alfenas.mg.gov.br/assets/img/logo_prefeitura.jpg" style="max-width:80px;max-height:80px; margin-top:15px" />
      <span style="font-size:28px; font-weight: bold;"> Prefeitura Municipal de Alfenas</span>
    </div>
    <h2>COMPROVANTE DE NUMERO: {{$data->id}}</h2>
    <h3>DATA DA INCRIÇÃO: {{ Str::upper(date('d/m/Y H:m', strtotime($data->created_at))) }}</h3>
    <h3>NOME: {{  Str::upper($data->nome) }}</h3>
    <h3>CPF: {{ Str::upper($data->cpf) }}</h3>
    <h3> CURSO: {{Str::upper($data->instrumento)}}</h3>
    <h3> TURNO: {{Str::upper($data->turno)}}</h3>
    <h3> DATA NASCIMENTO: {{ Str::upper(date('d/m/Y', strtotime($data->datanasc))) }}</h3>
    <h3> TELEFONE: {{Str::upper($data->telefone) }}</h3>
    <h3> PCD: {{Str::upper($data->pcd) }}</h3>
    <h3> CURSANDO ESCOLA PUBLICA: {{Str::upper($data->cursandoensino) }}</h3>
    <h3> JA TOCA INSTRUMENTO: {{Str::upper($data->jatocainstrumento) }}</h3>
    <h3> QUAL INSTITUICAO: {{Str::upper($data->nomeinstituicao) }}</h3>
</div>
</body>
</html>