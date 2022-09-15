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
                  dark:hover:bg-primary-700 dark:focus:ring-primary-800">Change Password</button>
               
            </form>
      </div>
  </div>
</section>
<!--PASSWORD CHANGE --> 
    @endsection