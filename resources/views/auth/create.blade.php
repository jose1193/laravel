@extends('dashboard')

    
@section('titulo')
Create User
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
          <a href="/users" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/users" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
  text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
     class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
     @yield('titulo')</span> </h1>


    <!-- CREATE BUDGET CRUD--> 
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
           
            <div class="flex justify-end mt-5">
                <a class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                focus:ring-primary-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-primary-600 dark:hover:bg-primary-700 
                  focus:outline-none dark:focus:ring-primary-800 text-white"
                 href="/users-list">< Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($errors->any())
                        <div class="p-3 rounded bg-red-500 text-white m-3" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 5000)">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                     
<!-- REGISTER FORM--> 
    <div class="flex items-center justify-center min-h-screen ">
          
        
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-2/4 sm:w-1/3">
            <div class="flex justify-center">
                <img class="w-13 h-15 mr-2" src="{{asset('img/logo.png')}}" alt="logo">
            </div>
            <h3 class="text-2xl font-bold text-center">Join us</h3>
            <form action="{{ route('auth.store') }}" class="capitalize font-bold"
             method="POST" novalidate autocomplete="off"  enctype="multipart/form-data">
                @csrf
                <div class="mt-4">
                    <label class="block" for="Name">Avatar<label><br>
                        <input type="file" name="image" class="form-control" placeholder="image"
                        accept="image/png, image/gif, image/jpeg">
                                @if ($errors->has('image'))
                                <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                p-2 text-center">{{ $errors->first('image') }}</span>
                            @endif
                            </div>

                <div class="mt-4">
                    <label class="block" for="Name">username<label>
                            <input type="text" placeholder=""
                                class="w-full px-4 py-2 mt-2 border rounded-md 
                                focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                id="name" name="username" required  
                                >
                                @if ($errors->has('username'))
                                <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                p-2 text-center">{{ $errors->first('username') }}</span>
                            @endif
                            </div>

                <div class="mt-4">
                    <div>
                        <label class="block" for="Name">first name<label>
                                <input type="text" placeholder=""
                                    class="w-full px-4 py-2 mt-2 border rounded-md 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    id="name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="name" required  
                                    >
                                    @if ($errors->has('name'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('lastname') }}</span>
                                @endif
                                </div>
                                <div class="mt-4">
                                    <label class="block" for="Name">last name<label>
                                            <input type="text" placeholder=""
                                                class="w-full px-4 py-2 mt-2 border rounded-md 
                                                focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                                id="name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" name="lastname" required  
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
                   
                </div>
            </form>
        </div>
    </div><br><br>
<!-- REGISTER FORM--> 
                </div>
            </div>
        </div>
    </div>
  
<!-- END CREATE BUDGET CRUD--> 
 
    @endsection