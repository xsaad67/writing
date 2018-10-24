@extends('layouts.main')

@section('title','The Assignment Makers - Order Now')
@section('description','Order now at The Assignment Makers to avail high quality paperwork')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

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
.iq-mt-20{margin-top:20px;}
.iq-mb-10{margin-bottom:10px;}
.input-file { position: relative; margin: 15px 0 0 } 
.input-file .input-group-addon { border: 0px; padding: 0px; }
.input-file .input-group-addon .btn { border-radius: 0 4px 4px 0 }
.input-file .input-group-addon input { cursor: pointer; position:absolute; width: 140px; height: 40px;; z-index:2;top:0;right:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0; background-color:transparent; color:transparent; }
 
.btn-box{
    background: #72A107;
    padding: 12px 10px 7px;
    margin-left: 5px;
    margin-right: 5px;
        font-size: 16px;
    color: #fff;
    float: left;
    margin: 0;
    border: none;
        border-radius: 4px 14px 3px 14px;
}

.btn-box-remove{
    background: #a81c1c;
    padding: 12px 10px 7px;
    margin-left: 5px;
    margin-right: 5px;
        font-size: 16px;
            margin-top: 10px;

    color: #fff;
    float: left;
    margin: 0;
    border: none;
    border-radius: 4px 14px 3px 14px;
}

.discount {
    height: 35px;
    width: 35px;
    border-radius: 25px;
    background: #F6BB42;
    position: absolute;
    top: -2px;
    left: 0;
    z-index: 99;
}

.total {
    color: #fff;
    background: #6f747c;
    border-radius: 25px;
    padding-left: 27px;
    padding-right: 30px;
    width: auto;
    padding-top: 3px;
    font-size: 16px;
    height: 32px;
}

.price{
    font-size:18px;
    font-weight:600;

}
.price-sum{
    font-size:26px;
    font-weight: 700;
    color:#007bff;
}
.error{
    color:red;
}
</style>
@endsection

@section('content')


