<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="PSTU">

    <title>PSTU</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets1/img/pstulogo.png') }}" type="image/x-icon"/>

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->


    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800" rel="stylesheet">
    @stack('css')
    <style>
        .deptHeading{
            font-size: 2vw;
            font-weight: 600;
        }
    </style>

</head>
<body>
    @php
        $seg=request()->segment(1);
    @endphp

    @if($seg=='' || ($seg !='faculty' && $seg!='department'))
    @include('frontend.partials.main_header')

    @elseif($seg=='faculty')
    @include('frontend.partials.faculty_header')
    @elseif($seg=='department')
    @include('frontend.partials.department_header')
    @endif

    @yield('content')


     <!-- Start Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container logo">
            <div class="f-items footer-default-padding">
                <div class="row ">
                    <div class="row" style="margin-top:50px"></div>
                    <!-- Single item -->
                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 222px;">
                        <div class="f-item link aos-init aos-animate" data-aos="" data-aos-duration="3000" style="line-height:18px">
                            <h4>PSTU {{ $seg}}</h4>
                            <ul>
                                <li><a href="{{ route('front.page.show', 'welcome-message') }}"><i class="ti-angle-right"></i> Overview</a></li>
                                <li> <a href="{{ route('front.historic.outline') }}"><i class="ti-angle-right"></i> Historic Outline</a> </li>
                                    <li> <a href="{{ route('front.university.glance') }}"><i class="ti-angle-right"></i> At A Glance</a> </li>
                                    <li> <a href="{{ route('front.honoris.causa') }}"><i class="ti-angle-right"></i> Honoris Causa</a> </li>


                            </ul>
                        </div>
                    </div>
                    <!-- End Single item -->


                    <!-- End Single item -->

                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 222px;">
                        <div class="f-item link aos-init aos-animate" data-aos="" data-aos-duration="3000" style="line-height:18px">
                            <h4>&nbsp; LeaderShips</h4>
                            <ul>
                                @foreach (LeaderShips() as $item)
                                    <li>
                                        <a href="{{ route('front.vice.chencellors.message', $item->slug) }}" target="_blank">
                                            <i class="ti-angle-right"></i> {{ $item->designation }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Single item -->
            <!-- End Single item -->

            <!-- Single item -->
            <div class="col-md-4 col-sm-6">
                <div class="col-sm-12">
                    <img src="{{ getImage('settings', getSetting('logo')) }}" style="width:60px; height:60px;" class="logo" alt="Logo">
                    <div class="clearfix"></div>
                    <div class="footer-content urgent-need aos-init aos-animate" data-aos="" data-aos-duration="3000">
                        <p style="font-size:13px;">
                            <i class="fa fa-map-marker"></i>
                            {{ getSetting('address') }}<br>

                        </p>
                        <p>
                            <a class="telephone">
                                <b>Phone:</b> {{ getSetting('phone') }}</a>
                            <br>
                            <a class="telephone">
                                <b>Fax:</b> {{ getSetting('fax') }}</a>
                            <br>
                            <a href="mailto:{{ getSetting('email') }}">
                                <b>Email:</b> {{ getSetting('email') }}, {{ getSetting('alt_email') }}
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
        </div>
        <!-- End Single item -->
        </div>


        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        {!! getSetting('copyright') !!}
                    </div>
                    <!-- <div class="col-md-4 text-right link">
                        <ul>
                            <li>
                                <a href="#" target="_blank">Admin Login</a>
                            </li>
                            <li>
                                <a href="#">Student Login</a>
                            </li>
                            <li>
                                <a href="#" target="_blank">AIS Dashboard</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- End Footer Bottom -->

    </footer>    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/count-to.js') }}"></script>
    <script src="{{ asset('frontend/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/loopcounter.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script>
            $(document).on('submit','form#ajax_form', function(e) {
                e.preventDefault();
                $('p.textdanger').text('');
                $(document).find('p.failed').text('');
                var url=$(this).attr('action');
                var method=$(this).attr('method');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    async: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('.submit').attr('disabled', true);
                        $('.loading').show(100);
                    },
                    success: function(res) {
                        $('.submit').attr('disabled', false);
                        $('.loading').hide(100);
                        if(res.status==true){

                            Toast.fire({
                                icon: 'success',
                                title: res.msg
                            });
                            //  toastr.success(res.msg);
                            var message = res.msg;
                            $('.message').html(message);
                            $('#ajax_form')[0].reset();
                            if(res.url){
                                setTimeout(() => {
                                    document.location.href = res.url;
                                }, 2000);

                            }else{
                                window.location.reload();
                            }
                        }else if(res.status==false){
                            //  toastr.error(res.msg);
                            Toast.fire({
                                icon: 'error',
                                title: res.msg
                            });
                        }

                    },
                    error:function (response){
                        $.each(response.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                            //  toastr.error(error);
                            Toast.fire({
                                icon: 'error',
                                title: error
                            });
                            $('.loading').hide(100);
                            $('.submit').attr('disabled', false);
                        })
                    }
                });

            });
        </script>
    @stack('script')

</body>

</html>
