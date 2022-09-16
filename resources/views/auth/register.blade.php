@extends('layouts.app')

    
@section('titulo')
User Registration
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

    
<!-- REGISTER FORM--> 
    <div class="flex items-center justify-center min-h-screen ">
          
        
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <div class="flex justify-center">
                <img class="w-13 h-15 mr-2" src="{{asset('img/logo.png')}}" alt="logo">
            </div>
            <h3 class="text-2xl font-bold text-center">Join us</h3>
            <form action="{{ route('register.post') }}" method="POST" novalidate autocomplete="off">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="Name">Name<label>
                                <input type="text" placeholder="Name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    id="name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="name" required  
                                    >
                                    @if ($errors->has('name'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('name') }}</span>
                                @endif
                                </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email<label>
                                <input type="email" placeholder="Email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    id="email_address"  name="email"  autocomplete="off" required >
                                    @if ($errors->has('email'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('email') }}</span>
                                @endif
                    </div>
                    <div class="mt-4">
                        <label class="block">Password<label>
                                <input type="password" placeholder="Password"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1
                                     focus:ring-blue-600" id="password" name="password"  required>
                                    @if ($errors->has('password'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('password') }}</span>
                                @endif
                                </div>
                    <div class="mt-4">
                        <label class="block">Confirm Password<label>
                            
                                <input type="password" placeholder=" Confirm Password"
                                 name="password_confirmation" id="password_confirmation"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                   
                    <div class="flex">
                        <button type="submit" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg
                         hover:bg-blue-900 ">Create
                            Account</button>
                    </div>
                    <div class="mt-6 text-grey-dark ">
                        Already have an account?
                        <a class="text-blue-600 hover:underline" href="{{ route('login') }}">
                            Log in
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div><br><br>
<!-- REGISTER FORM--> 


    @endsection

    