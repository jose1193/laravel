<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <meta name="theme-color" content="#3B71CA" />
        <title>Web App - @yield('titulo')</title>
        <link rel="icon" href="{{  asset('img/favicon/favicon.ico')  }}">
     
        @vite('resources/css/app.css','resources/js/app.js')
        
    <!-- SWEET ALERT AND ALPINE JS-->        
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- END SWEET ALERT AND ALPINE JS--> 


       
    </head>
    <body>
<!-- TAILWIND CSS-->
 
<!-- NAVBAR MENU-->
@include('layouts.navbar')
<!-- NAVBAR MENU-->

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
             text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
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
          <div class="p-4 bg-blue-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License -
                     https://fontawesome.com/license (Commercial License) -->
                     <path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></svg>
            
           
          </div>
          <h5 class="text-lg font-bold mb-4 capitalize">monthly budget</h5>
          <p class="text-gray-500">
            Make a financial plan where you determine what the expenses and income are for each month. 
            A good way to know how much money you have on a monthly basis
          </p>
        </div>
  
        <div class="mb-12 md:mb-0">
          <div class="p-4 bg-blue-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License -
                https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. 
               -->< <path fill="currentColor"  
               path d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7
                0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 
                32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7
                 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 
                 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 
                 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32
                  32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z"/></svg>
          </div>
          <h5 class="text-lg font-bold mb-4 capitalize">statistics</h5>
          <p class="text-gray-500">
            Downloads and export of statistical graphs for month-to-month comparisons 
            of your consumption and therefore, determine which expenses you can adjust.
             They serve as an evaluator of the management of your resources, help you to know your 
            current financial status and allow you to take control of your economy.
          </p>
        </div>
  
        <div class="mb-12 md:mb-0">
          <div class="p-4 bg-blue-700 rounded-lg shadow-lg inline-block mb-6">
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - 
                    https://fontawesome.com/license (Commercial License) --><path fill="currentColor" d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z"/></svg>

          </div>
          <h5 class="text-lg font-bold mb-4 capitalize">send multiple emails</h5>
          <p class="text-gray-500">
            Send your monthly budget reports to multiple emails or contacts registered in the web application. 
            fast and secure to multiple mail servers.
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