@extends('Fronted.layouts.master')

@section('title')
    {{trans('main.our_products')}}
@endsection
@section('content')

<div class="singlePage products">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">{{trans('main.our_products')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row d-flex justify-content-center g-1">
            @foreach($Products as $row)
                @if(getLang() == 'ar')
                    <div class="col-md-3">
                        <div class="product text-center"> <img src="/images/Products/{{$row->image}}" width="250">
                            <div class="about text-left px-3">
                                <h4>{{$row->name_ar}}</h4>
                                <h3>{{$row->price}}</h3>
                            </div> <span class="dot"><a  href="{{route('Projects.singleProduct',$row->id)}}"><span class="inner-dot"><i class="fa fa-plus"></i></span></a> </span>
                        </div>
                    </div>
                @else
                    <div class="col-md-3">
                        <div class="product text-center"> <img src="/images/Products/{{$row->image}}" width="250">
                            <div class="about text-left px-3">
                                <h4>{{$row->name_en}}</h4>
                                <h3>{{$row->price}}</h3>
                            </div> <span class="dot"><a  href="{{route('Projects.singleProduct',$row->id)}}"><span class="inner-dot"><i class="fa fa-plus"></i></span></a> </span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
