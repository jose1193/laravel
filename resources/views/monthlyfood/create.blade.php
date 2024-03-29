@extends('dashboard')

    
@section('titulo')
Create Budget Market
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
          <a href="/monthlyfood" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/monthlyfood" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
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
                <a class="bg-blue-700 hover:bg-blue-800 focus:ring-4
                focus:ring-blue-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-blue-600 dark:hover:bg-blue-700 
                  focus:outline-none dark:focus:ring-blue-800 text-white"
                 href="{{ route('monthlyfood.index') }}">< Back</a>
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
                    
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                        <form action="{{ route('monthlyfood.store') }}" 
                        id="calculator" method="POST" novalidate autocomplete="off">
                            @csrf
                            <div >
                                <label class="block text-md font-bold text-gray-700" for="title">Price in Dollars</label>
                                <input type="num" placeholder=""
                                class="w-full px-4 py-2 mt-2 mb-5 border rounded-md 
                                focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                 name="amount"  required maxlength="120"
                                 >
                            </div>
                            <div>
                                <label class="block text-md font-bold text-gray-700" for="title">
                                   Dollar Rate</label>
                                    

                                <input type="num" placeholder="Dollar"
                                class="  w-full px-4 py-2 mt-2 mb-5 border rounded-md 
                                focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                name="dollar_rate"  value=" {{$dataArray2['blue']['value_sell']}}"  readonly maxlength="100"
                                 >
                            </div>

                            <div>
                                <label class="block text-md font-bold
                                 text-gray-700" for="title">Total Market </label>
                                <input type="num" placeholder="Total"
                                class="  w-full px-4 py-2 mt-2 mb-5 border rounded-md 
                                focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                name="total_market" jAutoCalc="{amount} * {{$dataArray2['blue']['value_sell']}}" readonly maxlength="100"
                                 >
                            </div>
                             <div>
                                <label class="block text-md font-bold text-gray-700" for="title">Create Date</label>
                                
                                <input type="text" placeholder="Date"
                                class="  w-full px-4 py-2 mt-2 border rounded-md 
                                focus:outline-none focus:ring-1 mb-5 focus:ring-blue-600" 
                                name="date" required maxlength="100"
                                 readonly value="{{ date('M-d-Y') }}">
                            </div>
                           
                            <div>
                               
                                <input type="hidden" placeholder=""
                                class="  w-full px-4 py-2 mt-2 border rounded-md 
                                focus:outline-none focus:ring-1 mb-5 focus:ring-blue-600" 
                                name="user_id" required maxlength="100"
                                 readonly value="{{ auth()->user()->id }}">
                               
                                 <input type="hidden" placeholder="Date"
                                class="  w-full px-4 py-2 mt-2 border rounded-md 
                                focus:outline-none focus:ring-1 mb-5 focus:ring-blue-600" 
                                name="year" required maxlength="100"
                                 readonly value="{{ date('Y') }}">

                                 <input type="hidden" placeholder="Date"
                                 class="  w-full px-4 py-2 mt-2 border rounded-md 
                                 focus:outline-none focus:ring-1 mb-5 focus:ring-blue-600" 
                                 name="month" required maxlength="100"
                                  readonly value="{{ date('M') }}">
                            </div>

                            <div class="flex items-center justify-start mt-4 gap-x-2 my-10">
                                <button type="submit" class="bg-blue-700 hover:bg-blue-800 focus:ring-4
                                focus:ring-blue-300 font-medium rounded-lg
                                 text-sm px-4 lg:px-5 py-5 my-4 lg:py-2.5 mr-2
                                  dark:bg-blue-600 dark:hover:bg-blue-700 
                                  focus:outline-none dark:focus:ring-blue-800 text-white
                                  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110
                                  ">Submit</button>
                            </div>
                          
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
<!-- END CREATE BUDGET CRUD--> 
 
    @endsection