<?php  
 
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Auth;   
use DB;  
use App\User; 
use Session;
use App\Model\Item;
use App\Model\Design;
use App\Model\Invoice;
use App\Model\InvoiceDetail; 
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;
use PDF;
class InvoiceController extends Controller
{
    public function orderview(){ 
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->get();
    return view('backend.invoice.view-customer-print',compact('data'));
    }
        // All deliverY
     public function alldeliveryview(){
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('delivery_status','1')->get();
    return view('backend.delivery.view-all-delivery',compact('data'));
    }
// No Delivery
     public function nodeliveryview(){
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('delivery_status','0')->get();
    return view('backend.delivery.no-all-delivery',compact('data'));
    }

   public function view(){
	$data = InvoiceDetail::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','1')->get();
    return view('backend.invoice.view-invoice',compact('data'));
    }

     public function shirtedit($id){
     $editdata = InvoiceDetail::find($id);
     $designs = Design::orderby('id','ASC')->get();
        return view('backend.invoicedetail.shirt-order-edit',compact('editdata','designs'));
    }

     public function pantedit($id){
     $editdata = InvoiceDetail::find($id);
     $designs = Design::orderby('id','ASC')->get();
        return view('backend.invoicedetail.pant-order-edit',compact('editdata','designs'));
    }

     public function coartedit($id){
     $editdata = InvoiceDetail::find($id);
     $designs = Design::orderby('id','ASC')->get();
        return view('backend.invoicedetail.coart-order-edit',compact('editdata','designs'));
    }
// pdf
    public function shirtpdf($id){
     $data['design'] = InvoiceDetail::find($id);
     $data['designs'] = Design::all();
     $pdf = PDF::loadView('backend.invoicedetail.shirt-order-pdf',$data, [], ['mode' => 'utf-8',
  'format' => [210,148]],[],['font_path' => base_path('vendor/mpdf/mpdf/ttfonts/SolaimanLipi_22-02-2012.ttf')]);
     $pdf->SetProtection(['copy','print'],'','pass');
     return $pdf->stream('design-prnit-report.pdf');

    }

      public function pantpdf($id){
     $data['design'] = InvoiceDetail::find($id);
     $data['designs'] = Design::all();
     $pdf = PDF::loadView('backend.invoicedetail.pant-order-pdf',$data, [], ['mode' => 'utf-8',
  'format' => [210,148]],[],['font_path' => base_path('vendor/mpdf/mpdf/ttfonts/DejaVuSans-Bold.ttf')]);
     $pdf->SetProtection(['copy','print'],'','pass');
     return $pdf->stream('design-prnit-report.pdf');

    }

      public function coartpdf($id){
     $data['design'] = InvoiceDetail::find($id);
     $data['designs'] = Design::all();
     $pdf = PDF::loadView('backend.invoicedetail.coart-order-pdf',$data, [], ['mode' => 'utf-8',
  'format' => [210,148]],[],['font_path' => base_path('vendor/mpdf/ttfonts/SolaimanLipi_22-02-2012.ttf')]);
     $pdf->SetProtection(['copy','print'],'','pass');
     return $pdf->stream('design-prnit-report.pdf');

    }

