@extends('frontend.partials.app')
@push('faculty')
{{ $faculty->title }}
@endpush
@section('content')
<div class="banner-area">
    <div id="bootcarousel" class="carousel text-center content-less text-light top-pad-30 text-dark slide animate_text" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-zoom">
            @foreach ($sliders as $key => $slide)
            <div class="item {{ $key == 0 ? 'active': '' }} bg-cover" style="background-image: url('{{ getImage('sliders', $slide->image) }}');">
                <div class="box-table">
                    <div class="box-cell shadow dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="content">
                                        <h2 data-animation="animated fadeInLeft">{{ $slide->head }}</h2>
                                        @if ($slide->first_btn)
                                        <a data-animation="animated fadeInDown" class="btn btn-light border btn-md" href="{{ $slide->first_btn_link }}">{{ $slide->first_btn }}</a>
                                        @endif
                                        @if ($slide->second_btn)
                                        <a data-animation="animated fadeInUp" class="btn btn-light effect btn-md" href="{{ $slide->second_btn_link }}">{{ $slide->second_btn }}</a>
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
<div class="features-area bottom-less" style="margin-top: 15px;">
    <div class="container">
        <div class="row">
            <div class="features">
                <div data-aos="fade-left" class="equal-height col-md-3 col-sm-6" style="height: 320px;">
                    <div class="item mariner">
                        <a href="#">
                            <div style="height: 220px;" class="info">

                                <p>
                                    <img src="{{ getImage('teachers', $faculty->user->userDetails->image) }}" height="180" width="200" alt="{{ $faculty->title }}">
                                </p>
                                <p class="text-center" style="font-weight: bold; font-size: 14px;"> {{ $faculty->user->name }}</p>
                                <p class="text-center"><strong>Dean of Faculty</strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6" style="height: 320px;">
                    <div class="item brilliantrose">
                        <a href="{{ route('front.faculties.intro', $faculty->slug) }}">
                            <div style="height: 220px;" class="info">
                              
                                {{ $faculty->short }}
                                <strong class="text-info">Read More</strong>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="blog-area default-padding bottom-less">
    <div class="container">
       <div class="row">
          <div class="site-heading text-center">
             <div class="col-md-8 col-md-offset-2">
                <h2>Departments List</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="blog-items event-carousel owl-theme owl-carousel">
             <!-- Single Item -->
             <!-- End Single Item -->
            @foreach ($departments as $department)
            <div data-aos="zoom-in-up" class="equal-height aos-init aos-animate" style="height: 550px;">
                <div class="item">
                    <div class="thumb">
                        @if ($department->image)
                        <img src="{{ getImage('departments', $department->image) }}" style="height:250px;" alt="{{ $department->name }}">
                        @else
                        <img src="{{ getImage('faculties', $faculty->image) }}" style="height:250px;" alt="{{ $department->name }}">

                        @endif

                    </div>
                    <div class="info">
                        <div class="info-box" style="padding:35px 35px">

                            <div class="content" style="margin-left: 0px; padding: 0">
                                <h4 class="text-left " style="height: 50px; word-spacing: 5px">
                                    <a href="{{ route('front.departments.show', $department->slug) }}">{{ StrLimit($department->name, 70) }}</a>
                                </h4>
                                
                                <div class="bottom" style="margin-top: 20px">
                                    <div class="col-sm-12">
                                        <a href="{{ route('front.departments.show', $department->slug) }}" class="btn circle btn-dark border btn-sm text-center">
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
            <a href="{{ route('front.departments') }}" class="btn btn-theme effect btn-md">View All Departments</a>
        </div>
       </div>
    </div>
</div>

<div class="weekly-top-items carousel-shadow default-padding" id="researchNewsDiv">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="top-courses">
                    <div class="heading">
                        <h4>Faculty Reseach Highlight</h4>
                    </div>
                    <div class="top-course-items letest-news top-courses-carousel-modified owl-carousel owl-theme ">

                        @foreach ($researchs as $research)
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ getImage('researchs', $research->image) }}" alt="Thumb" class="card-img-height">
                            </div>
                            <div class="info">
                                <h4>
                                    <a href=""> {{ StrLimit($research->title, 80) }}</a>
                                </h4>
                                <p>
                                    {{ StrLimit($research->short, 100) }}</p>
                                <ul>
                                    <strong> </strong><li><strong>Published on: </strong>{{ date('d M Y', strtotime($research->created_at)) }}</li>
                                </ul>
                                <div class="footer-meta">
                                    <a class="btn btn-theme effect btn-block btn-sm" href="">Read More...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="margin-top: 15px;">
                    <a href="{{ route('front.researchs') }}" class="btn btn-theme effect btn-sm">View All Research News</a>
                </div>
            </div>
            <div class="col-md-4" id="noticeBoardDiv">
                <div class="top-author">
                    <h4>Notice Board</h4>
                    <div class="author-items">
                        <!-- Single Item -->
                        @foreach ($notices as $notice)
                        <div class="item">
                            <div class="text-justify">
                                <h5><a href="{{ route('front.notices.show', $notice->slug) }}">{{ $notice->title }}</a></h5>
                                <ul>
                                    <strong> </strong>
                                    <li><strong>Published on: </strong>{{ date('d M Y', strtotime($notice->created_at)) }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <!-- End Single Item -->
                        <a href="{{ route('front.notices') }}">View All <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
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
<div id="portfolio" class="portfolio-area default-padding">
    <div class="container">
        <div class="row">
            <div class="site-heading text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Photo Gallery</h2>
                </div>
            </div>
        </div>
        <div class="portfolio-items-area text-center">
            <div class="row">
                <div class="col-md-12 portfolio-content">
                    <!-- End Mixitup Nav-->
                    <div class="row magnific-mix-gallery masonary text-light">
                        <div id="portfolio-grid" class="portfolio-items col-3" style="position: relative; height: 283.656px;">
                            @foreach ($images as $image)
                            <div class="pf-item other" style="position: absolute; left: 0%; top: 0px;">
                                <div class="item-effect">
                                    <img src="{{ getImage('images', $image->image) }}" alt="thumb">
                                    <div class="overlay">
                                        <a href="{{ getImage('images', $image->image) }}" class="item popup-link"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
