<div>
        <div>

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
                    <a href="/projectos/actividades/-{{$nrProjecto}}-{{$projecto_principal}}" class="btn btn-secondary col-3">Voltar</a>
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
                                <td class="p-0" ><input readonly wire:click="habilitar(9)" wire:model="moh"  class="bg-light form-control-file m-0 " type="number" /></td>
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
                            @if ($campo==1)
                                <div class="d-flex">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Vo</span>
                                            </div>
                                            <input type="number" class="form-control"  
                                            aria-describedby="basic-addon1 " wire:model="dvi">
                                        </div>
                                
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vr</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="dr" >
                                        </div> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">n</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="dn" >
                                        </div>     
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">h</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="dhoras" >
                                        </div>    
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(1)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>
                                        
                                    </div>

                                    <div class="col-6 text-white p-0">
                                        <h4>Onde:</h4>
                                        <p>
                                            Dh- Depreciação horária <br>
                                            Vo - Valor de aquisição(mts) <br/>
                                            Vr - Valor de Residual<br/>
                                            n- Vida útil e anos <br/>
                                            a- Horas/ano<br/>
                                        </p>

                                    </div>

                                </div>
                            @endif
        
                            @if ($campo==2)

                                <div class="d-flex">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Im</span>
                                            </div>
                                            <input type="number" class="form-control"  
                                            aria-describedby="basic-addon1 " wire:model="jim">
                                        </div>
                            
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">i</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="ji" >
                                        </div> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">a</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="ja" >
                                        </div>     
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vo</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="jvo" >
                                        </div>   
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Vr</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="jvr" >
                                        </div> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">n</span>
                                            </div>
                                            <input type="number" class="form-control"
                                            wire:model="jn" >
                                        </div>        
                                        <div class="text-right">
                                            <button wire:click="calcularCampo(2)" class="btn btn-secondary  ml-auto">Calcular</button>
                                        </div>

                                    </div>

                                    <div class="col-6 text-white">
                                        <h4>Onde:</h4>
                                        <p class="text-white">
                                            jh- Juros horarios <br>
                                            V - Valor de aquisição(mts) <br/>
                                            Vr - Valor de Residual<br/>
                                            Im - Investimento medio<br/>
                                            i - taxa anual de juros<br>

                                            n- Vida útil e anos <br/>
                                            a- Horas de utilizacao anual<br/>
                                        </p>
                                    </div>
                                </div>
                           @endif
        
        
                            @if ($campo==3)
                                
                            <div class="input-group mb-3">
                                    <div>
    
    
                                        
                                        <div class="col-6 text-white">
                                            <h4>Onde:</h4>
                                            <p class="text-white">
                                                jh- Juros horarios <br>
                                                V - Valor de aquisição(mts) <br/>
                                                Vr - Valor de Residual<br/>
                                                Im - Investimento medio<br/>
                                                i - taxa anual de juros<br>
    
                                                n- Vida útil e anos <br/>
                                                a- Horas de utilizacao anual<br/>
                                            </p>
                                        </div>
                                    </div>
         
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Vo</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="svo" >
                                </div>   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Pa</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="spa" >
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">h</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="shh" >
                                </div>        
                                <div class="text-right">
                                    <button wire:click="calcularCampo(3)" class="btn btn-secondary  ml-auto">Calcular</button>
                                </div>
                            @endif

                            @if ($campo==4)
                                
     
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">CMa</span>
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
                        @endif
                            
                            @if ($campo==7)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Im</span>
                                    </div>
                                    <input type="number" class="form-control"  
                                    aria-describedby="basic-addon1 " wire:model="cim">
                                </div>
        
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">i</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="ci" >
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">a</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="ca" >
                                </div>     
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Vo</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="cvo" >
                                </div>   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Vr</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="cvr" >
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">n</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="cn" >
                                </div>        
                                <div class="text-right">
                                    <button wire:click="calcularCampo(7)" class="btn btn-secondary  ml-auto">Calcular</button>
                                </div>
                            @endif
        
        
                            @if ($campo==8)
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
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Vr</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="lvr" >
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">n</span>
                                    </div>
                                    <input type="number" class="form-control"
                                    wire:model="ln" >
                                </div>        
                                <div class="text-right">
                                    <button wire:click="calcularCampo(8)" class="btn btn-secondary  ml-auto">Calcular</button>
                                </div>
                            @endif
        
                            @if ($campo==10)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Vo</span>
                                    </div>
                                    <input type="number" class="form-control"  
                                    aria-describedby="basic-addon1 " wire:model="mvo">
                                </div>
        
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span  wire:click="detalhesK()" class="input-group-text" id="basic-addon1">K</span>
                                    </div>
                                    <input type="number" readonly wire:click="detalhesK()" class="form-control" wire:model="mk" >
                                
                                </div> 
                                        
                                <div class="text-right">
                                    <button wire:click="calcularCampo(10)" class="btn btn-secondary  ml-auto">Calcular</button>
                                </div>
                            @endif
                        </div>
                    </div> 
            </div>
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

                                <div class="input-group mt-3 p-0">
                                    <div class="input-group-prepend">
                                        <span   class="input-group-text bg-warning" id="basic-addon1">Valor de K</span>
                                    </div>
                                    <input type="number" readonly class="form-control" wire:model="mk" >
                                
                                </div> 

                                <div class="d-flex justify-content-end mt-3 p-0">
                                    <button wire:click="valorK()" class="btn btn-warning col-4 mr-2">Calcular</button>
                                    
                                    <button wire:click="detalhesK()" class="btn btn-secondary ">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                
            @endif
       </div>

</div>



    
    