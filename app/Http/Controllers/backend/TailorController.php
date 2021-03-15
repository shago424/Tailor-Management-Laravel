<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\Tailor;
use PDF;
use App\Model\Payment;
use App\Model\Item;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\PaymentDetail; 
use App\Model\TailorIssue;


class TailorController extends Controller
{
    public function view(){
     $data = Tailor::get();
    	return view('backend.tailor.view-tailor',compact('data'));
    }

    public function add(){
    	$items = Item::all();
    	return view('backend.tailor.add-tailor',compact('items'));
    }

    
     public function store(Request $request){

    	$data = new Tailor();
      $data->tailor_name = $request->tailor_name;
      $data->item_id = $request->item_id;
    	$data->join_date = $request->join_date;
    	$data->rate = $request->rate;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;

    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('backend/tailorimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('tailors.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
            $data['editdata'] = Tailor::find($id);
             $data['items'] = Item::all();
            return view('backend.book.add-book',$data);

        }

      public function update(Request $request , $id){
        
       

      $data = Tailor::find($id);
      $data->tailor_name = $request->tailor_name;
        $data->item_id = $request->item_id;
    	$data->join_date = $request->join_date;
    	$data->rate = $request->rate;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->updated_by = Auth::user()->id;

    	if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('backend/tailorimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('backend/tailorimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('tailors.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $tailor = Tailor::find($id);
            $tailor->delete();
           return redirect()->route('tailors.view')->with('success','Tailor Deleted Successfully');

    }

    public function credittailor(){
     $data = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      return view('backend.tailor.credit-tailor',compact('data'));
    }  

     public function credittailorpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.credit-tailor-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-credit-report.pdf');
    }

     public function paidtailor(){
     $data = Payment::whereIn('paid_status',['full_paid'])->get();
      return view('backend.tailor.paid-tailor',compact('data'));
    }  

     public function paidtailorpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.paid-tailor-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-paid-report.pdf');
    }




    public function invoicetailoredit($invoice_id){
      $payment = Payment::where('invoice_id',$invoice_id)->first();
       $invoicedetails = InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
      return view('backend.tailor.edit-tailor-invoice',compact('payment','invoicedetails'));
    } 


     public function invoicetailorupdate(Request $request,$invoice_id){

      if($request->new_paid_amount < $request->paid_amount){
        return redirect()->back()->with('error', 'Sorry! you have paid maximum value');
      }else{
         $payment = Payment::where('invoice_id',$invoice_id)->first();
         $payment_details = new PaymentDetail();
         $payment->paid_status = $request->paid_status;
         if($request->paid_status == 'full_paid'){
          $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
          $payment->due_amount = '0';
          $payment_details->current_paid_amount = $request->new_paid_amount;
         }elseif ($request->paid_status == 'some_paid') {
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
            $payment_details->current_paid_amount = $request->paid_amount;
         
          }
         $payment->save();
         $payment_details->invoice_id = $invoice_id;
         $payment_details->payment_date = date('Y-m-d',strtotime($request->payment_date));
         $payment_details->updated_by = Auth::user()->id;
         $payment_details->save();
       
     
      return redirect()->route('tailors.credit')->with('success','tailor Invoice Payment Update Successfully');
      }

    }
     
    public function invoicetailordetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-credit-tailor-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-credit-report.pdf');
    }


