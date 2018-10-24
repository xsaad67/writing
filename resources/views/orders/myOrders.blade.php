@extends('layouts.main')

@section('title','The Assignment Makers - My Orders')
@section('description','Your all orders at The Assignment Makers')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style>
#Wrapper{
    background:#e2eaee;
}
.section-wrapper {
    border: 1px solid #ced4da;
    background-color: #fff;
}
.iq-mt-20{margin-top:20px;}
.iq-mb-10{margin-bottom:10px;}
</style>

@endsection


@section('content')

	<div class="container">
		<div class="section-wrapper iq-mt-10 iq-mb-20 iq-pd-20">
			<table id="myTable" class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <th>Order#</th>
			            <th>Title</th>
			            <th>DeadLine</th>
			            <th>Created</th>
			            <th>Word Count</th>
			            <th>Status</th>
			            <th>Assigned</th>
			            <th>Total</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($orders as $order)
			        
			        <tr>
			            <td><a href="/order/{{$order->id}}">{{$order->id}}</a></td>
			            <td>{{$order->title}}</td>
			            <td>{{$order->created_at->addDays($order->deadline)->diffForHumans()}}</td>
			            <td>{{$order->created_at->diffForHumans()}}</td>
			            <td>{{$order->pages}} ({{$order->pages*250}} words)</td>
			            <td>{{$order->status}}</td>
			            <td>{{$order->is_assigned ==0 ? "Not Assigned" : "Assigned"}}</td>
			        	<td><b>{{$order->total}}</b></td>
			            
			        </tr>

			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>

@endsection


@section('footer')

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
});
</script>

@endsection