<!doctype html>
<html lang="en">

<head>
    <title>Monthly Budget Chart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-5 mx-auto">
        <h5 class=" font-weight-bold" style="font-size:21px;">MONTHLY BUDGET PDF Report Chart</h5>
        <h6 class=" text-capitalize font-weight-bold" style="font-size:16px;
        text-transform: capitalize;">User: <span style="color:#01579B;">
            {{$user->name }}  {{$user->lastname }}
        </span></h6>
        <h6 class=" font-weight-bold" style="font-size:16px;">Budget Date: <span style="color:#01579B;">
            
            @php
         
            $date = new DateTime("now", new DateTimeZone('America/Argentina/Buenos_Aires') );
           echo $date->format('M-d-Y g:i a');  @endphp
           </span></h6>

        
<!-- INDEX SHOW CHART--> 
    <div class="max-w-4xl mx-auto mt-8 my-5 pb-5 py-5">
        <canvas id="myChart2" height="100px"></canvas>
        <p class=" capitalize font-bold text-center text-blue-700 mt-5"><span class="text-purple-700">
          total expenses current month: {{date('M-Y')}} </span><br> ${{ number_format($sum, 2, ',', ' ') }} 
       </p>
  </div>
 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
  <script type="text/javascript">
    
        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};
    
        const data = {
          labels: labels,
          datasets: [{
            label: 'Month Budget Chart: {{date('M-Y')}}',
            backgroundColor: '#1976D2',
            borderColor: '#1976D2',
            data: users,
          }]
        };
    
        const config = {
          type: 'line',
          data: data,
          options: {}
        };
    
        const myChart = new Chart(
          document.getElementById('myChart2'),
          config
        );
    
  </script>

<!-- END INDEX SHOW CHART MONTBUDGETS --> 

    </div>
</body>

</html>
