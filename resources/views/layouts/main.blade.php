

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
  @yield('title')
</title>
<meta name="description" content="@yield('description')" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
{{-- <meta name="msvalidate.01" content="81099B42169ABFD0C1093AF63B195925" /> --}}
{{-- <meta name="google-site-verification" content="c1qYK8_92bolmMt6T1xKUvYilCH9hkRXioP9J2MOezQ" /> --}}
<link rel="stylesheet" href="/Contents/css/bootstrap.css" />
<link rel="stylesheet" href="/Contents/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Contents/css/Customize.css" />    

  <script async src="/Contents/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js" ></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Placed at the end of the document so the pages load faster -->
        
<meta name="keywords" content="@yield('keyword')" />

@yield('css')
</head>
<body>
    
  @include('layouts.nav')

  @yield('content')
  
  @include('layouts.footer')

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script  src="/Contents/js/jquery.min.js"></script>
    <script  src="/Contents/js/bootstrap.min.js"></script>

   
    <script async src="/Contents/js/main.js"></script>
    {{-- <script type="text/javascript" defer="defer" src="https://mylivechat.com/chatinline.aspx?hccid=49313229"></script> --}}

    
    <link rel="stylesheet" href="/Contents/css/sl-slide.css">
    
    <!-- Required javascript files for Slider -->
    <script src="/Contents/js/jquery.ba-cond.min.js"></script>
    <script src="/Contents/js/jquery.slitslider.js"></script>
    <!-- /Required javascript files for Slider -->
    <!-- SL Slider -->
    <script type="text/javascript">
        $(function () {
            var Page = (function () {

                var $navArrows = $('#nav-arrows'),
                slitslider = $('#slider').slitslider({
                    autoplay: true
                }),

                init = function () {
                    initEvents();
                },
                initEvents = function () {
                    $navArrows.children(':last').on('click', function () {
                        slitslider.next();
                        return false;
                    });

                    $navArrows.children(':first').on('click', function () {
                        slitslider.previous();
                        return false;
                    });
                };

                return { init: init };

            })();

            Page.init();
        });
    </script>
    <!-- /SL Slider -->
 


  @yield('footer')

</body>

</html>
