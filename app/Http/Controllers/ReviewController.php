<?php

namespace App\Http\Controllers;

use App\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //     $this->middleware('auth')->only(['store']);
    // }
    public function index()
    {
        $reviews = Review::where("is_approved",1)->get();
        return view('reviews.index',compact('reviews')); 
    }
    
    
    public function adminIndex(){
        $reviews = Review::orderBy('created_at','DESC')->get();
        return view('reviews.adminReview',compact('reviews'));
    }


    public function create()
    {
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();

        $review->name = $request->name;
        $review->rating= $request->rating;
        $review->review = $request->body;

        $isSave=$review->save();
        return redirect()->back()->with('success','Your review has been submitted.');
        // ($isSave == 1) ? redirect()->back()->with(['success'=>'Your review has been submitted.']) : "" ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, review $review)
    {
           $review = Review::find($request->id);
                
        if($request->approve == 1){
            $review->is_approved = 1;
        }else if($request->approve == 2){
            $review->is_approved =0;
        }
        $review->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        //
    }
}