     public function shirtupdate(Request $request , $id){
     $data = InvoiceDetail::find($id);
     $data->lomba = $request->lomba;
     $data->shina = $request->shina;
     $data->pet = $request->pet;
     $data->hip = $request->hip;
     $data->put = $request->put;
     $data->hat = $request->hat;
     $data->kof = $request->kof;
     $data->halfhata = $request->halfhata;
     $data->muhuri = $request->muhuri;
     $data->gola = $request->gola;
     $data->chotolomba = $request->chotolomba;
     $data->others1 = $request->others1;
     $data->design_id_1 = $request->design_id_1;
     $data->design_id_2 = $request->design_id_2;
     $data->design_id_3 = $request->design_id_3;
     $data->design_id_4 = $request->design_id_4;
     $data->design_id_5 = $request->design_id_5;
     $data->design_id_6 = $request->design_id_6;
     $data->design_id_7 = $request->design_id_7;
     $data->design_id_8 = $request->design_id_8;
     $data->design_id_9 = $request->design_id_9;
     $data->design_id_10 = $request->design_id_10;
     $data->design_id_11 = $request->design_id_11;
     $data->others2 = $request->others2;
     $data->thai = $request->thai;
     $data->komor = $request->komor;
     $data->inside = $request->inside;
     $data->pothers1 = $request->pothers1;
     $data->pothers2 = $request->pothers2;
     $data->pothers3 = $request->pothers3;
     $data->pothers4 = $request->pothers4;
     $data->pothers5 = $request->pothers5;
     $data->balance = $request->balance;
     $data->back = $request->back;
     $data->cothers1 = $request->cothers1;
     $data->tailor_delivery_date = $request->tailor_delivery_date;

     $data->updated_by = Auth::user()->id;
     $data->save();

        return redirect()->route('invoices.view')->with('success','Design Created Successfully');
    }



   
    public function add(){
        $data['items'] = item::orderby('id','ASC')->get();
    	$data['designs'] = design::orderby('id','ASC')->get();
        $invoice_data = Invoice::orderby('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '1000';
            $data['order_no'] = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderby('id','desc')->first()->order_no;
            $data['order_no'] = $invoice_data+1;
        }
        $data['customers'] = Customer::orderby('name','ASC')->get();
         $data['date'] = date('Y-m-d');
    	return view('backend.invoice.add-invoice',$data);
    }

    public function store(Request $request){ 
    
    if($request->item_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');

    }else{

        if($request->paid_amount>$request->esimate_amount){

    }else
        {


             if($request->customer_id == '0'){
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->mobile = $request->mobile;
                $customer->address = $request->address;
                $customer->save();
                $customer_id = $customer->id;
            }else{
                 $customer_id = $request->customer_id;
            }

     $invoice = new Invoice();
     $invoice->order_no = $request->order_no;
     $invoice->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice->description = $request->description;
     $invoice->customer_id = $customer_id;
    $invoice->delivery_date = date('Y-m-d',strtotime($request->delivery_date));
     $invoice->status = '1';
     $invoice->created_by = Auth::user()->id;
     
     DB::transaction(function() use($request,$invoice){
        if($invoice->save()){
            $count_item = count($request->item_id);
        for ($i=0; $i < $count_item; $i++){

           
if($request->customer_id == '0'){
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->mobile = $request->mobile;
                $customer->address = $request->address;
                $customer->save();
                $customer_id = $customer->id;
            }else{
                 $customer_id = $request->customer_id;
            }

            $total_price =0;
     $invoice_details = new InvoiceDetail();
     $invoice_details->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice_details->delivery_date = date('Y-m-d',strtotime($request->delivery_date));
     $invoice_details->invoice_id = $invoice->id;
     $invoice_details->order_no = $invoice->order_no;
     $invoice_details->item_id = $request->item_id[$i];
     $invoice_details->item_price = $request->item_price[$i];
     $invoice_details->tailor_price = $request->tailor_price[$i];
     $invoice_details->selling_quantity = $request->selling_quantity[$i];
     $invoice_details->selling_price = $request->item_price[$i] * $request->selling_quantity[$i];
     $tt = $request->item_price[$i];

    

     // $invoice_details->total_price = (float)$total_price+$request->selling_price[$i];
     // $invoice_details->design_id = $request->design_id;
     $invoice_details->status= '1';
     $invoice_details->customer_id = $customer_id;
     $invoice_details->save();

        }
            
$all_amount = InvoiceDetail::where('invoice_id',$invoice->id)->sum('item_price');
            $payment = new Payment();
            $payment_details = new PaymentDetail();
            $payment->invoice_id = $invoice->id;
            $payment->order_no = $invoice->order_no;
            $payment->customer_id = $customer_id;
            $payment->paid_status =$request->paid_status; 
            $payment->discount_amount =$request->discount_amount;
            $payment->total_amount = $all_amount;

            if($request->paid_status == 'full_paid'){
                $payment->paid_amount = $all_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $all_amount;
            }elseif($request->paid_status == 'full_due') {
                $payment->paid_amount = '0';
                $payment->due_amount = $all_amount;
                $payment_details->current_paid_amount = '0';

            } elseif ($request->paid_status == 'some_paid') {
                $payment->paid_amount = $request->paid_amount;
                $payment->due_amount = $all_amount-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
                }   

                $payment->save();
                $payment_details->invoice_id =  $invoice->id;
                $payment_details->payment_date = date('Y-m-d',strtotime($request->invoice_date));
                $payment_details->customer_id = $customer_id;
                $payment_details->order_no = $invoice->order_no;
                $payment_details->save();

        } 
        
     });


        }
    }

      return redirect()->route('invoices.view')->with('success','Invoice Created Successfully');

    }

