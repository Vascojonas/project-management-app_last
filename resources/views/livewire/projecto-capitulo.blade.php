<div class=" ">
    <div class="text-right col-6 offset-4">
        @error('capitulo') <span class="text-danger ml-auto">{{ $message }}</span> @enderror
        @error('codigo') <span class="text-danger ml-auto">{{ $message }}</span> @enderror
    
    </div>
    <div class="d-flex">
      <div class="form-group row col-6 mt-3">
          @if (session()->has('codigoErro'))
          <span class="text-danger"> {{ session('codigoErro') }}</span>
          @endif
          @error('nrProjecto') <span class="text-danger">{{ $message }}</span> @enderror
          <div class="col-md-8 p-0">
              <input class="form-control " type="number" id="nrProjecto" name="nrProjecto"  wire:model="nrProjecto" 
              placeholder="Digite o numero do projecto" wire:keydown.Enter="projectoInfo()"/>
          </div>
          <button class="btn btn-warning col-4" wire:click="projectoInfo()">Visualizar</button>
      </div>

     



      <?php
          if($adcionarValido){ ?>
      
             <div class="form-group row col-6 mt-3">
                 <?php 
                   if(!$novoServicoValido){ ?>
                      <button class="btn btn-warning ml-auto" wire:click="novoServico">Novo serviço</button>
                      <?php }
             
               ?> 
             
                  
              <?php 
              
              if($novoServicoValido){ ?>
                   <div class="col-md-6 ml-2 p-0 ">
                      <input  class="form-control border ml-auto " type="number" name="codigo" list="numero_projecto"
                      placeholder="Digite o numero do projecto" required wire:model="codigo">
                      <datalist id="numero_projecto">
                          @foreach ($projectosCode as $projecto)
                          <option value="{{$projecto['nrProjecto']}}">
                              @endforeach
                              
                      </datalist>
                      
                  </div>
                  <select class="border border-light  " required wire:model="capitulo">
                      <option value="">Selecione o capitulo</option>    
                      @foreach ($capitulosNumero as $capitulo)
                          <option value="{{$capitulo}}">Capitulo {{$capitulo}}</option>    
                          @endforeach
                          <option  value="{{count($capitulosNumero)+1}}" >Capitulo {{count($capitulosNumero)+1}}</option>
                      </select>
                       <button class="btn btn-warning ml-auto" wire:click="cadastrarServico">Adcionar</button>    
                       
                       <?php }
              
              
              ?>
              </div>
              
              
              <?php  }
         
         ?>


  </div>

  <div class="col-12 ">
    <div class="row">

      <div class="form-group row col-4  p-0">
          <label for="cotratante" class="col-md-4 col-form-label bg-secondary" >CONTRATANTE:</label>
           <div class="col-md-8 p-0">
           <input class="form-control " readonly type="text" id="nrProjecto" name="contratante" 
           value="{{$projecto['contratante']}}" />
           </div>
       </div>

       <div class="form-group row col-4  p-0">
          <label for="localizacao" class="col-md-4 col-form-label bg-secondary" >LOCALIZAÇÃO:</label>
           <div class="col-md-8 p-0">
           <input class="form-control " readonly type="text" id="localizacao" name="localizacao" 
           value="{{$projecto['localizacao']}}" />
           </div>
       </div>

       <div class="form-group row col-4 p-0">
          <label for="nrProjecto" class="col-md-4 col-form-label bg-secondary  m-0" >PRAZO:</label>
           <div class="col-md-8 p-0 m-0">
           <input class="form-control " readonly type="text" id="nrProjecto"
           value="{{$projecto['prazo']}}" />
           </div>
       </div>

  </div>
  </div>


<div class="row">
    <table class="table table-secondary table-striped table-hover">
        <?php  $superTotal=0;?>   
        <thead class="thead-dark">
        <tr>
          <th scope="col">codigo</th>
          <th scope="col" class="text-center ">Designacao</th>
          <th scope="col">Quant</th>
          <th scope="col">Preco Unit</th>
          <th scope="col">Preco_Total(Mts)</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($capitulosNumero as $capitulo)
        
        <tr>
          <td colspan="6" class="text-center ">Capitulo {{$capitulo}}</td>
       </tr>
       <?php $subTotal=0;?>
       @foreach ($projectos as $projecto)

          
          @if ($projecto['capitulo']==$capitulo)
            <tr>
                  
              <th scope="row">{{$projecto['nrProjecto']}}</th>
              <td>{{substr($projecto['descricao'],0,55)}}...</td>
              <td>

                @if (($editar==$projecto['id']))
                    <input  type="number"  />
                @else
                {{$projecto['quantidade']}} 
                @endif
              </td>
              <td>{{$projecto['preco_unitario']}},00 Mts</td>
              <td>{{$projecto['preco_unitario']*$projecto['quantidade']}},00 Mts</td>
              <td width="150">
                <a href="/projectos/actividades/-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                <a  href="/-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
                <button wire:click="delete({{$projecto['idCapitulo']}})" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></button>
            </tr>
            
            <?php  $subTotal+=$projecto['preco_unitario']*$projecto['quantidade']?>
            @endif
            @endforeach

            <tr>
              <th colspan="3"></th>
              <th class="text-right">Sub_Total_{{$capitulo}}</th>
              <td colspan="2" class=""> {{$subTotal}},00Mts</td>
            
            </tr>
         
          <?php  
           $superTotal +=$subTotal;
           $subTotal=0;
          ?>
          
         @endforeach
        <tr>
            <th colspan="3"></th>
            <th colspan="2">Total</th>
            <td>{{$superTotal}},00Mts</td>
        </tr>  
        <tr>
            <th colspan="3"></th>
            <th colspan="2">IVA (17%)</th>
            <td >{{$superTotal*0.17}},00Mts</td>
        </tr>
        <tr>
          <th colspan="3"></th>
          <th colspan="2">Total Geral</th>
          <td >{{$superTotal+$superTotal*0.17}},00Mts</td>  
        </tr> 
       </tbody>
    </table> 

    </div>
    <a href="/projectos/relatorio/pdf/-{{$nrProjecto}}" target="_blank" class="btn btn-warning col-4">Imprimir</a>
</div>
<div>
  
</div>
