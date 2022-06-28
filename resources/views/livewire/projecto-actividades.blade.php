<div class="text-uppercase  ">
    
    <div >
        @if (session()->has('codigoErro'))
         <span class="text-uppercase text-danger"> {{ session('codigoErro') }}</span>
         @endif
         @error('nrProjecto') <span class="text-uppercase text-danger">{{ $message }}</span> @enderror
        <div class="text-uppercase d-flex mt-2 mb-0 p-0">
            <div class="text-uppercase form-group d-flex col-4  p-0">

                    <div class="text-uppercase col-md-8 p-0">
                    
                    <input class="text-uppercase form-control " type="number" id="nrProjecto" name="nrProjecto"  wire:model="nrProjecto" 
                    placeholder="Digite o numero do projecto" wire:keydown.Enter="projectoInfo()"/>
                    </div>
                    <button class="text-uppercase btn btn-warning col-4" wire:click="projectoInfo()">Visualizar</button>
            </div>

            <div class="text-uppercase form-group d-flex justify-content-end col-4  p-0  ml-auto">

              <a href="/servicos/cadastrar/-{{$nrProjecto}}-{{$projecto_principal}}" class="text-uppercase btn btn-secondary ">Nova actividade</a>
              
            </div>


         
        </div>

      
    </div>
    <div class="text-uppercase row">
    <table class="text-uppercase table table-secondary table-striped table-hover"> 
      <thead class="text-uppercase thead-dark">
        <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col" class="text-uppercase text-center ">DESIGNAÇÃO</th>
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
              <td width="150" class="text-uppercase text-right">
                <a href="/servico/update/-{{$actividade['id']}}-{{$actividade['codigo']}}-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="text-uppercase btn btn-sm btn-circle btn-outline-secondary" title="Editar"><i class="text-uppercase fa fa-edit"></i></a>
                @if ($actividade['unidade']=='H'||$actividade['unidade']=='h')
                  <a href="/processar/pagamentos/-{{$actividade['id']}}-{{$actividade['codigo']}}-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="text-uppercase btn btn-sm btn-outline-primary" title="Mão de obra" >MO</a>         
                @endif
                <button wire:click="actividadeDelete({{$actividade['id']}})" class="text-uppercase btn btn-sm btn-circle btn-outline-danger" title="Eliminar"><i class="text-uppercase fa fa-times"></i></button>

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
              <th class="text-uppercase text-right">Total</th>
              <td colspan="2" class="text-uppercase "> {{$total}},00 MT</td>
            </tr>
       </tbody>
    </table> 
    <div class="text-uppercase col-12">
      <div class="text-uppercase form-group row col-12 p-0">
        <button class="text-uppercase btn btn-secondary col-4 " wire:click="voltar({{$total}})">Voltar</button>
        
        <button class="text-uppercase btn btn-warning col-4 ml-auto" wire:click="custos({{$total}},{{$totalReal}})">K</button>
        
       </div>
    </div>
    </div>
    
</div>
