@extends('layouts.app')

    
@section('titulo')
Change Password
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

    
<!-- FORGET PASS FORM--> 
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-3 py-4 mx-auto md:h-screen lg:py-0">
      <a href="/dashboard" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-13 h-15 mr-2" src="{{asset('img/logo.png')}}" alt="logo">
          
      </a>
      <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
             
          </h2>
        


                    <form action="{{ route('forget.password.post') }}" method="POST" autocomplete="off">
                      @csrf
              <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                  <input type="email" name="email" id="email_address" class="bg-gray-50 border
                   border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600
                    focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700
                     dark:border-gray-600 dark:placeholder-gray-400
                   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                  @if ($errors->has('email'))
                  <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                  p-2 text-center">{{ $errors->first('email') }}</span>
              @endif
                </div>
             
             
              <button type="submit" class="w-full inline-block px-7 py-3 mt-5 bg-blue-600 text-white font-medium 
              text-sm leading-snug uppercase  shadow-md hover:bg-blue-700 hover:shadow-lg
               focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 rounded-lg
                active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"> Send Password Reset Link</button>
          </form>
      </div>
  </div>
</section>

<!--FORGET FORM--> 
    @endsection