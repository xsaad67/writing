<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return abort('500');
        return view('invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $invoice =  new Invoice();
        $invoice->name = $request->title;
        $invoice->currency = $request->currency;
        $invoice->price = $request->price;
        $invoice->qty=$request->quantity;
        $invoice->email = $request->email;
        $invoice->name = $request->name;
        $invoice->country = $request->country;
        $invoice->city = $request->city;
        $invoice->state = $request->state;
        $invoice->zip = $request->zip;
        $invoice->address = $request->address;

        $isSave = $invoice->save();

        if($isSave){
           return redirect('custom-order/'.encrypt($invoice->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($encryptVal)
    {   
        $invoiceId ="";
        
        try{ $invoiceId = decrypt($encryptVal); }catch(\Exception $e){ }

        $invoice = Invoice::findOrFail($invoiceId);
        return view("invoice.show",compact("invoice"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
