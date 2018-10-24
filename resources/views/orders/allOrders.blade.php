@extends('layouts.admin')


@section('css')


@endsection


@section('content')

<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Orders</li>
          </ol>
          <h6 class="slim-pagetitle">{{$title}}</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">

              <thead>
                <tr>
                  <th class="wd-15p">Order No #</th>
                  <th class="wd-15p">Title</th>
                  <th class="wd-15p">Deadline</th>
                  <th class="wd-15p">Payment Status</th>
                  <th class="wd-15p">Paypal Id</th>
                  <th class="wd-15p">Assigned</th>
                  <th class="wd-15p">Completed</th>
                  <th class="wd-15p">Total</th>
                  <th class="wd-15p">Created At</th>
                </tr>
              </thead>

              <tbody>
              	@foreach ($orders as $order)	
	                <tr>
	                  <td><a href="/admin/order/{{$order->id}}">{{$order->id}}</a></td>
                      <td>{{$order->title}}</td>
	                  <td>{{$order->deadline}}</td>
	                  <td>{{$order->status}}</td>
	                  <td>{{$order->paid_orderid}}</td>
	                  <td>{!! ($order->is_assigned==0) ? "No": "<b>Yes</b>" !!}</td>
	                  <td>{!! ($order->is_completed==0) ? "No" : "<b>Yes</b>" !!}</td>
	                  <td>{{$order->total}}</td>
	                  <td>{{$order->created_at->diffForHumans()}}</td>
	                  
	            
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


@endsection