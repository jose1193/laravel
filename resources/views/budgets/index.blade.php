@extends('dashboard')

    
@section('titulo')
Budgets CRUD
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
          <a href="/budgets" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/budgets" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
 text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>

<!-- INDEX SHOW BUDGETS CRUD--> 
    <div class="max-w-4xl mx-auto mt-8 my-5 pb-5 py-5">

 
   

      <div class="flex justify-end mt-10">
          <a href="{{ route('budgets.create') }}" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
          focus:ring-primary-300 font-medium rounded-lg
           text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
            dark:bg-primary-600 dark:hover:bg-primary-700 
            focus:outline-none dark:focus:ring-primary-800 text-white">+ Create New Budget</a>
      </div>

      <div class="flex flex-col mt-10 pb-5 mb-5">
          <div class="flex flex-col">
              <div class="inline-block min-w-full overflow-hidden align-middle border-b
               border-primary-200 shadow-xl sm:rounded-lg ">

                <div class="flex flex-col ">
                  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden">
                        <table class="min-w-full text-center " id="dataTable" >
                          <thead class="border-b bg-primary-800">
                            <tr>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Nro
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Budget
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Dolar Rate
                              </th>
                               <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Total Budget
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Date
                              </th>

                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                               Action
                              </th>
                              
                            </tr>
                          </thead class="border-b">
                          <tbody>
                            @foreach ($budget as $budget)
                            <tr class="bg-white border-b">
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> 
                                {{ ++$i }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $budget->amount }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $budget->dollarchange }}
                              </td>

                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $budget->totalbudget }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $budget->date }}
                              </td>

                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('budgets.destroy',$budget->id) }}" method="POST">
                      
                                  <a class="" 
                                  href="{{ route('monthbudgets.index',['id' => $budget->id]) }}"><!-- ENVIAR RUTA POR PARAMETRO-->
                                  <svg class="w-6 h-6 inline-block text-indigo-600 hover:text-indigo-900" stroke="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by
                                       @fontawesome - https://fontawesome.com License 
                                       - https://fontawesome.com/license (Commercial License)
                                        Copyright 2022 Fonticons, Inc. -->
                                        <path d="M312 24V34.5c6.4 1.2 12.6 2.7
                                         18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 
                                         20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z"/></svg>
                                 
                                    </a>
                                  

                                  <a class="text-indigo-600 hover:text-indigo-900" 
                                  href="{{ route('budgets.show',$budget->id) }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </a>
                                  
                                  <a href="{{ route('budgets.edit',$budget->id) }}" class="text-indigo-600 hover:text-indigo-900 ">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                      </svg>
                                  </a>
                 
                                  @csrf
                                  @method('DELETE')
                                  
                                  <button type="submit"  >
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                  </button>

                                
                              </form>
                              </td>
                              
                           
                            </tr>
                           @endforeach
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                 
              </div>
          </div>
      </div>
  </div>
 


<!-- END INDEX SHOW EMAILS CRUD--> 

    @endsection