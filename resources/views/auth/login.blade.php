@extends('layouts.app')

    
@section('titulo')
Log In
@endsection

@section('container')

   
<nav class="flex my-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-auto">
      <li class="inline-flex items-center">
        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          <a href="/">Home</a> 
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <a href="/register" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/register" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>
   
   
    
<!-- LOGIN FORM--> 
<section class="h-screen">
    <div class="px-6 h-full text-gray-800">
      <div class="flex xl:justify-center 
      lg:justify-between justify-center items-center flex-wrap h-full g-6">
        <div
          class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="w-full hidden md:block"
            alt="Sample image"
          />
        </div>
        <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
            <form action="{{ route('login.post') }}" method="POST" novalidate >
                @csrf


 <!--PASSWORD RESET MESSAGE  SUCCESS -->                                            
 @if (session('messagepasswordsuccess'))
  
 <script>
   Swal.fire({
title: 'Great!!',
text: '{{ session('messagepasswordsuccess') }}',
icon: 'success',
confirmButtonText: 'OK'
})
  </script>

   @endif
    <!-- END PASSWORD RESET MESSAGE  SUCCESS -->   
       

      <!-- MESSAGE IF THE USER HAS NOT BEEN VERIFIED WITH ALPINE JS AND SWEETALERT --> 
       <!-- WARNING VERIFICATION HTTP/ MIDDLEWARE/ ISVERIFY EMAIL.PHP-->
      @if (session('emailverificationmessage'))
  
  <script>
    Swal.fire({
 title: 'Warning! Email has not been verified',
 text: '{{ session('emailverificationmessage') }}',
 icon: 'warning',
 confirmButtonText: 'OK'
})
   </script>
 
    @endif
 <!-- END WARNING VERIFICATION HTTP/ MIDDLEWARE/ ISVERIFY EMAIL.PHP -->

<!-- SUCCESS VERIFICATION -->
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
  @if (session('emailverificationmessage2'))

  <div class="bg-green-500 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
    <div class="bg-green-500 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-green-400 rounded-t-lg">
      <p class="font-bold text-white flex items-center">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
        Successful Verification</p>
      <div class="flex items-center">
        <p class="text-white opacity-90 text-xs">
 <!-- DATETIME NOW -->
 @php
 $date = new \DateTime();
 $date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
$datetime=$date->format('H:i A');

 @endphp
  {{  $datetime; }}

 <!-- END DATETIME NOW -->

        </p>
        <button type="button" class="btn-close btn-close-white box-content w-4 h-4 ml-2 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline" data-mdb-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
    <div class="p-3 bg-green-500 rounded-b-lg break-words text-white">
      {{ session('emailverificationmessage2') }}
    </div>
  </div>

  @endif
</div>

<!-- END SUCCESS VERIFICATION -->

<!-- INFO MESSAGE -->
      <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">

  @if (session('message'))

  <!-- info message -->
<div class="bg-blue-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-5" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
  <div class="bg-blue-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-blue-500 rounded-t-lg">
    <p class="font-bold text-white flex items-center">
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
      </svg>
      Notification Alert</p>
    <div class="flex items-center">
      <p class="text-white opacity-90 text-xs">

         <!-- DATETIME NOW -->
       @php
       $date = new \DateTime();
       $date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
$datetime=$date->format('H:i A');
    
       @endphp
        {{  $datetime; }}
      
       <!-- END DATETIME NOW -->
      </p>
      <button type="button" class="btn-close btn-close-white box-content w-4 h-4 ml-2 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline" data-mdb-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  <div class="p-3 bg-blue-600 rounded-b-lg break-words text-white">
    {{ session('message') }}
  </div>
</div>
    @endif
  </div>
    <!-- END INFO MESSAGE -->
      <!--END MESSAGE IF THE USER HAS NOT BEEN VERIFIED --> 

       <!-- MESSAGE AUTH INVALID CREDENTIALS  -->                                            
  @if (session('error'))
  
  <script>
    Swal.fire({
 title: 'Error!',
 text: '{{ session('error') }}',
 icon: 'error',
 confirmButtonText: 'OK'
})
   </script>
 
    @endif
 
      <!--END MESSAGE AUTH INVALID CREDENTIALS--> 
          
            <div class="flex flex-row items-center justify-center lg:justify-start">
              <p class="text-lg mb-0 mr-4">Sign in with</p>
              <button
                type="button"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1"
              >
                <!-- Facebook -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path
                    fill="currentColor"
                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                  />
                </svg>
              </button>
  
              <button
                type="button"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1"
              >
                <!-- Twitter -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path
                    fill="currentColor"
                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                  />
                </svg>
              </button>
  
              <button
                type="button"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="  inline-block p-3 bg-blue-600
                 text-white font-medium text-xs leading-tight uppercase 
                 rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg
                  focus:bg-blue-700 focus:shadow-lg focus:outline-none
                   focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                <!-- Linkedin -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path
                    fill="currentColor"
                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                  />
                </svg>
              </button>
            </div>
  
            <div
              class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
            >
              <p class="text-center font-semibold mx-4 mb-0">Or</p>
            </div>
  
            <!-- Email input -->
            <div class="mb-6">
              <input
                type="text" 
                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleFormControlInput2"
                placeholder="Email address" id="email_address" name="email" required
              />
              @if ($errors->has('email'))
              <span class="bg-red-500 text-white my-2 rounded-lg text-sm
              p-2 text-center">{{ $errors->first('email') }}</span>
          @endif
            </div>
  
            <!-- Password input -->
            <div class="mb-6">
              <input
                type="password"
                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleFormControlInput2"
                placeholder="Password"  id="password" name="password" required
              />
              @if ($errors->has('password'))
                                      <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                      p-2 text-center">{{ $errors->first('password') }}</span>
                                  @endif
            </div>
  
            <div class="flex justify-between items-center mb-6">
              <div class="form-group form-check">
                <input
                  type="checkbox" name="remember"
                  class="form-check-input appearance-none h-4 w-4 border
                   border-gray-300 rounded-sm bg-white checked:bg-blue-600
                    checked:border-blue-600 focus:outline-none transition
                     duration-200 mt-1 align-top bg-no-repeat bg-center 
                     bg-contain float-left mr-2 cursor-pointer"
                  id="exampleCheck2"
                />
                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                  >Remember me</label
                >
              </div>
              <a class="text-blue-700 font-bold" href="{{ route('forget.password.get') }}" class="text-gray-800">Forgot password?</a>
            </div>
  
            <div class="text-center lg:text-left">
              <button
                type="submit"
                class=" w-full inline-block px-7 py-3 bg-blue-600 text-white font-medium 
                text-sm leading-snug uppercase  shadow-md hover:bg-blue-700 hover:shadow-lg
                 focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 rounded-lg active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
              >
              
                Login
              </button>
              <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                Don't have an account?
                <a
                  href="{{ route('register') }}"
                  class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                  >Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<!--lOGIN FORM--> 
    @endsection