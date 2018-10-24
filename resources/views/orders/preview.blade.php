@extends('layouts.main')

@section('title','The Assignment Makers - Preview Order')
@section('description','Preview your order at The Assignment Makers')
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
</style>

@endsection

@section('content')
<div class="container">

    <div class="card card-invoice">
        <div class="card-body">

          <div class="alert alert-info"><p class="text-center" style="font-size:15px; padding-top:15px;">Thank you for submitting order Please Verify your order details</p></div>
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
                      <tr>
                        <td style="background-color:#E4ECF3;"><b>Order Id</b></td>
                        <td>{{$order->id}}</td>
                      </tr>
                   
                    </tbody>
                </table>
            </div>

          <h2 class="text-center">Order Summary</h2> 
            <div class="table-responsive mg-t-40">
                <table class="table table-bordered" style="font-size:16px;">
                    <tbody>
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

            <hr class="mg-b-60">

              <a href="/edit-order/{{$order->id}}" class="btn btn-primary btn-block col-md-2 offset-md-5 iq-mb-20">Edit Order</a>
              <div class=" col-md-2 offset-md-5">
              <div class="orBuy"><p style="padding-top:12px; font-size:14px; padding-left:15px; color:#fff">OR</p></div>
              </div>
            <form class="paypal" action="{{env('PAYPAL_URI')}}" method="post" id="paypal_form" target="_blank">
              <input type="hidden" name="business" value="{{env('PAYPAL_USERNAME')}}">
                <input type="hidden" name="cmd" value="_xclick" />
                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value="{{$order->title}}">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="item_number" value="{{$order->id}}">
                <input type="hidden" name="amount" value="{{$order->total}}">
                <input type="hidden" name="currency_code" value="GBP">

                   <!-- Specify URLs -->
                <input type='hidden' name='cancel_return' value='{{env("APP_URL")}}/cancel'>
                <input type='hidden' name='return' value='{{env("APP_URL")}}/success'>

                  <!-- Display the payment button. -->
                <input type="image" name="submit" border="0" class="col-md-2 offset-md-5"
                src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="PayPal - The safer, easier way to pay online">
                <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
          </form>

        </div>
        <!-- card-body -->
    </div>
    <!-- card -->

</div>

@endsection

@section('footer')

@endsection


