<!DOCTYPE html>

  <head> 
    <!-- Required meta tags -->
    
   <meta charset="utf-8">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
  <!-- Theme style -->
 <style>
@import url('https://fonts.googleapis.com/css2?family=Baloo+Da+2&display=swap');
</style>

    <title>Design Report</title>
  </head>
  <body>
        <table width="100%" class="table table-bordered table-sm" border="1" >
         <tr>
          <th>Order No</th>
           <td style="text-align: center;">{{$design->order_no}}</td>
           <th>Item Name</th>
           <td style="text-align: center;">{{$design['item']['item_name']}}</td>
           <th>Order Date</th>
           <td style="text-align: center;">{{date('d-m-Y',strtotime($design->invoice_date))}}</td>
         </tr>
          <tr>
         <th>Quantity</th>
           <td style="text-align: center;">{{$design->selling_quantity}}</td>
           <th>Item Price</th>
           <td style="text-align: center;">{{$design['item']['item_price']}}</td>
           <th>Delivery Date</th>
           <td style="text-align: center;">{{date('d-m-Y',strtotime($design->tailor_delivery_date))}}</td>
         </tr>
        </table>
    <br>
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            
            <div class="card-body">
                                   
             <table width="100%" class="table table-bordered table-sm" border="1" >
              <!-- <tr>
                    <th style="font-size: 16px" colspan="12">মাপ</th>
                </tr> -->
                 <tr>
                   <th style="text-align: center;">লম্বা</th>
                   <th style="text-align: center;">শিনা</th>
                   <th style="text-align: center;">পেট</th>
                    <th style="text-align: center;">হিপ</th>
                   <th style="text-align: center;">পুট</th>
                   <th style="text-align: center;">হাত</th>
                    <th style="text-align: center;">কফ</th>
                   <th style="text-align: center;">হাফ হাতা</th>
                   <th style="text-align: center;">মুহুরী</th>
                    <th style="text-align: center;">গলা</th>
                   <th style="text-align: center;">ছোট লম্বা</th>
                   <th style="text-align: center;">অন্যান্য</th>

                 </tr> 

                  <tr>
                   <th style="text-align: center;">{{$design->lomba}}</th>
                   <th style="text-align: center;">{{$design->shina}}</th>
                   <th style="text-align: center;">{{$design->pet}}</th>
                    <th style="text-align: center;">{{$design->hip}}</th>
                   <th style="text-align: center;">{{$design->put}}</th>
                   <th style="text-align: center;">{{$design->hat}}</th>
                    <th style="text-align: center;">{{$design->kof}}</th>
                   <th style="text-align: center;">{{$design->halfhata}}</th>
                   <th style="text-align: center;">{{$design->muhuri}}</th>
                    <th style="text-align: center;">{{$design->gola}}</th>
                   <th style="text-align: center;">{{$design->chotolomba}}</th>
                   <th style="text-align: center;">{{$design->others1}}</th>

                 </tr>
              </table>
                <br>
              
                 <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">
                   <!-- <tr>
                    <th style="font-size: 16px" colspan="2">ডিজাইন</th>
                </tr> -->
                 <tr>
                   <th width="25%"  style="text-align: center;">ডিজাইন - ১</th>
                   <td style="text-align: center;">
                    <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_1==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
              </td>
                 </tr>
                 <tr>
                   <th style="text-align: center;">ডিজাইন - ২</th>
                    <td style="text-align: center;">
                 <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_2==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
                    </td>
                  </tr>
                  <tr>
                   <th style="text-align: center;">ডিজাইন - ৩</th>
                   <td style="text-align: center;">
                     <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_3==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
                   </td>
                 </tr>
                 <tr>
                    <th style="text-align: center;">ডিজাইন - ৪</th>
                   <td style="text-align: center;">
                      <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_4==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
                   </td>
                 </tr>
                 <tr>
                   <th style="text-align: center;">ডিজাইন - ৫</th>
                    <td style="text-align: center;">
                       <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_5==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
                    </td>
                  </tr>
                  <tr>
                   <th style="text-align: center;">ডিজাইন - ৬</th>
                   <td style="text-align: center;">
                     <select >
                @foreach($designs as $dgn)
                 <option value="{{$dgn->id}}" {{(@$design->design_id_6==$dgn->id)?"selected":""}}>{{$dgn->design_name}}</option>
                
                @endforeach
                </select>
                   </td>
                 </tr> 
                  
                  <tr>
                   <th style="text-align: center;">অস্যান্য</th>
                   <td style="text-align: center;">{{$design->others2}}</td>
                 </tr> 
                </table>

               <br>
            <table width="100%" class="table table-bordered table-sm" border="1" >
         <tr>
          <th>Order No</th>
           <td style="text-align: center;">{{$design->order_no}}</td>
           <th>Item Name</th>
           <td style="text-align: center;">{{$design['item']['item_name']}}</td>
           <th>Order Date</th>
           <td style="text-align: center;">{{date('d-m-Y',strtotime($design->invoice_date))}}</td>
         </tr>
          <tr>
         <th>Quantity</th>
           <td style="text-align: center;">{{$design->selling_quantity}}</td>
           <th>Item Price</th>
           <td style="text-align: center;">{{$design['item']['item_price']}}</td>
           <th>Delivery Date</th>
           <td style="text-align: center;">{{date('d-m-Y',strtotime($design->tailor_delivery_date))}}</td>
         </tr>
        </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>