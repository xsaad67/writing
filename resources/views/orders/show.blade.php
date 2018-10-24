@extends('layouts.main')

@section('css')

<style>
    #Wrapper{ background:#e2eaee; }
    .section-wrapper { border: 1px solid #ced4da; background-color: #fff;}
    .orBuy{
    background: #1bafdc;
    width: 50px;
    height: 50px;
    margin: 10 10 10 10;
    margin-top: 7px;
    margin-left: 45px;
    margin-bottom: 8px;
    border-radius: 30px;
    }

.container1 {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.container1::after {
    content: "";
    clear: both;
    display: table;
}

.container1 img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container1 img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
</style>

@endsection

@section('content')
<div class="container">

    <div class="card card-invoice">
        <div class="card-body">

          @if(is_null($order->paid_orderid))
          <div class="alert alert-danger" style="padding:0 !important">
            <p class="text-center" style="font-size:15px; padding-top:15px;">This order is unpaid Please pay this order</p>
            <a href="/preview/{{$order->id}}" class="btn btn-info btn-block col-md-2 offset-md-5 iq-mb-20">Pay Now</a>
          </div>
          @endif

          @if($order->is_assigned==1 && $order->is_completed==0)
          <div class="alert alert-success" style="padding:0 !important">
            <p class="text-center" style="font-size:15px; padding-top:15px;">Congratulations! Your order is successfully assigned</p>
          </div>
          @endif


          @if($order->is_completed==1)
          <div class="alert alert-success" style="padding:0 !important">
            <p class="text-center" style="font-size:15px; padding-top:15px;">Your order is completed Please download the file</p>
              <a href="{{asset('completed/'.$order->completed_file)}}" class="btn btn-info btn-block col-md-2 offset-md-5 iq-mb-20">Download File</a>
          </div>
          @endif
          <div class="row">
            <div class="col-sm-6">
              <h4 class="text-center">From<span style="color: #090037; font-weight:700"> {{env("APP_NAME")}}</span></h4> 
              <div class="table-responsive mg-t-40">
                <table class="table table-bordered" style="font-size:16px;">
                    <tbody>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Name:</b></td>
                         <td>{{env("MAIL_FROM_NAME")}}</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Email</b></td>
                        <td>{{env('MAIL_FROM_ADDRESS')}}</td>
                      </tr>
                   
                    </tbody>
                </table>
              </div>
            </div>

            <div class="col-sm-6">
              <h4 class="text-center">To <span style="color: #090037; font-weight:700">{{$order->user->email}}</span></h4> 
              <div class="table-responsive mg-t-40">
                <table class="table table-bordered" style="font-size:16px;">
                    <tbody>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Name:</b></td>
                         <td>{{$order->user->name}}</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Email</b></td>
                        <td>{{$order->user->email}}</td>
                      </tr>
                   
                    </tbody>
                </table>
              </div>
            </div>

            </div>



          <h2 class="text-center">Order Summary</h2> 
            <div class="table-responsive mg-t-40">
                <table class="table table-bordered" style="font-size:16px;">
                    <tbody>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Order ID</b></td>
                        <td><b>{{$order->id}}</b></td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Education Level</b></td>
                        <td>{{$order->education->name}}</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Paper Type</b></td>
                        <td>{{$order->paper->name}}</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Style</b></td>
                        <td>{{$order->style->name}}</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Subject</b></td>
                        <td>{{$order->subject->name}}</td>
                      </tr>

                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Created At</b></td>
                        <td>{{$order->created_at->diffForHumans()}} ({{date('Y-m-d',strtotime($order->created_at))}})</td>
                      </tr>

                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Deadline</b></td>
                        <td>{{$order->deadline}} days</td>
                      </tr>
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Delivery At</b></td>
                        <td>{{date('Y-m-d',strtotime($order->created_at.' +'.$order->deadline.' days'))}}</td>
                      </tr>

                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Order Files</b></td>
                        <td>
                              @if(count($order->orderFiles))
                                @foreach($order->orderFiles as $file)
                                <a href="{{asset('orderfiles/'.$file->filename)}}">{{$file->original_filename}}<br></a>
                                @endforeach  
                              @else
                                No file uploaded
                              @endif

                        </td>
                      </tr>

                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Total</b></td>
                        <td><b>£ {{$order->total}}</b></td>
                      </tr>

                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->

            <div class="row">
              <div class="container">
                  <div id="messages" style="background:#6b629e; height:auto; border-radius: 10px; padding:20px;">
                    
                    <h3 class="text-center" style="color:#fff">
                      Messages <button style="margin-top:15px;" data-toggle="modal" data-target="#myModal" class="btn btn-info iq-mb-20">Send Message</button>
                    </h3>
                    
                    @if(count($order->messages)>0)
                      @foreach($order->messages as $message)  
                        @if($message->role == 0)
                        <div class="container1">
                          <img src="{{asset('assets/images/user.png')}}" alt="{{$order->user->name}}" style="width:100%;">
                          <p>{{$message->message}}</p>
                          <span class="time-right">{{$message->created_at->diffForHumans()}}</span>
                        </div>
                        @else
                        <div class="container1 darker">
                          <img src="{{asset('assets/images/support.png')}}" alt="{{env('APP_NAME')}}" class="right" style="width:100%;">
                          <p>{{$message->message}}</p>
                          <span class="time-left">{{$message->created_at->diffForHumans()}}</span>
                        </div>
                        @endif
                      @endforeach
                    @endif
                  
                  </div>
                </div>
            </div> 

        </div>
        <!-- card-body -->
    </div>
    <!-- card -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Send Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{action('MessageController@store')}}">
           {{ csrf_field() }}
          <select name="support" class="form-control">
            <option value="">Support</option>
            <option vlaue="">Writer</option>
          </select>        
          <br>
          <div class="form-group">
            <textarea class="form-control" rows="8" name="message" placeholder="Message"></textarea>
          </div>

          <input type="hidden" value="{{encrypt($order->id)}}" name="order_id">

          <button type="submit" class="btn btn-primary col-sm-4 offset-sm-4">Send Message</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>

@endsection

@section('footer')

@endsection


