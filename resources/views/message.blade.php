
<!-- AUTH FORM MESSAGES--> 
 <!--PASSWORD RESET MESSAGE  SUCCESS -->                                            
 @if (session('success'))
  
 <script>
   Swal.fire({
title: 'Great!!',
text: '{{ session('success') }}',
icon: 'success',
confirmButtonText: 'OK'
})
  </script>

   @endif
    <!-- END PASSWORD RESET MESSAGE  SUCCESS -->   
       

      <!-- MESSAGE IF THE USER HAS NOT BEEN VERIFIED WITH ALPINE JS AND SWEETALERT --> 
       <!-- WARNING VERIFICATION HTTP/ MIDDLEWARE/ ISVERIFY EMAIL.PHP-->
      @if (session('warning'))
  
  <script>
    Swal.fire({
 title: 'Warning! Email has not been verified',
 text: '{{ session('warning') }}',
 icon: 'warning',
 confirmButtonText: 'OK'
})
   </script>
 
    @endif
 <!-- END WARNING VERIFICATION HTTP/ MIDDLEWARE/ ISVERIFY EMAIL.PHP -->

<!-- SUCCESS VERIFICATION -->
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
  @if (session('emailverificationmessage2'))

  <div class="bg-green-500 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
    <div class="bg-green-500 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-green-400 rounded-t-lg">
      <p class="font-bold text-white flex items-center">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
        Successful Verification</p>
      <div class="flex items-center">
        <p class="text-white opacity-90 text-xs">
 <!-- DATETIME NOW -->
 @php
 $date = new \DateTime();
 $date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
$datetime=$date->format('H:i A');

 @endphp
  {{  $datetime; }}

 <!-- END DATETIME NOW -->

        </p>
        <button type="button" class="btn-close btn-close-white box-content w-4 h-4 ml-2 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline" data-mdb-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
    <div class="p-3 bg-green-500 rounded-b-lg break-words text-white">
      {{ session('emailverificationmessage2') }}
    </div>
  </div>

  @endif
</div>

<!-- END SUCCESS VERIFICATION -->

<!-- INFO MESSAGE -->
      <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">

  @if (session('messageinfo'))

  <!-- info message -->
<div class="bg-blue-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-5" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
  <div class="bg-blue-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-blue-500 rounded-t-lg">
    <p class="font-bold text-white flex items-center">
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
      </svg>
      Notification Alert</p>
    <div class="flex items-center">
      <p class="text-white opacity-90 text-xs">

         <!-- DATETIME NOW -->
       @php
       $date = new \DateTime();
       $date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
$datetime=$date->format('H:i A');
    
       @endphp
        {{  $datetime; }}
      
       <!-- END DATETIME NOW -->
      </p>
      <button type="button" class="btn-close btn-close-white box-content w-4 h-4 ml-2 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline" data-mdb-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  <div class="p-3 bg-blue-600 rounded-b-lg break-words text-white">
    {{ session('messageinfo') }}
  </div>
</div>
    @endif
  </div>
    <!-- END INFO MESSAGE -->
      
    <!--END MESSAGE IF THE USER HAS NOT BEEN VERIFIED --> 

       <!-- MESSAGE AUTH INVALID CREDENTIALS  -->                                            
  @if (session('error'))
  
  <script>
    Swal.fire({
 title: 'Error!',
 text: '{{ session('error') }}',
 icon: 'error',
 confirmButtonText: 'OK'
})
   </script>
 
    @endif
 
      <!--END MESSAGE AUTH INVALID CREDENTIALS--> 

  <!--MAIL FORGET PASSWORD -->    
  @if (Session::has('message'))

  <script>
    Swal.fire({
 title: 'Password Reset Notification',
 text: ' {{ Session::get('message') }}',
 icon: 'info',
 confirmButtonText: 'OK'
})
   </script> 
                    
              @endif
                     <!-- END MAIL FORGET PASSWORD -->  


<!--END ERROR  PASSWORD CHANGE AUTH MESSAGE ALPINE JS-->
      
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)"> 
    @if(session()->has('errorchangepassword'))
    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
      <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
        <p class="font-bold text-white flex items-center">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
          </svg>
          Notification Alert</p>
        <div class="flex items-center">
          <p class="text-white opacity-90 text-xs">
<!-- DATETIME NOW -->
@php
$date = new \DateTime();
$date->setTimezone(new \DateTimeZone('America/New_York')); //GMT
$datetime=$date->format('H:i A');

@endphp
{{  $datetime; }}

<!-- END DATETIME NOW -->

          </p>
          <button type="button" class="btn-close btn-close-white box-content w-4 h-4 ml-2 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline" data-mdb-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
      <div class="p-3 bg-red-600 rounded-b-lg break-words text-white font-bold">
        {{ session()->get('errorchangepassword') }}
      </div>
    </div>
   
   
@endif
  </div>
  <!--END ERROR  PASSWORD CHANGE AUTH MESSAGE -->

          <!-- END AUTH FORM MESSAGES--> 