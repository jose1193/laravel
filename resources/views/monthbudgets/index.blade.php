@extends('dashboard')

    
@section('titulo')
MonthBudgets CRUD
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
          <a href="{{ route('monthbudgets.index',['id' => $id]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="{{ route('monthbudgets.index',['id' => $id]) }}" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
 text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>

<!-- INDEX SHOW MONTHBUDGETS CRUD--> 
    <div class="max-w-4xl mx-auto mt-8 my-5 pb-5 py-5">

 
     

      <div class="flex justify-end mt-10">

        <a href="{{ route('chart.monthbudgets',['id' => $id]) }}" 
          target="_blank" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
           focus:ring-primary-300 font-medium rounded-lg
            text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
             dark:bg-primary-600 dark:hover:bg-primary-700 
             focus:outline-none dark:focus:ring-primary-800 text-white capitalize">
             <svg xmlns="http://www.w3.org/2000/svg"   class="w-6 h-6 inline-block  " stroke="currentColor" viewBox="0 0 384 512" viewBox="0 0 512 512">
              <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License -
                 https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                 <path d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32
                  32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7
                   14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32
                    64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 
                    96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                  </svg>
                     view chart</a>

        @php
         $date = new DateTime("now", new DateTimeZone('America/Argentina/Buenos_Aires') );
         $datenow=$date->format('M-d-Y g:i a');
        @endphp
        
        <a href="{{ route('monthbudget-pdf',['id' => $id, 'datenow'=>$datenow, 'iduser'=>auth()->user()->id]) }}" 
         target="_blank" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
          focus:ring-primary-300 font-medium rounded-lg
           text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
            dark:bg-primary-600 dark:hover:bg-primary-700 
            focus:outline-none dark:focus:ring-primary-800 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:#ffff;"
            class="w-6 h-6 inline-block  " stroke="currentColor" viewBox="0 0 384 512">
            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License
               - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.
               --><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7
                64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 224H88c30.9 0
                 56 25.1 56 56s-25.1 56-56 56H80v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V320 240c0-8.8
                  7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H80v48h8zm72-64c0-8.8 
                  7.2-16 16-16h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H176c-8.8
                   0-16-7.2-16-16V240zm32 112h8c8.8 0 
                   16-7.2 16-16V272c0-8.8-7.2-16-16-16h-8v96zm96-128h48c8.8 0 16 7.2 16 16s-7.2 16-16 
                   16H304v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H304v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V304
                    240c0-8.8 7.2-16 16-16z"/></svg>
            Export to PDF</a>

          <a href="{{ route('monthbudgets.create',['id' => $id]) }}" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
          focus:ring-primary-300 font-medium rounded-lg
           text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
            dark:bg-primary-600 dark:hover:bg-primary-700 
            focus:outline-none dark:focus:ring-primary-800 text-white">+ Create New Data</a>
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
                           Description
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                               Qty
                                   </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                price in dollar
                              </th>
                               <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                                Total 
                              </th>
                              <th scope="col" class="text-sm font-medium uppercase text-white px-6 py-4">
                               Dollar Rate
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
                            @foreach ($monthbudget as $monthbudget)
                            <tr class="bg-white border-b">
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> 
                                {{ ++$i }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $monthbudget->description }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $monthbudget->unitquantity }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $monthbudget->price }}
                              </td>

                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $monthbudget->total }}
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                ${{ $monthbudget->dollar }} 
                               
                              </td>
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                {{ $monthbudget->date }}
                              </td>
                             
                              <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('monthbudgets.destroy',[$monthbudget->id, 'idbudget' => $id]) }}" 
                                   id="form-delete"  method="POST">
                                  
                                  <a class="text-indigo-600 hover:text-indigo-900" 
                                  href="{{ route('monthbudgets.show',[$monthbudget->id, 'id' => $id]) }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </a>
                                  
                                  <a href="{{ route('monthbudgets.edit', [$monthbudget->id, 'id' => $id]) }} "
                                     class="text-indigo-600 hover:text-indigo-900 ">
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
<!-- Two columns -->
<div class="flex mb-4 text-lg font-bold mt-5  ">
  <div class=" ml-5 w-1/2  h-full"> 
    <p class=" capitalize  text-green-700 mt-5"><span class="text-purple-700">
      salary work: </span>${{ number_format($monthbudget->amount, 2, ',', ' ') }}</p>
    <p class=" capitalize  text-blue-700 mt-5"><span class="text-purple-700">
      total expenses local currency: </span>${{ number_format($sum2, 2, ',', ' ') }} 
   </p>
  <p class="capitalize  text-red-900 mt-5"><span class="text-purple-700">
    total dollar monthly expenses: </span>{{ number_format($sum, 2, ',', ' ') }}$</p>
   </div>
  
      <div class="w-1/2  h-full">  
    <p class=" capitalize  text-green-700 mt-5"><span class="text-purple-700">
      salary work in dollars: </span>{{ number_format($monthbudget->totalbudget, 2, ',', ' ')  }}$
      
     </p>
      <p class=" capitalize  text-blue-700 mt-5"><span class="text-purple-700">
        remaining salary Local Currency: </span>${{ number_format($monthbudget->amount-$sum2, 2, ',', ' ') }}</p>
        <p class=" capitalize  text-red-900 mt-5 "><span class="text-purple-700">
          remaining salary work in dollars: </span>
          {{ number_format($monthbudget->totalbudget-$sum, 2, ',', ' ') }}$ </p>

        </div>
</div>
               
              </div>
          </div>
      </div>
  </div>
 


<!-- END INDEX SHOW MONTHBUDGETS CRUD--> 

    @endsection