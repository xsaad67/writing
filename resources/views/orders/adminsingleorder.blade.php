@extends('layouts.admin')


@section('content')

 <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order#{{$order->id}}</li>
          </ol>
          <h6 class="slim-pagetitle">Order #{{$order->id}}</h6>
        </div><!-- slim-pageheader -->

        <div class="card card-invoice">
          <div class="card-body">


            <div class="invoice-header">
              <h1 class="invoice-title">Invoice</h1>
              <div class="billed-from">
                <h6>{{env('APP_NAME')}}</h6>
                <p>{{env('MAIL_FROM_NAME')}}<br>
                Email: {{env('MAIL_FROM_ADDRESS')}}</p>
              </div><!-- billed-from -->
            </div><!-- invoice-header -->

            <div class="row mg-t-20">
              <div class="col-md">
                <label class="section-label-sm tx-gray-500">Billed To</label>
                <div class="billed-to">
                  <h6 class="tx-gray-800">{{$order->user->name}}</h6>
                  Email: {{$order->user->email}}</p>
                </div>
              </div><!-- col -->
              <div class="col-md">
                <label class="section-label-sm tx-gray-500">Invoice Information</label>
                <p class="invoice-info-row">
                  <span>Invoice No</span>
                  <span>{{$order->id}}</span>
                </p>
                <p class="invoice-info-row">
                  <span>Paypal ID</span>
                  <span>{{is_null($order->paid_orderid) ? "Unpaid Order" :  $order->paid_orderid}}</span>
                </p>
                <p class="invoice-info-row">
                  <span>Issue Date:</span>
                  <span>{{$order->created_at->diffForHumans()}}</span>
                </p>
                <p class="invoice-info-row">
                  <span>Due Date:</span>
                  <span>{{$order->deadline}}</span>
                </p>
              </div><!-- col -->
            </div><!-- row -->

          @if($order->is_assigned==0 && $order->is_completed==0)
            <div class="alert alert-danger mg-t-40 text-center"><strong>UnAssigned Order</strong>
              Please assign this order
              <form method="POST" action="{{URL('/admin/order/update-assigned/'.$order->id)}}">
                {{csrf_field()}}
                <button type="submit" class="mg-t-10 btn btn-info">Assign Order</button>
              </form>
            </div>
          @endif
          @if($order->is_completed==0 && $order->is_assigned==1)
          <div class="alert alert-info mg-t-40 text-center"><strong>Complete this Order</strong>
              Please complete the order by uploading file
              <form method="POST" action="{{URL('/admin/order/update-completed/'.$order->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="custom-file col-md-4 mg-t-20">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label custom-file-label-primary custom-file-label-primary" for="customFile">Choose file</label>

                @if ($errors->has('file'))
                <br>
                  <span class="help-block">
                      <strong class="text-center" style="color:red">{{ $errors->first('file') }}</strong>
                  </span>
                @endif
              </div><!-- custom-file -->
                <br>
                <button type="submit" class="mg-t-10 btn btn-info">Complete Order</button>
              </form>
          </div>
          @endif
            
            <div class="table-responsive mg-t-40">
              <table class="table table-invoice">
                <thead>
                  <tr>
                    <th>Education</th>
                    <th>Paper</th>
                    <th>Style</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Files</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td>{{$order->education->name}}</td>
                    <td>{{$order->paper->name}}</td>
                    <td>{{$order->style->name}}</td>
                    <td>{{$order->subject->name}}</td>
                    <td>{{ucfirst($order->status)}}</td>
                    <td>
                    	@if(count($order->orderFiles)>0)

                    		foreach($order->orderFiles as $file)
                    			<a href="">$file->original_filename</a>
                    		@enforeach

                    	@else
                    	 No file Found
                    	@endif
                    </td>
                    	
                  </tr>
                  <tr>
                    <td colspan="5" class="tx-right tx-uppercase tx-bold tx-inverse tx-right">Total Due</td>
                    <td class="tx-right"><h4 class="tx-primary tx-bold tx-lato">£ {{$order->total}}</h4></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- table-responsive -->

            <hr class="mg-b-60">


          </div><!-- card-body -->
        </div><!-- card -->

      </div><!-- container -->
    </div><!-- slim-mainpanel -->

@endsection


@section('footer')


@endsection