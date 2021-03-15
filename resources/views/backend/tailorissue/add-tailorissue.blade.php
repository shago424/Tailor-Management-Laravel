@extends('backend.layouts.master') 
@section('content') 
 
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> 
        <div class="row ">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Tailor Issue</li>
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
                <h5 style="color: white">Add Tailor Issue
                  <a  style="font-weight: bold;font-size: 18px" href="{{route('tailorissues.view')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-list"> Issue List</i></a>
                  <a  style="font-weight: bold;font-size: 18px" href="{{route('tailorissues.view-pending-list')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Issue Pending List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #d9dad6   ">
                
            
   
  
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="issue_date" class="col-sm-12 control-label">Issue Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
             <input type="date" name="issue_date" class="form-control"    placeholder="YYYY-MM-DD" data-validation="requierd" value="{{ $date }}"   id="issue_date">
            @error('issue_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

          <div class="col-md-2">
    <div class="form-group"> 
        <label for="item_id" class="col-sm-12 control-label">Item ID <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="item_id" class="form-control text-center" value="{{old('item_id')}}" id="item_id"  readonly  style="background-color: #D8FDBA" >
            @error('item_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

           



     <div class="col-md-2">
   <div class="form-group">
        <label for="tailor_id" class="col-sm-12 control-label"> Tailor Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <select  name="tailor_id" class="form-control select2bs4" id="tailor_id">
          <option value="">Select Tailor Name</option>
                @foreach($tailors as $tailor)
                <option value="{{$tailor->id}}">{{$tailor->tailor_name}}</option>
                @endforeach
            </select>
          @error('tailor_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

            <div class="col-md-2">
    <div class="form-group"> 
        <label for="tailor_price" class="col-sm-12 control-label">Tailor Price <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="tailor_price" class="form-control text-center" value="{{old('tailor_price')}}" id="tailor_price"  readonly  style="background-color: #D8FDBA" >
            @error('tailor_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="col-md-2">
   <div class="form-group">
        <label for="order_details_order_id" class="col-sm-12 control-label"> Order Details ID <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <select  name="order_details_order_id" class="form-control select2bs4" id="order_details_order_id">
          <option value="">Select Order Item No</option>
                @foreach($items as $item)
                <option value="{{$item->id}}">{{$item->id}} --- {{$item['item']['item_name']}}---{{$item['item']['tailor_price']}}</option>
                @endforeach
            </select>
          @error('order_details_order_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

    
  

    

    
  
  

 
        <div class="col-sm-8">
            <a style="font-size: 14px;font-weight: bold;margin: 0;width: 150px"class="btn btn-danger btn-block float-right"><i  style="font-size: 30px;color: white" class="fa fa-plus-circle addeventmore"> <strong style="color: white;font-size: 16px;margin: 0">Add More</strong></i></a>
        </div></i>
      
         </div>
</div>

<!-- Strat Card Body 2 -->

<div class="card-body"> 
  <form method="POST" action="{{route('tailorissues.store')}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
    <table class="table table-bordered table-sm" width="100%">
      <thead>
        <tr>
          <th width="25%">Tailor Name</th>
          <th width="25%">Order ID</th>
          <th width="25%">Item Name</th>
          <th width="10%">Tailor Price</th>
          <th width="10%">Quantity</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody id="addrow" class="addrow">
        
      </tbody>
      <tbody>
        
        <tr>
          <td colspan="2"></td>
         
          <td></td>
          <td></td>
         <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
<br>
  {{-- <div class="form-row">
    <div class="form-group col-md-12">
      <textarea class="form-control" name="description" id="description" placeholder="Write Here Your Description"></textarea>
    </div>
  </div> --}}

 

 

    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-success btn-block pull-right" id="storebutton">Create Tailor Issue</button>
        </div>
         </div>
      </form>
   </div>

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

<script type="text/x-handlebars-template" id="document-template">
<tr class="delete_add-more_item" id="delete_add-more_item">
    <input type="hidden" name="issue_date" value="@{{issue_date}}">
    <input type="hidden" name="tailor_price[]" value="@{{tailor_price}}">



 <td>
        <input  type="hidden" name="tailor_id[]" value="@{{tailor_id}}">
        @{{tailor_name}}
  </td>

   <td>
        <input  type="hidden" name="order_details_order_id[]" value="@{{order_details_order_id}}">
        @{{order_details_order_id}}
  </td>
    <td>
         <input  type="hidden" name="item_id[]" value="@{{item_id}}">
         @{{item_id}}
      </td>
     <td>
         <input type="hidden" name="tailor_price[]" value="@{{tailor_price}}">
         @{{tailor_price}}

    </td>

 
    <td>
         <input type="number" min="1" name="issue_quantity[]" value="1" class="form-control form-control-sm text-center issue_quantity">
    </td>
     
    
    
     <td class="float-center">
         <i class="btn btn-danger  btn-sm fa fa-window-close removeeventmore"></i>
    </td>
  </tr>
</script>
<!-- add purchase -->
<script type="text/javascript">
  $(document).ready(function () {
  $(document).on("click",".addeventmore", function (){
    var issue_date = $('#issue_date').val();
    var order_details_order_id = $('#order_details_order_id').val();
    var tailor_id = $('#tailor_id').val();
    var tailor_name = $('#tailor_id').find('option:selected').text();
    var item_id = $('#item_id').val();
    var tailor_price = $('#tailor_price').val();




    $('.notifyjs-corner').html('');

    if(issue_date == ''){
      $.notify("Issue Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
    if(order_details_order_id == ''){
      $.notify("Order Details Order ID Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
    
 
    //  if(item_id == ''){
    //   $.notify("Item ID Required",{globalPosition:'top right}',className:'error'});
    //   return false;
    // }
    //  if(tailor_price == ''){
    //   $.notify("Tailor Price Required",{globalPosition:'top right}',className:'error'});
    //   return false;
    // }

     
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data = {
        issue_date:issue_date,
        order_details_order_id:order_details_order_id,
        tailor_id:tailor_id,
        tailor_name:tailor_name,
        item_id:item_id,
        tailor_price:tailor_price
      
      };
      var html = template(data);
      $('#addrow').append(html);
      
  });

  $(document).on("click",".removeeventmore",function(event){
    $(this).closest(".delete_add-more_item").remove();
    totalAmountPrice();
  });


  $(document).on('keyup click','.item_price,.selling_quantity',function(){
    var item_price = $(this).closest("tr").find("input.item_price").val();
    var qty = $(this).closest("tr").find("input.selling_quantity").val();
    var total = item_price * qty;
    $(this).closest("tr").find("input.selling_price").val(total);
    $('#discount_amount').trigger('keyup');
  });

  $(document).on('keyup','#discount_amount',function(){
    totalAmountPrice();
  });
    function totalAmountPrice(){
      var sum =0;
      $(".selling_price").each(function(){
        var value = $(this).val();
        if(!isNaN(value) && value.length != 0){
          sum += parseFloat(value);
        }
      });
      var discount_amount = parseFloat($('#discount_amount').val());
      if(!isNaN(discount_amount) && discount_amount.length != 0){
        sum -= parseFloat(discount_amount);
      }
      $('#estimated_amount').val(sum);
    }
});
</script>
  <!-- dropdown item -->
{{-- <script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      var supplier_id =$('#supplier_id').val();

      $.ajax({
        url:"{{route('get-item')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select item</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.item_id+'">'+v.item.item_name+'</option>';
          });
          $('#item_id').html(html);
        }

      });
    });
  });
</script> --}}

 <!-- dropdown  item priice -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#order_details_order_id',function(){
      var order_details_order_id =$(this).val();

      $.ajax({
        url:"{{route('get-item_id')}}",
        type:"GET",
        data:{order_details_order_id:order_details_order_id},
        success:function(data){
         $('#item_id').val(data);
        }

      });
    });
  });
