
@extends('dashboard')

@section('titulo')
Coins Prices
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
      <a href="/coins" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2
       dark:text-gray-400 dark:hover:text-white">
       <a href="/coins" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
    </div>
  </li>
 
</ol>
</nav>

<h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span 
class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
@yield('titulo')</span> </h1>


<!-- Container for demo purpose -->
<div class="container my-12 px-6 mx-auto">

         
<!-- API COINS --> 
<div class="overflow-x-auto relative border-primary-200 shadow-xl lg:rounded-xl ">
  <table class=" w-full text-center text-sm  text-gray-500 dark:text-gray-400" >
      <thead class="border-b text-xs text-white uppercase bg-primary-800 dark:bg-primary-800">
          <tr>
              <th scope="col" class="py-3 px-6">
                coins
              </th>
              <th scope="col" class="py-3 px-6">
                variation
              </th>
              <th scope="col" class="py-3 px-6">
                sale
              </th>
              <th scope="col" class="py-3 px-6">
                buy
              </th>
          </tr>
      </thead>
      <tbody>
        
@foreach($dataArray as $data)

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
               dark:text-white">
               {{$data['casa']['nombre']}}
              </th>
              <td class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
              dark:text-white">
             
              </td>
              <td class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
              dark:text-white">
              {{$data['casa']['venta']}}
              </td>
              <td class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
              dark:text-white">
              {{$data['casa']['compra']}}
              
              </td>
          </tr>
          @endforeach
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
            dark:text-white">
            Euro Oficial
           </th>
           <td class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
           dark:text-white">
          
           </td>
           <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
           dark:text-white">
           {{$dataArray2['oficial_euro']['value_sell']}}
          </th>
          <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
          dark:text-white">
          {{$dataArray2['oficial_euro']['value_buy']}}
         </th>
        </tr>
         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
          dark:text-white">
          Euro Blue
          </th>
         <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
            dark:text-white">
          
           </th>
          
           <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
           dark:text-white">
           {{$dataArray2['blue_euro']['value_sell']}}
          </th>
          <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap
          dark:text-white">
          {{$dataArray2['blue_euro']['value_buy']}}
         </th>
            </tr>

      </tbody>
  </table>
</div>
@foreach ($apiss as $apiss)
                                    
                                     {{ $apiss->urlapi }}
                                     
                                      @endforeach


</div>
<!-- END API COINS --> 
<!-- Container for demo purpose -->

@endsection



