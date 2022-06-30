<div class="text-uppercase  ">
    <div class="text-uppercase text-right col-6 offset-4 p-0">
        @error('capitulo') <span class="text-uppercase text-danger ml-auto">{{ $message }}</span> @enderror
        @error('codigo') <span class="text-uppercase text-danger ml-auto">{{ $message }}</span> @enderror
    
    </div>
    @if (session()->has('codigoErro'))
    <span class="text-uppercase text-danger"> {{ session('codigoErro') }}</span>
    @endif
    @error('nrProjecto') <span class="text-uppercase text-danger">{{ $message }}</span> @enderror
    <div class="text-uppercase d-flex p-0">
      <div class="text-uppercase form-group d-flex col-4 mt-3">
          <div class="text-uppercase col-md-8 p-0">
              <input class="text-uppercase form-control " type="number" id="nrProjecto" name="nrProjecto"  wire:model="nrProjecto" 
              placeholder="Digite o numero do projecto" wire:keydown.Enter="projectoInfo()"/>
          </div>
          <button class="text-uppercase btn btn-warning col-4" wire:click="projectoInfo()">Visualizar</button>
      </div>

     



      <?php
          if($adcionarValido){ ?>
      
             <div class="text-uppercase form-group d-flex col-6 mt-3">
                 <?php 
                   if(!$novoServicoValido){ ?>
                      <button class="text-uppercase btn btn-secondary ml-auto" wire:click="novoServico">Novo serviço</button>
                      <?php }
             
               ?> 
             
                  
              <?php 
              
              if($novoServicoValido){ ?>
                   <div class="text-uppercase col-md-6 ml-2 p-0 ">
                      <input  class="text-uppercase form-control border ml-auto " type="number" name="codigo" list="numero_projecto"
                      placeholder="Digite o numero do projecto" required wire:model="codigo">
                      <datalist id="numero_projecto">
                          @foreach ($projectosCode as $projecto)
                          <option value="{{$projecto['nrProjecto']}}">
                              @endforeach
                              
                      </datalist>
                      
                  </div>
                  <select class="text-uppercase border border-light  " required wire:model="capitulo">
                      <option value="">Selecione o capitulo</option>    
                      @foreach ($capitulosNumero as $capitulo)
                          <option value="{{$capitulo}}">Capitulo {{$capitulo}}</option>    
                          @endforeach
                          <option  value="{{count($capitulosNumero)+1}}" >Capitulo {{count($capitulosNumero)+1}}</option>
                      </select>
                       <button class="text-uppercase btn btn-warning ml-auto" wire:click="cadastrarServico">Adcionar</button>    
                       
                       <?php }
              
              
              ?>
              </div>
              
              
              <?php  }
         
         ?>


  </div>

  <div class="text-uppercase col-12 ">
    <div class="text-uppercase d-flex">

      <div class="text-uppercase form-group d-flex col-4  p-0">
          <label for="cotratante" class="text-uppercase col-md- col-form-label bg-secondary" >CONTRATANTE</label>
           <div class="text-uppercase col-md-8 p-0">
           <input class="text-uppercase form-control " readonly type="text" id="nrProjecto" name="contratante" 
           value="{{$projecto['contratante']}}" />
           </div>
       </div>

       <div class="text-uppercase form-group d-flex col-4  p-0">
          <label for="localizacao" class="text-uppercase col-md-6 col-form-label bg-secondary" >LOCALIZAÇÃO</label>
           <div class="text-uppercase col-md-8 p-0">
           <input class="text-uppercase form-control " readonly type="text" id="localizacao" name="localizacao" 
           value="{{$projecto['localizacao']}}" />
           </div>
       </div>

       <div class="text-uppercase form-group d-flex col-4 p-0 ">
          <label for="nrProjecto" class="text-uppercase col-md-4 col-form-label bg-secondary  m-0" >PRAZO</label>
           <div class="text-uppercase col-md-6 p-0 m-0">
           <input class="text-uppercase form-control " readonly type="text" id="nrProjecto"
           value="{{$projecto['prazo']}}" />
           </div>
       </div>

  </div>
  </div>


<div class="text-uppercase d-flex">
    <table class="text-uppercase table table-secondary table-striped table-hover">
        <?php  $superTotal=0;?>   
        <thead class="text-uppercase thead-dark">
 
        <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col" class="text-uppercase text-center ">DESIGNAÇÃO</th>
          <th scope="col">QUANTIDADE</th>
          <th scope="col">PREÇO_UNITÁRIO</th>
          <th scope="col">PREÇO_TOTAL(MT)</th>
          <th scope="col">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        @foreach($capitulosNumero as $capitulo)
        
        <tr>
          <td colspan="6" class="text-uppercase text-center ">Capitulo {{$capitulo}}</td>
       </tr>
       <?php $subTotal=0;?>
       @foreach ($projectos as $projecto)

          
          @if ($projecto['capitulo']==$capitulo)
            <tr>
                  
              <th scope="d-flex">{{$projecto['nrProjecto']}}</th>
              <td>{{substr($projecto['descricao'],0,55)}}...</td>
              <td>

                @if (($editar==$projecto['id']))
                    <input  type="number"  />
                @else
                {{$projecto['quantidade']}} 
                @endif
              </td>
              <td>{{$projecto['preco_unitario']}},00 MT</td>
              <td>{{$projecto['preco_unitario']*$projecto['quantidade']}},00 MT</td>
              <td width="150">
                <a href="/projectos/actividades/-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="text-uppercase btn btn-sm btn-circle btn-outline-info" title="Sub serviços"><i class="text-uppercase fa fa-eye"></i></a>
                <a  href="/-{{$projecto['nrProjecto']}}-{{$projecto_principal}}" class="text-uppercase btn btn-sm btn-circle btn-outline-secondary" title="Editar">
                    <i class="text-uppercase fa fa-edit"></i>
                </a>
                <button wire:click="delete({{$projecto['idCapitulo']}})" class="text-uppercase btn btn-sm btn-circle btn-outline-danger" title="Eliminar"><i class="text-uppercase fa fa-times"></i></button>
            </tr>
            
            <?php  $subTotal+=$projecto['preco_unitario']*$projecto['quantidade']?>
            @endif
            @endforeach

            <tr>
              <th colspan="3"></th>
              <th class="text-uppercase text-right">Sub_Total_{{$capitulo}}</th>
              <td colspan="2" class="text-uppercase "> {{$subTotal}},00 MT</td>
            
            </tr>
         
          <?php  
           $superTotal +=$subTotal;
           $subTotal=0;
          ?>
          
         @endforeach
        <tr>
            <th colspan="3"></th>
            <th colspan="2">Total</th>
            <td>{{$superTotal}},00 MT</td>
        </tr>  
        <tr>
            <th colspan="3"></th>
            <th colspan="2">IVA (17%)</th>
            <td >{{$superTotal*0.17}},00 MT</td>
        </tr>
        <tr>
          <th colspan="3"></th>
          <th colspan="2">Total Geral</th>
          <td >{{$superTotal+$superTotal*0.17}},00 MT</td>  
        </tr> 
       </tbody>
    </table> 

    </div>
    <a href="/projectos/relatorio/pdf/-{{$nrProjecto}}" target="_blank" class="text-uppercase btn btn-warning col-2">Imprimir PDF</a>
    <a href="/projectos/relatorio/excel/-{{$nrProjecto}}" target="_blank" class="text-uppercase btn btn-secondary col-2">Imprimir Excel</a>

</div>
<div>
  
</div>
