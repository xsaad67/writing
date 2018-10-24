@extends('admin.layouts.main')

@section('content')
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Pages</li>
          </ol>
          <h6 class="slim-pagetitle">All Pages</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">

              <thead>
                <tr>
                  <th class="wd-15p">Title</th>
                  <th class="wd-15p">Slug</th>
                  <th class="wd-15p">Meta Title</th>
                  <th class="wd-15p">Meta Keywords</th>
                  <th class="wd-15p">Meta Description</th>
                  <th class="wd-15p">Created At</th>
                  <th class="wd-15p">Image</th>
                </tr>
              </thead>

              <tbody>
              	@foreach ($pages as $page)	
	                <tr>
	                  <td><a href="/admin/edit-page/{{$page->id}}">{{$page->title}}</a></td>
                    <td><a href="/{{$page->slug}}">{{$page->slug}}</a></td>
	                  <td>{{$page->meta_title}}</td>
	                  <td>{{$page->meta_keywords}}</td>
	                  <td>{{$page->meta_description}}</td>
	                  <td>{{$page->created_at->diffForHumans()}}</td>
	                  <td><img src="{{asset('pages/'.$page->image)}}" width='100' height='50'></td>
	            
	                </tr>
      			@endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- section-wrapper -->



      </div><!-- container -->
    </div><!-- slim-mainpanel -->
@endsection