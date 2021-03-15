 @php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp

<style type="text/css">
  li{
    font-size: 14px;
  }
  a{
    color: black;
  }
</style>
 <!-- Sidebar Menu -->
      <nav style="" class="mt-2">
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #D2B4DE;color: black" class="nav-item">
                <a style="color: black" href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          <!-- Roles -->

          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #D5DBDB;color: black" class="nav-item">
                <a style="color: black" href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #D5DBDB;color: black" class="nav-item">
                <a style="color: black" href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

         

            <!-- Customers -->
          <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Customer Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: lightgreen;color: black"  class="nav-item">
                <a style="color: black" href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p> 
                </a>
              </li>
          
              <li style="padding-left: 20px;background-color: lightgreen;color: black" class="nav-item">
                <a style="color: black" href="{{route('customers.add')}}" class="nav-link {{($route=='customers.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p> 
                </a>
              </li>
              {{--  <li style="padding-left: 20px;background-color: lightgreen;color: black" class="nav-item">
                <a style="color: black" href="{{route('customers.credit')}}" class="nav-link {{($route=='customers.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit/Due Customer</p> 
                </a>
              </li> --}}
               <li style="padding-left: 20px;background-color: lightgreen;color: black" class="nav-item">
                <a style="color: black" href="{{route('customers.due-customer-view')}}" class="nav-link {{($route=='customers.due-customer-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due Customer</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: lightgreen;color: black" class="nav-item">
                <a style="color: black" href="{{route('customers.paid')}}" class="nav-link {{($route=='customers.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customer</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: lightgreen;color: black" class="nav-item">
                <a style="color: black" href="{{route('customers.wise-report')}}" class="nav-link {{($route=='customers.wise-report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Wise Report</p> 
                </a>
              </li>
            </ul>
          </li> 

           <!-- Tailor -->
      <li class="nav-item has-treeview {{($prefix=='/tailors')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Tailor Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: crimson;color: white" class="nav-item">
                <a style="color: black" href="{{route('tailors.view')}}" class="nav-link {{($route=='tailors.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor View</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: crimson;color: white" class="nav-item">
                <a style="color: black" href="{{route('tailors.tailor-wise-view')}}" class="nav-link {{($route=='tailors.tailor-wise-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor Wise Report</p> 
                </a>
              </li>
               <li style="padding-left: 20px;background-color: crimson;color: white" class="nav-item">
                <a style="color: black" href="{{route('tailors.tailor-date-wise-view')}}" class="nav-link {{($route=='tailors.tailor-date-wise-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor Date Wise Report</p> 
                </a>
              </li>
            </ul>
           </li>

              <!-- Tailor Payments -->
      <li class="nav-item has-treeview {{($prefix=='/tailorpayments')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Tailor Payment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: lightblue;color: black" class="nav-item">
                <a style="color: black" href="{{route('tailorpayments.add')}}" class="nav-link {{($route=='tailorpayments.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Payment</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: lightblue;color: black"  class="nav-item">
                <a style="color: black" href="{{route('tailorpayments.view')}}" class="nav-link {{($route=='tailorpayments.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Payment View</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: lightblue;color: black" class="nav-item">
                <a style="color: black" href="{{route('tailorpayments.tailor-wise-view-payment')}}" class="nav-link {{($route=='tailorpayments.tailor-wise-view-payment')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor Wise Payment</p> 
                </a>
              </li>

               <li style="padding-left: 20px;background-color: lightblue;color: black" class="nav-item">
                <a style="color: black" href="{{route('tailorpayments.tailor-date-wise-view-payment')}}" class="nav-link {{($route=='tailorpayments.tailor-date-wise-view-payment')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Payment</p> 
                </a>
              </li>
             
            </ul>
           </li>


          <!-- Units -->
          <li class="nav-item has-treeview {{($prefix=='/items')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               Item-Design
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #2BE5A2;color: black" class="nav-item ">
                <a style="color: black" href="{{route('items.view')}}" class="nav-link {{($route=='items.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item</p> 
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #2BE5A2;color: black" class="nav-item ">
                <a style="color: black" href="{{route('items.designs.view')}}" class="nav-link {{($route=='items.designs.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Design</p> 
                </a>
              </li>
            </ul>
          </li> 


      <!-- Product -->
      

            <!-- Invoice -->
      <li class="nav-item has-treeview {{($prefix=='/invoices')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Order Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            
              <li style="padding-left: 20px;background-color: #F7DC6F;color: black" class="nav-item ">
                <a style="color: black" href="{{route('invoices.add')}}" class="nav-link  {{($route=='invoices.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Order</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: #F7DC6F;color: black" class="nav-item ">
                <a style="color: black" href="{{route('invoices.order-view')}}" class="nav-link  {{($route=='invoices.order-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Customer</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: #F7DC6F;color: black" class="nav-item ">
                <a style="color: black" href="{{route('invoices.view')}}" class="nav-link  {{($route=='invoices.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Design</p> 
                </a>
              </li>
            
               <li style="padding-left: 20px;background-color: #F7DC6F;color: black" class="nav-item ">
                <a style="color: black" href="{{route('invoices.pending-list')}}" class="nav-link {{($route=='invoices.pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending List</p> 
                </a>
              </li>
             {{--  <li class="nav-item">
                <a href="{{route('invoices.daily-order-view')}}" class="nav-link {{($route=='invoices.daily-order-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p> 
                </a>
              </li> --}}
            </ul>
           </li>

                  <!-- Tailor -->
      <li class="nav-item has-treeview {{($prefix=='/tailorissues')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Tailor Issue Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

             <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #32DDBE;color: black" class="nav-item ">
                <a style="color:black" href="{{route('tailorissues.add')}}" class="nav-link {{($route=='tailorissues.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor Add Issue</p> 
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #32DDBE;color: black" class="nav-item ">
                <a style="color:black" href="{{route('tailorissues.view')}}" class="nav-link {{($route=='tailorissues.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tailor Issue View</p> 
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #32DDBE;color: black" class="nav-item ">
                <a style="color:black" href="{{route('tailorissues.view-pending-list')}}" class="nav-link {{($route=='tailorissues.view-pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Pending List</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li style="padding-left: 20px;background-color: #32DDBE;color: black" class="nav-item ">
                <a style="color:black" href="{{route('tailorissues.view-return-list')}}" class="nav-link {{($route=='tailorissues.view-return-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Return List</p> 
                </a>
              </li>
            </ul>
           </li>


            

     

            <!-- Stock -->
      <li class="nav-item has-treeview {{($prefix=='/deliveries')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                All Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li style="padding-left: 20px;background-color: #FC9235;color: black" class="nav-item ">
                <a style="color: black" href="{{route('deliveries.daily-order-view')}}" class="nav-link {{($route=='deliveries.daily-order-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Order Report</p> 
                </a>
              </li>

               <li style="padding-left: 20px;background-color: #FC9235;color: black" class="nav-item ">
                <a style="color: black" href="{{route('deliveries.daily-payment-view')}}" class="nav-link {{($route=='deliveries.daily-payment-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Payment Report</p> 
                </a>
              </li>

              <li style="padding-left: 20px;background-color: #FC9235;color: black" class="nav-item ">
                <a style="color: black" href="{{route('deliveries.all-delivery-view')}}" class="nav-link {{($route=='deliveries.all-delivery-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Delivery View</p> 
                </a>
              </li>
              <li style="padding-left: 20px;background-color: #FC9235;color: black" class="nav-item ">
                <a style="color: black" href="{{route('deliveries.no-delivery-view')}}" class="nav-link {{($route=='deliveries.no-delivery-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>No Delivery View</p> 
                </a>
              </li>
            </ul>
           </li>
      
      

      
      
        
