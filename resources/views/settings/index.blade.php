@extends('layouts.admin')


@section('content')

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Settings</li>
                </ol>
                <h6 class="slim-pagetitle">All Settings</h6>
            </div>
            <!-- slim-pageheader -->

         <form method="POST" action="{{action('SettingController@store')}}">
                {{csrf_field()}}

            <div class="section-wrapper mg-t-20">
                <label class="section-title text-center mg-b-40">Imap Setting(Gmail Setting)</label>
                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Imap UserName(Gmail Username)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" name="imap_username" value="{{env('IMAP_USERNAME')}}" class="form-control">
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Imap Password(Gmail Password)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="imap_password" value="{{env('IMAP_PASSWORD')}}" >
                    </div>
                </div>
                <!-- row -->

                <div class="form-layout-footer mg-t-30">
                    <button class="btn btn-primary bd-0 offset-6" type="submit">Save IMAP SETTING</button>
                </div>
                <!-- form-layout-footer -->

            </div>

            <input type="hidden" name="setting_var" value="imap">
        </form>

        </div>
        <!-- container -->

        <div class="container">
       
        <form method="POST" action="{{action('SettingController@store')}}">
                {{csrf_field()}}
            <div class="section-wrapper mg-t-20">
                <label class="section-title text-center mg-b-40">Mail Setting</label>
                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail Driver</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" name="mail_driver" value="{{env('MAIL_DRIVER')}}" class="form-control">
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail Host</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="mail_host" value="{{env('MAIL_HOST')}}" >
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail Port</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="mail_port" value="{{env('MAIL_PORT')}}" >
                    </div>
                </div>
                <!-- row -->


                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail User Name</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="mail_username" value="{{env('MAIL_USERNAME')}}" >
                    </div>
                </div>
                <!-- row -->


                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail Password</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="mail_password" value="{{env('MAIL_PASSWORD')}}" >
                    </div>
                </div>
                <!-- row -->


                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Mail Encryption</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    	<input type="text" class="form-control" name="mail_encryption" value="{{env('MAIL_ENCRYPTION')}}" >
                    </div>
                </div>
                <!-- row -->
                <div class="form-layout-footer mg-t-30">
                    <button class="btn btn-primary bd-0 offset-6" type="submit">Save Mail SETTING</button>
                </div>
                <!-- form-layout-footer -->

            </div>
            <input type="hidden" name="setting_var" value="mail">
        </form>

        </div>


          <div class="container">
       
        <form method="POST" action="{{action('SettingController@store')}}">
                {{csrf_field()}}
            <div class="section-wrapper mg-t-20">
                <label class="section-title text-center mg-b-40">Paypal Setting</label>
                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Paypal Mode(Sandbox or Live)</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <div class="radio">
                            <label><input type="radio" name="paypal_mode" {{$paypal_mode == 2 ? 'checked' : ''}} value="2"> SandBox</label>
                            &nbsp;
                            <label><input type="radio" name="paypal_mode" {{$paypal_mode == 1 ? 'checked' : ''}} value="1"> Live</label>
                        </div>
                         
                    </div>
                </div>
                <!-- row -->

                <div class="row mg-t-10">
                    <label class="col-sm-4 form-control-label">Paypal User Name</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="paypal_username" value="{{env('PAYPAL_USERNAME')}}" >
                    </div>
                </div>
                <!-- row -->

                <!-- row -->
                <div class="form-layout-footer mg-t-30">
                    <button class="btn btn-primary bd-0 offset-6" type="submit">Save PAYPAL SETTING</button>
                </div>
                <!-- form-layout-footer -->

            </div>
            <input type="hidden" name="setting_var" value="paypal">
        </form>

        </div>







    </div>
    <!-- slim-mainpanel -->


@endsection