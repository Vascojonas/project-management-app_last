<div>
   

    <form 
    @if ($edit)
        wire:submit.prevent="actualizarProjecto"
    @else
      wire:submit.prevent="cadastrarProjecto"
    @endif
    >
        <div class="col-10 offset-1 mt-3">
        
        <div clas="row">
        <h4> Cadastrar projecto</h4>
            <div class="col-10">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
            
            <div class="form-group row mt-3">
               <label for="nrProjecto" class="col-md-3 col-form-label bg-secondary" style="height:36px;">PROJECTO Nº:</label>
                <div class="col-md-8">
                <input class="form-control " type="number" id="nrProjecto" name="nrProjecto" wire:model="nrProjecto"
                 placeholder="Digite o número do projecto" />
                 @error('nrProjecto') <span class="text-danger">{{ $message }}</span> @enderror
                 
                 @if (session()->has('codigoErro'))
                     <span class="text-danger"> {{ session('codigoErro') }}</span>
                @endif               
             </div>
            </div>

            <div class="form-group row mt-3">
                <label for="descricao" class="col-md-3 col-form-label bg-secondary" style="height:36px;">DESCRIÇÃO:</label>
                <div class="col-md-8">
                <textarea class="form-control" placeholder="Digite a descrição do projecto" name="descricao" wire:model="descricao">

                </textarea>
                @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="form-group row mt-3">
               <label for="contratante" class="col-md-3 col-form-label bg-secondary" style="height:36px;">CONTRATANTE:</label>
                <div class="col-md-8">
                <input class="form-control " type="text" id="contratante" name="contratante" wire:model="contratante"
                 placeholder="Digite o nome  do contratante" />
                 @error('contratante') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="form-group row mt-3">
               <label for="localizacao" class="col-md-3 col-form-label bg-secondary" style="height:36px;">LOCALIZAÇÃO:</label>
                <div class="col-md-8">
                <input class="form-control " type="text" id="localizacao" name="localizacao" wire:model="localizacao"
                 placeholder="Digite a localização do projecto" />
                 @error('localizacao') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="form-group row mt-3">
               <label for="prazo" class="col-md-3 col-form-label bg-secondary" style="height:36px;">PRAZO:</label>
                <div class="col-md-8">
                <input class="form-control " type="date" id="prazo" value="dd/mm/yyyy" name="prazo" wire:model="prazo"/>
                @error('prazo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            @if ($edit)
            <div class="form-group row mt-3">
               <label for="prazo" class="col-md-3 col-form-label bg-secondary" style="height:36px;">Quantidade</label>
                <div class="col-md-8">
                <input class="form-control " type="number" id="prazo"  name="quantidade" wire:model="quantidade"/>
                
                </div>
            </div>
                
            @endif
            
            <div class="row col-10 offset-1 p-0 ">
                @if ($edit)
                  <button class="btn btn-warning col-4 ml-auto" >Actualizar</button>
                @else
                    <button class="btn btn-warning col-4 ml-auto" >Salvar</button>
                @endif
                
            </div>  
        </div>

    </form>
</div>
