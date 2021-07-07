@extends('Fronted.layouts.master')

@section('title')
    @if(getLang() == 'ar')
        {{$Projects->name_ar}}
    @else
        {{$Projects->name_en}}
    @endif
@endsection
@section('content')
    <div class="singlePage ">

        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                <div class="container">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title">@if(getLang() == 'ar')
                                        {{$Projects->name_ar}}
                                    @else
                                        {{$Projects->name_en}}
                                    @endif</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Gallery -->
        <div class="container">

@if(getLang() == 'ar')
            <div class="home_projects" style="background: none; color: inherit">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="home_pro">
                                <div class="pic" style="text-align: center;"><img src="/images/Projects/{{$Projects->image}}"></div>
                                <div class="details">
                                    <h4>{{$Projects->name_ar}}</h4>
                                    <li><span><i class="fas fa-layer-group" aria-hidden="true"></i></span> {{$Projects->catRelation->cat_ar}}</li>
                                    <li><span><i class="far fa-calendar-alt" aria-hidden="true"></i></span>{{$Projects->finishing_date}}</li>
                                    <li><span><i class="fas fa-history" aria-hidden="true"></i></span>3{{$Projects->duration}}</li>
                                    <li><span><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>{{$Projects->location}}</li>
                                    <br />
                                    <div class="desc">
                                        <h4>وصف المشروع</h4>
                                        <p>{{$Projects->desc_ar}}</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="home_projects" style="background: none; color: inherit">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="home_pro">
                                    <div class="pic" style="text-align: center;"><img src="/images/Projects/{{$Projects->image}}"></div>
                                    <div class="details">
                                        <h4>{{$Projects->name_en}}</h4>
                                        <li><span><i class="fas fa-layer-group" aria-hidden="true"></i></span> {{$Projects->catRelation->cat_en}}</li>
                                        <li><span><i class="far fa-calendar-alt" aria-hidden="true"></i></span>{{$Projects->finishing_date}}</li>
                                        <li><span><i class="fas fa-history" aria-hidden="true"></i></span>3{{$Projects->duration}}</li>
                                        <li><span><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>{{$Projects->location}}</li>
                                        <br />
                                        <div class="desc">
                                            <h4>وصف المشروع</h4>
                                            <p>{{$Projects->desc_en}}</p>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="sec_title text-center">
                <h3>{{trans('knooz.photoz')}}</h3>
                <br /><br />

            </div>
            <div class="row">
            @foreach($project_image as $row)
                <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
                    <a href="#lightbox" style="width: 200px; height: 243px " data-slide-to="7"><img src="/images/Project_images/{{$row->image}}" class="img-thumbnail"></a>
                </div>
                @endforeach
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
                            <ol class="carousel-indicators">
                                <li data-target="#lightbox" data-slide-to="0"></li>
                                <li data-target="#lightbox" data-slide-to="1"></li>
                                <li data-target="#lightbox" data-slide-to="2"></li>
                                <li data-target="#lightbox" data-slide-to="3"></li>
                                <li data-target="#lightbox" data-slide-to="4"></li>
                                <li data-target="#lightbox" data-slide-to="5"></li>
                                <li data-target="#lightbox" data-slide-to="6"></li>
                                <li data-target="#lightbox" data-slide-to="7"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+1" class="w-100"
                                                                       alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+2" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+3" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+4" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+5" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+6" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+7" class="w-100"
                                                                alt=""></div>
                                <div class="carousel-item"><img src="https://dummyimage.com/1280x1024/000000/fff.png&text=Photo+8" class="w-100"
                                                                alt=""></div>
                            </div>
                            <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                            <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
