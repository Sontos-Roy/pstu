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
                                <h4>Introduction to the faculty</h4>
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
                <h2>Departments of this Faculty</h2>
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
                                <p style="height: 100px">
                                    {{ StrLimit($department->short, 150) }}
                                </p>
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

<div class="blog-area bottom-less">
    <div class="weekly-top-items carousel-shadow default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="top-author">
                        <h4 style="background: #3d5169; color: white">Notice</h4>
                        <div class="author-items">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="text-justify">
                                    <h5><a href="https://www.du.ac.bd/web_faculty_post_details/64/17792">test 2</a></h5>
                                    <ul>
                                        <strong> </strong>
                                        <li><strong>Published on: </strong>February 5, 2023</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <a href="https://www.du.ac.bd/all_post_faculty/64/Notice">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="top-courses">
                        <div class="heading">
                            <h4>Faculty Research Highlights</h4>
                        </div>
                        <div class="top-course-items top-courses-carousel-modified owl-carousel owl-theme owl-loaded owl-drag">
                            <!-- Single Item -->
                            <!-- End Item -->
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 388px;">
                                    <div class="owl-item active" style="width: 357.5px; margin-right: 30px;">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="https://www.du.ac.bd/fontView/assets/img/default_logo.png" class="thumb">
                                            </div>
                                            <div class="info">
                                                <h4 class="min-height-45px text-justify">
                                                    <a href="#">Research Interest</a>
                                                </h4>
                                                <div class="min-height-130px text-justify">
                                                </div>
                                                <ul>
                                                    <strong> </strong>
                                                    <li><strong>Published on: </strong>January 18, 2023</li>
                                                </ul>
                                                <div class="footer-meta">
                                                    <a class="btn btn-theme effect btn-block btn-sm" href="#">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <div class="owl-prev disabled"><i class="fa fa-angle-left"></i></div>
                                <div class="owl-next disabled"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
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
                            <div class="pf-item other" style="position: absolute; left: 0%; top: 0px;">
                                <div class="item-effect">
                                    <img src="https://ssl.du.ac.bd/fontView/assets/gallary/faculty/FACSCI-1671691022.jpg" alt="thumb">
                                    <div class="overlay">
                                        <h4>Curzon Hall</h4>
                                        <a href="https://ssl.du.ac.bd/fontView/assets/gallary/faculty/FACSCI-1671691022.jpg" class="item popup-link"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-item other" style="position: absolute; left: 33.2489%; top: 0px;">
                                <div class="item-effect">
                                    <img src="https://ssl.du.ac.bd/fontView/assets/gallary/faculty/FACSCI-1671691089.jpg" alt="thumb">
                                    <div class="overlay">
                                        <h4>Curzon Exam Hall</h4>
                                        <a href="https://ssl.du.ac.bd/fontView/assets/gallary/faculty/FACSCI-1671691089.jpg" class="item popup-link"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
