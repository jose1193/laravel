@extends('dashboard')

    
@section('titulo')
Select Year Chart Budgets 
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
          <a href="{{route('chart')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="{{route('chart')}}" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold capitalize
  text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
     class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
     @yield('titulo')</span> </h1>


    <!-- CREATE  CRUD--> 
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
           
            <div class="flex justify-end mt-5">
                <a class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                focus:ring-primary-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-primary-600 dark:hover:bg-primary-700 
                  focus:outline-none dark:focus:ring-primary-800 text-white"
                 href="/budgets">Budgets</a>
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
                    
                    <div class="capitalize 
                    w-full px-6 py-4 bg-white rounded  shadow-md ring-1 ring-gray-900/10">

                        <form action="{{ route('chart.budgetchart') }}" 
                        id="calculator" method="POST" novalidate autocomplete="off">
                            @csrf

                             <div class="mb-5">
                                <label class=" block text-md font-bold text-gray-700 mb-3" for="title">
                                    select year</label>
                               
                                <select 
                                 class="bg-gray-50 border border-gray-300
                                  text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500
                                    focus:border-blue-500 block
                                     w-full p-2.5 dark:bg-gray-700
                                      dark:border-gray-600
                                       dark:placeholder-gray-400
                                        dark:text-white
                                         dark:focus:ring-blue-500
                                          dark:focus:border-blue-500
                                          capitalize" name="year">
                                  <option value="">Choose a Year</option>
                                  @foreach ($budgets as $budgets)
                                  <option value="{{ $budgets->year }}">{{ $budgets->year }}</option>
                                  @endforeach
                                </select>
                                


                            </div> 
<!-- PLUGIN SELECT MULTIPLE -->
                            


                            <div class="flex items-center justify-start mt-4 gap-x-2 my-10">
                                <button type="submit" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                                focus:ring-primary-300 font-medium rounded-lg
                                 text-sm px-4 lg:px-5 py-5 my-4 lg:py-2.5 mr-2
                                  dark:bg-primary-600 dark:hover:bg-primary-700 
                                  focus:outline-none dark:focus:ring-primary-800 text-white
                                  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110
                                  ">Submit</button>
                            </div>
                          
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- CSS PLUGIN SELECT MULTIPLE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select-input-multiple.css') }}">
    <!-- END CSS PLUGIN SELECT MULTIPLE -->
<!-- END CREATE BUDGET CRUD--> 
 
    @endsection