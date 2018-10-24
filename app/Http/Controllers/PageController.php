<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Educationlevel;
use App\Papertype;
use App\Style;
use App\Subject;


class PageController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only(['create','store','update','get']);
    }
    
    public function index(){
        $education_levels = Educationlevel::all();
        $paper_types = Papertype::all();
        $styles= Style::all();
        $subjects = Subject::all();
        return view('pages.home',compact('education_levels','paper_types','styles','subjects'));
    }

    public function show($slug){

        // $page = Page::where('slug','=', $slug)->firstorfail();
        $education_levels = Educationlevel::all();
        $paper_types = Papertype::all();
        $styles= Style::all();
        $subjects = Subject::all();
        return view('pages.show',compact('education_levels','paper_types','styles','subjects','page'));
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        $page = new Page();
        $imageName = "";
        $page->title= $request->title;
        $page->slug= getUniqueSlug($page,$request->title);
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->description = $request->body;
        $page->page_category = $request->category;
        $page->style= $request->style;
        $page->javascript = $request->javascript;
        //uploading file
        if($request->hasFile('featured')){
        $imageName = time().'.'.$request->featured->getClientOriginalExtension();
        $request->featured->move(public_path('/pages'), $imageName);
        }else{
            $imageName="default.jpeg";
        }   
        $page->image = $imageName;
        $isSave=$page->save();
        if($isSave){
            return redirect()->back()->with('success', ['Page Created Successfully']);
        }
    }

    public function getPages(){
        $pages = Page::get();
        return view('pages.getpages',compact('pages'));
    }

    public function getOrder(Request $request){

        $education_array = explode("|",$request->educationlevel);
        $paper_array = explode('|',$request->paperlevel);
        session(['order_session'=>["education_level"=>$education_array[0],"paper_type"=>$paper_array[0],'deadline'=>$request->deadline,'pages'=>$request->pages,'style'=>$request->style,'subject'=>$request->subject,'title'=>$request->title]]);
        $value = session()->get('order_session');
        return redirect()->to('order-now');
    }

    public function edit(Page $page){
        return view('pages.edit',compact('page'));
    }

    public function update(Page $page, Request $request){
        $imageName = "";
        $page->title= $request->title;
        $page->slug= $request->slug;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->description = $request->body;
        $page->page_category = $request->category;
        $page->style= $request->style;
        $page->javascript = $request->javascript;
        //uploading file
        if($request->hasFile('featured')){
        $imageName = time().'.'.$request->featured->getClientOriginalExtension();
        $request->featured->move(public_path('/pages'), $imageName);
        }else{
            $imageName="default.jpeg";
        }   
        $page->image = $imageName;
        $isSave=$page->save();
        if($isSave){
            return redirect()->back()->with('success', ['Page Created Successfully']);
        }

    }


   
    public function contactIndex(){
        return view('pages.contact-us');
    }

    public function contactStore(Request $request){
        $message_body = "Name: ".$request->first_name." Last Name: ". $request->last_name;
        $message_body .= "\n Email: ".$request->email;
        $message_body .= "\n Specificy Request ".$request->specify;
        $message_body .= "\n Message: ".$request->message;

        
    }

    public function faq(){
        return view('pages.faq');
    }
    
    
    public function sitemap(){
        ini_set('short_open_tag',0);
        $pages = Page::all();
        return response()->view('pages.sitemap',[
            "pages" => $pages
        ])->header('Content-Type', 'text/xml');
    }
       
}
