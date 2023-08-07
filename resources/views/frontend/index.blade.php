@extends('frontend.partials.app')

@section('content')
 <!-- Start Banner
    ============================================= -->
    <div class="banner-area">
        <div id="bootcarousel" class="carousel text-center content-less text-light top-pad-30 text-dark slide animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
                @foreach ($sliders as $key => $item)
                <div class="item {{ $key == 0 ? 'active': '' }} bg-cover" style="background-image: url('{{ getImage('sliders', $item->image) }}');">
                    <div class="box-table">
                        <div class="box-cell shadow dark">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInLeft">{{ $item->head }}</h2>
                                            @if ($item->first_btn)
                                            <a data-animation="animated fadeInDown" class="btn btn-light border btn-md" href="{{ $item->first_btn_link }}">{{ $item->first_btn }}</a>
                                            @endif
                                            @if ($item->second_btn)
                                            <a data-animation="animated fadeInUp" class="btn btn-light effect btn-md" href="{{ $item->second_btn_link }}">{{ $item->second_btn }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row" style="margin-top:50px"></div>
    <!-- End Banner -->
    <div class="features-area">
        <div class="container">
            <div class="row">
                <div class="features">
                    <div data-aos="fade-left" class="equal-height col-md-3 col-sm-6 aos-init aos-animate" style="height: 300px;">
                        <div class="item mariner">
                            <a href="{{ route('front.vice.chencellors.message', $vc->slug) }}">
                                <div style="height: 200px;" class="info">
                                    <p>
                                        <img src="{{ getImage('teachers', $vc->user ? $vc->user->userDetails->image : '') }}" height="180" width="200" alt=" Vice Chancellor" srcset="">

                                    </p>
                                    <p style="font-weight: bold; font-size: 12px; text-align: center;">
                                        {{ $vc->name }}</p>
                                    <h5 class="text-center"><strong>{{ $vc->designation }}</strong></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6 aos-init aos-animate" style="height: 300px;">
                        <div class="item brilliantrose">
                            <a href="{{ route('front.vice.chencellors.message', $vc->slug) }}" >
                                <div style="height: 200px; overflow: hidden;" class="info">
                                    <h4>Message from the {{ $vc->designation }}</h4>
                                    <p class="text-justify">
                                        {{ $vc->message_short }}

                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="features-area  bottom-less">
        <div class="container">
            <div class="row">
                <div class="features">
                    @foreach ($leaderships as $item)
                    <div style="text-align: center; height: 320px;" data-aos="fade-left" class="equal-height col-md-4 col-sm-6 aos-init aos-animate">
                        <div class="item mariner">
                            <a href="{{ route('front.vice.chencellors.message', $item->slug) }}">
                                <div style="height: 220px;" class="info">
                                    <p>
                                        <img src="{{ getImage('teachers', $vc->user ? $vc->user->userDetails->image : '') }}" height="180" width="200" alt="{{ $item->designation }}" srcset="">

                                    </p>
                                    <p style="font-weight: bold; font-size: 14px;">
                                        {{ $item->name }}
                                    </p>
                                    <h5 style="font-weight: bold;">{{ $item->designation }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- End Features -->
    <div class="row" style="margin-top:50px"></div>

    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="about-items">
                    <div data-aos="fade-down-right" class="col-md-6 about-info aos-init aos-animate">
                        <h3 class="text-justify">
                            Welcome to the Patuakhali Science & Technology University
                        </h3>

                        <p class="text-justify">
                            {{ $page->short }}
                        </p>
                        <a class="btn btn-theme effect btn-block btn-lg btnhome" href="{{ route('front.page.show', $page->slug) }}">Read
                            More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                    </div>

                    <div data-aos="fade-up-left" class="col-md-6 thumb aos-init aos-animate">
                        <div class="thumb">
                            <img src="{{ getImage('pages', $page->image) }}" alt="Thumb">
                            <a href="{{ $page->video_link }}" class="popup-youtube light video-play-button">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-courses-area weekly-top-items bottom-less default-padding">
        <div class="container">

            <div class="row">
                <div class="top-course-items flex-item">
                    <!-- Single Item -->
                    @foreach ($blocks as $block)
                    <div class="col-md-6 col-sm-6 equal-height">
                        <div class="row">
                            <div class="item">
                                <div class="thumb col-md-5" style="background-image: url('{{ getImage('home_blocks',$block->image)}}');">
                                    <div class="overlay">

                                    </div>
                                </div>
                                <div class="info col-md-7">
                                    <h4>
                                        <a href="{{ route('front.block.show', $block->slug) }}">{{ $block->name }}</a>
                                    </h4>
                                    <ul>
                                        @foreach ($block->details as $details)
                                        <li> <a href="{{ route('front.block.details.show', $details->slug) }}">{{ $details->name }}</a> </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="blog-area default-padding bottom-less">
        <div class="container">
           <div class="row">
              <div class="site-heading text-center">
                 <div class="col-md-8 col-md-offset-2">
                    <h2>Latest News</h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="blog-items courses-carousel owl-theme owl-carousel">
                 <!-- Single Item -->
                 <!-- End Single Item -->
                 @foreach ($newses as $news)
                 <div data-aos="zoom-in" data-aos-delay="200" class="single-item aos-init">
                    <div class="item">
                       <div class="thumb">
                          <a href="{{route('front.news.show', $news->slug)}}">
                          <img src="{{ getImage('news', $news->image) }}" style="height: 240px;width: 100%;" alt="{{ $news->heading }}">
                          </a>
                       </div>
                       <div class="info">
                          <div class="meta">
                             <ul>
                                <li style="text-transform: capitalize!important;">
                                   <i class="fas fa-calendar-alt"></i>
                                   {{ $news->created_at->diffForHumans()  }}
                                </li>
                             </ul>
                          </div>
                          <div class="content">
                             <h4 class="text-left" style="height: 80px; word-spacing: 5px">
                                <a href="{{route('front.news.show', $news->slug)}}" title="{{ $news->heading }}">{{ StrLimit($news->heading, 50) }}</a>
                             </h4>
                             <a href="{{route('front.news.show', $news->slug)}}"><i class="fas fa-plus"></i> Read More</a>
                          </div>
                       </div>
                    </div>
                 </div>
                 @endforeach

              </div>
              <div class="more-btn col-md-12 text-center">
                 <a href="{{ route('front.news') }}" class="btn btn-theme effect btn-md"> View All News </a>
              </div>
           </div>
        </div>
    </div>


    <style>
        .top-course-items .item .info{
            min-height: 200px;
        }
    </style>
    <div class="blog-area default-padding bottom-less">
        <div class="container">
           <div class="row">
              <div class="site-heading text-center">
                 <div class="col-md-8 col-md-offset-2">
                    <h2>Recent and Upcoming Events</h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="blog-items event-carousel owl-theme owl-carousel">
                 <!-- Single Item -->
                 <!-- End Single Item -->
                @foreach ($events as $event)
                <div data-aos="zoom-in-up" class="equal-height aos-init aos-animate" style="height: 550px;">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ getImage('events', $event->image) }}" style="height:250px;" alt="{{ $event->heading }}">
                        </div>
                        <div class="info">
                            <div class="info-box" style="padding:35px 35px">
                                <div class="date">
                                    <strong style="font-size: 30px">{{ date('d', strtotime($event->date)) }}</strong>
                                    {{ date('M, Y', strtotime($event->date)) }}
                                </div>
                                <br>
                                <div class="content" style="margin-left: 0px; padding: 0">
                                    <h4 class="text-left " style="height: 50px; word-spacing: 5px">
                                        <a href="{{ route('front.events.show', $event->slug)}}">{{ StrLimit($event->heading, 70) }}</a>
                                    </h4>
                                    <!--<p style="height: 100px">-->
                                    <!--    {{ StrLimit($event->short, 150) }}-->
                                    <!--</p>-->
                                    <br>
                                    <div class="bottom" style="margin-top: 20px">
                                        <div class="col-sm-12">
                                            <a href="{{ route('front.events.show', $event->slug)}}" class="btn circle btn-dark border btn-sm text-center">
                                                <i style="color: #1C4370" class="fas fa-plus"></i> Read More
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
              <br>
              <div class="more-btn col-md-12 text-center">
                <a href="{{ route('front.events') }}" class="btn btn-theme effect btn-md">View All Events</a>
            </div>
           </div>
        </div>
     </div>
    <div class="popular-courses-area weekly-top-items bg-gray default-padding bottom-less"  style="display: none;">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                    <h2> Research Activities</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-course-items courses-carousel owl-carousel owl-theme">
                    <div data-aos="fade-up" class="aos-init aos-animate">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/1663914862_Volume 11 Issue 1 Cover Page.jpg') }}" style="height: 220px" alt="Thumb">
                                <div class="overlay">
                                    <a href="#">
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                        </li>
                                        <li>
                                        <a href="#">08 Nov, 2021</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                    <a href="">Genetic diversity with respect to salt tolerance identified by genome wide study of 176 Bangladeshi traditional rice accessions and published in prestigious journal, PLoS One</a>
                                </h4>
                                <div class="footer-meta text-center">
                                    <a href="" class="btn circle btn-dark border btn-sm text-center">
                                    <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="aos-init aos-animate">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/presentation-for-jets-south-korea-biswas-dibyendu-pstu-171030022347-thumbnail.jpg') }}" style="height: 220px" alt="Thumb">
                                <div class="overlay">
                                    <a href="#">
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                        </li>
                                        <li>
                                        <a href="#">08 Nov, 2021</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                    <a href="">Genetic diversity with respect to salt tolerance identified by genome wide study of 176 Bangladeshi traditional rice accessions and published in prestigious journal, PLoS One</a>
                                </h4>
                                <div class="footer-meta text-center">
                                    <a href="" class="btn circle btn-dark border btn-sm text-center">
                                    <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="aos-init aos-animate">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/Types-of-Research-Methodology.jpg') }}" style="height: 220px" alt="Thumb">
                                <div class="overlay">
                                    <a href="#">
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                        </li>
                                        <li>
                                        <a href="#">08 Nov, 2021</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                    <a href="">Genetic diversity with respect to salt tolerance identified by genome wide study of 176 Bangladeshi traditional rice accessions and published in prestigious journal, PLoS One</a>
                                </h4>
                                <div class="footer-meta text-center">
                                    <a href="" class="btn circle btn-dark border btn-sm text-center">
                                    <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="aos-init aos-animate">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/What-is-Research-Purpose-of-Research-phul4s3cbwe0xam190dnc4kz3z616ajmfkygodcdqg.png') }}" style="height: 220px" alt="Thumb">
                                <div class="overlay">
                                    <a href="#">
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                        </li>
                                        <li>
                                        <a href="#">08 Nov, 2021</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px">
                                    <a href="">Genetic diversity with respect to salt tolerance identified by genome wide study of 176 Bangladeshi traditional rice accessions and published in prestigious journal, PLoS One</a>
                                </h4>
                                <div class="footer-meta text-center">
                                    <a href="" class="btn circle btn-dark border btn-sm text-center">
                                    <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 20px; margin-top: 20px;">
                    <a href="#" class="btn btn-theme effect btn-md">View All Research Activities</a>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-courses-area weekly-top-items bg-gray default-padding bg-cover bottom-less" style="background-image: url({{ asset('frontend/img/shape-bg.png') }});">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                    <h2>Notices</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-course-items courses-carousel owl-carousel owl-theme">
                    @foreach ($notices as $notice)
                    <div data-aos="fade-up" class="aos-init aos-animate">
                        <div class="item">

                            <div class="info">
                                <h4 class="text-left min-height-130px" style="word-spacing: 5px; font-size: 17px;">
                                    <a href="{{ route('front.notices.show', $notice->slug) }}">{{ $notice->title }}</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li>
                                        <a href="#">{{ date('d M Y', strtotime($notice->created_at)) }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-meta text-center">
                                    <a href="{{ route('front.notices.show', $notice->slug) }}" class="btn circle btn-dark border btn-sm text-center">
                                    <i class="fas fa-plus"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="more-btn col-md-12 text-center" style="padding-top: 20px; margin-top: 20px;">
                    <a href="{{ route('front.notices') }}" class="btn btn-theme effect btn-md">View All Notices</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:50px"></div>
    <!-- Start Popular Courses
    ============================================= -->

    <!-- End Popular Courses -->

    <!-- Start Testimonials
    ============================================= -->

    <!-- End Testimonials -->




@endsection

