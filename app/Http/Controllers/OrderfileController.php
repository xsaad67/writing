<?php

namespace App\Http\Controllers;

use App\Orderfile;
use Illuminate\Http\Request;

class OrderfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $file_path;

    public function __construct(){
        $this->file_path = public_path()."/orderfiles/";
    }
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderfile  $orderfile
     * @return \Illuminate\Http\Response
     */
    public function show(orderfile $orderfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderfile  $orderfile
     * @return \Illuminate\Http\Response
     */
    public function edit(orderfile $orderfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderfile  $orderfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderfile $orderfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderfile  $orderfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orderfile::find($id);
        $response = "";
        if($order){
            $fileName=$this->file_path.$order->filename;
            if(file_exists($fileName)){
                unlink($fileName);
            }
            $order->delete();    
            $response = "File deleted Successfully";
        }else{
            $response="Can't delete file now";
        }
        return response()->json(['msg'=>$response]);
    }
}
