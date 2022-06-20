<div>

    <h4> Capítulos do Projecto</h4>


        <div class="col-10 offset-1 mt-3 ">
         @error('nrProjecto') <span class="text-danger">{{ $message }}</span> @enderror

            @if (session()->has('codigoErro'))
               <span class="text-danger"> {{ session('codigoErro') }}</span>
            @endif

            <div class="col-10">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="d-flex mt-0 mb-0 ">
                <div class="form-group row col-12  p-0 ">
                    <div class="col-md-8 p-0">
                    <input class="form-control " type="number" id="nrProjecto"  wire:model="nrProjecto"
                    placeholder="Digite o número do projecto"/>
                    </div>
                    <button class="btn btn-warning" wire:click="capitulo({{$nrProjecto}})">Pesquisar</button>
                    <button class="btn btn-success ml-auto" wire:click="novoCapitulo({{$nrProjecto}})">Novo Capitulo</button>
                </div>




               <!-- <div class="form-group row col-4  p-0">
                    <div class="col-md-12 p-0">
                        <select wire:change="projectoCapitulo()" class="form-control col-10" name="nrProjecto" wire:model="nrProjecto">
                            <option value="">Selecione o projecto</option>
                            @foreach($projectos as $projecto)
                                <option value=" {{$projecto['nrProjecto']}} " >{{$projecto['nrProjecto']}} - {{$projecto['contratante']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                -->
            </div>

            <div class="row">
    <table class="table table-secondary table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Projecto nº</th>
                      <th scope="col">Contratante</th>
                      <th scope="col">Localização</th>
                      <th scope="col">Prazo</th>
                      <th scope="col">Capitulo</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($capitulos as $capitulo)
                    
                    <tr>
                      <th scope="row">{{$projecto['nrProjecto']}}</th>
                      <td>{{$projecto['contratante']}}</td>
                      <td>{{$projecto['localizacao']}}</td>
                      <td>{{$projecto['prazo']}}</td>
                      <td>Capitulo {{$capitulo['capitulo']}}</td>
                      <td width="150">
                        <a href="/projectos/actividade" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    @endforeach

                
                  </tbody>
                </table>

    </div>

</div>
