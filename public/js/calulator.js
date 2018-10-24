
    $(document).ready(function(){

        var education_split = $('#education_level').val().split("|");
        var paper_split = $('#paper_type').val().split("|");

        var education_level= education_split[1];
        var paper_type= paper_split[1];
        var page_no= $('#page_no').val();
        var page_count =$('#page_count').val();
        var discount = $("#no-discount").val();
        var accumulated_discount=$("#discount").val();

        $('#education_level').on('change', function() {
            
            paper_split = $('#paper_type').val().split("|");
            paper_type= paper_split[1];
            
            education_split = this.value.split("|");
            education_level=education_split[1];

            result=calculate_price(education_level,paper_type,page_no);
            final_res=result*page_count;
            if(final_res<12){
                final_res=9.00;
            }
            $("#total_price").html("&pound; "+final_res.toFixed(2));
            discount = ((25/100)*final_res)+final_res;
            $("#no-discount").html("&pound; "+discount.toFixed(2));
            accumulated_discount=discount-final_res;
              $("#discount").html("<strike>&pound; "+accumulated_discount.toFixed(2)+"</strike>");

        });

        $('#paper_type').on('change', function() {
            
            education_split = $('#education_level').val().split("|");
            education_level= education_split[1];
            
            paper_split =this.value.split("|");
            paper_type=paper_split[1];

            result=calculate_price(education_level,paper_type,page_no );
            final_res=result*page_count;
             if(final_res<12){
                final_res=9.00;
            }
            $("#total_price").html("&pound; "+final_res.toFixed(2));
            discount = ((25/100)*final_res)+final_res;
            $("#no-discount").html("&pound; "+discount.toFixed(2));
            accumulated_discount=discount-final_res;
                  $("#discount").html("<strike>&pound; "+accumulated_discount.toFixed(2)+"</strike>");
        });

        

        $('#page_no').on('change', function() {
            page_no=this.value;
            $("#hours").html(page_no*24);
            $("#total-hours").fadeIn();
            result=calculate_price(education_level,paper_type,page_no );
            final_res=result*page_count;
            if(final_res<12){
                final_res=9.00;
            }
            $("#total_price").html("&pound; "+final_res.toFixed(2));
            discount = ((25/100)*final_res)+final_res;
            $("#no-discount").html("&pound; "+discount.toFixed(2));
            accumulated_discount=discount-final_res;
            $("#discount").html("<strike>&pound; "+accumulated_discount.toFixed(2)+"</strike>");

        });

        $('#page_count').on('change', function() {
            page_count=this.value;
            result=calculate_price(education_level,paper_type,page_no );
            final_res=result*page_count;
           if(final_res<12){
                final_res=9.00;
            }
          $("#total_price").html("&pound; "+final_res.toFixed(2));
            discount = ((25/100)*final_res)+final_res;
            $("#no-discount").html("&pound; "+discount.toFixed(2));
            accumulated_discount=discount-final_res;
            $("#discount").html("<strike>&pound; "+accumulated_discount.toFixed(2)+"</strike>");
        });

        function calculate_price(edu_level,p_type,p_no ){
            var result;
            if(edu_level=="b40" && p_type=="b40"){
                if(p_no<5){
                    result= calculate_percentile(p_no,10,15,"b40");
                }else if(p_no>5 && p_no<10){
                   
                    result= calculate_percentile(p_no,10,7,"b40");
                }else if(p_no>=10){
                    result=8.35;
                }
                else{
                    result= calculate_percentile(5,10,7,"b40");
                }
            }else{
                    if(p_no<5){
                       result= calculate_percentile(p_no,12,15,"a40");
                    }else if(p_no>5 && p_no<10){
                        result= calculate_percentile(p_no,12,7,"a40");
                    }else if(p_no>=10){
                        result=10.44;
                     }
                    else{
                        result= calculate_percentile(5,12,7,"a40");
                    }
            }
            return result;
        }
        


        function calculate_percentile(p_no,original_amount,percentile,category){
            var result, sum=0.0;
            if(p_no<5){
               for(var i=4;i>=p_no;i--) {
                    if(i==4){
                        var objective_sum=original_amount;//15
                        sum =((percentile/100)*objective_sum)+objective_sum;
                    }else{
                        var objective_sum=sum;
                        sum =((percentile/100)*objective_sum)+objective_sum;
                    }
             }

                }

                else if(p_no>5){
                for(var i=6;i<=p_no;i++) {
                    if(i==6){
                        var objective_sum=original_amount;//15
                        sum =objective_sum-((percentile/100)*objective_sum);
                    }else{
                        var objective_sum=sum;
                        sum =objective_sum-((percentile/100)*objective_sum);
                    }
                }
            }
          
            else{
                    if(category=="a40"){
                        sum=12.00;
                    }else{
                        sum=10.00
                    }

            }

            return sum.toFixed(2);
            }
            
            
            
            function get_day(get_Date){
                var get_day_of = DateTime.Now();
                get_Date = get_daty_of * 2;
                return get_Date;
            }




    });
