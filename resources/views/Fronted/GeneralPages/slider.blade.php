@php
$slider = \App\Models\Sliders::get();
@endphp

<div class="slider">

    <ul id="demo1">
       @foreach($slider as $row)
        <li><div class="slidelink">
                <a href="#"> <div class="overslide"></div><img src="/images/Sliders/{{$row->image}}" />
                    <div class="slide-desc">
                        <h2>{{trans('knooz.knoozCarpentry')}}</h2>
                        <p>{{trans('knooz.wood')}} </p>
                    </div></a> </div></li>
        @endforeach

    </ul>
</div>

<div class="slider_mask "></div>