<html>
@if(getLang() =='en')
    <html lang="en">
    @else
        <html lang="ar">

        @endif
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <link rel="shortcut icon" href="" type="image/x-icon">
            <meta name="author" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <title> ورشة كنوز للنجارة </title>


            <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2" >
            <link rel="stylesheet" href="/Fronted/css/bootstrap.css" >
            <link rel="stylesheet" href="/Fronted/js/bootstrap.js" >
            <link rel="stylesheet" href="/Fronted/fonts/stylesheet.css" >
            <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>
            <link rel="stylesheet" href="/Fronted/css/main.css" >



            <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

            <script src="/Fronted/js/main.js"></script>

            <link rel="stylesheet" href="/Fronted/fonts/stylesheet.css" type="text/css" charset="utf-8" />

            <link href="/Fronted/css/model.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <!----------brandslider---------------->
            <!----slider---->
            <script src="http://code.jquery.com/jquery.js"></script>

            <script src="/Fronted/src/skdslider.min.js"></script>
            <link href="/Fronted/src/skdslider.css" rel="stylesheet">
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':false,'autoSlide':true,'animationType':'fading'});
                    jQuery('#demo2').skdslider({'delay':5000, 'animationSpeed': 1000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
                    jQuery('#demo3').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

                    jQuery('#responsive').change(function(){
                        $('#responsive_wrapper').width(jQuery(this).val());
                    });

                });
            </script>

            <!----slider---->

            <link href="/Fronted/css/style.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="/Fronted/js/jquery.flexisel.js"></script>


            <script>
                window.console = window.console || function(t) {};
            </script>



            <script>
                if (document.location.search.match(/type=embed/gi)) {
                    window.parent.postMessage("resize", "*");
                }
            </script>


        </head>
<body>

@include('Fronted.layouts.header')

@yield('content')

@include('Fronted.layouts.footer')

<a class="to-top" href="/">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

@yield('script')
@include('Admin.includes.scripts.AlertHelper')



<script>
    $('#NewsForm').submit(function (e) {
        e.preventDefault();
        $("#save").attr("disabled", true);

        Toset('applying your request', 'info', 'processing your request ', false);
        var formData = new FormData($('#NewsForm')[0]);
        $.ajax({
            url: '/api/News',
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#save").attr("disabled", false);
                $.toast().reset('all');
                if (data.status == 1) {
                    swal(data.message, {
                        icon: "success",
                    });
                    $('#NewsForm')[0].reset();
                }else {
                    swal(data.message, {
                        icon: "error",
                    });
                }
            }
        });
    })
</script>

<script>
    $('#massageForm').submit(function (e) {
        e.preventDefault();
        $("#save").attr("disabled", true);

        Toset('applying your request', 'info', 'processing your request ', false);
        var formData = new FormData($('#massageForm')[0]);
        $.ajax({
            url: '/api/massage',
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#save").attr("disabled", false);
                $.toast().reset('all');
                if (data.status == 1) {
                    swal(data.message, {
                        icon: "success",
                    });
                    $('#NewsForm')[0].reset();
                }else {
                    swal(data.message, {
                        icon: "error",
                    });
                }
            }
        });
    })
</script>



<script src="/Fronted//js/popper.min.js"></script>
<script src="/Fronted/js/bootstrap.min.js"></script>
<!----slider---->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-3415878-12', 'dandywebsolution.com');
    ga('send', 'pageview');

</script>
<!----slider---->



<script>
    $(function() {
        //----- OPEN
        $('[data-popup-open]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-open');
            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

            e.preventDefault();
        });

        //----- CLOSE
        $('[data-popup-close]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-close');
            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

            e.preventDefault();
        });
    });
</script>


<div class="popup" data-popup="popup-1">
    <div class="popup-inner">
        <div class="video-container"><iframe width="100%"  src="https://www.youtube.com/embed/w-ZrFGBtNgE " frameborder="0" allowfullscreen ></iframe>
        </div>

        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>

    </div>

</div>
@yield('script')
</body>
</html>


