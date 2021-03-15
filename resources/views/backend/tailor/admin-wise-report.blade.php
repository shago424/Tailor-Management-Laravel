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
              <li class="breadcrumb-item active">Admin Wise Report</li>
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
                <h5 style="color: white"> Admin Wise Report
                  <a  href="{{route('tailors.tailor-wise-view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Tailor & Admin Search View</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">

               @if($alldata->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;color: red" class=" text-danger">No Data Found </h3>
    </div>
    @else
        
  <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Admin All  Issue Repoet</i></u></div>


   <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    <tr><th colspan="4" class="text-center" style="font-size: 20px">Admin Information</th></tr>
                    <tr>
                      <th width="30%" >Admin iD</th>
                      <th width="15%">Admin Name</th>
                      <th width="17%">Mobile</th>
                      <th >Address</th>
                    </tr>
                     <tr>
                      <td >{{$alldata['0']['user']['id']}}</td>
                      <td style="text-align: center;">{{$alldata['0']['user']['name']}}</td>
                      <td  style="text-align: center;">{{$alldata['0']['user']['mobile']}}</td>
                      <td >{{$alldata['0']['user']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
</div>



    </div>


        
        
       
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                                   
               
                <br>
              
             
                 <table id="example1" class="table table-bordered table-sm">
                   <thead>
                    <tr style="background-color: lightgreen">
                      <th>SL.</th>
                      <th>Issue ID</th>
                      <th>ID</th>
                      <th>Issue Date</th>
                      <th>Admin Name</th>
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
                      <td >{{$details['user']['name']}}</td>
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
            <!-- /.card -->
@endif
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




  @endsection
