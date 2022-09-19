

@extends('dashboard')

    
@section('titulo')
Show Api
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
          <a href="/apisurl" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/apisurl" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>
  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
  text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
     class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
     @yield('titulo')</span> </h1>
<!-- SHOW APIS CRUD--> 
    <div class="max-w-4xl mx-auto mt-8 my-5 pb-5 py-5">
        <div class="mb-4">
           
            <div class="flex justify-end mt-5">
                <a class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                focus:ring-primary-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-primary-600 dark:hover:bg-primary-700 
                  focus:outline-none dark:focus:ring-primary-800 text-white"
                 href="{{ route('apisurl.index') }}">< Back</a>
            </div>
        </div>
   
        <div class="flex flex-col mt-5 py-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-lg ring-1 ring-gray-900/10">
              <a href="{{ $apisurl->urlapi }}" target="blank_">
                <p class="text-lg text-blue-700 mt-5 uppercase"> 
                  <span class="text-purple-700">provider:</span>
                  <a href="{{ $apisurl->nameapi }}" target="blank_">{{ $apisurl->provider }}</a> </p>
                  <p class="text-lg text-blue-700 mt-5 uppercase"> 
                    <span class="text-purple-700">
                       Web provider :</span> 
                       <a href="{{ $apisurl->nameapi }}" target="blank_">
                        {{ $apisurl->nameapi }}</a> </p></a>
                <p class="text-lg text-blue-700 mt-5 uppercase"> 
                  <span class="text-purple-700">api URL:</span>
                  <a href="{{ $apisurl->urlapi }}" target="blank_">{{ $apisurl->urlapi }}</a> </p>
                <p class="text-lg text-blue-700 mt-5 uppercase"> <span class="text-purple-700">Country:</span> {{ $apisurl->country }}</p>
               
            </div>
        </div>
    </div>

<!--END SHOW APIS CRUD--> 

@endsection