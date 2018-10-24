@extends('layouts.main')
@section('title','Reviews')
@section('description','Reviews')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#Subheader 
    background-image: url({{asset('assets/images/home_vpn_subheader.jpg')}});
}
#Subheader {   background-position: center bottom;
}
.subheader-both-center #Subheader .title {
    width: 100%;
    text-align: center;
}
#Subheader .title {
    font-weight: 700;
}
#Subheader .title {
     font-size: 36px;
    line-height: 70px;
    color: #fff;
}

#Wrapper{
    background:#f5f5f5;
}
.content{    
    background-color: #fff;
    box-shadow: 0 0 0 1px rgba(0,0,0,.05), 4px 2px 0 0 rgba(0,0,0,.05);
    overflow: hidden;
    padding: 1.25rem;
    margin-top: 8px;
}
.content > ul{list-style: initial; padding-left:10px; margin-bottom:10px;}
.content > p{text-align:justify;}
.content > h2{ font-size:30px; text-align: center; }
.content > h1{text-align: center;}
.checked {
    color: orange;
}
.star-font{font-size:30px;}

.border-blue{border-right:15px solid ;}
.border-yellow{border-right:15px solid ;}
.border-green{border-right:15px solid;}
.error{color:red;}
</style>
@endsection
@section('content')


    <div class="container iq-mt-10 iq-mb-20">
        <div class="row">

            <div class="col-md-8">



                <div class="content iq-pd-20 iq-mb-20" >



                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Write Review</button>
                <div class="clearfix"></div>


                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Write A Review</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form method="POST" action="{{action('ReviewController@store')}}" id="review">
                            {{csrf_field()}}
                            <input type="text" name="name" class="form-control" placeholder="Full Name">

                            <select name="rating" class="form-control iq-mt-10">
                                <option value="">Please select rating</option>
                                @for($i=1; $i<=5; $i++)
                                    <option value="{{$i}}">{{$i}} {{($i ==1) ? 'star': 'stars'}}</option>
                                @endfor
                            </select>

                            <textarea class="form-control iq-mt-10" placeholder="Enter review" name="body"></textarea>

                       
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                       </form>
                    </div>
                  </div>
                </div>

                   @if(session()->has( 'success' ))
                    <div class="alert alert-success iq-mb-20 iq-mt-20">
                        <span style="text-align: center">{{session()->get('success')}}</span>
                    </div>
                   @endif
                    
                    @foreach($reviews as $review)                    
                        <div class="testimonial-box iq-mb-20" style="width:100%; border-left:15px solid #150d3f">
                            
                            <div class="row">
                                <div class="col-sm-6">    
                                    <h3>{{$review->name}}</h3>
                                </div>
                                <div class="col-sm-4 offset-sm-2">
                                    
                                    @for($i=1; $i<=$review->rating; $i++)
                                        @if($i<=$review->rating)
                                            <span class="fa fa-star checked star-font"></span>
                                        @elseif($review->rating<$i)
                                            <span class="fa fa-star star-font"></span>
                                        @endif
                                    @endfor 
                                </div>
                            </div>
                            <p class="created_at"><i style="font-size:15px;"><b>{{$review->created_at->diffForHumans()}}</b></i></p>
                            <p>{{$review->review}}</p>
                        </div>
                    @endforeach


                   
                </div>
            </div>

    
            <div class="col-md-4">
                @include('pages.sidebar')
            </div>

        </div>
    </div>



@endsection

@section('footer')
<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<script>

    $(document).ready(function(){

    });
        $("#review").validate({
      
            rules: {
                name: {
                    required: true
                },
                rating: {
                    required: true
                },
                body: {
                  required: true,
                  maxlength: 1000,
                    minlength: 20
                },
                
            },
            messages: {
              
                name: {
                    required: "Please, enter a name"
                },
                rating: {
                    required: "Please provide a rating"
                },
                 
                body: {
                    required: "Please enter a review",
                     maxlength: "You should post your review under 1000 words",
                    minlength: "Review should be greater than 20 words"
                }
                
            },
        errorElement : 'div',
        errorLabelContainer: '.errorTxt'
        });
</script>

@endsection
