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
              <li class="breadcrumb-item active">Add Item</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container"> 
            <div class="row">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="background-color: green;color: white">
            <h4>Item List
                </h4>
            </div>
                    <div class="card-body">
            <!--data listing table-->
             <table id="example1" class="table table-bordered table-hover table-sm">
                <thead>
                <tr style="background-color: #641e16;color: white">
                    <td width="5%">SL</td>
                    <td width="5%">ID</td>
                    <td>Item Name</td>
                    <td style="width: 20%">Item Price</td>
                    <td style="width: 20%">Tailor Price</td>
                    <td style="width: 10%">Action</td>
                </tr> 
                </thead>
                <tbody>
                  @foreach($items as $key => $item)
                     <td>{{$key+1}}</td>
                      <td>{{$item->id}}</td>
                      <td>{{$item->item_name}}</td>
                      <td>{{$item->item_price}}</td>
                      <td>{{$item->tailor_price}}</td>
                        <td>
                    <a title="Edit" href="{{route('items.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('items.delete',$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td> 
                </tbody>
                @endforeach
             
            </table>
         
          </div>
      </div>
        </div>
        <!-- Card 1 End -->

        <div class="col-md-4">
          <div class="card">
        <!-- sl-page-title -->

                <div style="background-color: #a72c5d;font-size: 18px;color: white;font-weight: bold;" class="card-header">
               @if(isset($editdata))
              Edit Item
              @else
              Add Item
              @endif
                 </div>
                     <div class="card-body">
                       <form method="post" action="{{(@$editdata)?route('items.update',$editdata->id):route('items.store')}}" id="myform">
                @csrf
                  <div class="form-row">
                  <div class="form-group col-md-12">
                  <label class="form-control-label">Item Name <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="item_name" id="item_name"  placeholder="Enter Item Name" value="{{ @$editdata->item_name }}">
                  </div>

                   <div class="form-group col-md-12">
                  <label class="form-control-label">Item Price <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="item_price" id="item_price"  placeholder="Enter Item Price" value="{{ @$editdata->item_price }}">
                  </div>

                  <div class="form-group col-md-12">
                  <label class="form-control-label">Tailor Price <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="tailor_price" id="tailor_price"  placeholder="Enter Tailor Price" value="{{ @$editdata->tailor_price }}">
                  </div>

                 

                  
                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary"><strong>{{(@$editdata)?'Update Item':'Add Item'}}</strong> </button>

                             </div>
                            </div>
                        </form>
                     </div>
                </div>

                </div>
            </div>
    </div>
<!-- 2nd modal -->

    </div>
<!-- 2nd modal end-->

    <!-- modal -->
    <!-- /.modal -->
  </section>
</div>
  <script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      item_name: {
      required: true,
        
      },

      item_price: {
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
  <!-- /.content-wrapper -->
  @endsection