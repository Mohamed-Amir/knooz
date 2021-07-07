@php
$cat = \App\Models\Categories::get();
@endphp
<div class="home_category">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-12">
                <div class="row">
                    @foreach($cat as $row)
                    @if(getLang() == 'ar')
                    <div class="col-md-3"> <div class="home_categ">
                            <a href="{{route('product.products',$row->id)}}">
                                <div class="pic"><img src="/images/Categories/{{$row->image}}" class="img-fluid">
                                    <div class="home_categ_title"><h3>{{$row->cat_ar}}</h3></div>
                                </div>
                            </a>
                        </div></div>
                    @else
                        <div class="col-md-3"> <div class="home_categ">
                                <a href="{{route('product.products',$row->id)}}">
                                    <div class="pic"><img src="/images/Categories/{{$row->image}}" class="img-fluid">
                                        <div class="home_categ_title"><h3>{{$row->cat_en}}</h3></div>
                                    </div>
                                </a>
                            </div></div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>