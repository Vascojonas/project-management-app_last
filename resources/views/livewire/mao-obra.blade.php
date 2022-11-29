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
     <a href="/projectos/actividades/-{{$nrProjecto}}-{{$projecto_principal}}" class="btn btn-secondary col-3">Voltar</a>
     <button wire:click="actualizar()" class="btn btn-warning col-3 ml-4">Actualizar</button>
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
                <th  onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)"   data-legenda="inss"  class="pb-1 pt-1 mb-1 mt-1"  scope="row">INSS</th>
                <td class="p-0" ><input readonly wire:click="habilitar(1)" wire:model="inss" readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(2)" class="bg-light form-control-file " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(3)" class="bg-light form-control-file" type="number" /></td>
              </tr>
              <div id="inss" class="bg-secondary d-none">
                INSS (%) – é a contribuição adstrita ao trabalhador em decorrência do artigo n.o 2 do
                    Decreto n.o 4/90 de 13 de Abril (totalizando 7% sendo que empregador 4% e trabalhador 
                    3%)
                    <br>
                    INSS (%) – é a contribuição do trabalhador por conta própria que é de 7% para 
trabalhador por conta própria, em decorrência do artigo n.o 1 do Decreto n.o 14/2015 de 
16 de Julho
            </div>
              <tr>
                <th onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="irps" class="pb-1 pt-1 mb-1 mt-1"  scope="row">IRPS</th>
                <td class="p-0" ><input readonly wire:click="habilitar(4)" wire:model="irps" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(5)" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(6)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="irps" class="bg-secondary d-none">
                IRPS (%) – é a contribuição atinente ao Imposto do Rendimento de Pessoa Singular, nos 
termos do Decreto n.º 8/2008, de 16 de Abril
                </div>
              <tr>
                <th onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="fanual" class="pb-1 pt-1 mb-1 mt-1"  scope="row">Férias anuais </th>
                <td class="p-0" ><input readonly wire:click="habilitar(7)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(8)" wire:click="habilitar(8)" wire:model="feriaAnual" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(9)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="fanual" class="bg-secondary d-none">
                Férias Anuais (%) - é a razão do entre os dias de férias e o número de dias trabalháveis 
por ano;
                </div>
              <tr>
                <th  onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="rpsml" class="pb-1 pt-1 mb-1 mt-1"  scope="row">Repousos semanais remunerado </th>
                <td class="p-0" ><input readonly wire:click="habilitar(10)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(11)"  wire:model="campoRepousoSemanal" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(12)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="rpsml" class="bg-secondary d-none">
                Repousos semanais remunerado (%) - é a razão entre os dias semanais (52 dias 
sábados e 53 dias domingos) de repouso e o número de dias trabalháveis por ano;
                </div>
              <tr>
                <th onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="fjusticifacdas" class="pb-1 pt-1 mb-1 mt-1"  scope="row">Faltas justificadas  </th>
                <td class="p-0" ><input readonly wire:click="habilitar(13)"  class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(14)" wire:model="campoFaltasJustificadas" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(15)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="fjusticifacdas" class="bg-secondary d-none">
                Faltas justificadas (%) - é a razão do entre os dias de faltas justificadas e o número de 
dias trabalháveis por ano;
                </div>
              <tr>
                <th onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="feriados" class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriados Nacionais </th>
                <td class="p-0" ><input readonly wire:click="habilitar(16)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(17)" wire:model="campoFeriados" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(18)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="feriados" class="bg-secondary d-none">
                Feriados (%) - é a razão do entre os dias de feriados ( 9 dias anuais) e o número de dias 
trabalháveis por ano;
                </div>
              <tr>
                <th onmouseover="exibirLegenda(event)" onmouseout="fecharLegenda(event)" data-legenda="fmunicipal"  class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriado Municipais </th>
                <td class="p-0" ><input readonly wire:click="habilitar(19)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(20)" wire:model="campoFeriadosCidade" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(21)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <div id="fmunicipal" class="bg-secondary d-none">
                Feriados Municipais (%) - é a razão do entre os dias de feriados municipais ( 1 dia) e o 
