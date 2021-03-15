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
              <li class="breadcrumb-item active">View All Delivery Order List</li>
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
           
           <div class="card">
              <div class="card-header" style="background-color:   #f1c40f  ">
                <h5>  View All Delivery Order List
                  <a style="font-weight: bold;font-size: 18px"  href="{{route('invoices.add')}}" class="btn btn-success btn-sm float-right mr-5"><i class="fa fa-plus-circle"> Add Invoice</i></a>
                  <a style="font-weight: bold;font-size: 18px" href="{{route('invoices.view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Order Design List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Order No</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->order_no}}</td>
                 <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->invoice_date))}}</td>
                  <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->delivery_date))}}</td>
                <td>{{$invoice['payment']['customer']['name']}}</td>
                <td>{{$invoice['payment']['customer']['mobile']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['total_amount']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
               
                <td style="text-align: right;">
                     @if($invoice->delivery_status==1)
                    <span style="padding: 8px" class="badge badge-success">Delivery</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">No Delivery</span>
                    @endif
                  </td>
                      <td style="text-align: center;">
                          <a href="{{route('invoices.allview',$invoice->id)}}" class="btn btn-primary btn-xs"  title="Show All Data"> <i class="fa fa-eye"></i></a>
                           <a href="{{ route('customers.invoice-edit',$invoice->id) }}" class="btn btn-warning btn-xs"  title="Edit Invoice"> <i class="fa fa-edit"></i></a>
                           <a href="{{route('invoices.customer-invoice-pdf',$invoice->id)}}" target="_blank" class="btn btn-secondary btn-xs"  title="Show All Data"> <i class="fa fa-print"></i></a>
                            @if($invoice->status==0)
                          <a href="{{route('invoices.delete',$invoice->id)}}" class="btn btn-danger btn-xs" id="delete" style="Delete Data"> <i class="fa fa-trash"></i></a>
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