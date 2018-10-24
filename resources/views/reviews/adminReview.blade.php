@extends('layouts.admin')


@section('css')


@endsection


@section('content')

<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Reviews</li>
          </ol>
          <h6 class="slim-pagetitle">All reviews</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">

              <thead>
                <tr>
                  <th class="wd-15p">Id #</th>
                  <th class="wd-15p">Review</th>
                  <th class="wd-15p">Rating</th>
                  <th class="wd-15p">Approved</th>
                  <th class="wd-15p">Created At</th>
                  <th class="wd-15p">Action</th>  

                </tr>
              </thead>

              <tbody>
              	@foreach ($reviews as $review)	
	                <tr>
	                  <td>{{$review->id}}</td>
                    <td>{{$review->review}}</td>
	                  <td>{{$review->rating}}</td>
	                  <td>{{($review->is_approved)==1 ? 'Yes' : 'No'}}</td>
	                  <td>{{$review->created_at->diffForHumans()}}</td>
	                  <td><button type="button" class="btn btn-{{($review->is_approved==0) ? 'primary' : 'danger'}}" id="{{$review->id}}">{{($review->is_approved==0) ? 'Approve' : 'DisApprove'}}</button> </td>
	            
	                </tr>
      			@endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- section-wrapper -->



      </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection


@section('footer')

<script>
  $(".btn-primary").click(function(){
      var id = this.id;
      var csrf = '{{csrf_token()}}';
      $.ajax({
            type:'POST',
            url:'{{action("ReviewController@update")}}',
            data: {
              _token : csrf,
              id: id,
              approve: 1,
            },

            success:function(data){
                $("#"+id).removeClass("btn-primary").addClass("btn-danger");
                $("#"+id).html('DisApprove');
            }
        });

  });


   $(".btn-danger").click(function(){
      var id = this.id;
      var csrf = '{{csrf_token()}}';
  
      $.ajax({
            type:'POST',
            url:'{{action("ReviewController@update")}}',
            data: {
              _token : csrf,
              id: id,
              approve: 2,
            },

            success:function(data){
                $("#"+id).removeClass("btn-danger").addClass("btn-primary");
                $("#"+id).html('Approve');
            }
        });

  });
</script>

@endsection