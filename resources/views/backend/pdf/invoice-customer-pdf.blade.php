<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title>Customer Invoice</title>

    <style type="text/css">
      body{
        padding: 0;
        margin:0;
      }
    </style>
  </head>
  <body>
        
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
          
            <div class="card-body">
                                    @php
                                     $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
                                    @endphp
                <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    
                    <tr>
                      <th {{-- width="15%" --}}> Name</th>
                      <th {{-- width="15%" --}}>Mobile</th>
                      <th {{-- width="16%" --}}>Order No</th>
                      <th {{-- width="18%" --}}>Order Date</th>
                      <th {{-- width="33%" --}}>Delivery Date</th>
                    </tr>
                     <tr>
                      <td width="15%">{{$invoice['payment']['customer']['name']}}</td>
                      <td style="text-align: center;" {{-- width="17%" --}}>{{$invoice['payment']['customer']['mobile']}}</td>
                      <td {{-- width="16%" --}} style="text-align: center;">{{$invoice->order_no}}</td>
                      <td style="text-align: center;" {{-- width="18%" --}}>{{date('d-M-Y',strtotime($invoice->invoice_date))}}</td>
                      <td style="text-align: center;" {{-- width="33%" --}}>{{date('d-M-Y',strtotime($invoice->delivery_date))}}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
               
                  <table width="80%" class="table table-bordered table-sm" border="1" style="margin-bottom: 15px;">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Item Name</th>
                      <th style="text-align: center;">Quantity</th>
                      <th>Item Price</th>
                      <th>Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   $total_qty = '0';
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      {{-- <input type="hidden" name="category_id[]" value="{{$invoicedetail->category_id}}">
                      <input type="hidden" name="product_id[]" value="{{$invoicedetail->product_id}}">
                      <input type="hidden" name="selling_quantity[{{$invoicedetail->id}}]" value="{{$invoicedetail->selling_quantity}}"> --}}
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td>{{$invoicedetail['item']['item_name']}}</td>
                      <td style="text-align: center;">{{$invoicedetail->selling_quantity}}</td>
                       <td style="text-align: right;">{{$invoicedetail['item']['item_price']}}</td>
                      <td style="text-align: right;">{{$invoicedetail->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $invoicedetail->selling_price;
                    $total_qty += $invoicedetail->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="3">Total</th>
                      <td style="text-align: center;">{{$total_qty}}</td>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                    {{--  <tr>
                      <th style="text-align: right;" colspan="4">Discount Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['discount_amount']}}0.00</td>
                    </tr>
                     @php
                   $total_amount = $total_sum - $invoice['payment']['discount_amount'];
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="4">Total Amount</th>
                      <td style="text-align: right;background-color: #D8FDBA">{{$invoice['payment']['total_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Paid Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Due Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
                    </tr> --}}
                  </tbody>
                </table>
               {{--   @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i> --}}
               
          <table width="80%" border="1" class="table table-bordered table-sm">
            <tr >
              <th style="padding: 5px ;font-size: 14px " >Deliver date may be changed for special reasons.</th>
              <th style="padding: 5px">No objection acceptable after 90 days from the date of order</th>
            </tr>
          </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>