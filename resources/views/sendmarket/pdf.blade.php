<!doctype html>
<html lang="en">

<head>
    <title>Genearte PDF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
        table {
            font-size: 14px;
            
        }
        .bg {
  /* The image used */
  background-image: url("https://venmasters.com/img/bg-pdf.jpg");

  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

    </style>
</head>

<body class="bg">
    <br>
    <div class="container-fluid mt-5 mx-auto">
        <h5 class=" font-weight-bold" style="font-size:21px;">ANNUAL MARKET BUDGET PDF Report</h5>
        <h6 class=" text-capitalize font-weight-bold" style="font-size:16px;
        text-transform: capitalize;">User: <span style="color:#01579B;">
            {{$user->name }}  {{$user->lastname }}
        </span></h6>
        <h6 class=" font-weight-bold" style="font-size:16px;"> Date: <span style="color:#01579B;">
            
            @php
         
            $date = new DateTime("now", new DateTimeZone('America/Argentina/Buenos_Aires') );
           echo $date->format('M-d-Y g:i a');  @endphp
           </span></h6>
       
        <table class="table table-borderless  text-center mt-5 
         text-capitalize font-weight-bold" border="1" style="width:100%;text-align: center;" >
            <thead>
                <tr style="background-color:#1A237E; color:#ffff;" class="text-white">
                   
                    <th>Budget $</th>
                    <th>Dollar Rate</th>
                    <th>total local currency  </th>
                    <th> Date</th>
                    
                    
                    
                    
                   
                </tr>
            </thead>
            <tbody style="font-weight:bold;">
                @forelse ($monthlyfoods as $sendmarket)
                <tr>
                    
                    <td>  {{ $sendmarket->amount }}</td>
                    <td> {{ $sendmarket->dollar_rate }}</td>
                    <td>  {{ $sendmarket->total_market }}</td>
                    <td>  {{ $sendmarket->date }}</td>
                
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
<br> <br>
        <table border="0"  class="font-weight-bold text-capitalize"
         cellpadding="1" cellspacing="1" style="width:750px; font-weight:bold;text-transform: capitalize; ">
            <tbody>
               
                <tr>
                    <td>Total Year In Dollars:<span style="color:#1A237E;"> 
                        $ {{ number_format($sum, 2, ',', ' ') }}
                    </span></td>
                    <td>total market local currency:  <span style="color:#1A237E;"> 
                        ${{ number_format($sum2, 2, ',', ' ') }} </span></td>

                   
                </tr>
               
            </tbody>
        </table>
<br>
        <div class="text-right font-weight-bold text-capitalize"
        style="position:relative;top:70px;">
            <img src="https://venmasters.com/img/firma-digital.png"
            style="z-index: 100;position:relative;left:-20px;top:30px" width="130" height="85">
            <p><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
            </u>
            
        </p>
       <span style="position:relative;left:-20px;top:-10px;
       font-weight:bold; text-transform: capitalize; "> {{$user->name }}  {{$user->lastname }}</span>

        </div>


    </div>
</body>

</html>
