 @extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Tailor</li>
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
              <div class="card-header" style="background-color: crimson;color: white">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Tailor
              @else
              Add Tailor
              @endif
                  <a style="font-size: 18px;font-weight: bold"  href="{{route('tailors.view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Tailor List</i></a>
               </b> </h5>
              </div>  
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('tailors.update',$editdata->id):route('tailors.store')}}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="tailor_name">Tilor Name</label>
                    <input type="text" name="tailor_name" id="tailor_name" class="form-control" placeholder="Ente Tailor Name"value="{{ @$editdata->tailor_name }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="item_id">Item Name</label>
                    <select  name="item_id" class="form-control select2bs4" id="item_id">
                  <option value="">Select item</option>
                      @foreach($items as $item)
                      <option value="{{$item->id}}" {{(@$editdata->item_id==$item->id)?"selected":""}}>{{$item->item_name}}</option>
                @endforeach 
            </select>
                  </div>

                   <div class="form-group col-md-6">
                    <label for="rate">Item Rate</label>
                    <input type="text" name="rate" id="rate" class="form-control" placeholder="Enter Item Rate"  value="{{ @$editdata->rate }}">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="join_date">Joinig Date</label>
                    <input type="date" name="join_date" id="join_date" class="form-control" placeholder="Enter Join Date "value="{{ @$editdata->join_date }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ @$editdata->mobile }}">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address "value="{{ @$editdata->address }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <img id="showimage" src="{{(!empty($editdata->image))?url('backend/tailorimage/'.$editdata->image):url('upload/usernoimage.png')}}" style="width: 100px;height: 120px;border:1px solid #000;">
                    
                    <input  type="file" name="image" id="image"value="{{@$editdata->image}}" class="form-control">
                  </div>



                 <div class="form-group col-md-12">
                    
                <input style="font-weight: bold;font-size: 18px" type="submit" value=" {{(@$editdata)?'Update Tailor':'Add Tailor '}}" name="submit" class="btn btn-primary btn-block " >
                  </div>
                </div> 
              </form>

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
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      name: {
      required: true,
        
      },

      address: {
      required: true,
        
      },
      mobile: {
        required: true,
        
      },
     
      brand_id: {
        required: true,
        
      },
       
      buy_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      special_price: {
        required: true,
        
      },
      special_start: {
        required: true,
        
      },
      special_end: {
        required: true,
        
      },
       
      product_name: {
      required: true,
        
      },
 image: {
        required: true,
        
      },
      thumbail: {
        required: true,
        
      },
      short_des: {
        required: true,
        
      },
       
      long_des: {
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