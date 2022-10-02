@extends('dashboard')

    
@section('titulo')
Sendbudgets CRUD
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
          <a href="/sendbudgets" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/sendbudgets" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
 text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>

<!-- INDEX SHOW SENDBUDGETS CRUD--> 
    <div class="max-w-4xl mx-auto mt-8 my-5 pb-5 py-5">

 
   

      <div class="flex justify-end mt-10">
          <a href="{{ route('sendbudgets.create') }}" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
          focus:ring-primary-300 font-medium rounded-lg
           text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
            dark:bg-primary-600 dark:hover:bg-primary-700 
            focus:outline-none dark:focus:ring-primary-800 text-white">+ Create New Sendbudget</a>
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
                                Total Budget Dollar
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                email sending date
                              </th>

                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                               Action
                              </th>
                              
                            </tr>
                          </thead class="border-b">
                          <tbody>
                            @foreach ($sendbudgets as $sendbudgets)
                            <tr class="bg-white border-b">
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> 
                                {{ ++$i }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $sendbudgets->amount }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $sendbudgets->dollarchange }}
                              </td>

                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $sendbudgets->totalbudget }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $sendbudgets->date }}
                              </td>

                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('sendbudgets.destroy',$sendbudgets->id) }}"
                                   id="form-delete" method="POST">
                      
                                  
                                  

                                  <a class="text-indigo-600 hover:text-indigo-900" 
                                  href="{{ route('sendbudgets.show',$sendbudgets->id) }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
 


<!-- END INDEX SHOW SENDBUDGETS CRUD--> 

    @endsection