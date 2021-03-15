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
              <li class="breadcrumb-item active">Admin Wise Payment Report</li>
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
                <h5 style="color: white"> Admin Wise Payment Report
                  <a  href="{{route('tailorpayments.tailor-wise-view-payment')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Tailor & Admin Search View</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
        
  <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Admin All  Payment Repoet</i></u></div>
 @if($alldata->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;color: red" class=" text-danger">No Data Found </h3>
    </div>
    @else

   <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    <tr><th colspan="4" class="text-center" style="font-size: 20px">Admin Information</th></tr>
                    <tr>
                      <th width="8%" >Admin iD</th>
                      <th width="30%">Admin Name</th>
                      <th style="text-align: center;" width="15%">Mobile</th>
                      <th >Address</th>
                    </tr>
                     <tr>
                      <td >{{$alldata['0']['user']['id']}}</td>
                      <td style="text-align: left;">{{$alldata['0']['user']['name']}}</td>
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
                      <th>Payment ID</th>
                      <th>Admin Name</th>
                      <th>Mobile</th>
                      <th>Payment Date</th>
                      <th>Pay Amount</th>
                      
                      
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   // $total_qty = '0';
                   @endphp
                   @foreach($alldata as $key => $details)
                    <tr>
                     <td style="text-align: center;">{{$key+1}}</td>
                     <td style="text-align: center;">{{$details->id}}</td>
                      <td >{{$details['user']['name']}}</td>
                       <td >{{$details['user']['mobile']}}</td>
                        <td style="text-align: center;">{{date('d-m-Y',strtotime($details->payment_date))}}</td>
                      <td style="text-align: right;">{{$details->pay_amount}}</td>
                    
                    </tr>

                   @php
                   $total_sum += $details->pay_amount;
                   // $total_qty += $details->issue_quantity;
                   @endphp
                    @endforeach
                  </tbody>
                   <tr>
                      <th style="text-align: right;" colspan="5">Total Pay Amount</th>
                      
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
