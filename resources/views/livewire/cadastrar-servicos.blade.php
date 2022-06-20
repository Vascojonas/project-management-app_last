<div>
    


  
        <div class="col-10 offset-1 mt-3 ">
        <h4> Cadastrar Serviço</h4>
       
       
     <!--   <form  
            @if ($actualizar)
            wire:submit.prevent="actualizarServico"
                
            @else
            wire:submit.prevent="cadastrarServico"
            @endif 
        > -->
       <div class="form-group row ">
               <label for="codigo" class="col-md-3 col-form-label bg-secondary style="height:36px;">CODIGO:</label>
                <div class="col-md-8">
                <input class="form-control "  type="text" id="codigo" name="codigo"
                 placeholder="Digite o código da actividade" wire:model="codigo" />
                 @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="designacao" class="col-md-3 col-form-label bg-secondary" style="height:36px;">DESIGNAÇÃO:</label>
                <div class="col-md-8">
                <textarea class="form-control"   name="designacao" wire:model="designacao">

                </textarea>
                @error('designacao') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>


            <div class="form-group row mt-3">
               <label for="unidades" class="col-md-3 col-form-label bg-secondary" style="height:36px;">UNIDADE:</label>
                <div class="col-md-8">
                <input class="form-control "  type="text" id="unidades" name="unidades"
                 placeholder="Digite as unidades" wire:model="unidade"/>
                 @error('unidades') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="preco_unit" class="col-md-3 col-form-label bg-secondary" style="height:36px;">Coeficiente</label>
                 <div class="col-md-8">
                 <input class="form-control "  type="number" id="preco_unit"  name="coeficiente"
                 wire:model="coeficiente" />
                 </div>
             </div> 
            

            <div class="form-group row mt-3">
               <label for="preco_unit" class="col-md-3 col-form-label bg-secondary" style="height:36px;">PREÇO UNITÁRIO:</label>
                <div class="col-md-4">
                    <input class="form-control " type="NUMBER" id="preco_unit"  name="preco_unit"
                  placeholder="Digita o preço unitário" wire:keydown="calcular()" wire:keydown.Backspace="calcular()" wire:model="preco_unitario" />
                </div>
                <div class="col-md-4">
                    <input class="form-control "   type="NUMBER" id="preco_final"  name="preco_finaç"
                    placeholder="Preço final" wire:model="preco_final" />
                    
                </div>
             </div>

            <div class="form-group row mt-3">
                <label for="quantidade" class="col-md-3 col-form-label bg-secondary" style="height:36px;">QUANTIDADE:</label>
                 <div class="col-md-8">
                 <input class="form-control " type="text" id="quantidade" name="quantidade"
                  placeholder="Digite a quantidade" wire:model="quantidade"/>
                  @error('quantidade') <span class="text-danger">{{ $message }}</span> @enderror
 
                 </div>
             </div>
            
            <div class="row col-10 offset-1 p-0 ">
               @if ($actualizar)
               <button class="btn btn-warning col-4 ml-auto" wire:click="actualizarServico" >Actualizar</button>
                   
               @else
               <button class="btn btn-warning col-4 ml-auto" wire:click="cadastrarServico" >Salvar</button>
               @endif 
            </div>
       <!-- </form> -->  
        </div>
    
</div>