<div class="container">
	   <div class="section-wrapper iq-mt-10 iq-mb-20 iq-pd-20">
            <h1 class="text-center iq-mb-20">Order Now at {{env('APP_NAME')}}</h1>
    <form method="POST" action="{{action('OrderController@store')}}" enctype="multipart/form-data" id="order_form">
        {{csrf_field()}}
        <div class="container-fluid">
        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Title: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="title" value="{{isset($order_session['title']) ? $order_session['title'] : '' }}" placeholder="Enter Title">
            </div>
        </div>


         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Education Level: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="educationlevel" class="form-control" id ="education_level">
                    <option value="">Please select education level</option>
                    @foreach($education_levels as $education_level)
                    <option value="{{$education_level->id}}|{{$education_level->category}}" {{isset($order_session['education_level']) ? ($order_session['education_level']==$education_level->id ? 'selected' : '') : '' }}>{{$education_level->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Paper Type: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="paperlevel" class="form-control" id="paper_type">
                    <option value="">Please select Paper Type</option>
                    @foreach($paper_types as $paper)
                        <option value="{{$paper->id}}|{{$paper->category}}" {{isset($order_session['paper_type']) ? ($order_session['paper_type']==$paper->id ? 'selected' : '') : '' }} > {{$paper->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>

         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">DeadLine: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select class="form-control" name="deadline" id="page_no">
                    <option value="">Please select DeadLine</option>
                    @for($i=1; $i<=250; $i++)
                        <option value= "{{$i}}"  {{isset($order_session['deadline']) ? ($order_session['deadline']==$i ? 'selected' : '') : '' }} >{{$i}} {{$i==1 ? "Day":"Days"}}</option>
                    @endfor
                </select>
            </div>
        </div>


        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Pages: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select class="form-control" name="pages" id="page_count">
                    <option value="">Please select Pages</option>
                    @for($i=1; $i<=50; $i++)
                        <option value= "{{$i}}"  {{isset($order_session['pages']) ? ($order_session['pages']==$i ? 'selected' : '') : '' }} >{{$i}} ({{$i*250}} words)</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Style: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="style" class="form-control">
                    <option value="">Please select Style</option>   
                    @foreach($styles as $style)
                    <option value="{{$style->id}}"  {{isset($order_session['style']) ? ($order_session['style']==$style->id ? 'selected' : '') : '' }}>{{$style->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Subject: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <select name="subject" class="form-control">
                    <option value="">Please select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}"  {{isset($order_session['subject']) ? ($order_session['subject']==$subject->id ? 'selected' : '') : '' }}>{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

         <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label iq-mt-20">Order Files: </label>
            <div class="col-sm-8">
                <div class="input_fields_wrap">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group input-file col-md-12">
                                <div class="form-control">
                                  <p style="margin:0 !important">Click on Browse to upload files</p>
                                </div>
                                <span class="input-group-addon">
                                  <a class='btn btn-primary' href='javascript:;'>
                                    Browse
                                    <input type="file" id="upload" id="0" name="upload[]" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());">
                                  </a>
                                </span>
                            </div>
                        </div>
                         <div class="col-md-4" style="margin-top:8px;"> <button class="add_field_button btn-box"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button> </div>
                     </div>
                </div>
             </div>

        </div>

        <div class="row iq-mb-10">
            <label class="col-sm-2 offset-sm-1 form-control-label">Requirement: <span class="tx-danger">*</span></label>
            <div class="col-sm-8">
                <textarea class="form-control" rows=8 name="requirement"></textarea>
            </div>
        </div>


        <div class="price">
            <div class="row">
                <div class="col-sm-4 offset-sm-5">
                    <p class="price">Actual Price: &nbsp;<span class="price-sum" id="no-discount">£ 0.00</span></p>
                </div>
            </div>  

             <div class="row">
                <div class="col-sm-4 offset-sm-5">
                    
                    <p class="price">Discount: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="price-sum" id="discount">£ 0.00</span></p>
                </div>
            </div>  

              <div class="row">
                <div class="col-sm-4 offset-sm-5">
                    <p class="price">Price To Pay: &nbsp;<span class="price-sum" id="total_price">£ 0.00</span></p>
                </div>
            </div>       
        </div>

        <div class="form-row text-center">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Order Now</button>
            </div>
        </div>
       

    </div>

    </form>

      
    </div>

</div>

@endsection


@section('footer')
<script src="{{asset('js/calulator.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){

        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
          var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; 
                 var print_div= '<div class="row">';
            print_div+= '<div class="col-sm-8" style="padding-right:0px;">';
            print_div+= '<div class="input-group input-file col-md-12">';
            print_div+= '<div class="form-control">';
            print_div+= '<p style="margin:0 !important">Click on browse to upload files</p>';
            print_div+= '</div>';
            print_div+= '<span class="input-group-addon">';
            print_div+= '<a class=\'btn btn-primary\' href=\'javascript:;\'>';
            print_div+= 'Browse';
            print_div+= '<input type="file" id='+x+'  name="upload[]" onchange="$(this).parent().parent().parent().find(\'.form-control\').html($(this).val().split(\/[\\\\|\/]\/).pop());">';
            print_div+= '</a>';
            print_div+= '</span>';
            print_div+= '</div>';
            print_div+= '</div>';
            print_div+= '<div class="col-sm-4" style="margin-top:17px; padding-left: 25px;"> ';
            print_div+= '<button class="remove_field btn-box-remove"><i class="fa fa-minus" aria-hidden="true"></i></button> </div>';
            print_div+= '</div>';
                $(wrapper).append(print_div);
            }else{
                sweetAlert("Upload Limit exceed", "You can't upload more than 10 files", "error");
            }
        });
        
         
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); 
           // $(this).parent('div').parent('div').remove(); 
           $(this).parent('div').parent('div').fadeOut(200, function() { $(this).remove(); });
            x--;
        });

             $("#order_form").validate({
      
            rules: {
                title: {
                    required: true
                },
                educationlevel: {
                    required: true
                },
                paperlevel: {
                  required: true  
                },
                deadline: {
                    required: true
                },
                pages: {
                    required: true
                },
                subject: {
                    required: true
                },
                style: {
                  required: true  
                },
                requirement: {
                    required: true,
                    maxlength: 1000,
                    minlength: 20
                }
              
                
            },
            messages: {
              
                title: {
                    required: "Please, enter a suitable title"
                },
                educationlevel: {
                    required: "Please select education level"
                },
                 paperlevel: {
                  required: "Please select paper type"
                },
                deadline: {
                    required: "Please select deadline"
                },
                pages: {
                    required: "Please select page (s)"
                },
                subject: {
                    required: "Please select a subject"
                },
                style: {
                  required: "Please select style"
                },
                requirement: {
                    required: "Please enter a suitable order requirement",
                     maxlength: "You should post your requirement under 1000 words",
                    minlength: "Order requirement should be greater than 20 words"
                }
                
            },
        errorElement : 'div',
        errorLabelContainer: '.errorTxt'
        });


    });
</script>

@endsection