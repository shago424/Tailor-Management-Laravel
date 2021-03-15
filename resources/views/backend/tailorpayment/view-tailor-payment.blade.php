@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        <div class="col-sm-6"> 
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Tailor Payment </li>
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
          <section class="col-md-12">
           
           <div class="card" style="border-bottom: 2px solid #0A4833">
              <div class="card-header" style="background-color:#0A4833;color: white">
                <h5>  Tailor Payment List
                  <a style="font-weight: bold;font-size: 16px" href="{{route('tailorpayments.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Tailor Payment</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Pament ID</th>
                    <th>Tailor Name</th>
                    <th>Mobile</th>
                    <th>Payment Date</th>
                    <th>Credit Amount</th>
                    <th>Pay Amount</th>
                    <th>Balance Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $payment)
                  
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$payment->id}}</td>
                <td>{{$payment['tailor']['tailor_name']}}</td>
                <td style="text-align: center;">{{$payment['tailor']['mobile']}}</td>
                <td style="text-align: center;">{{$payment->payment_date}}</td>
                <td style="text-align: right;">{{$payment['tailor']['total_amount']}}</td>
                <td style="text-align: right;">{{$payment->pay_amount}}</td>
                <td style="text-align: right;">{{$payment->balance_amount}}</td>
                
                  <td>
                     @if($payment->status==1)
                    <span style="padding: 8px" class="badge badge-success">Apporve</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Pending</span>
                    @endif
                  </td>
                   
                      <td style="text-align: center;" width="10%">
                       @if($payment->status==1)
                         @else
                          <a href="{{route('tailorpayments.active',$payment->id)}}" title="Payment Apporval" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                       @endif
                          {{-- <a href="{{route('tailorpayments.edit',$payment->id)}}" class="btn btn-info btn-xs mr-2" > <i class="fa fa-pencil"></i></a>
                          <a href="" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-eye"></i></a> --}}
                          @if($payment->status==0)
                          <a href="{{route('tailorpayments.delete',$payment->id)}}" class="btn btn-danger btn-xs" id="delete"> <i class="fa fa-trash"></i></a>
                           @else
                            @endif
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
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
  <!-- /.content-wrapper -->
   <!-- modal -->


    
  @endsection