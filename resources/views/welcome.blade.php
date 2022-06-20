<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
     integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Gestão de projectos</title>

    @livewireStyles
</head>
<body>
    <div class=" container-fluid h-100"> <!--Inicio Conteiner-->
       <div class="row">
            <header class="bg-primary w-100">
               <div class="flex">
                   <img  src="{{ asset('imagens/logo.jpg') }}" class="logo float-left" style="width: 80px; ">
                   <h4 class="float-left mt-3">Gestão de Projectos</h4>
               </div>
                <nav class="navbar navbar-expand-sm container p-0 bg-warning radius clear">
                    <ul class="navbar-nav  radius w-100  m-0 ">
                        <li class="nav-item w-25 text-center  radius direita">
                            <a class="nav-link  text-white " href="#">Cadastrar projecto</a>
                            </li>
                            <li class="nav-item w-25  radius text-center direita "> 
                            <a class="nav-link text-white" href="#">Cadastrar cliente</a>
                        </li>
                        <li class="nav-item w-25   radius text-center direita"> 
                            <a class="nav-link text-white" href="#">Listar consultas</a>
                        </li>
                        <li class="nav-item w-25  radius text-center "> 
                            <a class="nav-link text-white" href="#">Listar clientes</a>
                        </li>
                    </ul>
                </nav>
            </header>
            
                <div class="container border ">
                    Vasco Jonas Mabui

                </div>

            <footer class="bg-primary w-100  fixed-bottom" > 
            <span class="float-left">copyright @2022-Todos os direitos reservados</span>
				<span class="float-right ml-5"> version 1.0</span>
            </footer>
       </div>
    </div>  <!--/Fim Conteiner-->
     
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

</body>
</html>