</script>


 <!-- dropdown  tailor priice -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#order_details_order_id',function(){
      var order_details_order_id =$(this).val();

      $.ajax({
        url:"{{route('get.tailor.price')}}",
        type:"GET",
        data:{order_details_order_id:order_details_order_id},
        success:function(data){
         $('#tailor_price').val(data);
        }

      });
    });
  });
</script>

 <!-- dropdown sub sub category -->
  
{{-- <script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_category_id',function(){
      var sub_category_id =$('#sub_category_id').val();

      $.ajax({
        url:"{{route('get-subsubcategory')}}",
        type:"GET",
        data:{sub_category_id:sub_category_id},
        success:function(data){
          var html = '<option value="">Select Sub Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_sub_category_id+'">'+v.subsubcategory.item_name+'</option>';
          });
          $('#sub_sub_category_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown brand -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_sub_category_id',function(){
      var sub_sub_category_id =$('#sub_sub_category_id').val();

      $.ajax({
        url:"{{route('get-brand')}}",
        type:"GET",
        data:{sub_sub_category_id:sub_sub_category_id},
        success:function(data){
          var html = '<option value="">Select Brand</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.brand_id+'">'+v.brand.item_name+'</option>';
          });
          $('#brand_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#brand_id',function(){
      var brand_id =$('#brand_id').val();

      $.ajax({
        url:"{{route('get-productname')}}",
        type:"GET",
        data:{brand_id:brand_id},
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

<!-- dropdown unit -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-unit')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#unit_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown model -->


<!-- dropdown size -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-size')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
          $('#size').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown color -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-color')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#color').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown product code -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-product-code')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#product_code').val(data);
        
        }

      });
    });
  });
</script>


<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-warranty-time')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#warranty_time').val(data);
        }

      });
    });
  });
</script> --}}

<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-stock')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#stock_quantity').val(data);
        }

      });
    });
  });
</script>

<!-- End dropdown  -->

<!-- paid status  -->
<script type="text/javascript">
  $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'some_paid'){
      $('.paid_amount').show();
    }else{
       $('.paid_amount').hide();
    }
  });
</script>
<!-- customer  -->
<script type="text/javascript">
  $(document).on('change','#customer_id', function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
       $('.new_customer').hide();
    }
  });
</script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      selling_quantity: {
      required: true,
        
      },

      category_id: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      item_price: {
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
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      customer_id: {
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
  @endsection