          public function delete($id){
            $invoice = Invoice::find($id);
            $invoice->delete();
            InvoiceDetail::where('invoice_id',$invoice->id)->delete();
            Payment::where('invoice_id',$invoice->id)->delete();
            PaymentDetail::where('invoice_id',$invoice->id)->delete();
            return redirect()->route('invoices.view')->with('success','Invoice Deleted Successfully');

          } 
          



    public function pendinglist(){
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','0')->get();
    return view('backend.invoice.pending-list',compact('data'));
    }


  public function allview($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.show-alldata',compact('invoice'));
    }

    public function approve($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.approve-view',compact('invoice'));
    }


public function customerinvoice($id){
        $data['invoice'] = Invoice::with(['invoicedetails'])->find($id);
        $pdf = PDF::loadView('backend.pdf.invoice-customer-pdf',$data, [], ['mode' => 'utf-8',
  'format' => [196,100]],[],['font_path' => base_path('vendor/mpdf/ttfonts/SolaimanLipi_22-02-2012.ttf')]);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('customer-invoice.pdf');

    }
    public function approvestore(Request $request, $id){
            foreach ($request->selling_quantity as $key => $value) {
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $product = Product::where('id',$invoice_details->product_id)->first();
               if($product->quantity < $request->selling_quantity[$key]){
                return redirect()->back()->with('error','Sorry! You Approve Maximum Value');
               }
            }

            $invoice = Invoice::find($id);
            $invoice->approved_by =Auth::user()->id;
            $invoice->status = '1';
            DB::transaction(function() use ($request, $invoice, $id){
                 foreach ($request->selling_quantity as $key => $value) {
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $invoice_details->status = '1';
               $invoice_details->save();
               $product = Product::where('id',$invoice_details->product_id)->first();
               $product->quantity = ((float)($product->quantity))-((float)$request->selling_quantity[$key]);
               $product->save();

           }

            $invoice->save();
            });
           
      return redirect()->route('invoices.view')->with('success','Invoice Approved Successfully');

   } 


     public function dailyorderview(Request $request){
       $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
          $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         return view('backend.invoice.daily-order-view',$data);
    }

     public function dailyorderreport(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = InvoiceDetail::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.invoice.daily-order-view',$data);

     }

       public function dailyorderreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = InvoiceDetail::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.pdf.daily-order-invoice-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-order-invoice-report.pdf');

     }


 public function dailypaymentview(Request $request){
       $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
       $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         return view('backend.invoice.daily-payment-view',$data);
    }

      public function dailypaymentreport(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.invoice.daily-payment-view',$data);

     }

     public function dailypaymentreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.pdf.daily-payment-invoice-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-order-invoice-report.pdf');

     } 

}

//      public function inactive($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 0;
//             $invoice->save();

//            Session::flash('success','Invoice Inactive Successfully!');

//      return back();

//         }
// public function active($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 1;
//             $invoice->save();

//            Session::flash('success','Invoice Active Successfully!');
//      return back();
//         } 
