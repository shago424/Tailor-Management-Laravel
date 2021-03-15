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
              <li class="breadcrumb-item active"> Add Tailor Payment</li>
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
                <h5 style="color: white">
              @if(isset($editdata))
              Edit Tailor Payment
              @else
              Add Tailor Payment
              @endif

                  <a style="font-weight: bold;font-size: 16px" href="{{route('tailorpayments.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Tailor Payment List</i></a>
                  <a style="font-weight: bold;font-size: 16px" href="{{route('tailors.view')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-list"> View Tailor</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:#CAFAE9 ">
                
            
   
  <form method="POST" action="{{(@$editdata)?route('tailorpayments.update',$editdata->id):route('tailorpayments.store')}}"
  id="myform">
    @csrf
   <div class="row">
    <div class="col-md-2">
   <div class="form-group text-right">
        <label for="tailor_id" class="col-sm-12 control-label"> Tailor Name <span class="text-danger">*</span></label>
      </div>
    </div>
     

          @if(isset($editdata))
                <div class="col-sm-4 ">
          <select  name="tailor_id" class="form-control select2bs4" id="tailor_id"  disabled="">
          <option value="" >Select Tailor  Name</option>
                @foreach($tailors as $tailor)
                <option value="{{$tailor->id}}"{{(@$editdata->tailor_id==$tailor->id)?"selected":""}}>( {{$tailor->id}} )---( {{$tailor->tailor_name}} )---( {{$tailor->mobile}} ) </option>
                @endforeach
            </select>
          @error('tailor_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
              @else
                 <div class="col-sm-4 ">
          <select  name="tailor_id" class="form-control select2bs4" id="tailor_id">
          <option value="">Select Tailor  Name</option>
                @foreach($tailors as $tailor)
                <option value="{{$tailor->id}}"{{(@$editdata->tailor_id==$tailor->id)?"selected":""}}>( {{$tailor->id}} )---( {{$tailor->tailor_name}} )---( {{$tailor->mobile}} ) </option>
                @endforeach
            </select>
          @error('tailor_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
              @endif

    


         <div class="col-md-2">
    <div class="form-group text-right "> 
        <label for="payment_date" class="col-sm-12 control-label">Payment Date <span class="text-danger">*</span></label>
     </div>
   </div>
   <div class="col-sm-4">
          <input type="text" name="payment_date" class="form-control text-center" value="{{@$editdata->payment_date}}"  id="datepicker"  readonly="" placeholder="YYYY-MM-DD">
            @error('payment_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>




            <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="mobile" class="col-sm-12 control-label">Tailor Mobile <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="mobile" class="form-control text-center"  id="mobile"  readonly value="{{@$editdata->mobile}}" style="background: #ECB9C0"   >
            @error('mobile')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>



            <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="pay_amount" class="col-sm-12 control-label">Pay Amount <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="pay_amount" class="form-control text-center"  id="pay_amount" value="{{@$editdata->pay_amount}}"    >
            @error('pay_amount')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>


         
         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="credit_amount" class="col-sm-12 control-label">Credit Amount <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="credit_amount" class="form-control text-center" value="{{@$editdata->credit_amount}}" id="credit_amount"  readonly style="background: #ECB9C0">
            @error('credit_amount')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>



  

        <div class="col-md-12 mt-2" >
        <button style="font-weight: bold;font-size: 20px" type="submit"class="btn btn-primary btn-block ">{{(@$editdata)?'Update Tailor Payment':'Add Tailor Payment '}}</button>
    </div>

</div>
</form>



  </section>
</div>

</div>
</div>



<!-- dropdown session -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#tailor_id',function(){
      var tailor_id =$(this).val();

      $.ajax({
        url:"{{route('get-credit-amount')}}",
        type:"GET",
        data:{tailor_id:tailor_id},
        success:function(data){
        $('#credit_amount').val(data);
        }

      });
    });
  });
</script>



<!-- dropdown class -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#tailor_id',function(){
      var tailor_id =$(this).val();

      $.ajax({
        url:"{{route('get-mobile')}}",
        type:"GET",
        data:{tailor_id:tailor_id},
        success:function(data){
        $('#mobile').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown group -->


<!-- dropdown section -->









<!-- dropdown stock -->






<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      tailor_id: {
      required: true,
        
      },

      payment_date: {
      required: true,
        
      },
     
      pay_amount: {
      required: true,
        
      },

      issue_date: {
      required: true,
        
      },
      book_id: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },

       paid_status: {
        required: true,
        
      },
       
      st_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      limit_date: {
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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
