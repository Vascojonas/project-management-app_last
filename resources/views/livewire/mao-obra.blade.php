<div>
   <h4>Mão de obra</h4>

    

   <div class="d-flex ">

    <div class=" p-0" style="width:60%">
        <table class="table table-striped table-bordered table-secondary ">
            <thead>
              <tr>
                <th rowspan="2" scope="col" class="text-center pb-1 pt-1 mb-1 mt-1 w-50">DESEGNAÇÃO</th>
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
                <td class="p-0" ><input wire:click="habilitar(1)" wire:model="inss" readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">IRPS</th>
                <td class="p-0" ><input wire:click="habilitar(4)" wire:model="irps" class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Férias anuais </th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
    
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Repousos semanais remunerado </th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Faltas justificadas  </th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriados </th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Feriado por dia da cidade </th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row"> 13º salário</th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total Parcial</th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Incidência Cumulativa (A sobre B)</th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1"  scope="row">Total dos Encargos</th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

              </tr>
              <tr>
                <th class="pb-1 pt-1 mb-1 mt-1" scope="row">Percentagem</th>
                <td class="p-0" ><input readonly class="bg-light form-control-file m-0 " type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>
                <td class="p-0" ><input readonly class="bg-light form-control-file" type="number" /></td>

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
