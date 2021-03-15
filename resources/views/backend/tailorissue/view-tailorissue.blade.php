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
              <li class="breadcrumb-item active">View Tailor Issue</li>
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
                <h5>  Tailor Issue List
                   <a style="font-weight: bolder;font-size: 16px" href="{{route('tailorissues.view-pending-list')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-list"> Pending List</i></a>
                  <a style="font-weight: bolder;font-size: 16px" href="{{route('tailorissues.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Tailor Issue</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th style="text-align: center;">SL</th>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Issue Date</th>
                    <th style="text-align: center;">Status</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tailorissue as $key => $tailor)
                  
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$tailor->id}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($tailor->issue_date))}}</td>
               
               
                      <td style="text-align: center;">
                     @if($tailor->issue_status==1)
                    <span style="padding: 8px" class="badge badge-success">Issued</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Not Issued</span>
                    @endif
                  </td>
                   
                   {{--    <td width="13%">
                       @if($tailor->issue_status==1)
                          <a href="{{route('tailors.inactive',$tailor->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                         @else
                          <a href="{{route('tailors.active',$tailor->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                       @endif
                          <a href="{{route('tailors.edit',$tailor->id)}}" class="btn btn-info btn-xs mr-2" > <i class="fa fa-pencil"></i></a>
                          <a href="" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-eye"></i></a>
                         
                          <a href="{{route('tailors.delete',$tailor->id)}}" class="btn btn-danger btn-xs" id="delete"> <i class="fa fa-trash"></i></a>
                          
                      </td>  --}}
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