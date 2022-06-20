<div class=" mt-3">
    <h4>Todos projectos</h4>
    <div class=" row mb-3">
        <input  class="form-control col-4 ml-auto " type="text" name="pesquisar"
         placeholder="pesquisar..."/>

        <button class="btn btn-warning">Pesquisar</button>
    </div>
    <div class="row">
    <table class="table table-secondary table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Projecto nº</th>
                      <th scope="col">Contratante</th>
                      <th scope="col">Localização</th>
                      <th scope="col">Prazo</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($projectos as $projecto)
                    
                    <tr>
                      <th scope="row">{{$projecto['nrProjecto']}}</th>
                      <td>{{$projecto['contratante']}}</td>
                      <td>{{$projecto['localizacao']}}</td>
                      <td>{{$projecto['prazo']}}</td>
                      <td>{{$projecto['descricao']}}</td>
                      <td width="150">
                        <a href="/projectos/actividade" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table> 

    </div>
    
</div>
