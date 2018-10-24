<div class="sidebar" style=" height:auto; padding:10px;">

    <form method="POST" action="{{action('PageController@getOrder')}}">
        {{csrf_field()}}
        <div class="sidebar-calculator">
            <h4 class="iq-tw-7 text-center">Price Calculator</h4>
               <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>

                 <div class="form-group">
                    <select name="educationlevel" class="form-control">
                        <option value="">Please select education level</option>
                        @foreach(\App\Educationlevel::all() as $education_level)
                        <option value="{{$education_level->id}}|{{$education_level->category}}">{{$education_level->name}}</option>
                        @endforeach
                    </select>
                 </div>

                <div class="form-group">
                       <select name="paperlevel" class="form-control">
                        <option value="">Please select Paper Type</option>
                        @foreach(\App\Papertype::all() as $paper)
                        <option value="{{$paper->id}}|{{$paper->category}}">{{$paper->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                   <select class="form-control" name="deadline">
                        <option value="">Please select DeadLine</option>
                        @for($i=1; $i<=250; $i++)
                            <option value= "{{$i}}">{{$i}} {{$i==1 ? "Day":"Days"}}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="pages">
                        <option value="">Please select Pages</option>
                        @for($i=1; $i<=50; $i++)
                            <option value= "{{$i}}">{{$i}} ({{$i*250}} words)</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <select name="style" class="form-control">
                        <option value="">Please select Style</option>   
                        @foreach(\App\Style::all() as $style)
                        <option value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    
                    <select name="subject" class="form-control">
                        <option value="">Please select Subject</option>
                        @foreach(\App\Subject::all() as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="price">
                        <div class="row">
                            <div class="col-md-9 offset-3" style="color:#000;font-size: 16px;padding-top: 5px;">Actual Price: &nbsp;
                                <span id="no-discount" style="color:#000"><span>£ </span>0.00 
                            </span>
                            </div>
                        </div>
                              
                        <div class="row" style="margin-top:10px;">
                               <div class="col-md-9 offset-3">
                                <div class="discount">
                                    <p style="padding-left: 6px; font-size: 12px;">25%<span style="position: relative; top: 15px; left: -20px;">off</span></p>
                                </div>
                                 <p class="col-md-9 total" id="discount"><span>£ </span>0.00</p>
                            </div>
                        </div>
                               
                          <div class="row">
                            <div class="col-md-8 offset-3" style="color:#000;font-size: 16px;">Price to pay: &nbsp;<span id="total_price" style="color:#000"><span>£ </span>0.00 </span>
                            </div>
                        </div>


                        <button type="submit" style="margin-top:10px;" name="submit" class="btn btn-primary col-md-5 offset-md-4">Order Now</button>
                    
                </div>
        </div>
    </form>

    <img src ="{{asset('assets/images/paypal.jpg')}}" style="margin-top:15px;" width="308">
    <a href="{{url('/')}}/order-now">
        <img src ="{{asset('assets/images/banner-3.jpg')}}" style="margin-top:15px; padding-left:5px;">
    </a>
    <img src ="{{asset('assets/images/paypal1.jpg')}}" style="margin-top:15px;" width="308">
 </div>