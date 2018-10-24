@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dropzone.css')}}">
<style>
#Subheader {
    background-image: url({{asset('assets/images/home_vpn_subheader.jpg')}});
}
#Subheader {
    background-position: center bottom;
}
.subheader-both-center #Subheader .title {
    width: 100%;
    text-align: center;
}
#Subheader .title {
    font-weight: 700;
}
#Subheader .title {
    font-size: 70px;
    line-height: 70px;
    color: #fff;
}

#Wrapper{
    background:#e2eaee;
}
.section-wrapper {
    border: 1px solid #ced4da;
    background-color: #fff;
}
.tx-danger{
    color:red;
}
.form-control-label{
    font-size:15px;
}
.iq-mb-10{margin-bottom:10px;}
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<!-- <div id="Subheader" style="padding:55px 0;">
    <div class="container">
        <div class="column one">
            <p class="title">Order Now</p>
        </div>
    </div>
</div>
 -->
<div class="container">
	   <div class="section-wrapper iq-mt-10 iq-mb-20 iq-pd-20">
            <h1 class="text-center"></h1>
    <form method="POST" action="{{action('OrderController@store')}}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="container-fluid">
        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Title: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
        </div>


         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Education Level: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="educationlevel" class="form-control">
                    <option value="">Please select education level</option>

                </select>
            </div>
        </div>

         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Paper Type: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="paperlevel" class="form-control">
                    <option value="">Please select Paper Type</option>
                </select>
            </div>
        </div>

         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">DeadLine: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select class="form-control">
                    <option value="">Please select DeadLine</option>
                    @for($i=1; $i<=250; $i++)
                        <option value= "{{$i}}">{{$i}} {{$i==1 ? "Day":"Days"}}</option>
                    @endfor
                </select>
            </div>
        </div>


        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Pages: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select class="form-control">
                    <option value="">Please select Pages</option>
                    @for($i=1; $i<=50; $i++)
                        <option value= "{{$i}}">{{$i}} ({{$i*250}} words)</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Style: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="educationlevel" class="form-control">
                    <option value="">Please select Style</option>

                </select>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Subject: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="educationlevel" class="form-control">
                    <option value="">Please select Subject</option>

                </select>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Requirement: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <textarea class="form-control" rows=8></textarea>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Order Files: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
               <div class="dz-message">
                    <div class="col-xs-8">
                        <div class="message">
                            <p>Drop files here or Click to Upload</p>
                        </div>
                    </div>
                </div>
                <div class="fallback">
                    <input type="file" name="file" multiple>
                </div>

                  {{--Dropzone Preview Template--}}
          <div id="preview" style="display: none;">
 
            <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail /></div>
 
            <div class="dz-details">
                <div class="dz-size"><span data-dz-size></span></div>
                <div class="dz-filename"><span data-dz-name></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
       
 
 
        <!--     <div class="dz-error-mark">
 
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                   <title>error</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                        </g>
                    </g>
                </svg>
            </div> -->
        </div>
    </div>
    {{--End of Dropzone Preview Template--}}
            </div>
        </div>

</div>

    </div>

</form>

       </div>

</div>

@endsection


@section('footer')
<script type="text/javascript" src="{{asset('js/dropzone.js')}}"></script>

<script>

    $(document).ready(function(){
var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 16,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000, 
    init: function () {
        this.on("removedfile", function (file) {
            $.post({
                url: '/images-delete',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
    }
};



    });
</script>
@endsection 