<footer>

    <div class="container">

        <div class="row">
            @if(getLang() == 'ar')
            <div class="col-md-5">
                <div class="foot_about">
                    <h5> {{trans('knooz.quick_summary')}}</h5>
                    <p>{{about()->about_ar}}</p>
                </div>
            </div>
            @else

                <div class="col-md-5">
                    <div class="foot_about">
                        <h5>{{trans('knooz.quick_summary')}}</h5>
                        <p>{{about()->about_en}}</p>
                    </div>
                </div>
            @endif


            <div class="col-md-3">
                <div class="foot_contact">
                    <h5>{{trans('knooz.quick_contact')}} </h5>

                    <li><span><i class="fas fa-mobile-alt"></i></span>
                        {{about()->phone}}</li>
                    <li><span><i class="fab fa-whatsapp"></i></span>{{about()->whatsApp}}</li>
                    <li><span><i class="far fa-envelope"></i></span>{{about()->email}}</li>
                    <li><span><i class="fas fa-map-marker-alt"></i></span>{{about()->address}}</li>
                </div>
            </div>

            <div class="col-md-4">
                <div class="foot_news">
                    <h5>{{trans('knooz.newsLetter')}}</h5>

                    <form id="NewsForm" method="post">

                        @csrf
                        <input type="text" placeholder="{{trans('knooz.name')}}" name="name" required>
                        <input type="email" placeholder="{{trans('knooz.email')}}" name="email" required>


                        <button class="btn btn_primary" id="save" type="submit" value="Subscribe">{{trans('knooz.sub')}}</button>

                    </form>

                </div>
            </div>





        </div>
    </div>
</footer>


<!----------footeer--------------->


<!----------------copyright---------------->

<div class="clear"> </div>

<div class="copyrights">
    <div class="container">

        <div class="row">
            <div class="col-md-6 tr"> جميع الحقوق محفوظة 2021 - ورشة كنوز للنجارة   </div>
            <div class="col-md-6">  تصميم تحالف الرؤى </div>



        </div>
    </div>
</div>
