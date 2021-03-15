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
              <li class="breadcrumb-item active">Tailor & Admin Wise Report</li>
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
                <h5 style="color: white">Tailor & Admin Wise Report
                  <a  href="{{route('tailors.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Tailor List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
             <div class="row">
              <br> <div class="text-center pt-1 pb-1 col-md-12 " style="text-align: center;font-weight: bold;font-size: 20px;background-color: lightgreen">View Report</div>
               <div class="col-md-12 text-center pt-3 pb-3">
                 <strong style="color: green">Tailor Wise Issue Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="member_wise" value="product_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Admin Wise Issue Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="member_wise" value="credit_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
               </div>
               <br>

<br> <div class="text-center pt-1 pb-1 col-md-12" style="text-align: center;font-weight: bold;font-size: 20px;background-color: lightgreen">PDF Search</div>
<br>
              <div class="col-md-12 text-center pt-3">
                 <strong style="color: green">Tailor Wise Issue Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="pdf_wise" value="product_wise1" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Admin Wise Issue Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="pdf_wise" value="credit_wise2" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
               </div>



             </div>

             <div class="show_product_wise" style="display: none;">
               <form action="{{ route('tailors.wise-report') }}" method="GET" id="productwise" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Tailor Name</label>
                     <select name="tailor_id" class="form-control select2bs4">
                      <option value="">Select Tailor Name</option>
                         @foreach($tailors as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->tailor_name}} --- {{$tailor->mobile}}----{{$tailor->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">View Report</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_credit_wise" style="display: none;">
               <form target="_blank" action="{{ route('tailors.admin-wise-report') }}" method="GET" id="creditwise" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Admin Name</label>
                     <select name="user_id" class="form-control select2bs4">
                      <option value="">Select Admin Name</option>
                         @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}--- {{$user->mobile}}----{{$user->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">View Report</button>
                   </div>
                 </div>
               </form>
             </div>


             <hr>
             <div class="show_product_wise1" style="display: none;">
               <form action="{{ route('tailors.wise-details-report-pdf') }}" method="GET" id="productwise1" target="_blank" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Tailor Name</label>
                     <select name="tailor_id" class="form-control select2bs4">
                      <option value="">Select Tailor Name</option>
                         @foreach($tailors as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->tailor_name}} --- {{$tailor->mobile}}----{{$tailor->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">PDF Report</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_credit_wise2" style="display: none;">
               <form action="{{ route('tailors.admin-wise-report-pdf') }}" method="GET" id="creditwise1" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Admin Name</label>
                     <select name="user_id" class="form-control select2bs4">
                      <option value="">Select Admin Name</option>
                         @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}--- {{$user->mobile}}----{{$user->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">PDF Report</button>
                   </div>
                 </div>
               </form>
             </div>

         

            

            
   
  
</div>

<!-- Strat Card Body 2 -->


              </div>


        
        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual All Issue Repoet</i></u></div>
           <br>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                      @if($alldata->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;color: red" class=" text-danger">No Data Found </h3>
    </div>
    @else              
               
                <br>
              
             
                 <table id="example1" class="table table-bordered table-sm">
                   <thead>
                    <tr style="background-color: lightgreen">
                      <th>SL.</th>
                      <th>Issue ID</th>
                      <th>ID</th>
                      <th>Issue Date</th>
                      <th>Tailor Name</th>
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
                      <td >{{$details['tailor']['tailor_name']}}</td>
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
    @endif        <!-- /.card -->

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

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-product')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Product Name</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.product_name+'</option>';
          });
          $('#product_id').html(html);
        }

      });
    });
  });
</script>


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

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise'){
      $('.show_product_wise').show();
    }else{
       $('.show_product_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'credit_wise'){
      $('.show_credit_wise').show();
    }else{
       $('.show_credit_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise1'){
      $('.show_product_wise1').show();
    }else{
       $('.show_product_wise1').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'credit_wise2'){
      $('.show_credit_wise2').show();
    }else{
       $('.show_credit_wise2').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'paid_wise'){
      $('.show_paid_wise').show();
    }else{
       $('.show_paid_wise').hide();
    }
  });
</script>

<script>
$(function () {
  
  $('#productwise').validate({
    rules: {

    
      tailor_id: {
      required: true,
        
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
  
  $('#productwise1').validate({
    rules: {

    
      tailor_id: {
      required: true,
        
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
  
  $('#creditwise').validate({
    rules: {

    
      category_id: {
      required: true,
        
      },

      user_id: {
      required: true,
        
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
  
  $('#creditwise1').validate({
    rules: {

    
      category_id: {
      required: true,
        
      },

      user_id: {
      required: true,
        
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
  
  $('#paidwise').validate({
    rules: {

    
      tailor_id: {
      required: true,
        
      },

      product_id: {
      required: true,
        
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
