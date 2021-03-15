@extends('backend.layouts.master') 
@section('content') 
 
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Date By Search Order</li>
            </ol>
          </div> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->

          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Date By Search Order
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Order List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
                
            
   
  <form method="GET" action="{{ route('invoices.daily-report-pdf') }}" id="myform" target="_blank">
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="start_date" class="col-sm-12 control-label">Start Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-3">
            <input type="text" name="start_date" class="form-control-sm"  id="datepicker" placeholder="YYYY-MM-DD" data-validation="requierd" readonly="" id="start_date">
            @error('start_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        
        <div class="col-sm-3">
            <input type="text" name="end_date" class="form-control form-control-sm"  id="datepicker1" placeholder="YYYY-MM-DD" data-validation="requierd"readonly="" id="end_date">
            @error('end_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="col-md-1">
    <div class="form-group"> 
        <label for="end_date" class="col-sm-12 control-label">End Date <span class="text-danger">*</span></label>
      </div>
    </div>

        <div class="col-md-3">
        <input type="submit" name="" class="btn btn-success" target="_blank" value="Date By Search PDF Report">
    </div>

      
         </div>
         </form>


           <form method="GET" action="{{ route('deliveries.daily-report') }}" id="myform2">
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="start_date" class="col-sm-12 control-label">Start Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-3">
            <input type="text" name="start_date" class="form-control-sm"  id="datepicker3" placeholder="YYYY-MM-DD" data-validation="requierd" readonly="" id="start_date">
            @error('start_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        
        <div class="col-sm-3">
            <input type="text" name="end_date" class="form-control form-control-sm"  id="datepicker4" placeholder="YYYY-MM-DD" data-validation="requierd"readonly="" id="end_date">
            @error('end_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="col-md-2">
    <div class="form-group"> 
        <label for="end_date" class="col-sm-12 control-label">End Date <span class="text-danger">*</span></label>
      </div>
    </div>

        <div class="col-md-2">
        <input type="submit" name="" class="btn btn-success" target="_blank" value="Date By Search">
    </div>

      
         </div>
         </form>
</div>




<!-- Strat Card Body 2 -->


              </div>


              <div class="card">
             
            <br>
            <div class="card-body">
               <div class="text-center" style="font-weight: bold;font-size: 18px">
                <strong><u>Date By Invoice Report :</u></strong>
                Start Date : {{date('d-m-Y',strtotime($start_date))}}<strong> &nbsp;&nbsp;</strong> 
              
               End Date : {{date('d-m-Y',strtotime($end_date))}} <strong >&nbsp;&nbsp;</strong>
                
              </div>        
               
                 <table id="example1" class="table table-bordered table-sm">
                  
                <thead>
                   <tr style="background-color: #0A4833;color: white">
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
                      <td style="background-color: lightgreen;text-align: center;">{{$total_total_qty}}</td>
                       <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                      
                    </tr>
                </table>

             
               
               
                

                </div>
              </div>

            <!-- /.card -->

            <!-- DIRECT CHAT --> 
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- store -->


  <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

     <script>
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

    <script>
        $('#datepicker3').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

     <script>
        $('#datepicker4').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      start_date: {
      required: true,
        
      },

      end_date: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<script>
$(function () {
  
  $('#myform2').validate({
    rules: {

    
      start_date: {
      required: true,
        
      },

      end_date: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


  @endsection
