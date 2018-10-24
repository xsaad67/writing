<?php

namespace App\Http\Controllers;
set_time_limit(0);
use App\Order;
use App\Orderfile;
use App\Educationlevel;
use App\Papertype;
use App\Style;
use App\Subject;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
     $orders = auth()->user()->orders;
     return view('orders.myOrders',compact("orders"));  
    }

    public function create()
    {   
        $order_session = "";
        if(session()->has('order_session')){
            $order_session= session()->get('order_session');
        }
        $education_levels = Educationlevel::all();
        $paper_types = Papertype::all();
        $styles = Style::all();
        $subjects = Subject::all();
        return view('orders.createorders',compact('education_levels','paper_types','styles','subjects','order_session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         if(session()->has('order_session')){
            session()->forget('order_session');
        }
        
        $education_array = explode("|",$request->educationlevel);
        $paper_array    = explode("|",$request->paperlevel);
        
        $order = new Order();
        $order->title=$request->title;
        $order->papertype_id = $paper_array[0];
        $order->educationlevel_id = $education_array[0];
        $order->user_id =auth()->user()->id;
        $price = (calculate_price($education_array[1],$paper_array[1],$request->deadline))*$request->pages;
        $order->total =($price<15) ? 15 : $price;
        $order->requirement = $request->requirement;
        $order->style_id = $request->style;
        $order->subject_id = $request->subject;
        $order->deadline = $request->deadline;
        $order->pages=$request->pages;
        $order->status = 'unpaid';
        $files = $request->file('upload');
        $is_save=$order->save();

        if($is_save){
            
            //Uploading multiple files
            if($request->hasFile('upload'))
            {
                foreach ($files as $file) {
                    $imageName = time().'-'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('/orderfiles'), $imageName);

                    $order_file = new Orderfile();
                    $order_file->filename = $imageName;
                    $order_file->original_filename = $file->getClientOriginalName();
                    $order_file->order_id = $order->id;
                    $order_file->save();
                }
            } //Ends uploading file
            
            //Sending Mail to user
            $order_detail = Order::find($order->id);
            \Mail::send('email.index',["order"=>$order_detail->toArray(),"userEmail"=>$order_detail->user->email,"userName"=>$order_detail->user->name,'educationLevel'=>$order_detail->education->name,'paperType'=>$order_detail->paper->name,'subject'=>$order_detail->subject->name,'style'=>$order_detail->style->name], function ($message) use($order_detail)
             {
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                $message->to($order_detail->user->email,$order_detail->user->name);
                $message->subject('Your Order has been successfully recieved');
                $message->replyTo(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                custom_imap_stream($message->toString());
            });
        
                return redirect()->to('/preview/'.$order->id);
        }//Is Save 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

        $education_levels = Educationlevel::all();
        $paper_types = Papertype::all();
        $styles = Style::all();
        $subjects = Subject::all();
        return view('orders.editorder',compact('order','education_levels','paper_types','styles','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

       
        $education_array = explode("|",$request->educationlevel);
        $paper_array    = explode("|",$request->paperlevel);
        
        $order->title=$request->title;
        $order->papertype_id = $paper_array[0];
        $order->educationlevel_id = $education_array[0];
        $order->user_id =auth()->user()->id;
        $price = (calculate_price($education_array[1],$paper_array[1],$request->deadline))*$request->pages;
        $order->total =($price<15) ? 15 : $price;
        $order->requirement = $request->requirement;
        $order->style_id = $request->style;
        $order->subject_id = $request->subject;
        $order->deadline = $request->deadline;
        $order->pages=$request->pages;
        $order->status = 'unpaid';
        $files = $request->file('upload');
        $is_save=$order->save();
        if($is_save){
              
            if($request->hasFile('upload'))
            {
                foreach ($files as $file) {
                    $imageName = time().'-'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('/orderfiles'), $imageName);

                    $order_file = new Orderfile();
                    $order_file->filename = $imageName;
                    $order_file->original_filename = $file->getClientOriginalName();
                    $order_file->order_id = $order->id;
                    $order_file->save();
                }
            }
            //Ends uploading file 
            
            return redirect()->to('/preview/'.$order->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function preview(Order $order){
        return view('orders.preview',compact('order'));        
    }

     public function allOrders(Request $request){
        if($request->has('assigned')){
            $orders = Order::where("is_assigned",1)->get();
            $title = "Assigned Orders";
        }else if($request->has('completed')){
            $orders=Order::where('is_completed',1)->get();
            $title = "Completed Orders";
        }
        else{
            $orders=Order::all();
            $title="All Orders";
        }
        return view('orders.allOrders',compact('orders','title'));
    }

    public function adminShow(Order $order){

        return view('orders.adminsingleorder',compact('order'));
    }

    public function updateAssigned(Request $request, Order $order){
        $order->is_assigned=1;
        $order->save();

        $email =$order->user->email;
        
        \Mail::send('email.assigned',["order"=>$order->toArray(),"userEmail"=>$order->user->email,"userName"=>$order->user->name], function ($message) use ($order)
             {
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                $message->to($order->user->email,$order->user->name);
                $message->subject('Your Order has been successfully assigned');
                $message->cc('redbirdsources.official@gmail.com');
                $message->replyTo($order->user->email,$order->user->name);

                custom_imap_stream($message->toString());



            });

        return redirect()->back();

    }

    public function updateCompleted(Request $request, Order $order){
        $validatedData = $request->validate([
            'file' => 'required'
        ]);

         if($request->hasFile('file'))
            {
                $imageName = time().'-'.pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('/completed'), $imageName);
                $order->is_completed=1;
                $order->completed_file=$imageName;
                $order->save();
                \Mail::send('email.completed',["order"=>$order->toArray(),"userEmail"=>$order->user->email,"userName"=>$order->user->name], function ($message) use ($order,$imageName)
                {
                    $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                    $message->to($order->user->email,$order->user->name);
                    $message->subject('Your Order has been successfully completed');
                    $message->replyTo(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                    $message->attach(public_path('/completed/'.$imageName));
                    custom_imap_stream($message->toString());
                });
                return redirect()->back();
            }

    }

}
