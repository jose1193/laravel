@extends('dashboard')

    
@section('titulo')
Change Password User
@endsection

@section('container')

   
<nav class="flex my-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-auto">
      <li class="inline-flex items-center">
        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          <a href="/dashboard">Home</a> 
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <a href="/change-password" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/change-password" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>

    
<!--PASSWORD CHANGE-->

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="/dashboard" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-13 h-15 mr-2" src="{{asset('img/logo.png')}}" alt="logo">
      </a>
     
       <!--ERROR MESSAGE ALPINE JS -->
      <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)"> 
      @if(session()->has('error'))
      <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
          <p class="font-bold text-white flex items-center">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
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
        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white font-bold">
          {{ session()->get('error') }}
        </div>
      </div>
     
     
  @endif
    </div>
    <!--END ERROR MESSAGE -->
   
    <!--successful message -->
  @if(session()->has('success'))

  <script>
    Swal.fire({
 title: 'Great!!',
 text: '{{ session()->get('success') }}',
 icon: 'success',
 confirmButtonText: 'OK'
})
   </script>
      
  @endif
 <!-- end successful message -->

      <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              Change Password
          </h2>
         

      <form method="POST" action="{{ route('change.password') }}">
        @csrf
             
              <div>
                  <label for="password" class="block mb-2 text-sm font-medium
                   text-gray-900 dark:text-white">Current Password</label>
                  
                    
                     <input type="password" class="form-control @error('current_password') 
                     is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                     focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_password" autocomplete="current_password">
                       @error('current_password')
                       <span class="invalid-feedback bg-red-500 text-white my-2 rounded-lg text-sm
                       p-2 text-center">{{ $message }}</span>
                       @enderror
                </div>
              <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900
                 dark:text-white">New Password</label>
                <input type="password" name="password" id="password" 
                placeholder="••••••••" class="@error('password') is-invalid @enderror
                bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required
                   autocomplete="password">
                   @error('password')
                   <span class="invalid-feedback bg-red-500 text-white my-2 rounded-lg text-sm
                   p-2 text-center">{{ $message }}</span>
                   @enderror
                  
                </div>
              
                <div>
                  <label for="confirm-password" class="block mb-2 text-sm font-medium
                   text-gray-900 dark:text-white">Password Confirmation</label>
                  <input type="password" name="password_confirmation" id="password-confirm"
                   placeholder="••••••••" class="bg-gray-50 border border-gray-300
                    text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600
                     focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700
                      dark:border-gray-600 dark:placeholder-gray-400
                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                       @error('password_confirmation') is-invalid @enderror"  autocomplete="password_confirmation"
                        required>
                        @error('password_confirmation')
                  <span class="invalid-feedback bg-red-500 text-white my-2 rounded-lg text-sm
                  p-2 text-center">{{ $message }}</span>
                  @enderror
                </div>
           
              <button type="submit" class="my-5 w-full text-white bg-primary-600
               hover:bg-primary-700 focus:ring-4 focus:outline-none
                focus:ring-primary-300 font-medium rounded-lg
                 text-sm px-5 py-2.5 text-center dark:bg-primary-600
                  dark:hover:bg-primary-700 dark:focus:ring-primary-800">Change password</button>
               
            </form>
      </div>
  </div>
</section>
<!--PASSWORD CHANGE --> 
    @endsection