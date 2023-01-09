<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        
        
            //
            $employee = User::where('role','employee')->get();
            return view('customer.order',compact('product','employee'));
        
    
    }



public function MyOrder(){
    return view('customer.Myorder');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = DB ::table('orders') 
        ->where('employee_id' , Auth::user()->id)
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.customer_id','=','users.id')
        ->select('orders.id','products.name as Pname','products.detail','products.price','users.name','users.address','users.mobile','orders.created_at','orders.status')
        ->get();
        return view('employee.myorder',compact('orders' ));
    
    }

    public function create1()
    {
        $orders = DB ::table('orders') 
        ->where('customer_id' , Auth::user()->id)
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.employee_id','=','users.id')
        ->select('orders.id','products.name as Pname','products.detail','products.price','users.name','users.address','users.mobile','orders.created_at','orders.status')
        ->get();
        return view('customer.Myorder',compact('orders' ));
    
    }

    public function Changestatus($id){
if(Auth::user()->role=='employee'){
    DB::table('orders')->where('id',$id)->update(['status'=>'Delivered'] );
    return redirect()->route('order.create');
}
elseif(Auth::user()->role=='customer'){
    DB::table('orders')->where('id',$id)->update(['status'=>'Cancelled'] );
    return redirect()->route('creat');
}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
      
        $request->validate([
        
            'customer_id'=>'required',
            'employee_id'=>'required',
            'product_id'=>'required',
            
        ]);
        order::create($request->all());

        return redirect()->route('order')->with('success','Product ordered! ');
        
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
