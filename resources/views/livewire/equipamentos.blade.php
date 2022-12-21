<div>
        <div>
            @if (!$mo)
                @if (!$detalhesk)
                
                    <div class="col-12 mt-2">
                        @if (session()->has('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between mt-2 ">
                        <h4>Equipamentos</h4>
                    
                        <div class="d-flex justify-content-end mb-2 col-6  p-0">
                        <a href="/projectos/actividades/-{{$nrProjecto}}--{{$projecto_principal}}" class="btn btn-secondary col-3">Voltar</a>
                        <button wire:click="actualizar()" class="btn btn-warning col-3 ml-4">Actualizar</button>
                        </div>
                
                    </div>
                
                    <div class="d-flex ">
                
                        <div class=" p-0" style="width:60%">
                            <table class="table table-striped table-bordered table-secondary ">
                                <thead>
                                    <tr>
                                    <th rowspan="2" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1 w-50">DESIGNAÇÂO</th>
                                    <th  colspan="" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1">EQUIPAMENTO_PRÓPRIO</th>
                                    <th  colspan="" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1">EQUIPAMENTO_ALUGADO</th>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1 text-center" scope="col"  >CUSTOS DE EQUIPAMENTOS (MT/h)</th>
                                    <th class="pb-1 pt-1 mb-1 mt-1 text-center" scope="col"  >CUSTOS DE EQUIPAMENTOS (MT/h)</th>
                                    <tr>
                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Depreciação_Horária(Dh)</th>
                                    <td class="p-0" >             <input  readonly wire:click="habilitar(1)"  wire:model="dh" class="bg-light form-control-file m-0 " type="number" /></td>
                                    <td rowspan="12" class="p-0" ><input  class="bg-light form-control-file" wire:model="valorAluguel" type="number" /></td>
            
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Juros (Jh)</th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(2)" wire:model="jh"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Seguros (Sh) </th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(3)" wire:model="sh" class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                        
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Armazenamento (Ah) </th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(4)" wire:model="ah"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Pneus (Ph)</th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(5)" wire:model="ph"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Energia (Eh) </th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(6)" wire:model="eh"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row"> Combustível (Ch)</th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(7)" wire:model="ch"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Lubrificantes (Lh)</th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(8)" wire:model="lh"    class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Operador (MOh)</th>
                                    <td class="p-0" ><input readonly wire:click="mo()" wire:model="moh"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Manutenção (Mh)</th>
                                    <td class="p-0" ><input readonly wire:click="habilitar(10)" wire:model="mh"   class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    <tr>
                                    <th class="pb-1 pt-1 mb-1 mt-1" scope="row">Custo Total Produtivo</th>
                                    <td class="p-0" ><input  readonly wire:model="totalP" class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
            
                                    <tr>
                                        <th class="pb-1 pt-1 mb-1 mt-1" scope="row">Custo Total Improdutivo</th>
                                        <td class="p-0" ><input  readonly wire:model="totalI"  class="bg-light form-control-file m-0 " type="number" /></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                
                        <div class=" p-0 ml-auto" style="width: 38%">
                            <div class="col-12 p-0">

                                

                                @if ($campo===1)
                                    <div class="">
                                        <div class="">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">i (%)</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="ji">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vo (MT)</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="dvi">
                                            </div>
                                    
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Vr (MT)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="dr" >
                                            </div> 
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">n (h/ano)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="dn" >
                                            </div>     
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">a (ano)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="da" >
                                            </div>    
                                            <div class="text-right">
                                                <button wire:click="calcularCampo(1)" class="btn btn-secondary  ml-auto">Calcular</button>
                                            </div>
                                            
                                        </div>

                                        <div class="text-white p-0 bg-secondary mt-3">
                                            <div class="col-12">
                                                <img class="col-6" src="{{ asset('imagens/dh.png') }}">
                                            </div>
                                            <div>

                                                <h4>Onde:</h4>
                                                <p>
                                                    Dh- Depreciação horária <br/>
                                                    Vo- Valor de aquisição (MT) <br/>
                                                    Vr- Valor residual (MT)<br/> 
                                                    n- Vida útil (em anos) <br/> 
                                                    a – Horas de trabalho por ano
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                @endif
            
                                @if ($campo===2)

                                    <div class="">
                                        <div class="">
                                    
                                
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">i (%)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="ji" >
                                            </div> 
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">a (ano)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="ja" >
                                            </div>     
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Vo (MT)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="jvo" >
                                            </div>   
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Vr (MT)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="jvr" >
                                            </div> 
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">n (h/ano)</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="jn" >
                                            </div>        
                                            <div class="text-right">
                                                <button wire:click="calcularCampo(2)" class="btn btn-secondary  ml-auto">Calcular</button>
                                            </div>

                                        </div>

                                        <div class="mt-3 p-2 text-white bg-secondary">
                                            <div class="col-12">
                                                <img class="col-12" src="{{ asset('imagens/j.png') }}">
                                            </div>
                                            <div>

                                                <h4>Onde:</h4>
                                                <p class="text-white">
                                                    Jh- Juros o horária <br>
                                                    Vo- Valor de aquisição (MT) <br>
                                                    Vr- Valor residual (MT)<br>
                                                    n- Vida útil (em anos) <br>
                                                    i – taxa de juros anuais (%)  <br>
                                                    a – Horas de trabalho por ano (h/ano)<br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            @endif
            
            
                                @if ($campo===3)

                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vo (MT)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="svo" >
                                        </div>   
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Pa (%)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="spa" >
                                        </div> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">h (h)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="shh" >
                                        </div>        
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(3)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>
                                    </div>

                                    <div class=" text-white  bg-secondary mt-3 p-2">
                                        <div class="col-12">
                                            <img class="col-6" src="{{ asset('imagens/sg.jpeg') }}">
                                        </div>
                                        <div>

                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                Sh- custo do seguro horário <br>
                                                Vo- valor de aquisição<br>
                                                Po- prémio anual do seguro do equipamento <br>
                                                h- horas de trabalho
                                            </p>
                                        </div>
                                    </div>

                                @endif

                                @if ($campo===4)
                                    
                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">CMa </span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="acma" >
                                        </div>   
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">ha</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="aha" >
                                        </div> 
                                                
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(4)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>

                                    </div>

                                    <div class=" text-white  bg-secondary mt-3 p-2">
                                        <div class="col-12">
                                            <img class="col-12" src="{{ asset('imagens/a.jpeg') }}">
                                        </div>
                                        <div>

                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                CAh- custo armazenamento horário <br>
                                                CMA- valor mensal de armazenamento<br>
                                                Ha- prémio anual do seguro do equipamento <br>
                                                ha- horas de armazenamento;
                                            </p>
                                        </div>
                                    </div>
                                <div class="input-group mb-3">
                                @endif

                                @if ($campo===5)
                                    
                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">P (Un)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="pp" >
                                        </div>   
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Cp (MT)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="pcp" >
                                        </div> 

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vup (h)</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="pvup" >
                                        </div> 
                                                
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(5)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>

                                    </div>

                                    <div class=" text-white  bg-secondary mt-3 p-2">
                                        <div class="col-12">
                                            <img class="col-6" src="{{ asset('imagens/ph.jpeg') }}">
                                        </div>
                                        <div>

                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                Ph- Custo horario de pneus (MT/h) <br>
                                                P- Número de pneus do equipamento<br>
                                                Cp-Custo unitário do pneu <br>
                                                Vup- Vida útil do pneu;
                                            </p>
                                        </div>
                                    </div>
                                <div class="input-group mb-3">
                                @endif

                                @if ($campo===6)
                                    
                                <div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Hp</span>
                                        </div>
                                        <input type="number" class="form-control"
                                        wire:model="ehp" >
                                    </div>   
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Custo</span>
                                        </div>
                                        <input type="number" class="form-control"
                                        wire:model="ecusto" >
                                    </div> 
                                            
                                    <div class="text-right">
                                        <button wire:click="calcularCampo(6)" class="btn btn-secondary  ml-auto">Calcular</button>
                                    </div>

                                </div>

                                <div class=" text-white  bg-secondary mt-3 p-2">
                                    <div class="col-12">
                                        <img class="col-12" src="{{ asset('imagens/eh.jpeg') }}">
                                    </div>
                                    <div>

                                        <h4>Onde:</h4>
                                        <p class="text-white">
                                            Eh- Energia Eletrica (kw/h) <br>
                                            Custo- valor mensal de armazenamento<br>
                                            Ha-Custo de Energia (kw/h)<br>
                                            Hp- Potência;
                                        </p>
                                    </div>
                                </div>
                            <div class="input-group mb-3">
                            @endif
                                
                                @if ($campo==7)

                                    <div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">HP</span>
                                            </div>
                                            <input type="number" class="form-control"  
                                            aria-describedby="basic-addon1 " wire:model="chp">
                                        </div>
                
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">f</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="cf" >
                                        </div> 
                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">M</span>
                                            </div>
                                            <select class="form-control" wire:model="cm">
                                                <option value="">Selecione</option>
                                                <option value="0.15" >Diesel</option>
                                                <option value="0.23" >Gasolina</option>

                                            </select>
                                        </div>   
                            
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(7)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>
                                    </div>
                                    <div class="mt-3 p-2 text-white bg-secondary">
                                        <div class="col-12">
                                            <img class="col-12" src="{{ asset('imagens/c.png') }}">
                                        </div>
                                        <div >
                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                Ch- Combutivel <br>
                                                HP- Potencia <br>
                                                f- Factor Potencia<br>
                                                M- Motor<br>
                                            </p>
                                        </div>
                                    </div>
                                @endif
            
            
                                @if ($campo==8)
                                    <div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Hp</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="lhp">
                                            </div>
                    
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">h</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="lhh" >
                                            </div> 
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">c</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="lc" >
                                            </div>     
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">t</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                wire:model="lt" >
                                            </div>   
                                    </div>

                                    <div class="text-right">
                                        <button wire:click="calcularCampo(8)" class="btn btn-secondary  ml-auto">Calcular</button>
                                    </div>

                                    <div class="mt-3 p-2 text-white bg-secondary">
                                        <div class="col-6">
                                            <img src="{{ asset('imagens/l.png') }}">
                                        </div>
                                        <div >
                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                Q- Consumo em l/h <br>
                                                HP- Potencial do motor <br>
                                                t- Intervaldo de troca<br>
                                                c - Capacidade (litros) <br>
                                                
                                            </p>
                                        </div>
                                    </div>
                                    
                        
                                
                                @endif
            
                                @if ($campo==10)
                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span  wire:click="detalhesK()" class="input-group-text" id="basic-addon1">K</span>
                                            </div>
                                            <input type="number" readonly wire:click="detalhesK()" class="form-control" wire:model="mk" >
                                        
                                        </div> 
                                        
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vo</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="mvo">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">n</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="mn">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">h</span>
                                                </div>
                                                <input type="number" class="form-control"  
                                                aria-describedby="basic-addon1 " wire:model="mhh">
                                            </div>
                    
                                        
                                                    
                                            <div class="text-right">
                                                <button wire:click="calcularCampo(10)" class="btn btn-secondary  ml-auto">Calcular</button>
                                            </div>
                                    </div>

                                    <div class="mt-3 p-2 text-white bg-secondary" >
                                        <div class="col-12">
                                            <img class="col-6" src="{{ asset('imagens/m.jpeg') }}">
                                        </div>
                                        <div class="">
                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                Mk- custo horário de manutenção; 
                                            <br> Vo- valor de aquisição; 
                                            <br> n-vida útil do equipamento (em anos);
                                            <br> h- horas de trabalho
                                            <br> K-coeficiente de custo de manutenção apresentado na tabela
                                                
                                            </p>
                                        </div>
                                        
                                    </div>
                                @endif
                            </div>
                        </div> 
                </div>
                @endif
            @endif
        </div>

       <div class="">

           @if ($detalhesk)
                <h4 class="text-white">Custo de manutenção coeficiente</h4>
                
                <div class="d-flex">

                    <div class="col-6 " >
                        <div class="d-flex">
                            <div class="col-12  p-0">

                                <div class="d-flex   p-0">
                                    <table class="table table-borderless table-dark m-1 col-3">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">HORAS DE USO</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">1.000</td>
                                                <td class="p-0">0.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,0.5)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">2.000</td>
                                                <td class="p-0">0.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,0.5)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">3.000</td>
                                                <td class="p-0">0.6</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,0.6)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">4.000</td>
                                                <td class="p-0">0.7</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,0.7)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">5.000</td>
                                                <td class="p-0">0.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,0.9)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">6.000</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">8.000</td>
                                                <td class="p-0">1.3</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,1.3)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">10.000</td>
                                                <td class="p-0">1.6</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,1.6)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">12.000</td>
                                                <td class="p-0">1.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,1.9)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">15.000</td>
                                                <td class="p-0">2.3</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,2.3)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">20.000</td>
                                                <td class="p-0">3.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="horas_uso" wire:click="calcularK(1,3)"></td>
                                            </tr>
                    
                                        </tbody>
                                    </table>
        
                                    <table class="table table-borderless table-dark m-1 col-3">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">VIDA ÚTIL EM ANOS</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">1</td>
                                                <td class="p-0">0.6</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,0.6)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">2</td>
                                                <td class="p-0">0.7</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,0.7)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">3</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,0.8)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">4</td>
                                                <td class="p-0">0.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,0.9)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">5</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">6</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">7</td>
                                                <td class="p-0">1.1</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1.1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">8</td>
                                                <td class="p-0">1.2</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1.2)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">9</td>
                                                <td class="p-0">1.3</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1.3)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">10</td>
                                                <td class="p-0">1.4</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,1.4)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">15</td>
                                                <td class="p-0">2.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="vida_util" wire:click="calcularK(2,2)"></td>
                                            </tr>
                    
                                        </tbody>
                                    </table>
        
                                    <div class="col-6 p-0 m-0">
        
                                        <table class="table table-borderless table-dark m-1 col-10">
                                            <thead class="thead-dark">
                                                <tr width=''>
                                                    <th  class="p-0 text-center" colspan="3">TIPO DE SERVIÇO</th>
                                                </tr>
                                            </thead>
                        
                                            <tbody>
                                                <tr>
                                                    <td class="p-0">Mina ou Pedreira</td>
                                                    <td class="p-0">0.8</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="tipo_servico" wire:click="calcularK(3,0.8)"></td>
                                                </tr>
                        
                                                <tr>
                                                    <td class="p-0">Construção Geral</td>
                                                    <td class="p-0">1.0</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="tipo_servico" wire:click="calcularK(3,1)"></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0">Aluguel a Terceiros</td>
                                                    <td class="p-0">1.4</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="tipo_servico" wire:click="calcularK(3,1.4)"></td>
                                                </tr>
                                            </tbody>
                                        </table>
        
                                        <table class="table table-borderless table-dark m-1 col-10">
                                            <thead class="thead-dark">
                                                <tr width=''>
                                                    <th  class="p-0 text-center" colspan="3">Temperatura</th>
                                                </tr>
                                            </thead>
                        
                                            <tbody>
                                                <tr>
                                                    <td class="p-0">Muito Quente( >40 C)</td>
                                                    <td class="p-0">1.3</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="temperatura" wire:click="calcularK(4,1.3)"></td>
                                                </tr>
                        
                                                <tr>
                                                    <td class="p-0">Quente(30 a 40 C)</td>
                                                    <td class="p-0">1.1</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="temperatura" wire:click="calcularK(4,1.1)"></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0">Médio(10 a 30 C)</td>
                                                    <td class="p-0">1.0</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="temperatura" wire:click="calcularK(4,1)"></td>
                                                </tr>
        
                                                <tr>
                                                    <td class="p-0">Frio(< 10 C)</td>
                                                    <td class="p-0">1.3</td>
                                                    <td class="py-0 "><input type="radio" id="css" name="temperatura" wire:click="calcularK(4,1.3)"></td>
                                                </tr>
                                            </tbody>
                                        </table>
        
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="d-flex ">
                            <div class="col-12  p-0">

                                <div class="d-flex   p-0">
                                    <table class="table table-borderless table-dark m-1 col-4">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">QUALIDADE DO EQUIPAMENTO</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">De primeira</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_equipamento" wire:click="calcularK(5,0.8)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Medio</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_equipamento" wire:click="calcularK(5,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Ruim</td>
                                                <td class="p-0">1.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_equipamento" wire:click="calcularK(5,1.5)"></td>
                                            </tr>
                                            
                    
                                        </tbody>
                                    </table>
        
                                    <table class="table table-borderless table-dark m-1 col-4">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">CONHECIMENTO DO SERVIÇO</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Grande</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="conhecimento_servico" wire:click="calcularK(6,0.8)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Medio</td>
                                                <td class="p-0">0.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="conhecimento_servico" wire:click="calcularK(6,0.9)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Pouco</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="conhecimento_servico" wire:click="calcularK(6,1)"></td>
                                            </tr>
                                            
                    
                                        </tbody>
                                    </table>
        
                                    <table class="table table-borderless table-dark m-1 col-3">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">RITMO DE TRABALHO</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Folgado</td>
                                                <td class="p-0">0.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="ritmo_trabalho" wire:click="calcularK(7,0.9)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Medio</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="ritmo_trabalho" wire:click="calcularK(7,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Com Pressa</td>
                                                <td class="p-0">1.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="ritmo_trabalho" wire:click="calcularK(7,1.5)"></td>
                                            </tr>
                                            
                    
                                        </tbody>
                                    </table>
        
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="col-6 " >
                        <div class="d-flex">
                            <div class="col-12  p-0">

                                <div class="d-flex   p-0">
                                    <table class="table table-borderless table-dark m-1 col-6">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">MANUTENÇÃO</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Excelente</td>
                                                <td class="p-0">0.6</td>
                                                <td class="py-0 "><input type="radio" id="css" name="manutencao" wire:click="calcularK(8,0.6)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Boa</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="manutencao" wire:click="calcularK(8,0.8)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Media</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="manutencao" wire:click="calcularK(8,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Ruim</td>
                                                <td class="p-0">1.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="manutencao" wire:click="calcularK(8,1.5)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Inexistente</td>
                                                <td class="p-0">3.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="manutencao" wire:click="calcularK(8,3)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                    <table class="table table-borderless table-dark m-1 col-6">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">QUALIDADE DO OPERADOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Excelente</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_operdador" wire:click="calcularK(9,0.8)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Boa</td>
                                                <td class="p-0">0.9</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_operdador" wire:click="calcularK(9,0.9)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Media</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_operdador" wire:click="calcularK(9,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Ruim</td>
                                                <td class="p-0">1.2</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_operdador" wire:click="calcularK(9,1.2)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Péssima</td>
                                                <td class="p-0">2.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="qualidade_operdador" wire:click="calcularK(9,2)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex ">
                            <div class="col-12  p-0">

                                <div class="d-flex   p-0">
                                    <table class="table table-borderless table-dark m-1 col-6">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">Tipo</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Guindaste</td>
                                                <td class="p-0">0.5</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,0.5)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Caminhão comum</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,0.8)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Fora-de-estrada</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Escavadeira</td>
                                                <td class="p-0">1.4</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,1.4)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Carregadeira</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,1)"></td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Motoescreiper</td>
                                                <td class="p-0">1.1</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,1.1)"></td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Trator de esteira</td>
                                                <td class="p-0">1.2</td>
                                                <td class="py-0 "><input type="radio" id="css" name="tipo" wire:click="calcularK(10,1.2)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                    <table class="table table-borderless table-dark m-1 col-6">
                                        <thead class="thead-dark">
                                            <tr width=''>
                                                <th  class="p-0 text-center" colspan="3">CONDIÇÕES DO TRABALHO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="p-0">Em espera</td>
                                                <td class="p-0">0.4</td>
                                                <td class="py-0 "><input type="radio" id="css" name="condicao_trabalho" wire:click="calcularK(11,0.4)"></td>
                                            </tr>
                    
                                            <tr>
                                                <td class="p-0">Leves</td>
                                                <td class="p-0">0.8</td>
                                                <td class="py-0 "><input type="radio" id="css" name="condicao_trabalho" wire:click="calcularK(11,0.8)"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="p-0">Medias</td>
                                                <td class="p-0">1.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="condicao_trabalho" wire:click="calcularK(11,1)"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-0">Pesadas</td>
                                                <td class="p-0">1.4</td>
                                                <td class="py-0 "><input type="radio" id="css" name="condicao_trabalho" wire:click="calcularK(11,1.4)"></td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Severas</td>
                                                <td class="p-0">2.0</td>
                                                <td class="py-0 "><input type="radio" id="css" name="condicao_trabalho" wire:click="calcularK(11,2)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                </div>
                                <div class="col-12">
                                    <img class="" src="{{ asset('imagens/coeficiente.jpg') }}">
                                </div>
                                <div class="input-group mt-3 p-0">
                                    <div class="input-group-prepend">
                                        <span   class="input-group-text bg-warning" id="basic-addon1">Valor de K</span>
                                    </div>
                                    <input type="number" readonly class="form-control" wire:model="mk" >
                                
                                </div> 

                                <div class="d-flex justify-content-end mt-3 p-0">
                                    
                                    <button wire:click="detalhesK()" class="btn btn-secondary ">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                
            @endif
       
            

            @if ($mo)
            <div>
                <div class="col-12 mt-2">
                  @if (session()->has('success'))
                      <div class="alert alert-success text-center">
                          {{ session('success') }}
                      </div>
                  @endif
                </div>
                <div class="d-flex justify-content-between mt-2 ">
                  <h4>Mão de obra</h4>
               
                  <div class="d-flex justify-content-end mb-2 col-6  p-0">
                   <button wire:click="mo()" class="btn btn-warning col-3 ml-4">Fechar</button>
                 </div>
              
                </div>
              
                 <div class="d-flex ">
              
                  <div class=" p-0" style="width:60%">
                      <table class="table table-striped table-bordered table-secondary ">
                          <thead>
                            <tr>
                              <th rowspan="2" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1 w-50">DESCRIMINAÇÃO</th>
                              <th colspan="3" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1">GRUPOS</th>
                            </tr>
                              <th class="pb-1 pt-1 mb-1 mt-1 text-center" scope="col"  >A</th>
                              <th class="pb-1 pt-1 mb-1 mt-1 text-center" scope="col"  >B</th>
                              <th class="pb-1 pt-1 mb-1 mt-1 text-center" scope="col"  >C</th>
                            <tr>
                  
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">INSS</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(1)" wire:model="inss" readonly class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(2)" class="bg-light form-control-file " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(3)" class="bg-light form-control-file" type="number" /></td>
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">IRPS</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(4)" wire:model="irps" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(5)" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(6)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Férias anuais </th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(7)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(8)" wire:click="habilitarMo(8)" wire:model="feriaAnual" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(9)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                  
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Repousos semanais remunerado </th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(10)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(11)"  wire:model="campoRepousoSemanal" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(12)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Faltas justificadas  </th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(13)"  class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(14)" wire:model="campoFaltasJustificadas" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(15)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriados Nacionais </th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(16)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(17)" wire:model="campoFeriados" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(18)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriado Municipais </th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(19)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(20)" wire:model="campoFeriadosCidade" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(21)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row"> 13º salário</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(22)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(23)" wire:model="campo13SalarioB" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(24000)" wire:model="campo13SalarioC" class="bg-light form-control-file" type="number" /></td>
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total Parcial</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(25)" wire:model="campoTotalParcialA"  class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(26)" wire:model="campoTotalParcialB" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(33)" wire:model="campoTotalParcialC" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Incidência Cumulativa (A sobre B)</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(28)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(29)" wire:model="campoIncidenciaAcumulativa" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(30)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total dos Encargos</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(31)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(32)" wire:model="campoTotalEncargosB" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(3300)" wire:model="campoTotalEncargosC" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            <tr>
                              <th class="pb-1 pt-1 mb-1 mt-1" scope="row">Percentagem (%)</th>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(34)" class="bg-light form-control-file m-0 " type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(35)" wire:model="campoPercetagem" class="bg-light form-control-file" type="number" /></td>
                              <td class="p-0" ><input readonly wire:click="habilitarMo(36)" class="bg-light form-control-file" type="number" /></td>
              
                            </tr>
                            
                          </tbody>
                      </table>
                  </div>
              
                  <div class=" p-0 ml-auto" style="width: 38%">
                    <div class="col-12 p-0">
                      
                    @if ($campoMo===4)
                      <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Salário Bruto</span>
                              </div>
                              <input type="number" class="form-control" placeholder="Digite o  sálario Bruto" aria-label="salario"
                              aria-describedby="basic-addon1 " wire:model="salarioBruto"  >
                            </div>
                  
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Dependentes</span>
                                </div>
                                <input type="number" class="form-control" placeholder="Digite o número de dependentes" 
                                aria-label="salario" aria-describedby="basic-addon1" wire:model="nrDependentes"  >
                          </div>
                  
                      </div>
                        
                      <div class="text-right">
                          <button wire:click="salarioLiquido" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                      </div>
                    @else
                          @if ($campoMo===8)
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Ferias anuais</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                            aria-describedby="basic-addon1 " wire:model="feriaAnualDia"  >
                          </div>
                
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                              </div>
                              <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                              aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  >
                        </div>    
                        <div class="text-right">
                          <button wire:click="feriasAnual" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                      </div>
                          @else
              
                              @if ($campoMo===11)
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">Repouso Semanal</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                    aria-describedby="basic-addon1 " wire:model="valorRepousoSemanal"  >
                                  </div>
                            
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                      </div>
                                      <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                      aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  >
                                </div>    
                                <div class="text-right">
                                  <button wire:click="calcularCampoMo(11)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                              </div>
                              @else
                                  @if ($campoMo===14)
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Faltas Justificadas</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                        aria-describedby="basic-addon1 " wire:model="valorFaltasJustificadas" >
                                      </div>
                                
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                          </div>
                                          <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                          aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual" >
                                    </div>    
                                    <div class="text-right">
                                      <button wire:click="calcularCampoMo(14)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                  </div>
                                  @else
                                        @if ($campoMo===17)
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Feriados</span>
                                          </div>
                                          <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                          aria-describedby="basic-addon1 " wire:model="valorFeriados" >
                                        </div>
                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                            aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual" >
                                      </div>    
                                      <div class="text-right">
                                        <button wire:click="calcularCampoMo(17)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                    </div>
                                    @else
                                            @if ($campoMo===20)
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Feriado por dia da cidade</span>
                                              </div>
                                              <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                              aria-describedby="basic-addon1 " wire:model="valorFeriadosCidade"  >
                                            </div>
                                      
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                                aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  >
                                          </div>    
                                          <div class="text-right">
                                            <button wire:click="calcularCampoMo(20)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                        </div>
                                        @else
                                                  @if ($campoMo===23)
                                                  <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">Dias do mês</span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                                    aria-describedby="basic-addon1 " wire:model="valorDiasMes" >
                                                  </div>
                                            
                                                  <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                                      </div>
                                                      <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                                      aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampoMo(23)">
                                                </div>    
                                                <div class="text-right">
                                                  <button wire:click="calcularCampoMo(23)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                              </div>
                                              @else
                                                          @if ($campoMo===33)
              
                                                          <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                              <span class="input-group-text" id="basic-addon1">Anos de Trabalho</span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Digite anos de trabalhos" aria-label="ferias"
                                                            aria-describedby="basic-addon1 " wire:model="valorAnosTrabalho" >
                                                          </div>
              
                                                          <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                              <span class="input-group-text" id="basic-addon1">Salário</span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                                            aria-describedby="basic-addon1 " wire:model="salario"  >
                                                          </div>
                                                    
                                                          <div class="input-group mb-3">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                                              </div>
                                                              <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                                              aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  >
                                                        </div>    
                                                        <div class="text-right">
                                                          <button wire:click="calcularCampoMo(33)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                                      </div>
                                                      @else
                                                      @if ($campoMo===330)
              
                                                      <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon1">Anos de Trabalho</span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Digite anos de trabalhos" aria-label="ferias"
                                                        aria-describedby="basic-addon1 " wire:model="valorAnosTrabalho"  >
                                                      </div>
              
              
              
                                                      <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon1">Salário</span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                                        aria-describedby="basic-addon1 " wire:model="salario"  >
                                                      </div>
                                                
                                                         
                                                    <div class="text-right">
                                                      <button wire:click="calcularCampoMo(330)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                                  </div>
                                                  @else
                                                  
                                              @endif
                                                      
                                                  @endif
                                              @endif
                                            
                                        @endif
                                    @endif
                                 @endif
                              @endif
                              
                          @endif
                        
                    @endif
   
                   
                  </div>
                  
                </div>
              </div>
              
            @endif
       
        </div>

</div>



    
    