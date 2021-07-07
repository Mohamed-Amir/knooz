<header>
    <div class="menu-section">
        <div class="menu-toggle">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
        <nav>
            <ul role="navigation" class="hidden">
                <li><a href="/">{{trans('main.home')}}</a></li>
                <li><a href="{{route('General.about')}}">{{trans('knooz.about_us')}}</a></li>
                <li><a href="{{route('product.allProducts')}}">{{trans('knooz.our_products')}}</a></li>
                <li><a href="{{route('Projects.allProjects')}}">{{trans('knooz.our_projects')}}</a></li>
                <li><a href="{{route('General.contact_us')}}">{{trans('knooz.contact_us')}} </a></li>
            </ul>
        </nav>
    </div>



    <script id="rendered-js" >
        $(".menu-toggle").on('click', function () {
            $(this).toggleClass("on");
            $('.menu-section').toggleClass("on");
            $("nav ul").toggleClass('hidden');
        });
        //# sourceURL=pen.js
    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="social">
                    <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                    <li> <a href='https://wa.me/0553253535' target='_blank'><i class="fab fa-whatsapp"></i></a> </li>
                </div>

            </div>


            <div class="col-md-4">  <div class="logo"><a href="#">   <img src="/Fronted/img/logo.png" ></a></div></div>
            <div class="col-md-4"> <div class="phone">{{about()->phone}}  <span><i class="fas fa-mobile-alt"></i></span> </div></div>
        </div>
    </div>

</header>