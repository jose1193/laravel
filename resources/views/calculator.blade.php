
@extends('dashboard')

@section('titulo')
Coins Calculator
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





  
<!-- FLEX DIV-->



<div class="mb-4 border-b border-primary-200 shadow-xl lg:rounded-xl   dark:border-gray-700">
  <ul class="flex flex-wrap -mb-px  mx-auto text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
      <li class="mr-2" role="presentation">
          <button class="inline-block p-4
           rounded-t-lg border-b-2 text-blue-600
            hover:text-blue-600 dark:text-blue-500 
            dark:hover:text-blue-500 border-blue-600
             dark:border-blue-500 capitalize" id="profile-tab"
              data-tabs-target="#profile2" type="button"
               role="tab" aria-controls="profile2" aria-selected="true">Dolar</button>
      </li>
      <li class="mr-2" role="presentation">
          <button class="inline-block p-4 rounded-t-lg capitalize
           border-b-2 border-transparent hover:text-gray-600
            hover:border-gray-300 dark:hover:text-gray-300 
            dark:border-transparent text-gray-500 dark:text-gray-400
             border-gray-100 dark:border-gray-700" id="dashboard-tab2"

              data-tabs-target="#dashboard2" type="button" role="tab"
               aria-controls="dashboard2" aria-selected="false">dolar oficial</button>
      </li>
      <li class="mr-2" role="presentation">
          <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent
           hover:text-gray-600 hover:border-gray-300
            dark:hover:text-gray-300 dark:border-transparent
             text-gray-500 dark:text-gray-400 border-gray-100
              dark:border-gray-700 capitalize" id="settings-tab2"
               data-tabs-target="#settings2" type="button"
                role="tab" aria-controls="settings2" aria-selected="false">euro</button>
      </li>
      <li role="presentation">
          <button class="capitalize inline-block p-4 rounded-t-lg 
          border-b-2 border-transparent hover:text-gray-600
           hover:border-gray-300 dark:hover:text-gray-300
            dark:border-transparent text-gray-500 dark:text-gray-400
             border-gray-100 dark:border-gray-700" id="contacts-tab2"
              data-tabs-target="#contacts2" type="button" role="tab" aria-controls="contacts2"
               aria-selected="false">euro oficial</button>
      </li>
  </ul>
