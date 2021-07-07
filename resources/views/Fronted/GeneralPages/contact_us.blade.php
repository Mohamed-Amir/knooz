@extends('Fronted.layouts.master')

@section('title')
    {{trans('knooz.contact_us')}}
@endsection
@section('content')
    <div class="singlePage contact">

        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                <div class="container">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title">{{trans('knooz.contact_us')}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div class="container">

            <!-- BLOCK "MAP" -->
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14948662.522732439!2d36.0368182526849!3d23.833678558438827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1624907867563!5m2!1sen!2seg" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>


            <div class="contact-information">

                <div class="row">
                    <div class="col-md-3">
                        <h4>{{trans('knooz.address')}}</h4>
                        <p>{{about()->address}} </p>
                    </div>


                    <div class="col-md-3">
                        <h4>{{trans('knooz.phone')}}</h4>
                        <p>
                            <br />
                            {{about()->phone}}

                        </p>
                    </div>




                    <div class="col-md-3">
                        <h4>{{trans('knooz.email')}}</h4>
                        <p>{{about()->email}}

                        </p>
                    </div>



                    <div class="col-md-3">
                        <h4>{{trans('knooz.follow_us')}}</h4>
                        <div class="follow">
                            <a class="entry" href="#"><i class="fa fa-instagram"></i></a>
                            <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>






<form id="massageForm" method="post">
    @csrf
            <div class="contact-form">

                <div class="sec_title text-center">
                    <h3>{{trans('knooz.send_massage')}} </h3>


                </div>



                <div class="row">
                    <div class="col-md-6 ">
                        <div class="input-wrapper">
                            <label>{{trans('knooz.name')}}</label>

                            <input name="name" class="input" required type="text">
                            <span></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-wrapper">
                            <label>{{trans('knooz.email')}}</label>
                            <input name="email" class="input" required type="text">

                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="row col-xs-b30">
                    <div class="col-sm-12">
                        <div class="input-wrapper">
                            <label>{{trans('knooz.subject')}}</label>

                            <input name="subject" class="input" type="text">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-wrapper">
                            <label>{{trans('knooz.massage')}}</label>

                            <textarea name="massage" class="input"></textarea>
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="empty-space col-xs-b40"></div>

                <div class="text-center">
                    <button id="save" class="btn btn_primary" type="submit" value="Subscribe">{{trans('knooz.send')}}</button>
                </div>


            </div>
</form>

        </div>
    </div>
@endsection
@section('script')


@endsection
