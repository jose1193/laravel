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
        <h5 class=" font-weight-bold">MONTHLY BUDGET PDF Report</h5>
        <h6 class=" text-capitalize font-weight-bold">User: <span style="color:#01579B;">
            {{$user->name }}  {{$user->lastname }}
        </span></h6>
        <h6 class=" font-weight-bold">Budget Date: <span style="color:#01579B;">
            
            @php
         
            $date = new DateTime("now", new DateTimeZone('America/Argentina/Buenos_Aires') );
           echo $date->format('M-d-Y g:i a');  @endphp
           </span></h6>
       
        <table class="table table-borderless  text-center mt-5 mb-5
         text-capitalize font-weight-bold" border="1"  >
            <thead>
                <tr style="background-color:#1A237E" class="text-white">
                   
                    <th>Description</th>
                    <th> Qty</th>
                    <th> price in dollar $</th>
                    <th>  Total </th>
                    
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($monthbudget as $monthbudget)
                <tr>
                    
                    <td>  {{ $monthbudget->description }}</td>
                    <td>  {{ $monthbudget->unitquantity }}</td>
                    <td> {{ $monthbudget->price }}</td>

                    <td>   {{ $monthbudget->total }}</td>
                   
                    <td>  {{ $monthbudget->date }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>

        <table border="0" class="font-weight-bold text-capitalize"
         cellpadding="1" cellspacing="1" style="width:750px; ">
            <tbody>
                <tr>
                    <td> salary work: <span style="color:#05852c;"> ${{ number_format($monthbudget->amount, 2, ',', ' ') }}</span></td>
                    <td> salary work in dollars: 
                        <span style="color:#05852c;">
                            {{ number_format($monthbudget->totalbudget, 2, ',', ' ')  }}$
                    </span></td>
                </tr>
                <tr>
                    <td>total expenses local currency:  <span style="color:#1A237E;"> 
                        ${{ number_format($sum2, 2, ',', ' ') }} </span></td>

                    <td>Remaining Salary Local Currency:<span style="color:#1A237E;"> 
                        $ {{ number_format($monthbudget->amount-$sum2, 2, ',', ' ') }}
                    </span></td>
                </tr>
                <tr>
                    <td> total dollar monthly expenses:  <span style="color:#7e1a1a;">
                        {{ number_format($sum, 2, ',', ' ') }}$
                    </span></td>
                    <td>Remaining Salary Work In Dollars:
                        <span style="color:#7e1a1a;"> 
                            {{ number_format($monthbudget->totalbudget-$sum, 2, ',', ' ') }}$
                            </span>

                    </td>
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
       <span style="position:relative;left:-20px;top:-10px;"> {{$user->name }}  {{$user->lastname }}</span>

        </div>


    </div>
</body>

</html>
