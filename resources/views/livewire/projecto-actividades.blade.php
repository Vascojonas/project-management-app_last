<div class=" ">
    
    <div >
        @if (session()->has('codigoErro'))
         <span class="text-danger"> {{ session('codigoErro') }}</span>
         @endif
         @error('nrProjecto') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="d-flex mt-2 mb-0 ">
            <div class="form-group row col-4  p-0">

                    <div class="col-md-8 p-0">
                    
                    <input class="form-control " type="number" id="nrProjecto" name="nrProjecto"  wire:model="nrProjecto" 
                    placeholder="Digite o numero do projecto" wire:keydown.Enter="projectoInfo()"/>
                    </div>
                    <button class="btn btn-warning col-4" wire:click="projectoInfo()">Visualizar</button>
            </div>

         
        </div>

      
    </div>
    <div class="row">
    <table class="table table-secondary table-striped table-hover"> 
      <thead class="thead-dark">
        <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col" class="text-center ">DESIGNAÇÃO</th>
          <th scope="col">UN</th>
          <th scope="col">QUANTIDADE</th>
          <th scope="col">PREÇO_UNITÁRIO</th>
          <th scope="col">PREÇO_TOTAL(MT)</th>
          <th scope="col">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
  
        <?php $totalReal=0?>
          @foreach ($actividades as $actividade)

            <tr>
              <th scope="row">{{$actividade['codigo']}}</th>
              <td>{{substr($actividade['designacao'],0,55)}}...</td>
              <td>{{$actividade['unidade']}}</td>
              <td>{{$actividade['quantidade']}}</td>
              <td>{{$actividade['preco_final']}},00 MT</td>
              <td>{{$actividade['preco_final']*$actividade['quantidade']}},00 MT</td>
              <td width="150">
                <a href="/servico/update/-{{$actividade['id']}}-{{$actividade['codigo']}}-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                @if ($actividade['unidade']=='H'||$actividade['unidade']=='h')
                  <a href="/processar/pagamentos/-{{$actividade['id']}}-{{$actividade['codigo']}}-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="btn btn-sm btn-outline-dark ">MO</a>         
                @endif
              </td>
            </tr>

            <?php  $total +=$actividade['preco_final']*$actividade['quantidade'];
            
            $totalReal += $actividade['preco_unitario']?>
            @endforeach

            <?php

                if($custos){

                  $total= ($custos['indutor_custo']!=1)?
                  round($total*$custos['indutor_custo']/1.17,2):$total;
                }
            
            ?>
            <tr>
              <th colspan="4"></th>
              <th class="text-right">Total</th>
              <td colspan="2" class=""> {{$total}},00 MT</td>
            </tr>
       </tbody>
    </table> 
    <div class="col-12">
      <div class="form-group row col-12 p-0">
        <button class="btn btn-warning col-4 " wire:click="voltar({{$total}})">Voltar</button>
        
        <button class="btn btn-warning col-4 ml-auto" wire:click="custos({{$total}},{{$totalReal}})">K</button>
        
       </div>
    </div>
    </div>
    
</div>
