





<footer class="bg-blue-700 text-center lg:text-left">
    <div class="text-white text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      © {{ date('Y') }}
      Copyright - 
      <a class="text-yellow-300 font-bold" href="/">Web App</a>
    </div>
  </footer>
  
  
  <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
  
  
<!-- DATATABLES CRUD--> 
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
  
    });
    
  </script>

  
<!-- END DATATABLES CRUD BUDGETS --> 
   <!-- // FUNCTION CALCULATOR BUDGETs / CREATE.BLADE.PHP -->
 <script>
  //Función que realiza la suma
  function Suma() {
     var amount = document.calculator.amount.value;
     var dollarchange = document.calculator.dollarchange.value;
     try{
        //Calculamos el número escrito:
        amount = (isNaN(parseInt(amount)))? 0 : parseInt(amount);
        dollarchange = (isNaN(parseInt(dollarchange)))? 0 : parseInt(dollarchange);
         document.calculator.totalbudget.value = amount*dollarchange;
     }
     //Si se produce un error no hacemos nada
     catch(e) {}
  }
  </script>
  
   <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CREATE.BLADE.PHP-->
          </body>
  
          </html>