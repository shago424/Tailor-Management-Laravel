 @extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Oreder</li>
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
              <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>Order Edit
                  <a style="font-size: 16px"  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> Order List</i></a>
                </h5>
              </div>
            <div class="card-body">
                
              <form method="post" action="{{route('invoices.shirt-update',$editdata->id)}}" id="myform">
                @csrf
                <div class="form-row">

                  <div class="form-group col-md-2">
                    <label for="order_no" >Order No</label>
                    <input type="text" name="order_no" id="order_no" class="form-control-sm" placeholder="Enter Order_no" value="{{ $editdata->order_no }}" readonly="" disabled="">
                  </div>


                  <div class="form-group col-md-2">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control-sm" placeholder="Enter Item Name " value="{{ $editdata['item']['item_name'] }}" readonly="" disabled="">
                  </div>

                  <div class="form-group col-md-2">
                    <label for="item_price">Item Price</label>
                    <input type="text" name="item_price" id="item_price" class="form-control-sm" placeholder="Enter Item Price" value="{{ $editdata['item']['item_price'] }}" readonly="" disabled="">
                  </div>

                  <div class="form-group col-md-2">
                    <label for="mobile">Customer Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control-sm" placeholder="Enter Mobile" disabled="" readonly="" value="{{ $editdata['customer']['mobile'] }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="invoice_date">Order Date</label>
                    <input style="text-align: center;" type="text" name="invoice_date" id="invoice_date" class="form-control-sm" placeholder="Enter invoice_date" disabled="" readonly="" value="{{ date('d-m-Y',strtotime($editdata->invoice_date ))}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="invoice_date"> Delivery Date</label>
                    <input style="text-align: center;" type="text" name="invoice_date" id="invoice_date" class="form-control-sm" placeholder="Enter invoice_date" disabled="" readonly="" value="{{ date('d-m-Y',strtotime($editdata->delivery_date ))}}">
                  </div>
                  </div> 
                  <hr style="border: solid 2px  #0A4833">
                

           <div class="form-row"> 

             <div class="col-md-3">
                  <div class="form-group text-right">
                    <label for="tailor_delivery_date" class="col-sm-12 control-label" for="tailor_delivery_date">Tailor Delivery Date</label>
                  </div>
              </div>
              <div  class="col-md-9">
                    <input style="text-align: center;" type="date" name="tailor_delivery_date" id="tailor_delivery_date" class="form-control " placeholder="লম্বা " value="{{ $editdata->tailor_delivery_date }}">
              </div>

              
              <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="lomba" class="col-sm-12 control-label" for="lomba">লম্বা</label>
                  </div>
              </div>
              <div  class="col-md-2">
                    <input style="text-align: center;" type="text" name="lomba" id="lomba" class="form-control " placeholder="লম্বা " value="{{ $editdata->lomba }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_1">ডিজাইন -১</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_1" class="form-control form-control-sm select2bs4" id="design_id_1">
                <option value="">ডিজাইন -১ বাছাই করুন </option>
                @foreach($designs as $design)
                 <option value="{{$design->id}}" {{(@$editdata->design_id_1==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                
                @endforeach
                </select>
           </div>

           {{-- 2222 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="shina">শীনা</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="shina" id="shina" class="form-control " placeholder="শীনা " value="{{ $editdata->shina }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_2">ডিজাইন -২</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_2" class="form-control form-control-sm select2bs4" id="design_id_2">
                <option value="">ডিজাইন -২ বাছাই করুন </option>
                @foreach($designs as $design)
              <option value="{{$design->id}}" {{(@$editdata->design_id_2==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 33333 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="pet">পেট</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="pet" id="pet" class="form-control " placeholder="পেট "value="{{ $editdata->pet }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_3">ডিজাইন -৩</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_3" class="form-control form-control-sm select2bs4" id="design_id_3">
                <option value="">ডিজাইন -৩ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_3==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 444 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="hip">হিপ</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="hip" id="hip" class="form-control " placeholder="হিপ " value="{{ $editdata->hip }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_4">ডিজাইন -৪</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_4" class="form-control form-control-sm select2bs4" id="design_id_4">
                <option value="">ডিজাইন -৪ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_4==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 5555 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="put">পুট</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="put" id="put" class="form-control " placeholder="পুট "value="{{ $editdata->put }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_5">ডিজাইন -৫</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_5" class="form-control form-control-sm select2bs4" id="design_id_5">
                <option value="">ডিজাইন -৫ বাছাই করুন </option>
                @foreach($designs as $design)
               <option value="{{$design->id}}" {{(@$editdata->design_id_5==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 666 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="hat">হাত</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="hat" id="hat" class="form-control " placeholder="হাত "value="{{ $editdata->hat }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_6">ডিজাইন -৬</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_6" class="form-control form-control-sm select2bs4" id="design_id_6">
                <option value="">ডিজাইন -৬ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_6==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 777 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="kof">কফ</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="kof" id="kof" class="form-control " placeholder="কফ "value="{{ $editdata->kof }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_7">ডিজাইন -৭</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_7" class="form-control form-control-sm select2bs4" id="design_id_7">
                <option value="">ডিজাইন -৭ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_7==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 888 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="halfhata">হাফ হাতা</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="halfhata" id="halfhata" class="form-control " placeholder="হাফ হাতা "value="{{ $editdata->halfhata }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_8">ডিজাইন -৮</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_8" class="form-control form-control-sm select2bs4" id="design_id_8">
                <option value="">ডিজাইন -৮ বাছাই করুন </option>
                @foreach($designs as $design)
               <option value="{{$design->id}}" {{(@$editdata->design_id_8==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 999 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="muhuri">মুহুরী</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="muhuri" id="muhuri" class="form-control " placeholder="মুহুরী "value="{{ $editdata->muhuri }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_9">ডিজাইন -৯</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_9" class="form-control form-control-sm select2bs4" id="design_id_9">
                <option value="">ডিজাইন -৯ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_9==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>
           {{-- 1000 --}}
           <div class="col-md-2 text-center">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="gola">গলা</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="gola" id="gola" class="form-control " placeholder="গলা "value="{{ $editdata->gola }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_10">ডিজাইন -১০</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_10" class="form-control form-control-sm select2bs4" id="design_id_10">
                <option value="">ডিজাইন -১০ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_10==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>

           {{-- 11 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="chotolomba">ছোট লম্বা</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                    <input style="text-align: center;" type="text" name="chotolomba" id="chotolomba" class="form-control " placeholder="ছোট লম্বা "value="{{ $editdata->chotolomba }}">
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="design_id_11">ডিজাইন -১১</label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <select  name="design_id_11" class="form-control form-control-sm select2bs4" id="design_id_11">
                <option value="">ডিজাইন -১১ বাছাই করুন </option>
                @foreach($designs as $design)
                <option value="{{$design->id}}" {{(@$editdata->design_id_11==$design->id)?"selected":""}}>{{$design->design_name}}</option>
                @endforeach
                </select>
           </div>

           {{-- 12 --}}
           <div class="col-md-2">
                  <div class="form-group text-right">
                    <label class="col-sm-12 control-label" for="others1">অন্যান্য</label>
                  </div>
              </div>
              <div class="col-md-2 text-center">
                   <textarea id="others1" name="others1" class="form-control" rows="4" placeholder="অন্যান্য">{{ $editdata->others1 }}</textarea>
              </div>

            <div class="col-md-2">
                  <div class="form-group text-right">
                    <label for="others2"> অন্যান্য ডিজাইন </label>
                    </div>
           </div>
           <div class="col-md-6 text-center">
               <textarea id="others2" name="others2" class="form-control" rows="4" placeholder="অন্যান্য ডিজাইন">{{ $editdata->others2 }} </textarea>
           </div>


                
            </div>

                 <div class="form-group col-md-12" style="padding-top: 20px">
                    
                <input style="font-weight: bold;font-size: 18px" type="submit" value=" Add Design" name="submit" class="btn btn-primary btn-block " >
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
       
     tailor_delivery_date: {
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
<script>
  $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection