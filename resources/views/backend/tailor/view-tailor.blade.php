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
              <li class="breadcrumb-item active">View Tailor</li>
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
                <h5>  Tailor List
                  <a style="font-weight: bold;font-size: 18px" href="{{route('tailors.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Tailor</i></a>
                   <a style="font-weight: bold;font-size: 18px" href="{{route('tailorpayments.add')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-plus-circle"> Add Payment</i></a>
                   <a style="font-weight: bold;font-size: 18px"  href="{{route('tailorpayments.view')}}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-list"> Tailor Payment List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Tailor Name</th>
                    <th>Mobile</th>
                    <th>Work Qty</th>
                    <th>Return Qty</th>
                    <th>Hand Qty</th>
                    {{-- <th>Credit Amount</th> --}}
                    <th>All Amount</th>
                    <th>Total Payment</th>
                    <th>Credit Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $tailor)
                  
                    <tr>
                       @php
                    $all_amount = App\Model\TailorIssue::where('tailor_id',$tailor->id)->where('issue_status','1')->sum('tailor_price');
                   
                    // $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_quantity');
                    @endphp
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$tailor->id}}</td>
                <td>{{$tailor->tailor_name}}</td>
                <td style="text-align: center;">{{$tailor->mobile}}</td>
                <td style="text-align: center;">{{$tailor->quantity}}</td>
                <td style="text-align: center;">{{$tailor->return_quantity}}</td>
                <td style="text-align: center;">{{$tailor->quantity - $tailor->return_quantity }}</td>
               {{--  <td style="text-align: center;">{{$tailor->total_amount}}</td> --}}
                <td style="text-align: center;">{{$all_amount}}</td>
                <td style="text-align: center;">{{$tailor->total_payment}}</td>
                <td style="text-align: center;">{{$all_amount-$tailor->total_payment}}.00</td>
                      <td style="text-align: center;">
                     @if($tailor->status==1)
                    <span style="padding: 8px" class="badge badge-success">Active</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                   
                      <td width="13%">
                       @if($tailor->status==1)
                          <a href="{{route('tailors.inactive',$tailor->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                         @else
                          <a href="{{route('tailors.active',$tailor->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                       @endif
                          <a href="{{route('tailors.edit',$tailor->id)}}" class="btn btn-info btn-xs mr-2" > <i class="fa fa-pencil"></i></a>
                          <a href="" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-eye"></i></a>
                         
                          <a href="{{route('tailors.delete',$tailor->id)}}" class="btn btn-danger btn-xs" id="delete"> <i class="fa fa-trash"></i></a>
                          
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