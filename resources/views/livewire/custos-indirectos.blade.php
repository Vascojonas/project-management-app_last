<div>
    <div class=" ">
        <h4> Despesas indirectas</h4>
        <div class="col-10">
           
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        @if (session()->has('codigoErro'))
             <span class="text-danger"> {{ session('codigoErro') }}</span>
        @endif
       
        @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="d-flex mt-0 mb-0 ">
            <div class="form-group row col-6  p-0 ">
                <div class="col-md-6 p-0">
                <input  class="form-control " type="number" id="codigo" name="codigo"  
                 placeholder="Codigo do serviço"  wire:model="nrProjecto"/>
                </div>
            </div>

        </div>
        
         
        <div class="">
            <button wire:click="voltar" class="btn btn-secondary col-3 offset-9">Voltar</button>
        </div>    
        <div class="row">
        </div>
        

            
            <div class="row">
                
                <div class="col-6">
                    <h4>Despesas</h4>
                    
                    <div class="form-group row mt-3">
                        <label for="despesa_inicial" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas inicial (DI) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control " {{($actividadeValida)?'':''}} type="number" id="despesa_inicial" name="despesa_inicial" wire:model="taxa_di"
                           />
             
                         </div>
                     </div>
         
                     <div class="form-group row mt-3">
                        <label for="administracao_local" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Administração local (AL) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="administracao_local" name="administracao_local" wire:model="taxa_al"
                          placeholder="" />
         
                         </div>
                     </div>
                     
                     <div class="form-group row mt-3">
                        <label for="administracao_central" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Administracao central (AC) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="administracao_central" name="administracao_central" wire:model="taxa_ac"
                          placeholder=""/>
         
                         </div>
                     </div>
                     
                     <div class="form-group row mt-3">
                        <label for="despesas_finaceiras" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas financeiras (DF) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="NUMBER" id="despesas_finaceiras"  name="despesas_finaceiras" wire:model="taxa_df"
                         placeholder=" "  />
                         </div>
                     </div>
                     <div class="form-group row mt-3">
                        <label for="despesas_manutencao" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas de Manutenção (DM) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control  "  type="NUMBER" id="despesas_manutencao"  name="despesas_manutencao" wire:model="taxa_dm"
                         placeholder=" "  />
                         </div>
                     </div>
    
                     <div class="form-group row mt-3">
                        <label for="riscos" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Riscos (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="NUMBER" id="riscos"  name="riscos" wire:model="taxa_riscos"
                         placeholder=" "  />
                         </div>
                     </div>
    
                     <div class="form-group row mt-3">
                        @if ($campo==1)
                        <input wire:keydown.Enter="fecharCampo()" wire:model="d1_txt"  type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="outras_despesas1" class="col-md-6 col-form-label bg-secondary" style="height:36px;">{{$d1_txt}}</label>
                        @endif
                         <div class="col-md-4 pr-0 ">
                         <input class="form-control "  {{($habilitar==1)?'':'readonly'}} type="NUMBER" id="outras_despesas1"  name="outras_despesas1" wire:model="d1_value"
                         placeholder=" "  />
                        </div>
                        <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(1)"
                        {{($actividadeValida)?'':'disabled '}} title="Edit"><i class="fa fa-edit"></i></button>
                     </div>
                     <div class="form-group row mt-3">
                        @if ($campo==2)
                            <input wire:keydown.Enter="fecharCampo()" wire:model="d2_txt" type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="outras_despesas2" class="col-md-6 col-form-label bg-secondary" style="height:36px;">{{$d2_txt}}</label>
                        @endif
                        
                         <div class="col-md-4 pr-0">
                         <input  class="form-control " {{($habilitar==2)?'':'readonly'}}  type="NUMBER" id="outras_despesas2"  name="outras_despesas2" wire:model="d2_value"
                         placeholder=" "  />
                         </div>
                        <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(2)"
                         {{($actividadeValida)?'':'disabled '}} title="Edit"><i class="fa fa-edit"></i></button>
    
                     </div>
                     <div class="form-group row mt-3">
                        @if ($campo==3)
                        <input wire:keydown.Enter="fecharCampo()" wire:model="d3_txt"  type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="outras_despesas3" class="col-md-6 col-form-label bg-secondary" style="height:36px;">{{$d3_txt}}</label>
                        @endif
                         <div class="col-md-4 pr-0">
                         <input class="form-control "  {{($habilitar==3)?'':'readonly'}} type="NUMBER" id="outras_despesas3"  name="outras_despesas3" wire:model="d3_value"
                         placeholder=" "  />
                         </div>
                        <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(3)" 
                         {{($actividadeValida)?'':'disabled '}}title="Edit"><i class="fa fa-edit"></i></button>
    
                     </div>
                     
                     
            
                </div>
                
                <div class="col-6">
                    <h4>Atributos e lucros</h4>
                    <div class="form-group row ">
                        <label for="iva" class="col-md-6 col-form-label bg-secondary" style="height:36px;">IVA (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="iva" name="iva" wire:model="taxa_iva"
                          placeholder="" />
             
                         </div>
                     </div>
         
                    
         
                     <div class="form-group row mt-3">
                        <label for="irps" class="col-md-6 col-form-label bg-secondary" style="height:36px;">IRPS</label>
                         <div class="col-md-6">
                         <input class="form-control "   type="number" id="irps" name="irps"
                          placeholder="" />
                            
                         </div>
                     </div>
                     <div class="form-group row mt-3">
                        <label for="outros_tributos1" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Outros tributos 1</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="outros_tributos1" name="outros_tributos1"
                          placeholder="" />
         
                         </div>
                     </div>
                     <div class="form-group row mt-3">
                        <label for="outros_tributos2"  class="col-md-6 col-form-label bg-secondary" style="height:36px;">Outros tributos 2</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="outros_tributos2" name="outros_tributos2"
                          placeholder="" />
         
                         </div>
                     </div>
                     <div class="form-group row mt-3">
                        <label for="outros_tributos3" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Outros tributos 3</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="outros_tributos3" name="outros_tributos3"
                          placeholder="" />
         
                         </div>
                     </div>
                    
    
                     <div class="form-group row mt-4 pr-2">
                        <div class="col-12 text-center bg-secondary border border-secondary"  >Lucro</div>
                        
                     </div>
    
                     <div class="form-group row mt-3">
                        <label for="lucro_bruto" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Lucro bruto (%)</label>
                         <div class="col-md-6">
                         <input class="form-control " type="text" id="lucro_bruto" name="lucro_bruto" wire:model="taxa_lucroBruto"
                          placeholder="" />
         
                         </div>
                     </div>
                     <div class="form-group row mt-3">
                        <label for="indutor_custo" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Indutor de custo (K)</label>
                         <div class="col-md-6">
                         <input class="form-control " type="text" id="indutor_custo" name="indutor_custo" wire:model="k"
                          placeholder="" />
         
                         </div>
                 
                     </div>
                     
                     <div class="form-group row mt-3 mr-1">
                         
                         <button wire:click="calcular" {{($actividadeValida)?'':'disabled '}} class="btn btn-warning col-4 ml-auto" >Recalcular</button>

                         @if ($custo)
                            <button wire:click="actualizarCusto"  {{($actividadeValida)?'':'disabled '}} class="btn btn-secondary col-4 ml-auto" >Actualizar</button>
                         @else
                         
                            <button wire:click="cadastrarCusto"  {{($actividadeValida)?'':'disabled '}} class="btn btn-secondary col-4 ml-auto" >Salvar</button>
                         @endif
                     </div>
                        
                     
                    
                     
                   
                       
                 
                  
                </div>
                
                
    
            </div>


      
        </div>
</div>
</body>
