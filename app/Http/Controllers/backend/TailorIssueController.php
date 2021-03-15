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
use App\Model\TailorIssue;
use App\Model\Tailor;
use App\Model\Issue;
use PDF;

class TailorIssueController extends Controller
{
    public function view(){
    	$data['tailorissue'] = Issue::where('issue_status','1')->orderby('id','desc')->get();
    return view('backend.tailorissue.view-tailorissue',$data);
    }

     public function pendinglist(){
        $data['tailorissue'] = Issue::where('issue_status','0')->orderby('id','desc')->get();
    return view('backend.tailorissue.pending-list',$data);
    }

    public function returnlist(){
        $data['tailorissue'] = TailorIssue::orderby('id','desc')->get();
    return view('backend.tailorissue.return-list',$data);
    }

    public function dateover(){
        $data['issuebooks'] = TailorIssue::where('back','0')->where('limit_date','>',date('Y-m-d'))->orderby('id','asc')->get();
    return view('backend.bookissue.date-over',$data);
    }

      public function dateoverreturn(){
        $data['issuebooks'] = TailorIssue::where('limit_date','>',date('Y-m-d'))->orderby('id','asc')->get();
    return view('backend.bookissue.date-over-return',$data);
    }
    
    
    public function add(){
        $tailors = Tailor::where('status','1')->orderby('id','asc')->get();
        $items = InvoiceDetail::orderby('id','asc')->where('status','1')->get();
        $date = date('Y-m-d');
    	return view('backend.tailorissue.add-tailorissue',compact('tailors','items','date'));
    }
    
     
 
    public function store(Request $request){ 
 
    if($request->order_details_order_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');

    }else{
    
     $invoice = new Issue();
     $invoice->issue_date = date('Y-m-d',strtotime($request->issue_date));
     $invoice->issue_status = '0';
     $invoice->created_by = Auth::user()->id;
     
     DB::transaction(function() use($request,$invoice){
        if($invoice->save()){
            $count_item = count($request->order_details_order_id);
        for ($i=0; $i < $count_item; $i++){


     $issue = new TailorIssue();
     $issue->issue_id = $invoice->id;
     $issue->issue_date = date('Y-m-d',strtotime($request->issue_date));
     $issue->item_id = $request->item_id[$i];
     $issue->order_details_order_id = $request->order_details_order_id[$i];
     $issue->tailor_id = $request->tailor_id[$i];
     $issue->issue_quantity = $request->issue_quantity[$i];
     $issue->tailor_price = $request->tailor_price[$i];
     $issue->save();

        }
            

        } 
        
     });
        
    }
      
         return redirect()->route('tailorissues.view-pending-list')->with('success','Tailor Issue Inserted Successfully');
        }

        public function returnapprove($id){
        $issue = TailorIssue::find($id);
        $tailor = Tailor::where('id',$issue->tailor_id)->first();
        $issue_qty = $tailor->return_quantity+$issue->issue_quantity;
        $tailor->return_quantity = $issue_qty;
        if($tailor->save()){
            DB::table('tailor_issues')
            ->where('id',$id)
            ->update(['return_status' => '1' ]);

            DB::table('tailor_issues')
            ->where('id',$id)
            ->update(['return_date' => date('Y-m-d') ]);
        }
         

         return redirect()->route('tailorissues.view-return-list')->with('success','Tailor Return Item Successfully');
        }

          public function approve($id){
           $invoice = Issue::with(['invoicedetails'])->find($id);
         return view('backend.tailorissue.approve-view',compact('invoice'));
    }


        public function approvestore(Request $request, $id){
            foreach ($request->issue_quantity as $key => $value) {
               $issue_details = TailorIssue::where('id',$key)->first();
               $tailor = Tailor::where('id',$issue_details->tailor_id)->first();
               
            }

            $invoice = Issue::find($id);
            $invoice->approved_by =Auth::user()->id;
            $invoice->issue_status = '1';
            DB::transaction(function() use ($request, $invoice, $id){
                 foreach ($request->issue_quantity as $key => $value) {
               $issue_details = TailorIssue::where('id',$key)->first();
               $issue_details->issue_status = '1';
               $issue_details->save();
               $tailor = Tailor::where('id',$issue_details->tailor_id)->first();
               $tailor->quantity = ((float)($tailor->quantity))+((float)$request->issue_quantity[$key]);

               $tailor->save();

           }

            foreach ( $request->tailor_price as $key => $value) {
               $issue_details = TailorIssue::where('id',$key)->first();
             
               $tailor = Tailor::where('id',$issue_details->tailor_id)->first();
               $tailor->total_amount = ((float)($tailor->total_amount))+((float)$request->tailor_price[$key]);

               $tailor->save();

           }



            $invoice->save();
            });
           
      return redirect()->route('tailorissues.view-pending-list')->with('success','Tailor Issue Approved Successfully');

   } 

    public function delete($id){
            $invoice = Issue::find($id);
            $invoice->delete();
            InvoiceDetail::where('issue_id',$invoice->id)->delete();
            return redirect()->route('view-pending-list')->with('success','Tailor Issue Deleted Successfully');

          } 
}
