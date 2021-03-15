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
                <h5 style="color: white">Tailor Date Wise Issue
                  <a  href="{{route('tailors.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Tailor List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
                
            
   
  <form method="GET" action="{{ route('tailorpayments.tailor-date-wise-payment-report-pdf') }}" id="myform" target="_blank">
   <div class="row">
        <div class="col-sm-3">
            <input type="text" name="start_date" class="form-control"  id="datepicker" placeholder="( START DATE ) YYYY-MM-DD" data-validation="requierd" readonly="" id="start_date">
            @error('start_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        
        <div class="col-sm-3">
            <input type="text" name="end_date" class="form-control form-control"  id="datepicker1" placeholder="( END DATE ) YYYY-MM-DD" data-validation="requierd"readonly="" id="end_date">
            @error('end_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-4" >
                     <select name="tailor_id" class="form-control select2bs4">
                      <option value="">Select Tailor Name</option>
                         @foreach($tailors as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->tailor_name}} --- {{$tailor->mobile}}----{{$tailor->address}}</option>
                        @endforeach 
                     </select>
             </div>

        <div class="col-md-2">
        <input type="submit" name="" class="btn btn-success" target="_blank" value=" PDF Report">
    </div>

      
         </div>
         <br>
         </form>


           <form method="GET" action="{{ route('tailorpayments.tailor-date-wise-payment-report') }}" id="myform2">
   <div class="row"> 
  
        <div class="col-sm-3">
            <input type="text" name="start_date" class="form-control"  id="datepicker3" placeholder="( START DATE ) YYYY-MM-DD" data-validation="requierd" readonly="" id="start_date">
            @error('start_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        
        <div class="col-sm-3">
            <input type="text" name="end_date" class="form-control form-control"  id="datepicker4" placeholder="( END DATE ) YYYY-MM-DD" data-validation="requierd"readonly="" id="end_date">
            @error('end_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="col-md-4" >
                     <select name="tailor_id" class="form-control select2bs4">
                      <option value="">Select Tailor Name</option>
                         @foreach($tailors as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->tailor_name}} --- {{$tailor->mobile}}----{{$tailor->address}}</option>
                        @endforeach 
                     </select>
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
                Start Date : {{date('d-M-Y',strtotime($start_date))}}<strong> </strong> 
              
               -- {{date('d-M-Y',strtotime($end_date))}} <strong >&nbsp;&nbsp;</strong>
                <br>

                {{--  <table  width="100%" class="table table-bordered table-sm pt-3" border="1" >
                  <tbody>
                    <tr><th colspan="4" class="text-center" style="font-size: 20px">Tailor Information</th></tr>
                    <tr>
                      <th width="30%" >Tailor Name</th>
                      <th width="15%">Item ID</th>
                      <th width="17%">Mobile</th>
                      <th >Address</th>
                    </tr>
                     <tr>
                      <td >{{$alldata['0']['tailor']['tailor_name']}}</td>
                      <td style="text-align: center;">{{$alldata['0']['tailor']['item_id']}}</td>
                      <td  style="text-align: center;">{{$alldata['0']['tailor']['mobile']}}</td>
                      <td >{{$alldata['0']['tailor']['address']}}</td>
                    </tr>
                  </tbody>
                </table> --}}

              </div>  
      
               
                  @if($alldata->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;color: red" class=" text-danger">No Payment Between Date</h3>
    </div>
    @else
                 <table id="example1" class="table table-bordered table-sm">
                  
                <thead>
                   <tr style="background-color: #0A4833;color: white">
                    <th>SL</th>
                    <th>Payment ID</th>
                    <th>Payment Date</th>
                    <th>Tailor Name</th>
                    <th>Mobile</th>
                    <th>Pay Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                     @php
                  $total_total_sum = '0';
                  // $total_total_qty = '0';
                  @endphp
                   @foreach($alldata as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->id}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice->payment_date))}}</td>
                <td>{{$invoice['tailor']['tailor_name']}}</td>
                <td style="text-align: center;">{{$invoice['tailor']['mobile']}}</td>
                
                <td style="text-align: right;">{{$invoice->pay_amount}}</td>
              </tr>

               @php
                $total_total_sum += $invoice->pay_amount;
                 // $total_total_qty += $invoice->issue_quantity;
                @endphp
               @endforeach 
                  </tbody>
                    <tr>
                      <td colspan="5" align="right">Total Amount  </td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                      
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
