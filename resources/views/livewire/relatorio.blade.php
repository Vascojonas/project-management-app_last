<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio</title>
</head>
<body>

    <table width="100%" >
        <?php  $superTotal=0;?>   
        @foreach($capitulos as $capitulo)
                          
          <thead  width="100%">
            <tr width="100%">
              <td colspan="7" class="text-center ">Capitulo {{$capitulo['capitulo']}}</td>
           </tr>
            <tr width="100%">
              <th scope="col">Codigo</th>
              <th scope="col">Designacao</th>
              <th scope="col">Un</th>
              <th scope="col">Quant</th>
              <th scope="col">Preco Unit</th>
              <th scope="col">Preco_Total(Mts)</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
  
            @if (!isset($index))
                <?php $index=0; $subTotal=0;?>    
            @endif
            @foreach ($actividades[$index] as $actividade)
  
              <tr width="100%">
                <th scope="row">{{$actividade['codigo']}}</th>
                <td>{{$actividade['designacao']}}</td>
                <td>{{$actividade['unidade']}}</td>
                <td>{{$actividade['quantidade']}}</td>
                <td>{{$actividade['preco_unitario']}},00 Mts</td>
                <td>{{$actividade['preco_unitario']*$actividade['quantidade']}},00 Mts</td>
                <td width="150">
                  <a href="/projectos/actividade" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                  <a href="/servico/update/-{{$projecto['nrProjecto']}}-{{$capitulo['id']}}-{{$actividade['codigo']}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                </td>
              </tr>
  
              <?php  $subTotal +=$actividade['preco_unitario']*$actividade['quantidade']?>
              @endforeach
              <tr width="100%">
                <th colspan="4"></th>
                <th class="text-right">Sub_Total_{{$capitulo['capitulo']}}</th>
                <td class=""> {{$subTotal}},00Mts</td>
              </tr>
            <?php $index++; 
            $superTotal +=$subTotal;
            $subTotal=0;?>
            
           @endforeach
          <tr width="100%">
              <th colspan="4"></th>
              <th >Total_global</th>
              <td>{{$superTotal}},00Mts</td>
              <td><strong>IVA:</strong>{{$superTotal*0.17}},00Mts</td>
          </tr> 
                    
         </tbody>
      </table>
    
</body>
</html>