<?php

if(!function_exists('calculate_percentile')){

function calculate_percentile($percentile,$page_no,$original_amount,$category){
        $sum=0.00;
        if($page_no<5){
            for( $i=4;$i>=$page_no;$i--) {
                if($i==4){
                    $objective_sum=$original_amount;//20
                    $sum =(($percentile/100)*$objective_sum)+$objective_sum;
                }else{
                    $objective_sum=$sum;
                    $sum =(($percentile/100)*$objective_sum)+$objective_sum;
                }
            }

        }

        else if($page_no>5){
            for($i=6;$i<=$page_no;$i++) {
                if($i==6){
                    $objective_sum=$original_amount;//20
                    $sum =$objective_sum-(($percentile/100)*$objective_sum); //20-(20/100)*20
                }else{
                    $objective_sum=$sum;
                    $sum =$objective_sum-(($percentile/100)*$objective_sum);
                }
            }
        }
        else{
            if($category=="a40"){
                $sum=20.00;
            }else{
                $sum=15.00;
            }

        }
        return $sum; //number_format((float)$sum, 2, '.', '');
    }
    
    
}

if(!function_exists('calculate_price')){
 function calculate_price($education_level,$page_type,$page_no){
            $result=0.00;
            if($education_level=="b40" && $page_type=="b40"){
                if($page_no<5){
                    $result= calculate_percentile(15,$page_no,10,"b40");
                }else if($page_no>5 && $page_no<10){
                    $result= calculate_percentile(7,$page_no,10,"b40");
                }else if($page_no>=10){
                    $result=8.35;
                }
                else{
                    $result= calculate_percentile(7,$page_no,10,"b40");
                }
            }
            else{
                if($page_no<5){
                    $result= calculate_percentile(15,$page_no,12,"a40");
                }else if($page_no>5 && $page_no<10){
                    $result= calculate_percentile(7,$page_no,12,"a40");
                }else if($page_no>=10){
                    $result=10.44;
                }
                else{
                    $result= calculate_percentile(15,$page_no,20,"a40");

                }
            }
            return number_format((float)$result, 2, '.', '');
        }
}

if(!function_exists('strip_tags_content')){

function strip_tags_content($text, $tags = '', $invert = FALSE) { 
  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  } 
  return $text; 
} 

}


if(!function_exists('getUniqueSlug')){

    function getUniqueSlug(\Illuminate\Database\Eloquent\Model $model, $value)
    {
        $slug = \Illuminate\Support\Str::slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
    
}

if(!function_exists('unicodeSlug')){

    function unicodeSlug($string, $separator = '-') {
        $re = "/(\\s|\\".$separator.")+/mu";
        $str = @trim($string);
        $subst = $separator;
        $result = preg_replace($re, $subst, $str);
        return $result;
    }

}


if(!function_exists('dummy_content_service')){

    function dummy_content_service(){

    return '<h1 class="text-center">Expert Writers and professionals providing Executive Summary Writing</h1>

                   <p>When writing long documents, reports, and reviews, an executive summary is written to provide an overview and summary of what the report consists. It is a brief section written at the beginning of the report, which is neither an introduction nor a background of the report. Executive summary writing is based on providing readers and audience with the essence of the report and document. It not only summarises a large plan or report but also communicates the key findings and the proposed course of actions. The executive summary is included in the preliminary part of the report but is written in the end. Arguably, the executive summary is termed as the most valuable component of a report, proposal, thesis, or a project. However, people are often confused related to the purpose of the executive summary.</p>
                   
                   <p>Executive summary writing is not about summarising the content; it is about selling the context by influencing the audience to read the remaining content of the report. Executive summary writing aims to pique the interest of readers and catch their attention. The writer must know that even if they spend hours writing the proposal, making it attractive, integrating the graphics, and recommending the best solution, the reader can flip to the conclusion after reading one page.  The executive summary brilliantly summarises all the crucial parts of the report and also highlights the impressive attributes and unique aspects of the project or plan. </p>

                   <h2 class="custom-h2 text-center">Get One Dedicated Executive Summary Writer To Yourself</h2>

                   <p>The Executive Summary Writer ensures that the executive summary is written in an informative manner, which helps in catching the attention of the audience and motivates them to read the document. The writer is focused on making the executive summary look persuasive by highlighting the key aspects rather than making it more descriptive. The writer provides help with executive summary by outlining the basic format and structure of the executive summary. They ensure that their piece of writing builds enough interest in the mind of the readers so that they go through the proposal or report. While writing proposals and business plans, it is crucial to convince the banks, investors, and financiers to invest in the business. So, it is advisable to write the executive summary in the end so that it consists of all the necessary information and details related to the plan and project. Paragraphs and bullet points are used to specify the information, which also helps in avoiding the repetition of content. Including too little or too much information can result in losing the audience. The potential readers and clients seek for uniqueness, evidence, and proof, which must be reflected in the executive summary.</p>

                   <p>While crafting the executive summary, the Executive Summary Writer pays attention to the content and information presented in the report. It is thoroughly written to provide the reader and client with all the necessary information, which can help in taking the right decisions. The executive summary gives a clear scenario of what the readers are going to read in the rest of the proposal. An efficiently written executive summary presents the introduction, the need for writing, the offerings, solutions, and the proof of findings. It provides a to-the-point, crisp, and concise view of the overall document. Making the audience excited to the read the document is dependent on the executive summary. The writer ensures that the executive summary is exceptionally written and lays the foundation for the proposal or report. It should include interesting information with an identifiable goal. An efficient and professional writer knows how to condense the summary by ensuring that all the relevant and important information fits onto one page. Bullet points can be used to make the content more presentable and understandable. </p>

                   <p>The Executive Summary Writers ensure that they inspire the audience by presenting the objectives and findings so that they are eager to read on the document. The writer takes the responsibility to make the executive summary a standalone piece using a defined and attractive structure. They know that time is highly valuable and readers do not like wasting time on something that does not catch their attention or something they do not find useful or attractive.  So, rather than reading a 50 to 100-page document, the executive summary is selected by the readers to save their time. The executive summary writers understand the importance of executive summary, which helps in professionally achieving its purpose. However, it is important for the writer to make sure that the executive summary is short and simple. Including too much detail is avoided and rather than presenting history, the executive summary should only include the most important information. The writer should keep things simple and positive while providing a thought-provoking idea or a quote, which can help in starting with a bang. In the end, the solutions and recommendations must be prominently visible with a clear message.  </p>';
    
        }
    }   

if(!function_exists('trucnateStringh')){
        function trucnateStringh($text, $length=200) {
           $length = abs((int)$length);
           if(strlen($text) > $length) {
              $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
           }
           return(strip_tags($text));
        }
    }
    
 if(!function_exists('custom_imap_stream')){
        function custom_imap_stream($message){
            $stream = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX", env("IMAP_USERNAME"), env("IMAP_PASSWORD"),NULL,1)or die('Cannot connect to Gmail: ' . print_r(imap_errors()));

                $folder = "{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX";
            

                imap_append($stream, $folder, $message);

                imap_close($stream);
        }
    }
    

   function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($envKey);

        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }



?>