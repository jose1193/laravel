





<footer class="bg-blue-700 text-center lg:text-left mt-5">
    <div class="text-white text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      © {{ date('Y') }}
      Copyright - 
      <a class="text-yellow-300 font-bold" href="dashboard">Web App</a>
    </div>
  </footer>
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
  
 
   

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
   <script>
    $(document).ready(function(){
        $('.inputmask').inputmask('999.999');
       
    });
</script>


  
<!-- ALERT MESSAGE SWEET ALERT DELETE CONFIRM FUNCTION --> 
 <!-- jQuery first, then Popper.js para e.preventDefault(), -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
      <script>
        $(function() {
          $('#form-delete').on('submit', function (event) {
                     event.preventDefault();

                     Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        
                        this.submit(); <!-- SEND FORM-->
                      }
                    })

          });
        });

        
      </script>

      
       
      <!-- END ALERT MESSAGE SWEET ALERT DELETE CONFIRM FUNCTION --> 


       <!-- // FUNCTION CALCULATOR  / CREATE/EDIT.BLADE.PHP -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
      <script type="text/javascript">
         
          $(function() {
  
              function autoCalcSetup() {
                  $('form#calculator').jAutoCalc('destroy');
                  $('form#calculator ').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, 
                      emptyAsZero: true});
                  $('form#calculator').jAutoCalc({decimalPlaces: 2});
              }
              autoCalcSetup();
  
  
              $('button.row-remove').on("click", function(e) {
                  e.preventDefault();
  
                  var form = $(this).parents('form')
                  $(this).parents('tr').remove();
                  autoCalcSetup();
  
              });
  
              $('button.row-add').on("click", function(e) {
                  e.preventDefault();
  
                  var $table = $(this).parents('form');
                  var $top = $table.find('input').first();
                  var $new = $top.clone(true);
  
                  $new.jAutoCalc('destroy');
                  $new.insertBefore($top);
                  $new.find('input[type=text]').val('');
                  autoCalcSetup();
  
              });
  
          });
          //-->
      </script>
      <!-- // END FUNCTION CALCULATOR BUDGET  BUDGETs / CREATE/EDIT.BLADE.PHP-->
       
<!-- DATATABLES CRUD--> 
  

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
  
    });
    
  </script>

  
<!-- END DATATABLES CRUD BUDGETS --> 

<!-- PLUGIN SELECT MULTIPLE -->

<script src="{{ asset('js/jquery.multi-select.min.js') }}"></script>

<script type="text/javascript">
  $(function(){
      $('#email').multiSelect();
      $('#ice-cream').multiSelect();
      $('#line-wrap-example').multiSelect({
          positionMenuWithin: $('.position-menu-within')
      });
      $('#categories').multiSelect({
          noneText: 'All categories',
          presets: [
              {
                  name: 'All categories',
                  all: true
              },
              {
                  name: 'My categories',
                  options: ['a', 'c']
              }
          ]
      });
      $('#modal-example').multiSelect({
          'modalHTML': '<div class="multi-select-modal">'
      });
  });
  </script>
<!-- END PLUGIN SELECT MULTIPLE -->

          </body>
  
          </html>