@extends('admin.layouts.main') 
@section('content')
<form method="POST" action="{{URL('/admin/update-page/'.$page->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Page</li>
                </ol>
                <h6 class="slim-pagetitle">Update Page</h6>
            </div>
            <!-- slim-pageheader -->

            <div class="section-wrapper">

                <div class="row">
                    <label class="col-sm-4 form-control-label">Title: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$page->title}}">
                    </div>
                </div>
                <!-- row -->

                  <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Slug: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="slug" placeholder="Enter Slug" value="{{$page->slug}}">
                    </div>
                </div>

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Page Category: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="category">
                            <option value="">Please select a category</option>
                            <option value="1" {{($page->page_category==1) ? "selected" : ""}}>Services</option>
                            <option value="2" {{($page->page_category==2) ? "selected" : ""}}>Blog</option>
                        </select>
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Featured Image:(If not uploaded a default will be choosen)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <div class="custom-file">
                            <input type="file" name="featured">
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Body:<span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <textarea name="body" id="body">{{$page->description}}</textarea>
                    </div>
                </div>
                <!-- row -->

            </div>
            <!-- section-wrapper -->

            <div class="section-wrapper mg-t-20">
                <label class="section-title">SEO</label>
                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Meta Title</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" value="{{$page->meta_title}}" class="form-control" name="meta_title" placeholder="If leave empty default post title will be choosen">
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label mg-t-10 mg-sm-t-0">Meta Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$page->meta_description}}" name="meta_description" placeholder="If leave empty 180 words of description will be choosen">
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label mg-t-10 mg-sm-t-0">Meta Keywords</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="meta_keywords" value="{{$page->meta_keywords}}" placeholder="Seperate Keywords with , like Keyword1,keyword2">
                    </div>
                </div>
                <!-- row -->
            </div>

            <div class="section-wrapper mg-t-20">
                <label class="section-title">Advanced</label>
                <p class="mg-b-20 mg-sm-b-40">Css Styles or Javascript</p>

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Css Style(Don't use &lt;style&gt; tag)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <textarea name="style" class="form-control" rows="15" placeholder="Don't use &lt;style&gt; tag"></textarea>
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Javascript script(Don't use &lt;Javascript&gt;tag)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <textarea name="jstag" class="form-control"  rows="15" placeholder="Don't use &lt;Javascript&gt; tag"></textarea>
                    </div>
                </div>
                <!-- row -->

                <div class="form-layout-footer mg-t-30">
                    <button class="btn btn-primary bd-0 offset-6" type="submit">Update Page</button>
                </div>
                <!-- form-layout-footer -->

            </div>

        </div>
        <!-- container -->
    </div>
    <!-- slim-mainpanel -->
</form>
@endsection 

@section('footer')
<!-- <script src="{{asset('db/ckeditor/ckeditor.js')}}"></script> -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<script>
    jQuery(document).ready(function() {
        CKEDITOR.replace("body",{
                removeButtons: 'About',
                height:['450px']

            });
    });
</script>
@endsection