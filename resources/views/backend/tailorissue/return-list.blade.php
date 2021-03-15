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
              <li class="breadcrumb-item active">Tailor All Issue  List</li>
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
                <h5>  Tailor All Issue List
                   <a style="font-weight: bolder;font-size: 16px" href="{{route('tailorissues.view')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-list"> Issue View List</i></a>
                   <a style="font-weight: bolder;font-size: 16px" href="{{route('tailorissues.view-pending-list')}}" class="btn btn-secondary btn-sm float-right"><i class="fa fa-list"> Issue View List</i></a>
                  <a style="font-weight: bolder;font-size: 16px" href="{{route('tailorissues.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Tailor Issue</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th style="text-align: center;">SL</th>
                    <th style="text-align: center;">Issue ID</th>
                    <th style="text-align: center;">Order Item ID</th>
                    <th style="text-align: center;">Tailor Name</th>
                    <th style="text-align: center;">Tailor Mobile</th>
                    <th style="text-align: center;">Item Name</th>
                    <th style="text-align: center;">Tailor Price</th>
                    <th style="text-align: center;">Status</th>
                    <th width="18%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tailorissue as $key => $tailorissue)
                  
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$tailorissue->issue_id}}</td>
                <td style="text-align: center;">{{$tailorissue->order_details_order_id}}</td>
                <td style="text-align: center;">{{$tailorissue['tailor']['tailor_name']}}</td>
                <td style="text-align: center;">{{$tailorissue['tailor']['mobile']}}</td>
                <td style="text-align: center;">{{$tailorissue['item']['item_name']}}</td>
                <td style="text-align: center;">{{$tailorissue->tailor_price}}</td>
                      <td style="text-align: center;">
                     @if($tailorissue->return_status==1)
                    <span style="padding: 8px" class="badge badge-success">Return</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">No Return</span>
                    @endif
                  </td>
                   
                      <td style="text-align: center;">
                         @if($tailorissue->return_status==0)
                         <a style="padding: 8px;font-weight: bold;font-size: 14px" href="{{route('tailorissues.return-approve',$tailorissue->id)}}" title="Purchase Approve" class="btn btn-success btn-xs mr-2" ><i class="fa fa-check-circle"></i>  Item Return </a>
                         @else
                         <a style="padding: 8px;font-weight: bold;font-size: 14px" href="{{route('tailorissues.return-inapprove',$tailorissue->id)}}" title="Purchase Approve" class="btn btn-danger btn-xs mr-2" ><i class="fa fa-check-circle"></i> Item Return Back </a>
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