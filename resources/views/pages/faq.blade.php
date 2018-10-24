@extends('layouts.main')
@section('title', 'The Assignment Makers - Faq')
@section('description','Frequently Related Questions of The Assignment Makers')
@section('css')
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
     font-size: 36px;
    line-height: 70px;
    color: #fff;
}

#Wrapper{
    background:#f5f5f5;
}
.content{    
    background-color: #fff;
    box-shadow: 0 0 0 1px rgba(0,0,0,.05), 4px 2px 0 0 rgba(0,0,0,.05);
    overflow: hidden;
    padding: 1.25rem;
    margin-top: 8px;
}
.content > ul{list-style: initial; padding-left:10px; margin-bottom:10px;}
.content > p{text-align:justify;}
.content > h2{ font-size:30px; text-align: center; text-transform: capitalize; }
.content > h1{text-align: center; text-transform: capitalize;}

a.text-black:hover{text-decoration: none;}


</style>
@endsection
@section('content')


    <div class="container iq-mt-10 iq-mb-20">
        <div class="row">

            <div class="col-md-8">

                <div class="content iq-pd-20 iq-mb-20">


                        <div class="column_attr align_center">
                                <h1>{{env("APP_NAME")}} FAQ</h1>
                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                    <div class="image_wrapper"><img class="lazy scale-with-grid img-responsive" src="{{asset('assets/images/home_vpn_sep.png')}}" alt="Best Assignment Help Provider" width="420" height="16" style="margin-bottom:25px;" /> </div>
                                </div>
                        </div>

                   <div id="bootstrap-accordion_475" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="panel-title text-black collapsed" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse1_475" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style display-5">
                                                <span class="sign mbr-iconfont inactive mbri-arrow-down"></span>
                                                       Why Us?
                                                    </h4>
                                </a>
                            </div>
                            <div id="collapse1_475" class="panel-collapse noScroll collapse show" role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                        Unlike others, we assure that students are served better. As a result, we have implemented a unique strategy in which students can easily contact writers and directly talk to them. Moreover, we are experienced, authentic and dedicated professionals who make it certain that students get the best value for their money. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="panel-title text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse2_475" aria-expanded="true" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style display-5">
                                                        <span class="sign mbr-iconfont inactive mbri-arrow-up"></span> What about my information? Or papers that you have written?
                                                   </h4>
                                </a>

                            </div>
                            <div id="collapse2_475" class="panel-collapse noScroll collapse " role="tabpanel" aria-labelledby="headingTwo" style="">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">We assure that all the information that we have is kept confidential. Your name, contact information, and papers will always remain confidential. We do not resell papers, what we do is your property and we will never claim for it. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed text-black panel-title" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse3_475" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> Can I contact with the writer?
                                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_475" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                               <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">Yes, in fact, the moment you will email us or contact us, a professional and expert writer will be assigned to you. So that he knows what you actually want from us. </p>
                                </div>
                            </div>
                        </div>

                        

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed text-black panel-title" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse3_475" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> Will you revise/correct my work?
                                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_475" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                               <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">Yes, till it is our fault, we will make sure that we are revising and correcting your work. In case it is your fault, we will always try to make an exception and to correct and revise your work freely. As we believe that client is more important than money. </p>
                                </div>
                            </div>
                        </div>

                     


                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed text-black panel-title" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse3_475" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> What about Plagiarism?
                                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_475" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                               <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">We have been operating in the industry for more than 10 years now. We understand the importance of non-plagiarized content, and since you are paying us for writing, therefore, there is no chance for getting any plagiarism. </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed text-black panel-title" data-toggle="collapse" data-parent="#bootstrap-accordion_475" data-core="" href="#collapse3_475" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> What topics or subject do you cover?
                                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_475" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                               <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">We have mentioned most of the courses in our catalogue. However, if you are not able to find your course or subject in the given catalogue, do not worry, we can still manage your work.  </p>
                                </div>
                            </div>
                        </div>

                        </div>
                </div>


            </div>


            <div class="col-md-4">
                @include('pages.sidebar')
            </div>

        </div>
    </div>



@endsection