     public function invoicecPaidustomerdetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-paid-tailor-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-credit-report.pdf');
    }


     public function tailorwisereport(){
    $tailors = Tailor::all();
    return view('backend.tailor.tailor-wise-report',compact('tailors'));
    }


      public function tailorwiseProductreport(Request $request){
      $data['invoicedetails'] = InvoiceDetail::where('tailor_id',$request->tailor_id)->get();
       $data['payment'] = Payment::where('tailor_id',$request->tailor_id)->get();
      $pdf = PDF::loadView('backend.pdf.tailor-wise-product-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-wise-product-report.pdf');
      
    }

     public function tailorwisecreditreport(Request $request){
       $data['alldata'] = Payment::where('tailor_id',$request->tailor_id)->whereIn('paid_status',['full_due','some_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.tailor-wise-credit-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
      
    }

     public function tailorwisepaidreport(Request $request){
       $data['alldata'] = Payment::where('tailor_id',$request->tailor_id)->whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.tailor-wise-paid-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
      
    }

      public function inactive($id){
            $tailor = Tailor::find($id);
            $tailor->status = 0;
            $tailor->save();

          return redirect()->route('tailors.view')->with('success','Tailor Inactive Successfully');

        }

public function active($id){
            $tailor = Tailor::find($id);
            $tailor->status = 1;
            $tailor->save();

         return redirect()->route('tailors.view')->with('success','Tailor Active Successfully');
        }


    //   public function tailorwisesearch(Request $request){
    //   $data['tailors'] = Tailor::where('id','ASC')->get();
    //   $data['users'] = User::where('role_id','1' or '2')->get();
    //   $data['alldata'] = InvoiceDetail::all();
    //   return view('backend.tailor.tailor-search',$data);
    // }

     public function tailorwisereportview(Request $request){
    $data['tailors'] = Tailor::all();
    $data['users'] = User::all();
    $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
    return view('backend.tailor.tailor-search',$data);
    }


      public function tailorwisedeatilsreport(Request $request){
    $data['tailors'] = Tailor::all();
    $data['users'] = User::all();
    $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
    return view('backend.tailor.tailor-search',$data);
      // $pdf = PDF::loadView('backend.pdf.member-wise-report-pdf',$data);
      //   $pdf->SetProtection(['copy','print'],'','pass');
      //   return $pdf->stream('member-wise-report.pdf');
      
    }


    public function tailorwisedeatilsreportpdf(Request $request){
    $data['tailors'] = Tailor::all();
    $data['users'] = User::all();
    $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
    $pdf = PDF::loadView('backend.pdf.tailor-wise-details-report-pdf',$data);
    $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-wise-report.pdf');
      
    }


     public function adminwiseport(Request $request){
   $data['tailors'] = Tailor::all();
    $data['users'] = User::all();
    $data['alldata'] = TailorIssue::where('created_by',$request->user_id)->get();
    return view('backend.tailor.admin-wise-report',$data);
      // $pdf = PDF::loadView('backend.pdf.vendor-wise-report-pdf',$data);
      //   $pdf->SetProtection(['copy','print'],'','pass');
      //   return $pdf->stream('vendor-wise-report.pdf');
      
    }


      public function adminwiseportpdf(Request $request){
    $data['tailors'] = Tailor::all();
    $data['users'] = User::all();
    $data['alldata'] = TailorIssue::where('created_by',$request->user_id)->get();
      $pdf = PDF::loadView('backend.pdf.admin-wise-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('admin-wise-report.pdf');
      
    }

    public function tailordatewisereportview(Request $request){
    $data['tailors'] = Tailor::all();
    $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
    $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorIssue::whereBetween('issue_date',[$sdate,$edate])->where('issue_status','1')->get();
          $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
    return view('backend.tailor.tailor-date-wise-search',$data);
    }

     public function tailordatewisedeatilsreport(Request $request){
       $data['tailors'] = Tailor::all();
       $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorIssue::whereBetween('issue_date',[$sdate,$edate])->where('issue_status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.tailor.tailor-date-wise-search',$data);

     }

      public function tailordatewisedeatilsreportpdf(Request $request){
        $data['tailors'] = Tailor::all();
       $data['alldata'] = TailorIssue::where('tailor_id',$request->tailor_id)->get();
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorIssue::whereBetween('issue_date',[$sdate,$edate])->where('issue_status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
      $pdf = PDF::loadView('backend.pdf.taitor-date-wise-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-date-wise-report.pdf');
      
    }

}
