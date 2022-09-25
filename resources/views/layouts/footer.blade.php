





<footer class="bg-blue-700 text-center lg:text-left">
    <div class="text-white text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      © {{ date('Y') }}
      Copyright - 
      <a class="text-yellow-300 font-bold" href="dashboard">Web App</a>
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
   

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
   <script>
    $(document).ready(function(){
        $('.inputmask').inputmask('999.999');
       
    });
</script>
          </body>
  
          </html>