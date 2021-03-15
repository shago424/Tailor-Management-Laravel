<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> Date By Invoice Report</title>
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
                <strong><u>Date By Invoice Report</u></strong>
                Start Date : {{date('d-m-Y',strtotime($start_date))}}<strong> &nbsp;&nbsp;</strong> 
                <br>
               End Date : {{date('d-m-Y',strtotime($end_date))}} <strong >&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                                   
               
               <table id="example1" class="table table-bordered table-sm" border="1" width="100%">
                  
                <thead>
                   <tr style="background-color: lightgreen;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Order No</th>
                    <th>Order Date</th>
                    <th width="15%">Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                     @php
                  $total_total_sum = '0';
                  $total_total_qty = '0';
                  @endphp
                   @foreach($alldata as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->invoice_id}}</td>
                <td style="text-align: center;">{{$invoice->order_no}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice->invoice_date))}}</td>
                <td>{{$invoice['customer']['name']}}</td>
                <td style="text-align: center;">{{$invoice['customer']['mobile']}}</td>
                
                <td style="text-align: left;">{{$invoice['item']['item_name']}}</td>
                <td style="text-align: right;">{{$invoice['item']['item_price']}}</td>
                <td style="text-align: center;">{{$invoice->selling_quantity}}</td>
                <td style="text-align: right;">{{$invoice->selling_price}}</td>
              </tr>

               @php
                $total_total_sum += $invoice->selling_price;
                $total_total_qty += $invoice->selling_quantity;
                @endphp
               @endforeach 
                  </tbody>
                    <tr>
                      <td colspan="8" align="right">Total </td>
                      <td style="background-color: lightgreen;text-align: center;">{{$total_total_qty}</td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                      
                    </tr>
                </table>


                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 12px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td width="25%"></td>
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