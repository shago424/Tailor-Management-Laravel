<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use DB;
use Hash;
use App\Model\Tailor;
use PDF;
use App\Model\Payment;
use App\Model\Item;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\PaymentDetail; 
use App\Model\TailorIssue;
use App\Model\TailorPayment;
class TailorPaymentController extends Controller
{
     public function view(){
     $data = TailorPayment::orderby('id','DESC')->get();
    	return view('backend.tailorpayment.view-tailor-payment',compact('data'));
    }

    public function add(){
    	$tailors = Tailor::all();
    	return view('backend.tailorpayment.add-tailor-payment',compact('tailors'));
    }

    
     public function store(Request $request){

    	$data = new TailorPayment();
        $data->tailor_id = $request->tailor_id;
        $data->credit_amount = $request->credit_amount;
    	$data->pay_amount = $request->pay_amount;
    	$data->balance_amount = $request->credit_amount-$request->pay_amount;
    	$data->payment_date = $request->payment_date;
    	$data->created_by = Auth::user()->id;

    
    	
    	$data->save();

    	return redirect()->route('tailorpayments.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
            $data['editdata'] = TailorPayment::find($id);
             $data['tailors'] = Tailor::all();
            return view('backend.tailorpayment.add-tailor-payment',$data);

        }

      public function update(Request $request , $id){

        $data = TailorPayment::find($id);
        $data->tailor_id = $request->tailor_id;
    	$data->pay_amount = $request->pay_amount;
    	$data->balance_amount = $request->credit_amount-$request->pay_amount;
    	$data->payment_date = $request->payment_date;
    	$data->updated_by = Auth::user()->id;

    	 // $tailor = Tailor::where('id',$data->tailor_id)->first();
      //          $data->credit_amount = ((float)($tailor->total_amount));
               
             


    
    	$data->save();

    	return redirect()->route('tailorpayments.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $pay = TailorPayment::find($id);
            $pay->delete();
           return redirect()->route('tailorpayments.view')->with('success','Tailor  Deleted Successfully');

    }


       public function inactive($id){
            $tailor = TailorPayment::find($id);
            $tailor->status = 0;
            $tailor->save();

          return redirect()->route('tailorpayments.view')->with('success','Tailor Payment Inactive Successfully');

        }

public function active($id){
        $issue = TailorPayment::find($id);
        $tailor = Tailor::where('id',$issue->tailor_id)->first();
        $issue_amount = $tailor->total_amount-$issue->pay_amount;
        $tailor->total_amount = $issue_amount;
        $issue_pay = $tailor->total_payment+$issue->pay_amount;
        $tailor->total_payment = $issue_pay;
        if($tailor->save()){
            DB::table('tailor_payments')
            ->where('id',$id)
            ->update(['status' => '1' ]);

       }

         return redirect()->route('tailorpayments.view')->with('success','Tailor Payment Active Successfully');
        }

// payment
public function tailorwiseviewpayment(Request $request){
    $data['tailors'] = Tailor::all();
     $data['users'] = User::all();
     $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    return view('backend.tailorpayment.tailor-payment-search-view',$data);
    }

    public function tailorwisepaymentreport(Request $request){
    $data['tailors'] = Tailor::all();
     $data['users'] = User::all();
     $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    return view('backend.tailorpayment.tailor-payment-search-view',$data);
    }

     public function tailorwisepaymentreportpdf(Request $request){
    $data['tailors'] = Tailor::all();
     $data['users'] = User::all();
     $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    $pdf = PDF::loadView('backend.pdf.tailor-payment-report-pdf',$data);
    $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-wise-payment-report.pdf');
    }

    public function adminwisepaymentreport(Request $request){
    $data['tailors'] = Tailor::all();
     $data['users'] = User::all();
     $data['alldata'] = TailorPayment::where('created_by',$request->user_id)->get();
    return view('backend.tailorpayment.admin-payment-search-view',$data);
    }

     public function adminwisepaymentreportpdf(Request $request){
    $data['tailors'] = Tailor::all();
     $data['users'] = User::all();
     $data['alldata'] = TailorPayment::where('created_by',$request->user_id)->get();
    $pdf = PDF::loadView('backend.pdf.admin-payment-report-pdf',$data);
    $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('admin-wise-payment-report.pdf');
    }

    // date wise

     public function tailordatewiseviewpayment(Request $request){
    $data['tailors'] = Tailor::all();
    $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorPayment::whereBetween('payment_date',[$sdate,$edate])->where('status','1')->get();
          $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
    return view('backend.tailorpayment.tailor-payment-date-wise-search',$data);
    }


        public function tailordatewisepaymentreport(Request $request){
    $data['tailors'] = Tailor::all();
    $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorPayment::whereBetween('payment_date',[$sdate,$edate])->where('status','1')->get();
          $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
    return view('backend.tailorpayment.tailor-payment-date-wise-search',$data);
    }

       public function tailordatewisepaymentreportpdf(Request $request){
    $data['tailors'] = Tailor::all();
    $data['alldata'] = TailorPayment::where('tailor_id',$request->tailor_id)->get();
    $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = TailorPayment::whereBetween('payment_date',[$sdate,$edate])->where('status','1')->get();
          $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
     $pdf = PDF::loadView('backend.pdf.tailor-payment-date-wise-report-pdf',$data);
    $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('tailor-date-wise-payment-report.pdf');
    }


}
