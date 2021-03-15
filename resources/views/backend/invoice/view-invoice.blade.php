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
              <li class="breadcrumb-item active">View Invoice Approved List</li>
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
                <h5>  Order List
                  <a style="font-weight: bold;font-size: 18px"  href="{{route('invoices.add')}}" class="btn btn-success btn-sm float-right mr-5"><i class="fa fa-plus-circle"> Add Invoice</i></a>
                  <a style="font-weight: bold;font-size: 18px" href="{{route('invoices.order-view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Order List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Order No</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                    <th>Customer Name</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Item Price</th>
                    <th>Sub Total</th>
                    {{-- <th>Status</th> --}}
                    <th width="14%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->invoice_id}}</td>
                <td style="text-align: center;">{{$invoice->order_no}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->invoice_date))}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->delivery_date))}}</td>
                <td>{{$invoice['customer']['name']}}</td>
                
                <td >{{$invoice['item']['item_name']}}</td>
                <td style="text-align: center;">{{$invoice->selling_quantity}}</td>
                <td style="text-align: right;">{{$invoice->item_price}}</td>
               <td style="text-align: right;">{{  $invoice->selling_price }}</td>
                {{-- <td style="text-align: right;">
                     @if($invoice->status==1)
                    <span style="padding: 8px" class="badge badge-success">Approved</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Pending</span>
                    @endif
                  </td> --}}
                      <td style="text-align: center;">
                          <a href="{{route('invoices.allview',$invoice->id)}}" class="btn btn-primary btn-xs"  title="Show All Data"> <i class="fa fa-eye"></i></a>
                           @if($invoice->item_id==103)
                            <a href="{{route('invoices.pant-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @elseif($invoice->item_id==201)
                            <a href="{{route('invoices.pant-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @elseif($invoice->item_id==202)
                            <a href="{{route('invoices.pant-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @elseif($invoice->item_id==302)
                            <a href="{{route('invoices.pant-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @elseif($invoice->item_id==105)
                            <a href="{{route('invoices.coart-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @else
                             <a href="{{route('invoices.shirt-edit',$invoice->id)}}" class="btn btn-success btn-xs"  title="Edit Data"> <i class="fa fa-pencil"></i></a>
                            @endif

                            {{-- pdf --}}

                            @if($invoice->item_id==['103','201','202','302'])
                            <a href="{{route('invoices.pant-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank" title="pdf file"> <i class="fa fa-print"></i></a>
                              @elseif($invoice->item_id==201)
                            <a href="{{route('invoices.pant-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank"  title="pdf Data"> <i class="fa fa-print"></i></a>
                            @elseif($invoice->item_id==202)
                            <a href="{{route('invoices.pant-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank"  title="pdf Data"> <i class="fa fa-print"></i></a>
                            @elseif($invoice->item_id==302)
                            <a href="{{route('invoices.pant-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank"  title="pdf Data"> <i class="fa fa-print"></i></a>
                            @elseif($invoice->item_id==105)
                            <a href="{{route('invoices.coart-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank" title="pdf file"> <i class="fa fa-print"></i></a>
                            @else
                             <a href="{{route('invoices.shirt-pdf',$invoice->id)}}" class="btn btn-warning btn-xs" target="_blank" title="pdf file"> <i class="fa fa-print"></i></a>
                            @endif
                          
                          <a href="{{route('invoices.delete',$invoice->id)}}" class="btn btn-danger btn-xs" id="delete" style="Delete Data"> <i class="fa fa-trash"></i></a>
                          
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


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div style="background: gray" class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-sm">
                <tr>
                  <th width="50%">Invoice ID</th>
                  <td width="50%">gfgf</td>
                </tr>
              </table>
            </div>
            <div style="background: gray" class="modal-footer float-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection