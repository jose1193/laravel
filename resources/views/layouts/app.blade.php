
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Web App - @yield('titulo')</title>
        <!-- TAILWIND CSS--> 
        @vite('resources/css/app.css','resources/js/app.js')
        <!-- END TAILWIND CSS--> 

        <!-- ALPINE JS - SWEET ALERT2 --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
       <!-- END ALPINE JS - SWEET ALERT2 --> 

       
    </head>
    <body>

        <!-- NAVBAR MENU-->
        @include('layouts.navbar')
        <!-- NAVBAR MENU-->


<!-- END INCLUDE ALERTS MESSAGES--> 
@include('message')
 <!-- END INCLUDE ALERTS MESSAGES--> 

<!-- CONTENIDO A MOSTRAR CADA PAGINA--> 
@yield('container')

<!-- END CONTENIDO A MOSTRAR CADA PAGINA--> 


<!-- END TAILWIND CSS-->  
        
   



<footer class="bg-blue-700 text-center lg:text-left">
  <div class="text-white text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
    © {{ date('Y') }}
    Copyright - 
    <a class="text-yellow-300 font-bold" href="{{route('home')}}">Web App</a>
  </div>
</footer>

<script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

        </body>

        </html>