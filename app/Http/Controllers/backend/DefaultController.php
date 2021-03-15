<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;  
use DB;
use App\User;
use Session;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\SubSubCategory; 
use App\Model\Brand;
use App\Model\Unit;
use App\Model\Purchase;
use App\Model\Item;
use App\Model\InvoiceDetail;
use App\Model\Tailor;
class DefaultController extends Controller
{
    public function getcategory(Request $request){
   	 $supplier_id = $request->supplier_id;
   	 $allcategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
   	 return response()->json($allcategory);

   }

    public function subgetcategory(Request $request){
     $category_id = $request->category_id;
     $allsubcategory = Product::with(['subcategory'])->select('sub_category_id')->where('category_id',$category_id)->groupBy('sub_category_id')->get();
     return response()->json($allsubcategory);

   }

    public function subsubgetcategory(Request $request){
     $sub_category_id = $request->sub_category_id;
     $allsubsubcategory = Product::with(['subsubcategory'])->select('sub_sub_category_id')->where('sub_category_id',$sub_category_id)->groupBy('sub_sub_category_id')->get();
     return response()->json($allsubsubcategory);

   }

   public function getbrand(Request $request){
     $sub_sub_category_id = $request->sub_sub_category_id;
     $allbrand = Product::with(['brand'])->select('brand_id')->where('sub_sub_category_id',$sub_sub_category_id)->groupBy('brand_id')->get();
     return response()->json($allbrand);

   }

   public function getproductname(Request $request){
     $brand_id = $request->brand_id;
     $allproductname = Product::where('brand_id',$brand_id)->get();
     return response()->json($allproductname);
   }

   public function getproduct(Request $request){
     $category_id = $request->category_id;
     $productname = Product::where('category_id',$category_id)->get();
     return response()->json($productname);
   }

 public function getunit(Request $request){
     $product_id = $request->product_id;
     $allunit = Product::with(['unit'])->select('unit_id')->where('id',$product_id)->first()->unit_id;
     return response()->json($allunit);

   } 

    public function getprice(Request $request){
     $item_id = $request->item_id;
     $allprice = Item::where('id',$item_id)->first()->item_price;
     return response()->json($allprice);
   } 

    public function gettailorprice(Request $request){
     $item_id = $request->item_id;
     $alltailorprice = Item::where('id',$item_id)->first()->tailor_price;
     return response()->json($alltailorprice);
   } 

    public function getitemid(Request $request){
     $order_details_order_id = $request->order_details_order_id;
     $allgetitemid = InvoiceDetail::where('id',$order_details_order_id)->first()->item_id;
     return response()->json($allgetitemid);
   } 

    public function tailorprice(Request $request){
     $order_details_order_id = $request->order_details_order_id;
     $tailorprices = InvoiceDetail::where('id',$order_details_order_id)->first()->tailor_price;
     return response()->json($tailorprices);
   } 

   public function getmobile(Request $request){
     $tailor_id = $request->tailor_id;
     $mobile = Tailor::where('id',$tailor_id)->first()->mobile;
     return response()->json($mobile);

   } 

    public function getcreditamount(Request $request){
     $tailor_id = $request->tailor_id;
     $creditamount = Tailor::where('id',$tailor_id)->first()->total_amount;
     return response()->json($creditamount);

   } 

   public function getcolor(Request $request){
     $product_id = $request->product_id;
     $allsize = Product::where('id',$product_id)->first()->color;
     return response()->json($allsize);
   } 

    public function getproductcode(Request $request){
     $product_id = $request->product_id;
     $productcode = Product::where('id',$product_id)->first()->product_code;
     return response()->json($productcode);
   } 

    public function getwarrantytime(Request $request){
     $product_id = $request->product_id;
     $warrantytime = Product::where('id',$product_id)->first()->warranty_time;
     return response()->json($warrantytime);
   } 

   public function getstock(Request $request){
     $product_id = $request->product_id;
     $stock = Product::where('id',$product_id)->first()->quantity;
     return response()->json($stock);
   } 

}
