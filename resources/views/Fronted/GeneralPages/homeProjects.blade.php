@php
    $project=\App\Models\Projects::where('status',1)->get();
@endphp

<div class="home_projects_mask"></div>
<div class="home_projects">
    <div class="container">

        <div class="sec_title">
            <h3>{{trans('knooz.latest_p')}}</h3>
            <div class="view_All"> <a href="{{route('Projects.allProjects')}}"> {{trans('knooz.showAll')}} </a></div>

        </div>
        <div class="row">
            @foreach($project as $row)
                @if(getLang() == 'ar')
            <div class="col-md-6">
                <div class="home_pro">
                    <div class="pic"><img style="width: 282px;height: 390px" src="/images/Projects/{{$row->image}}"></div>
                    <div class="details">
                        <h4>{{$row->name_ar}}</h4>
                        <li><span><i class="fas fa-layer-group"></i></span> {{$row->catRelation->cat_ar}}</li>
                        <li><span><i class="far fa-calendar-alt"></i></span>{{$row->finishing_date}}</li>
                        <li><span><i class="fas fa-history"></i></span>{{$row->duration}}</li>
                        <li><span><i class="fas fa-map-marker-alt"></i></span>{{$row->location}}</li>

                        <button class="btn btn_primary" type="submit" value="Subscribe"> <a href="{{route('Projects.singleProject',$row->id)}}">{{trans('knooz.more')}} </a></button>
                    </div>
                </div>
            </div>
                @else
                    <div class="col-md-6">
                        <div class="home_pro">
                            <div class="pic"><img style="width: 282px;height: 390px" src="/images/Projects/{{$row->image}}"></div>
                            <div class="details">
                                <h4>{{$row->name_en}}</h4>
                                <li><span><i class="fas fa-layer-group"></i></span> {{$row->catRelation->cat_en}}</li>
                                <li><span><i class="far fa-calendar-alt"></i></span>{{$row->finishing_date}}</li>
                                <li><span><i class="fas fa-history"></i></span>{{$row->duration}}</li>
                                <li><span><i class="fas fa-map-marker-alt"></i></span>{{$row->location}}</li>

                                <button class="btn btn_primary" type="submit" value="Subscribe"> <a href={{route('Projects.singleProject',$row->id)}}>{{trans('knooz.more')}} </a></button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>