</div>
<div id="myTabContent">
  <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
      <!--   dollar Calculator-->
    <form class="w-full max-w-8xl" name="calculator3">
      <div class="flex flex-wrap -mx-3 mb-6 ">
        <div class="w-full md:w-1/4 ">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Amount of Argentine pesos (ARS)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 
          border border-blue-700
           rounded py-3 px-4 mb-3
            leading-tight focus:outline-none
             focus:bg-white" id="grid-first-name"
             name="amount3" onKeyUp="Suma3()"  maxlength="30" required type="text" >
         
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Price (USD) 
          </label>
          <input class=" appearance-none block w-full
           bg-gray-200 text-gray-700 border
            border-gray-200 rounded py-3 px-4 leading-tight
             focus:outline-none focus:bg-white
              focus:border-gray-500"  name="dollarchange3" 
              value=" {{$dataArray2['blue']['value_sell']}}"  onKeyUp="Suma3()" required
               id="grid-last-name" type="text" maxlength="30" >
        </div>

        <div class="w-full md:w-1/4 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Foreign Currency Amount (USD)
          </label>
          <input class=" appearance-none block w-full
           bg-gray-200 text-gray-700 border
            border-gray-200 rounded py-3 px-4 leading-tight
             focus:outline-none focus:bg-white
              focus:border-gray-500" maxlength="30" name="totalbudget3"  required
               id="grid-last-name" type="text" >
        </div>

      </div>
     
     
       
       
      </div>
    </form>
   <!--   end  dollar Calculator-->
  </div>
  <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard2" role="tabpanel" aria-labelledby="dashboard-tab">
      
  <!--   dollar oficial Calculator-->
  <form class="w-full max-w-8xl" name="calculator2">
    <div class="flex flex-wrap -mx-3 mb-6 ">
      <div class="w-full md:w-1/4 ">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Amount of Argentine pesos (ARS)
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 
        border border-blue-700
         rounded py-3 px-4 mb-3
          leading-tight focus:outline-none
           focus:bg-white" id="grid-first-name"
           name="amount2" onKeyUp="Suma2()"  maxlength="30" required type="num" >
       
      </div>
      <div class="w-full md:w-1/4 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Price (USD) 
        </label>
        <input class=" appearance-none block w-full
         bg-gray-200 text-gray-700 border
          border-gray-200 rounded py-3 px-4 leading-tight
           focus:outline-none focus:bg-white
            focus:border-gray-500"  name="dollarchange2" 
            value=" {{$dataArray2['oficial']['value_sell']}}"  onKeyUp="Suma2()" required
             id="grid-last-name" type="num" maxlength="30" readonly >
      </div>

      <div class="w-full md:w-1/4 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Foreign Currency Amount (USD)
        </label>
        <input class=" appearance-none block w-full
         bg-gray-200 text-gray-700 border
          border-gray-200 rounded py-3 px-4 leading-tight
           focus:outline-none focus:bg-white
            focus:border-gray-500" maxlength="30" name="totalbudget2"  required
             id="grid-last-name" type="num" readonly >
      </div>

    </div>
   
   
     
     
    </div>
  </form>
 <!--   end dollar oficial Calculator-->

  </div>
  <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings2" role="tabpanel" aria-labelledby="settings-tab">
      <!--  oficial euro Calculator-->
      <form class="w-full max-w-8xl" name="calculator4">
        <div class="flex flex-wrap -mx-3 mb-6 ">
          <div class="w-full md:w-1/4 ">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              Amount of Argentine pesos (ARS)
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 
            border border-blue-700
             rounded py-3 px-4 mb-3
              leading-tight focus:outline-none
               focus:bg-white" id="grid-first-name"
               name="amount4" onKeyUp="Suma4()"  maxlength="30" required type="text" >
           
          </div>
          <div class="w-full md:w-1/4 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Price (EUR) 
            </label>
            <input class=" appearance-none block w-full
             bg-gray-200 text-gray-700 border
              border-gray-200 rounded py-3 px-4 leading-tight
               focus:outline-none focus:bg-white
                focus:border-gray-500"  name="dollarchange4" 
                value=" {{$dataArray2['blue_euro']['value_sell']}}"  onKeyUp="Suma4()" required
                 id="grid-last-name" type="text" maxlength="30" >
          </div>
  
          <div class="w-full md:w-1/4 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Foreign Currency Amount (EUR)
            </label>
            <input class=" appearance-none block w-full
             bg-gray-200 text-gray-700 border
              border-gray-200 rounded py-3 px-4 leading-tight
               focus:outline-none focus:bg-white
                focus:border-gray-500" maxlength="30" name="totalbudget4"  required
                 id="grid-last-name" type="text" >
          </div>
  
        </div>
       
       
         
         
        </div>
      </form>
     <!--   end euro Calculator-->
  </div>
  <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contacts2" role="tabpanel" aria-labelledby="contacts-tab">
      
    <!--  oficial euro Calculator-->
    <form class="w-full max-w-8xl" name="calculator5">
      <div class="flex flex-wrap -mx-3 mb-6 ">
        <div class="w-full md:w-1/4 ">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Amount of Argentine pesos (ARS)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 
          border border-blue-700
           rounded py-3 px-4 mb-3
            leading-tight focus:outline-none
             focus:bg-white" id="grid-first-name"
             name="amount5" onKeyUp="Suma5()"  maxlength="30" required type="text" >
         
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Price (EUR) 
          </label>
          <input class=" appearance-none block w-full
           bg-gray-200 text-gray-700 border
            border-gray-200 rounded py-3 px-4 leading-tight
             focus:outline-none focus:bg-white
              focus:border-gray-500"  name="dollarchange5" 
              value=" {{$dataArray2['oficial_euro']['value_sell']}}"  onKeyUp="Suma5()" required
               id="grid-last-name" type="text" maxlength="30" >
        </div>

        <div class="w-full md:w-1/4 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Foreign Currency Amount (EUR)
          </label>
          <input class=" appearance-none block w-full
           bg-gray-200 text-gray-700 border
            border-gray-200 rounded py-3 px-4 leading-tight
             focus:outline-none focus:bg-white
              focus:border-gray-500" maxlength="30" name="totalbudget5"  required
               id="grid-last-name" type="text" >
        </div>

      </div>
     
     
       
       
      </div>
    </form>
   <!--   end OFICIAL euro Calculator -->
    </div>
