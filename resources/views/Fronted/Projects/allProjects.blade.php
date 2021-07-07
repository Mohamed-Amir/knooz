@extends('Fronted.layouts.master')

@section('title')
    {{trans('knooz.our_projects')}}
@endsection
@section('content')
    <div class="singlePage ">

        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                <div class="container">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title"> {{trans('knooz.our_projects')}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">



            @foreach($Projects as $row)
                @if(getLang() == 'ar')
                <div class="col-md-3">
                    <div class="projects_pro">
                        <a href="{{route('Projects.singleProject',$row->id)}}">

                            <div class="pic"><img src="/images/Projects/{{$row->image}}" class="img-fluid"></div>
                            <div class="details">
                                <h4>{{$row->name_ar}} </h4>
                            </div>
                        </a>
                    </div>
                </div>
                    @else
                        <div class="col-md-3">
                            <div class="projects_pro">
                                <a href="{{route('Projects.singleProject',$row->id)}}">

                                    <div class="pic"><img src="/images/Projects/{{$row->image}}" class="img-fluid"></div>
                                    <div class="details">
                                        <h4>{{$row->name_en}} </h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>

        </div>
    </div>
@endsection

