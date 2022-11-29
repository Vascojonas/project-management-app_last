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
                        <label data-legenda="di"  for="despesa_inicial" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas inicial (DI) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control " {{($actividadeValida)?'':''}} type="number" onclick="despesaInicial(event)" id="despesa_inicial" name="despesa_inicial" wire:model="taxa_di"
                           />
             
                         </div>
                     </div>
                     <div id="di" class="bg-white text-dark d-none">
                        Despesa Inicial (% DI) é a percentagem da despesa que a empresa incorre inicialmente 
                        antes de dar inicio aos trabalhos para a contratação pública. 
                    </div>
         
                     <div class="form-group row mt-3">
                        <label data-legenda="al"  for="administracao_local" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Administração local (AL) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control"   type="number" id="administracao_local" onclick="despesaLocal(event)" name="administracao_local" wire:model="taxa_al"
                          placeholder="" />
         
                         </div>
                     </div>
                     <div id="al" class="bg-white text-dark d-none">
                        Administração Local (% AL) (estaleiro da obra) é a percentagem entendida como 
                    despesas que garante a direcção e a fiscalização técnica da produção do estaleiro da obra.
                </div>
                     
                     <div class="form-group row mt-3">
                        <label data-legenda="ac" for="administracao_central" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Administracao central (AC) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="number" id="administracao_central"onclick="administracaoCentral(event)" name="administracao_central" wire:model="taxa_ac"
                          placeholder=""/>
         
                         </div>
                     </div>
                     <div id="ac" class="bg-white text-dark d-none">
                        Administração central (% AC) é a percentagem da estrutura necessária para execução 
                        das actividades de direção geral da empresa (áreas administrativa, financeira, contábil, 
                        técnica, etc.).  
                    </div>
                     
                     <div class="form-group row mt-3">
                        <label data-legenda="df"  for="despesas_finaceiras" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas financeiras (DF) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control "  type="NUMBER" id="despesas_finaceiras" onclick="despesaFinaceira()"  name="despesas_finaceiras" wire:model="taxa_df"
                         placeholder=" "  />
                         </div>
                     </div>
                     <div id="df" class="bg-white text-dark d-none">
                        Despesa Financeira (% DF) é a defasagem entre o momento do desembolso e o 
                        momento do recebimento da medição, existe inevitavelmente uma perda monetária. Caso 
                        o empreiteiro tenha recebido um adiantamento, nos termos do n.o 3 do artigo 219 do 
                        Decreto n.o 5/2016 de 8 de Março. Caso o empreiteiro receba o adiantamento, o custo 
                        financeiro é zero
                    </div>
                     <div class="form-group row mt-3">
                        <label onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="dm"  for="despesas_manutencao" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesas de Manutenção (DM) (%)</label>
                         <div class="col-md-6">
                         <input class="form-control  "  type="NUMBER" id="despesas_manutencao"  name="despesas_manutencao" wire:model="taxa_dm"
                         placeholder=" "  />
                         </div>
                     </div>
                     <div id="dm" class="bg-white text-dark d-none">
                        Despesa de Manutenção (%DM) é a percentagem que traduz a verba destinada a 
                        manutenção da obra durante o período da garantia conforme previsto nos termos do 
                        artigo 245o do Decreto n.o 5/2016 de 8 de Março.
                      </div>

    
                     <div id="ri" class="form-group row mt-3">
                        <label  data-legenda="ri" for="riscos" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Riscos (%)</label>
                         <div class="col-md-6">
                         <input class="form-control " onclick="riscos()"  type="NUMBER" id="riscos"  name="riscos" wire:model="taxa_riscos"
                         placeholder=" "  />
                         </div>
                     </div>

    
                     <div class="form-group row mt-3">
                        @if ($campo==1)
                        <input wire:keydown.Enter="fecharCampo()" wire:model="d1_txt"  type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="monomento" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Emolumento (%)</label>
                        @endif
                         <div class="col-md-6 ">
                         <input class="form-control "  type="NUMBER" id="monomento"  name="outras_despesas1" wire:model="d1_value"
                         placeholder=" "  />
                        </div>
                        {{-- <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(1)"
                        {{($actividadeValida)?'':'disabled '}} title="Edit"><i class="fa fa-edit"></i></button> --}}
                     </div>
                     <div class="form-group row mt-3">
                        @if ($campo==2)
                            <input wire:keydown.Enter="fecharCampo()" wire:model="d2_txt" type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="outras_despesas2" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesa 1 (%)</label>
                        @endif
                        
                         <div class="col-md-6 ">
                         <input  class="form-control " {{($habilitar==2)?'':'readonly'}}  type="NUMBER" id="outras_despesas2"  name="outras_despesas2" wire:model="d2_value"
                         placeholder=" "  />
                         </div>
                        {{-- <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(2)"
                         {{($actividadeValida)?'':'disabled '}} title="Edit"><i class="fa fa-edit"></i></button> --}}
    
                     </div>
                     <div class="form-group row mt-3">
                        @if ($campo==3)
                        <input wire:keydown.Enter="fecharCampo()" wire:model="d3_txt"  type="text" class="col-md-6 col-form-label bg-secondary" style="height:36px;"/>
                        @else
                            <label for="outras_despesas3" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Despesa 2 (%)</label>
                        @endif
                         <div class="col-md-6">
                         <input class="form-control "  {{($habilitar==3)?'':'readonly'}} type="NUMBER" id="outras_despesas3"  name="outras_despesas3" wire:model="d3_value"
                         placeholder=" "  />
                         </div>
                        {{-- <button class="btn col-1 ml-4  btn-circle btn-secondary m-0 btn-outline-light" wire:click="editarCampo(3)" 
                         {{($actividadeValida)?'':'disabled '}}title="Edit"><i class="fa fa-edit"></i></button> --}}
    
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
                     <div class="form-group row mt-3 mb-2">
                        <label for="indutor_custo" class="col-md-6 col-form-label bg-secondary" style="height:36px;">Indutor de custo (K)</label>
                         <div class="col-md-6">
                         <input class="form-control " readonly type="text" id="indutor_custo" name="indutor_custo" wire:model="k"
                          placeholder="" />
         
                         </div>
                         <div class="m-0 mt-1">
                            <img src="{{ asset('imagens/legendas/k.png') }}" alt="" style="width: 40.6vw; height:65px">
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
{{-- 
//emolumento --}}
<div class="card-body  modal-hidden">
    <button type="hidden" id="btn" data-toggle="modal" data-target=".bd-example-modal-lg"></button>

    <div data-backdrop="static" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Emolumento</h5>
                    <button onclick="hiddenModal()"  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Valor do trabalho</label>
                                <input type="number" class="form-control" id="valor_emolumento">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Percetual <span id="percentual"><span> </label>
                                <input type="text" class="form-control" id="emolumento_percentual">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- //custo indirecti --}}
<div class="card-body modal-hidden">
    <button type="hidden" id="btn-di" data-toggle="modal" data-target=".bd-di-modal-lg"></button>

    <div data-backdrop="static" class="modal fade bd-di-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" >
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Dispesa inicial</h5>
                    <button onclick="hiddenModal()" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Valor de CD</label>
                                <input type="number" onkeyup="calcularDi()" class="form-control" id="di-cd">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Banco % </label>
                                <input type="text" onkeyup="calcularDi()"   class="form-control" id="di-banco">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Resultado </label>
                                <input type="text" class="form-control" readonly id="di-resultado">
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <img src="{{ asset('imagens/legendas/di.png') }}" alt="" style="width: 50vw; height:auto">
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- //Administração local --}}
<div class="card-body modal-hidden">
    <button type="hidden" id="btn-al" data-toggle="modal" data-target=".bd-al-modal-lg"></button>

    <div data-backdrop="static" class="modal fade bd-al-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Administração local (AL) </h5>
                    <button onclick="hiddenModal()"  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Valor de AL</label>
                                <input type="number" onkeyup="calcularAl()" class="form-control" id="al-al">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">valor do CD </label>
                                <input type="text" onkeyup="calcularAl()"   class="form-control" id="al-">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Resultado </label>
                                <input type="text" class="form-control" readonly id="al-resultado">
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <img src="{{ asset('imagens/legendas/al.png') }}" alt="" style="width: 50vw; height:auto">
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- //AAdministracao central (AC) --}}
<div class="card-body modal-hidden">
    <button type="hidden" id="btn-ac" data-toggle="modal" data-target=".bd-ac-modal-lg"></button>

    <div data-backdrop="static" class="modal fade bd-ac-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Administracao central (AC) </h5>
                    <button onclick="hiddenModal()"  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Valor de AC</label>
                                <input type="number" onkeyup="calcularAc()" class="form-control" id="ac-ac">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">valor do CD </label>
                                <input type="text" onkeyup="calcularAc()"   class="form-control" id="ac-canual">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Resultado </label>
                                <input type="text" class="form-control" readonly id="ac-resultado">
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <img src="{{ asset('imagens/legendas/ac.png') }}" alt="" style="width: 50vw; height:auto">
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
    

{{-- Despesas financeiras (DF)  --}}
<div class="card-body modal-hidden">
    <button  type="hidden" id="btn-df" data-toggle="modal" data-target=".bd-df-modal-lg"></button>

    <div class="modal fade bd-df-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Despesas financeiras (DF)  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="hiddenModal()" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Valor de i</label>
                                <input type="number" onkeyup="calcularDf()" class="form-control" id="df-i">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">valor do n </label>
                                <input type="text" onkeyup="calcularDf()"   class="form-control" id="df-n">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Resultado </label>
                                <input type="text" class="form-control" readonly id="df-resultado">
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <img src="{{ asset('imagens/legendas/df.png') }}" alt="" style="width: 50vw; height:auto">
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- Riscos  --}}
<div class="card-body modal-hidden">
    <button  type="hidden" id="btn-ri" data-toggle="modal" data-target=".bd-ri-modal-lg"></button>

    <div class="modal fade bd-ri-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Riscos  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="hiddenModal()" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('imagens/risco.png') }}" alt="" width="98%">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="floating-label" for="Email">Porcentagem do risco</label>
                                <input type="number" onkeyup="inputRisco(event)"  class="form-control" id="risco_input">
                            </div>

                            <div class="row px-2">
                                <div class="form-check col-2 ">
                                    <input data-risco="0.5" class="form-check-input check" type="radio"  onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault1" >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      0.5%
                                    </label>
                                </div>
                                  <div class="form-check col-2 ">
                                    <input data-risco="1.0" class="form-check-input check" type="radio" onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      1.0%
                                    </label>
                                  </div>

                                  <div class="form-check col-2 ">
                                    <input data-risco="1.5" class="form-check-input check" type="radio" onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      1.5%
                                    </label>
                                  </div>
                                  <div class="form-check col-2 ">
                                    <input data-risco="2.5" class="form-check-input check" type="radio" onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      2.5%
                                    </label>
                                  </div>
                                  <div class="form-check col-2 ">
                                    <input data-risco="3.0" class="form-check-input check" type="radio" onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      3.0%
                                    </label>
                                  </div>
                                  <div class="form-check col-2 ">
                                    <input data-risco="5.0" class="form-check-input check" type="radio" onclick="checkRisco(event)"  name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      5.0%
                                    </label>
                                  </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>

                </div>
            </div> 
        </div>
    </div>
</div>