<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
     integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title class="text-captalize">Projecto de sistemas de preço de construção</title>

    @livewireStyles
</head>
<body>
    <div class="h-100 " style="width: 98.5%"> <!--Inicio Conteiner-->
       <div class="row">
            <header class="bg-white w-100 ">
               <div class="flex">
                   <img  src="{{ asset('imagens/logo.jpg') }}" class="logo float-left" style="width: 80px; ">
                   <h4 class="text-uppercase float-left mt-3">Projecto de sistemas de preço de construção cívil</h4>
               </div>
                <nav class="navbar navbar-expand-sm container p-0 bg-warning radius clear">
                    <ul class="navbar-nav  radius w-100  m-0 ">
                        <li class="nav-item w-50 text-center  radius direita">
                            <a class="text-uppercase nav-link  text-white " href="/">Cadastrar projecto</a>
                        </li>
                        <li class="nav-item w-50   radius text-center direita"> 
                            <a class="text-uppercase nav-link text-white" href="/projectos/capitulos">Projectos-capitulos</a>
                        </li>
                        
                    </ul>
                </nav>
            </header>
            
                <div class="container ">
                    {{ $slot }}
                </div>

            
       </div>
    </div>  <!--/Fim Conteiner-->
     
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

</body>
</html>