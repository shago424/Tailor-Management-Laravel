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
              <li class="breadcrumb-item active">View Approve</li>
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
                <h5>Issue ID  :<strong> {{$invoice->id}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Issue Date: <strong>{{date('d-m-Y',strtotime($invoice->issue_date))}}</strong>
                  <a  href="{{route('tailorissues.view-pending-list')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Issue Pending List</strong></i></a>
                  <a  href="{{route('tailorissues.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Issue View List</strong></i></a>
               
               
                </h5>
              </div> 
            <div class="card-body">
                                   
              
               <form method="post" action="{{route('tailorissues.approve-store',$invoice->id)}}">
                @csrf
                 <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Issue ID</th>
                      <th>Order Item ID</th>
                      <th>Tailor Name</th>
                      <th>Item Name</th>
                      <th>Issue Quantity</th>
                      <th>Tailor Price</th>
                      <th>Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      <input type="hidden" name="tailor_id[]" value="{{$invoicedetail->category_id}}">
                      <input type="hidden" name="issue_quantity[{{$invoicedetail->id}}]" value="{{$invoicedetail->issue_quantity}}">
                      <input type="hidden" name="tailor_price[{{$invoicedetail->id}}]" value="{{$invoicedetail->tailor_price}}">
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $invoicedetail->issue_id }}</td>
                      <td style="text-align: center;">{{ $invoicedetail->order_details_order_id }}</td>
                      <td>{{$invoicedetail['tailor']['tailor_name']}}</td>
                      <td>{{$invoicedetail['item']['item_name']}}</td>
                      <td style="text-align: center;">{{$invoicedetail->issue_quantity}}</td>
                      <td style="text-align: right;">{{$invoicedetail->tailor_price}}</td>
                       <td style="text-align: right;">{{$invoicedetail->tailor_price * $invoicedetail->issue_quantity}}.00</td>
                      
                    </tr>

                   @php
                   $total_sum += $invoicedetail->tailor_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="7">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                    
                  </tbody>
                </table>
                <button id="approve" type="submit" class="btn btn-danger float-right">Issue Approve Store</button>
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