número de dias trabalháveis por ano;
                </div>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row"> 13º salário</th>
                <td class="p-0" ><input readonly wire:click="habilitar(22)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(23)" wire:model="campo13SalarioB" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(24000)" wire:model="campo13SalarioC" class="bg-light form-control-file" type="number" /></td>
              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total Parcial</th>
                <td class="p-0" ><input readonly wire:click="habilitar(25)" wire:model="campoTotalParcialA"  class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(26)" wire:model="campoTotalParcialB" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(33)" wire:model="campoTotalParcialC" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Incidência Cumulativa (A sobre B)</th>
                <td class="p-0" ><input readonly wire:click="habilitar(28)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(29)" wire:model="campoIncidenciaAcumulativa" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(30)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total dos Encargos</th>
                <td class="p-0" ><input readonly wire:click="habilitar(31)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(32)" wire:model="campoTotalEncargosB" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(3300)" wire:model="campoTotalEncargosC" class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1" scope="row">Percentagem (%)</th>
                <td class="p-0" ><input readonly wire:click="habilitar(34)" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(35)" wire:model="campoPercetagem" class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly wire:click="habilitar(36)" class="bg-light form-control-file" type="number" /></td>

              </tr>
              
            </tbody>
        </table>
    </div>

    <div class=" p-0 ml-auto" style="width: 38%">
      <div class="col-12 p-0">
        
      @if ($campo===4)
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Salário Bruto</span>
                </div>
                <input type="number" class="form-control" placeholder="Digite o  sálario Bruto" aria-label="salario"
                aria-describedby="basic-addon1 " wire:model="salarioBruto"  wire:click="salarioLiquido">
              </div>
    
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dependentes</span>
                  </div>
                  <input type="number" class="form-control" placeholder="Digite o número de dependentes" 
                  aria-label="salario" aria-describedby="basic-addon1" wire:model="nrDependentes"  wire:click="salarioLiquido">
            </div>
    
        </div>
          
        <div class="text-right">
            <button wire:click="salarioLiquido" class="btn btn-secondary col-4 ml-auto">Calcular</button>
        </div>
      @else
            @if ($campo===8)
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ferias anuais</span>
              </div>
              <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
              aria-describedby="basic-addon1 " wire:model="feriaAnualDia"  wire:click="feriasAnual">
            </div>
  
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                </div>
                <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="feriasAnual">
          </div>    
          <div class="text-right">
            <button wire:click="feriasAnual" class="btn btn-secondary col-4 ml-auto">Calcular</button>
        </div>
            @else

                @if ($campo===11)
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Repouso Semanal</span>
                      </div>
                      <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                      aria-describedby="basic-addon1 " wire:model="valorRepousoSemanal"  wire:click="calcularCampo(11)">
                    </div>
              
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                        aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(11)">
                  </div>    
                  <div class="text-right">
                    <button wire:click="calcularCampo(11)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                </div>
                @else
                    @if ($campo===14)
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Faltas Justificadas</span>
                          </div>
                          <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                          aria-describedby="basic-addon1 " wire:model="valorFaltasJustificadas"  wire:click="calcularCampo(14)">
                        </div>
                  
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                            aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(14)">
                      </div>    
                      <div class="text-right">
                        <button wire:click="calcularCampo(14)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                    </div>
                    @else
                          @if ($campo===17)
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Feriados</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                            aria-describedby="basic-addon1 " wire:model="valorFeriados"  wire:click="calcularCampo(17)">
                          </div>
                    
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                              </div>
                              <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                              aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(17)">
                        </div>    
                        <div class="text-right">
                          <button wire:click="calcularCampo(17)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                      </div>
                      @else
                              @if ($campo===20)
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Feriado por dia da cidade</span>
                                </div>
                                <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                aria-describedby="basic-addon1 " wire:model="valorFeriadosCidade"  wire:click="calcularCampo(20)">
                              </div>
                        
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                  </div>
                                  <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                  aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(20)">
                            </div>    
                            <div class="text-right">
                              <button wire:click="calcularCampo(20)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                          </div>
                          @else
                                    @if ($campo===23)
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Dias do mês</span>
                                      </div>
                                      <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                      aria-describedby="basic-addon1 " wire:model="valorDiasMes"  wire:click="calcularCampo(23)">
                                    </div>
                              
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                        aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(23)">
                                  </div>    
                                  <div class="text-right">
                                    <button wire:click="calcularCampo(23)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                </div>
                                @else
                                            @if ($campo===33)

                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Anos de Trabalho</span>
                                              </div>
                                              <input type="number" class="form-control" placeholder="Digite anos de trabalhos" aria-label="ferias"
                                              aria-describedby="basic-addon1 " wire:model="valorAnosTrabalho"  wire:click="calcularCampo(33)">
                                            </div>

                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Salário</span>
                                              </div>
                                              <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                              aria-describedby="basic-addon1 " wire:model="salario"  wire:click="calcularCampo(33)">
                                            </div>
                                      
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1">Dias Trabalhavés</span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Dias trabalhaveis" 
                                                aria-label="salario" aria-describedby="basic-addon1" wire:model="trabalhoAnual"  wire:click="calcularCampo(33)">
                                          </div>    
                                          <div class="text-right">
                                            <button wire:click="calcularCampo(33)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
                                        </div>
                                        @else
                                        @if ($campo===330)

                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Anos de Trabalho</span>
                                          </div>
                                          <input type="number" class="form-control" placeholder="Digite anos de trabalhos" aria-label="ferias"
                                          aria-describedby="basic-addon1 " wire:model="valorAnosTrabalho"  wire:click="calcularCampo(330)">
                                        </div>



                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Salário</span>
                                          </div>
                                          <input type="number" class="form-control" placeholder="Dias de ferias anuais" aria-label="ferias"
                                          aria-describedby="basic-addon1 " wire:model="salario"  wire:click="calcularCampo(330)">
                                        </div>
                                  
                                           
                                      <div class="text-right">
                                        <button wire:click="calcularCampo(330)" class="btn btn-secondary col-4 ml-auto">Calcular</button>
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


      <!--  <table class="table table-striped table-bordered table-secondary mt-3">
            <tr>
              <th class="pb-1 pt-1 mb-1 mt-1 w-50">Vencimento Mensal (VM)</th>
              <td class="pb-1 pt-1 mb-1 mt-1"> </td>
            </tr>
            <tr>
              <th class="pb-1 pt-1 mb-1 mt-1">Total de Horas/Semana</th>
              <td class="pb-1 pt-1 mb-1 mt-1"> </td>
            </tr>
            <tr>
              <th class="pb-1 pt-1 mb-1 mt-1">Números de Ano de Serviço</th>
              <td class="pb-1 pt-1 mb-1 mt-1"> </td>
            </tr>
            <tr>
              <th class="pb-1 pt-1 mb-1 mt-1">Número de Dias/Anos de Serviço</th>
              <td class="pb-1 pt-1 mb-1 mt-1"> </td>
            </tr>
  
            <tr>
              <th class="pb-1 pt-1 mb-1 mt-1">Número de Dias Trabalhaveis/Anos</th>
              <td class="pb-1 pt-1 mb-1 mt-1"> </td>
            </tr>
        </table>

     </div> -->
     
    </div>
    
  </div>
</div>

  
  