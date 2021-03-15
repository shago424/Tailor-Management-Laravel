<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 
 
    <title>Individual Member All Invoice Repoet</title>
  </head>
  <body>
       @if($alldata->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;color: red" class=" text-danger">No Data Found </h3>
    </div>
    @else
        <table width="100%" style="border:solid;" >
          <tr>
            <td style="text-align: center;" width="20%">
              <img src="upload/usernoimage.png" style="border-radius: 50%;height: 80px;width: 80px">
            </td>
            <td style="text-align: center;padding-left: 10px;" width="50%">
             <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sheul Tailors</h2>
              <h3 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur, Bogura</h3>
              <h4 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile : 01712411894</h4>
            </td>
            <td style="text-align: right;" width="30%">
               <div class="card-header" style="">
             
                
              </div> 
            </td>
          </tr>
        </table>
        
        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Admin All Issue Repoet</i></u></div>
           <br>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                                   
                <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    <tr><th colspan="4" class="text-center" style="font-size: 20px">Admin Information</th></tr>
                    <tr>
                      <th width="30%" >Admin iD</th>
                      <th width="15%">Admin Name</th>
                      <th width="17%">Mobile</th>
                      <th >Address</th>
                    </tr>
                     <tr>
                      <td >{{$alldata['0']['user']['id']}}</td>
                      <td style="text-align: center;">{{$alldata['0']['user']['name']}}</td>
                      <td  style="text-align: center;">{{$alldata['0']['user']['mobile']}}</td>
                      <td >{{$alldata['0']['user']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
               
                 <table id="example1" class="table table-bordered table-sm" width="100%" border="1">
                   <thead>
                    <tr style="background-color: lightgreen">
                      <th>SL.</th>
                      <th>Issue ID</th>
                      <th>ID</th>
                      <th>Issue Date</th>
                      <th>Admin Name</th>
                      <th>Item Name</th>
                      <th>Tailor Price</th>
                      <th>Issue Qty</th>
                      <th>Subtotal</th>
                      
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                    $total_qty = '0';
                  
                   @endphp
                   @foreach($alldata as $key => $details)
                    <tr>
                     <td style="text-align: center;">{{$key+1}}</td>
                     <td style="text-align: center;">{{$details->issue_id}}</td>
                     <td style="text-align: center;">{{$details->id}}</td>
                     <td style="text-align: center;">{{date('d-m-Y',strtotime($details->issue_date))}}</td>
                      <td >{{$details['user']['name']}}</td>
                      <td>{{$details['item']['item_name']}}</td>
                      <td style="text-align: right;">{{$details->tailor_price}}</td>
                      <td style="text-align: center;">{{$details->issue_quantity}}</td>
                      <td style="text-align: right;">{{$details->tailor_price *$details->issue_quantity}}</td>
                    </tr>

                   @php
                   $total_sum += $details->tailor_price;
                    $total_qty += $details->issue_quantity;
                   @endphp
                    @endforeach
                  </tbody>
                   <tr>
                      <th style="text-align: right;" colspan="7">Total</th>
                       <td style="text-align: center;background-color: lightblue">{{$total_qty}}</td>
                      <td style="text-align: right;background-color: lightblue">{{$total_sum}}.00</td>
                    </tr>
                 </table>
              
                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td style="text-align: center;border-top: solid " width="25%">Tailor Signature</td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Accountant Signature</td>
          </tr>
        </table>
                     @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td style="text-align: center; " width="25%"></td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Owner Signature</td>
          </tr>
        </table>
@endif
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>