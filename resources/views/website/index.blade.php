@extends('website.layouts.master')
@section('content')
    <div id="hero" class="area-padding">
        <div class="container">
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @if($sliders->count())
                                @foreach($sliders as $slider)
                                    <div class="swiper-slide">
                                        <a href="{{$slider->link}}">
                                            <img src="{{Storage::url($slider->image)}}">
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="offer" class="area-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-left">
                        <h2>Special Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper mySwiper_1 mt-5">
                        <div class="swiper-wrapper">
                            @if($offers->count())
                                @foreach($offers as $offer)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{Storage::url($offer->image)}}">
                                            </div>
                                            <div class="card-footer">
                                                <h5>{{$offer->name??'-'}}</h5>
                                                <p>{{$offer->price??0}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="brands" class="area-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-left">
                        <h2>Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper mySwiper_1 mt-5">
                        <div class="swiper-wrapper">
                            @if($brands->count())
                                @foreach($brands as $brand)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{Storage::url($brand->image)}}">
                                            </div>
                                            <div class="card-footer">
                                                <h5>{{$brand->name??'-'}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="most_view" class="area-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-left">
                        <h2>The most viewed products</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper mySwiper_3 mt-5">
                        <div class="swiper-wrapper">
                            @if($most_views->count())
                                @foreach($most_views as $most_view)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{Storage::url($most_view->image)}}">
                                            </div>
                                            <div class="card-footer">
                                                <h5>{{$most_view->name??'-'}}</h5>
                                                <p>{{$most_view->price??0}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="new_arrived" class="area-padding mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-left">
                        <h2>Products that just arrived</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper mySwiper_4 mt-5">
                        <div class="swiper-wrapper">
                            @if($new_arrivals->count())
                                @foreach($new_arrivals as $new_arrival)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{Storage::url($new_arrival->image)}}">
                                            </div>
                                            <div class="card-footer">
                                                <h5>{{$new_arrival->name??'-'}}</h5>
                                                <p>{{$new_arrival->price??0}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