</div>


<p class="text-2xl font-bold capitalize text-blue-700 mt-5 my-5"> 
  <span class="text-purple-700">Dollar Rate:</span> 
  ${{$dataArray2['blue']['value_sell']}} </p>
  
    <p class="text-2xl font-bold capitalize text-blue-700 mt-5 my-5"> 
      <span class="text-purple-700"> Oficial: </span> 
       ${{$dataArray2['oficial']['value_sell']}} </p>
       <p class="text-2xl font-bold capitalize text-blue-700 mt-5 my-5"> 
  <span class="text-purple-700"> Euro:  </span>


   ${{$dataArray2['blue_euro']['value_sell']}}  </p>
   <p class="text-2xl font-bold capitalize text-blue-700 mt-5 my-5"> 
  <span class="text-purple-700"> Euro Oficial: </span> 
  ${{$dataArray2['oficial_euro']['value_sell']}} 
  </p>
<!--END FLEX DIV -->

<!-- END CALCULATOR COINS --> 
<!-- Container for demo purpose -->

@endsection



<!-- // FUNCTION CALCULATOR BUDGETs / CALCULATOR.BLADE.PHP -->
<script>
  //Función que realiza la suma
  function Suma2() {
     var amount2 = document.calculator2.amount2.value;
     var dollarchange2 = document.calculator2.dollarchange2.value;
     try{
        //Calculamos el número escrito:
        amount2 = (isNaN(parseInt(amount2)))? 0 : parseInt(amount2);
        dollarchange2 = (isNaN(parseInt(dollarchange2)))? 0 : parseInt(dollarchange2);
         document.calculator2.totalbudget2.value = (amount2/dollarchange2).toFixed(2);
     }
     //Si se produce un error no hacemos nada
     catch(e) {}
  }
  </script>
  
   <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CALCULATOR.BLADE.PHP-->

   
<!-- // FUNCTION CALCULATOR BUDGETs / CALCULATOR.BLADE.PHP -->
<script>
  //Función que realiza la suma
  function Suma3() {
     var amount3 = document.calculator3.amount3.value;
     var dollarchange3 = document.calculator3.dollarchange3.value;
     try{
        //Calculamos el número escrito:
        amount3 = (isNaN(parseInt(amount3)))? 0 : parseInt(amount3);
        dollarchange3 = (isNaN(parseInt(dollarchange3)))? 0 : parseInt(dollarchange3);
         document.calculator3.totalbudget3.value = (amount3/dollarchange3).toFixed(2);
     }
     //Si se produce un error no hacemos nada
     catch(e) {}
  }
  </script>
  
   <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CALCULATOR.BLADE.PHP-->

      
<!-- // FUNCTION CALCULATOR BUDGETs / CALCULATOR.BLADE.PHP -->
<script>
  //Función que realiza la suma
  function Suma4() {
     var amount4 = document.calculator4.amount4.value;
     var dollarchange4 = document.calculator4.dollarchange4.value;
     try{
        //Calculamos el número escrito:
        amount3 = (isNaN(parseInt(amount4)))? 0 : parseInt(amount4);
        dollarchange4 = (isNaN(parseInt(dollarchange4)))? 0 : parseInt(dollarchange4);
         document.calculator4.totalbudget4.value = (amount4/dollarchange4).toFixed(2);
     }
     //Si se produce un error no hacemos nada
     catch(e) {}
  }
  </script>
  
   <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CALCULATOR.BLADE.PHP-->

         
<!-- // FUNCTION CALCULATOR BUDGETs / CALCULATOR.BLADE.PHP -->
<script>
  //Función que realiza la suma
  function Suma5() {
     var amount5 = document.calculator5.amount5.value;
     var dollarchange5 = document.calculator5.dollarchange5.value;
     try{
        //Calculamos el número escrito:
        amount5 = (isNaN(parseInt(amount5)))? 0 : parseInt(amount5);
        dollarchange5 = (isNaN(parseInt(dollarchange5)))? 0 : parseInt(dollarchange5);
         document.calculator5.totalbudget5.value = (amount5/dollarchange5).toFixed(2);
     }
     //Si se produce un error no hacemos nada
     catch(e) {}
  }
  </script>
  
   <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CALCULATOR.BLADE.PHP-->