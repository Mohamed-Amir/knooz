@extends('Fronted.layouts.master')

@section('title')
    {{trans('knooz.about_us')}}
@endsection
@section('content')

<div class="singlePage about">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"> {{trans('knooz.about_us')}} </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="about_pic">

                    <img src="/images/about/{{about()->image}}" class="img-fluid">
                </div>
            </div>

            <div class="col-md-8">


                <h3 class="sc_title sc_title_style_3 margin_bottom_25"> {{trans('knooz.about_knooz')}} </h3>
                <div class="margin_bottom_50">
                    <p><strong>  {{trans('knooz.1992')}}</strong>
                        @if(getLang() == 'ar')
                        {{about()->about_ar}}
                        @else
                            {{about()->about_en}}
                            @endif
                    </p>
                </div>
                <h3 class="sc_title sc_title_style_3 margin_bottom_25">لماذا كنوز؟</h3>



                <ul class="sc_list  sc_list_style_ul sc_list_style_1">
                    <li class="sc_list_item  odd first sc_list_marked_no">
																<span>
																	هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
																</span>
                    </li>
                    <li class="sc_list_item  even sc_list_marked_no">
																<span>
																	لقد تم توليد هذا النص من مولد النص العربى
																</span>
                    </li>
                    <li class="sc_list_item  odd sc_list_marked_no">
																<span>
																	مفيد لمصممي المواقع يتحدث عنه التصميم فيظهر بشكل لا يليق.
																</span>
                    </li>
                    <li class="sc_list_item  even sc_list_marked_no">
																<span>
																	ذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى
																</span>
                    </li>
                    <li class="sc_list_item  odd sc_list_marked_no">
																<span>
																	لقد تم توليد هذا النص من مولد النص العربى
																</span>
                    </li>
                </ul>


            </div>

        </div>
    </div>
</div>
@endsection