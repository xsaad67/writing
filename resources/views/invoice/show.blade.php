@extends('layouts.main')


@section('content')


<section class="title">
    <div class="container">
        <div class="row" style="padding-top:75px;">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h1>Order#{{$invoice->id}}</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <ul class="breadcrumb pull-right">
                    <li><a href="index-2.html">Home</a> <span class="divider"></span></li>
                    <li class="active">Order#{{$invoice->id}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="main-info" style="padding-top:10px; padding-bottom:10px;">
    <div class="container">
        <div class="row-fluid">
        	<h1>Please click on CHECKOUT to proceed your payment request</h1>

        	<form action='https://www.2checkout.com/checkout/purchase' method='post'>
        		{{-- For SandBox --}}
     
				<input type='hidden' name='sid' value='{{$invoice->merchant}}' >
				<input type='hidden' name='mode' value='2CO' >
				<input type='hidden' name='li_0_type' value='product' >
				<input type='hidden' name='li_0_name' value='{{$invoice->title}}' >
				<input type='hidden' name='li_0_product_id' value='{{$invoice->id}}' >
				<input type='hidden' name='li_0_price' value='{{$invoice->price}}' >
				<input type='hidden' name='li_0_quantity' value='{{$invoice->qty}}' >
				<input type='hidden' name='li_0_tangible' value='N' >
				<input type='hidden' name='card_holder_name' value='{{$invoice->name}}' >
				<input type='hidden' name='street_address' value='{{$invoice->address}}' >
				<input type='hidden' name='city' value='{{$invoice->city}}' >
				<input type='hidden' name='state' value='{{$invoice->state}}' >
				<input type='hidden' name='zip' value='{{$invoice->zip}}' >
				<input type='hidden' name='country' value='{{$invoice->country}}' >
				<input type='hidden' name='email' value='{{$invoice->email}}' >
				<input type='hidden' name='currency_code' value="{{$invoice->currency}}">
				<input type='hidden' name='purchase_step' value='payment-method' >
				<input name='submit' type='submit' value='Checkout' class="btn btn-success btn-lg">

			</form>

        </div>
    </div>

</section>


@endsection

