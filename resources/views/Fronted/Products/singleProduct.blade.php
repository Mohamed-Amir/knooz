@extends('Fronted.layouts.master')

@section('title')
    @if(getLang() == 'ar')
        {{$Products->name_ar}}
    @else
        {{$Products->name_en}}
    @endif
@endsection
@section('content')
<div class="singlePage products">
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">@if(getLang() == 'ar')
                                    {{$Products->name_ar}}
                                @else
                                    {{$Products->name_en}}
                                @endif</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="about mb-80">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <aside>
                            <div class="sideNav padGeneral style1">
                                <ul class="splashNav">
                                    @foreach($cat as $row)
                                        @if(getLang() == 'ar')
                                            <li class="innerWrap"><a class="sideNavTriger" href="{{route('product.products',$row->id)}}">{{$row->cat_ar}} </a> </li>
                                        @else
                                            <li class="innerWrap"><a class="sideNavTriger" href="{{route('product.products',$row->id)}}">{{$row->cat_en}} </a> </li>
                                        @endif
                                            @endforeach

                                </ul>



                            </div>
                        </aside>
                    </div>
                    <div class="col-sm-10">
                        <section class="productDetail">
                            <div class="basicDetails">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="/images/Products/{{$Products->image}}" class="img-fluid">

                                    </div>
                                    <div class="col-sm-6">
                                        <span class="article">{{$Products->refernce_num}}</span>
                                       @if(getLang() == 'ar')
                                        <h2>{{$Products->name_ar}}</h2>
                                        @else
                                            <h2>{{$Products->name_en}}</h2>
                                            @endif
                                            <span class="price">{{$Products->price}}</span>



                                        <hr />
                                        <div class="prodDetail">
                                            <h6 >{{trans('knooz.product_desc')}}</h6>
                                            @if(getLang() == 'ar')
                                            <p>{{$Products->desc_ar}}</p></div>
                                        @else
                                            <p>{{$Products->desc_en}}</p></div>
                                    @endif
                                        <hr />

                                        <div class="">

                                            <ul class="socials light">
                                                <li> {{trans('knooz.share_product')}}</li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> </div>
                        </section>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection