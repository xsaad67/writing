@extends('layouts.main')
{{-- @section('title', isset($page->meta_title) ? $page->meta_title : $page->title)
@section('description',isset($page->meta_description) ? $page->meta_description : trucnateStringh(strip_tags($page->description,'p')))
@section('keywords',$page->keywords) --}}
@section('css')

@endsection
@section('content')


    {{-- 
    <div class="container iq-mt-10 iq-mb-20">
        <div class="row">

            <div class="col-md-8">

                <div class="content iq-pd-20 iq-mb-20">
                    
                         <div class="column_attr align_center">
                                <h1>{{$page->title}}</h1>
                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                    <div class="image_wrapper"><img class="lazy scale-with-grid img-responsive" src="{{asset('assets/images/home_vpn_sep.png')}}" alt="Best Assignment Help Provider" width="420" height="16" style="margin-bottom:25px;" /> </div>
                                </div>
                        </div>
                    {!! $page->description !!}
                </div>


            </div>


            <div class="col-md-4">
                @include('pages.sidebar')
            </div>

        </div>
    </div> 
    --}}


<section class="title">
    <div class="container">
        <div class="row" style="padding-top:75px;">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h1>Custom Assignment Writing Service</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <ul class="breadcrumb pull-right">
                    <li><a href="index-2.html">Home</a> <span class="divider"></span></li>
                    <li class="active">Custom Assignment Writing Service</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<section class="main-info" style="padding-top:10px; padding-bottom:10px;">
    <div class="container">
        <div class="row-fluid">

            <div class="col-lg-8 col-md-8 col-sm-8">
                
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">

                <form method="post" action="" id="form1">
                    

                    <div class="panel panel panel-info" style="padding: 10px;">
                        <div class="panel-heading">Calculate Your Assignment</div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label>Educational Level <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="ctl00$ContentPlaceHolder1$price$drEduationalLevel" id="ContentPlaceHolder1_price_drEduationalLevel" class="form-control">
                                            <option value="--Select Educational Level">--Select Educational Level</option>
                                            <option value="1">A-Level</option>
                                            <option value="2">GCSE</option>
                                            <option value="3">Degree</option>
                                            <option value="4">Master</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Desired Consultancy <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="ctl00$ContentPlaceHolder1$price$drproduct" id="ContentPlaceHolder1_price_drproduct" class="form-control">
                                            <option value="---Select---">---Select---</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Deadline <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="ctl00$ContentPlaceHolder1$price$drDeadline" id="ContentPlaceHolder1_price_drDeadline" class="form-control">
                                            <option value="---Select---">---Select---</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Desired Standard <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="ctl00$ContentPlaceHolder1$price$drStandard" id="ContentPlaceHolder1_price_drStandard" class="form-control">
                                            <option value="---Select---">---Select---</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Number of Pages <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="ctl00$ContentPlaceHolder1$price$drPages" id="ContentPlaceHolder1_price_drPages" class="form-control">
                                            <option value="---Select---">---Select---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Price <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <i class="glyphicon">£ </i><strong>
                                                <span id="ContentPlaceHolder1_price_lblTotalPrice">0.00</span></strong>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <a href="newuser-signup" class="btn btn-success">Order Now</a>
                                </div>

                            </div>
                        </div>
                    </div>

                  
                </form>

            </div>
        </div>
    </div>
</section>


@endsection
