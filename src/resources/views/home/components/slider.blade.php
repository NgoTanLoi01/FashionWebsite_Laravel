@php
$baseURL = config('app.base_url');   
@endphp

<div class="col-lg-8">
    <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
        <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl"
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "responsive": {
                    "768": {
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            @foreach ($sliders as $slider)
                <div class="intro-slide">

                    <figure class="slide-image">
                        <picture>
                            <source media="(max-width: 480px)"
                                srcset="UserLTE/assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                            <img src="{{ $baseURL . $slider->image_path}}" alt="Image Desc">
                        </picture>
                    </figure><!-- End .slide-image -->

                    <div class="intro-content">
                        <h3 class="intro-subtitle text-primary">Khuyến mãi hàng ngày</h3><!-- End .h3 intro-subtitle -->
                        <h4>
                            {{ $slider->name }}
                        </h4><!-- End .intro-title -->

                        <div class="intro-price">
                            <p> 
                                {!! $slider->description !!}
                            </p>
                        </div><!-- End .intro-price -->
                    </div><!-- End .intro-content -->

                </div><!-- End .intro-slide -->
            @endforeach
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->
</div><!-- End .col-lg-8 -->
