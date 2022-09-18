<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Web App - @yield('titulo')</title>
        @vite('resources/css/app.css','resources/js/app.js')
        
    <!-- SWEET ALERT AND ALPINE JS-->        
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- END SWEET ALERT AND ALPINE JS--> 


       
    </head>
    <body>
<!-- TAILWIND CSS--> 
<header>
  
	
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/dashboard" class="flex items-center">
                <img src="{{ asset('img/logo.png') }}" class="mr-3 h-6 sm:h-20" alt=" Logo" />
               
            </a>
            <div class="flex items-center lg:order-2">
                
                @guest
                <a href="{{ route('register') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 
                focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 
                py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Join</a>
                <a href="{{ route('login') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Log in</a>
               
                @else
                <form action="{{ route('logout') }}" method="POST" novalidate>
                  @csrf
                  <button type="submit" class="text-white
                  bg-primary-700 hover:bg-primary-800 focus:ring-4
                   focus:ring-primary-300 font-medium rounded-lg
                    text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                     dark:bg-primary-600 dark:hover:bg-primary-700 
                     focus:outline-none dark:focus:ring-primary-800">Logout</button>
                
                 
                </form>
                   
                   
                    @endguest
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/dashboard" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/about-user" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="/montbudgets" class="block py-2 pr-4 pl-3
                         text-gray-700 border-b border-gray-100
                          hover:bg-gray-50 lg:hover:bg-transparent
                           lg:border-0 lg:hover:text-primary-700 
                           lg:p-0 dark:text-gray-400 lg:dark:hover:text-white
                            dark:hover:bg-gray-700 dark:hover:text-white
                             lg:dark:hover:bg-transparent dark:border-gray-700">MontBudgets</a>
                    </li>
                    <li>
                        <a href="/budgets" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Budgets</a>
                    </li>
                    <li>
                        <a href="/change-password" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Change Password</a>
                    </li>
                    <li>
                        <a href="/emails" class="block py-2 pr-4 pl-3 text-gray-700 border-b
                         border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0
                          lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white
                           dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                            dark:border-gray-700">Emails</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
  

@section('titulo')
Home
@endsection

   
<!-- END INCLUDE ALERTS MESSAGES--> 
@include('message')
<!-- END INCLUDE ALERTS MESSAGES--> 
@section('container')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight 
            leading-none md:text-5xl xl:text-6xl dark:text-white uppercase ">{{ __('Dashboard') }}  Welcome  {{ auth()->user()->name }}
             </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
               </p>
                
  @if (session('successlogin'))
  
  <div class=" mb-5 pb-5 w-full bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div class="py-1">

        <svg  class="fill-current h-6 w-6 text-green-500 mr-4"
         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>

       
        </div>
      <div>
        <p class="font-bold">Logged In <!-- DATETIME NOW -->
          @php
          $date = new \DateTime();
          $date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
          $datetime=$date->format('H:i A');
          
          @endphp
          {{  $datetime; }}
          
          <!-- END DATETIME NOW --></p>
        <p class="text-sm"> {{ session('successlogin') }}</p>
      </div>
    </div>
  </div>
    @endif
            <a href="/register" class="inline-flex items-center justify-center px-5 py-3 mr-3
             text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Contact Us
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <img src="{{ asset('img/home.png') }}" />
           
        </div>                
    </div>
  </section>


   
  <!-- Container for demo purpose -->
<div class="container my-8 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800 text-center">
      <h2 class="text-3xl font-bold mb-12">Why is it so<u class="text-blue-600"> great?</u></h2>
      <div class="grid md:grid-cols-3 lg:gap-x-12">
        <div class="mb-12 md:mb-0">
          <div class="p-4 bg-primary-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License -
                     https://fontawesome.com/license (Commercial License) -->
                     <path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></svg>
            
           
          </div>
          <h5 class="text-lg font-bold mb-4">Support 24/7</h5>
          <p class="text-gray-500">
            Laudantium totam quas cumque pariatur at doloremque hic quos quia eius. Reiciendis
            optio minus mollitia rerum labore facilis inventore voluptatem ad, quae quia sint.
            Ullam.
          </p>
        </div>
  
        <div class="mb-12 md:mb-0">
          <div class="p-4 bg-primary-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License -
                     https://fontawesome.com/license (Commercial License) --><path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"/></svg>

          </div>
          <h5 class="text-lg font-bold mb-4">Safe and solid</h5>
          <p class="text-gray-500">
            Eum nostrum fugit numquam, voluptates veniam neque quibusdam ullam aspernatur odio
            soluta, quisquam dolore animi mollitia a omnis praesentium, expedita nobis!
          </p>
        </div>
  
        <div class="mb-12 md:mb-0">
          <div class="p-4 bg-primary-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - 
                    https://fontawesome.com/license (Commercial License) --><path fill="currentColor" d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z"/></svg>

          </div>
          <h5 class="text-lg font-bold mb-4">Extremely fast</h5>
          <p class="text-gray-500">
            Enim cupiditate, minus nulla dolor cumque iure eveniet facere ullam beatae hic
            voluptatibus dolores exercitationem? Facilis debitis aspernatur amet nisi?
          </p>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  
  </div>
  <!-- Container for demo purpose -->


  
@endsection



<!-- CONTENIDO A MOSTRAR CADA PAGINA--> 
@yield('container')

<!-- END CONTENIDO A MOSTRAR CADA PAGINA--> 


<!-- END TAILWIND CSS-->  
        
   


@extends('layouts.footer')