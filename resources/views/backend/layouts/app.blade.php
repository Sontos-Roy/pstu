@php
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Route;
    $currentUrl = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<title>Patuakhali Science & Technology University</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">

<link rel="stylesheet" href="{{ asset('backend/css/themes/all-themes.css') }}"/>
</head>

<body class="theme-green">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-blush">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Morphing Search  -->
<div id="morphsearch" class="morphsearch" style="display: none;">
    <form class="morphsearch-form" method="GET" action="{{ route('admin.users.index') }}">
        <div class="form-group m-0">
            <input value="" type="search" placeholder="Search..." class="form-control morphsearch-input" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    <div class="morphsearch-content">
        <div class="column">
            <h2>People</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar1.jpg') }}" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar2.jpg') }}" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar3.jpg') }}" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar4.jpg') }}" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar5.jpg') }}" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
        <div class="column">
            <h2>Popular</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar5.jpg') }}" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar4.jpg') }}" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar3.jpg') }}" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar2.jpg') }}" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar1.jpg') }}" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
        <div class="column">
            <h2>Recent</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar1.jpg') }}" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar2.jpg') }}" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar3.jpg') }}" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar4.jpg') }}" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="{{ asset('backend/images/sm/avatar5.jpg') }}" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
    </div>
    <!-- /morphsearch-content -->
    <span class="morphsearch-close"></span>
</div>

<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="{{ route('admin.home') }}">PSTU</a> </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->

            <!-- #END# Notifications -->
            <!-- Tasks -->

            <!-- #END# Tasks -->
            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<section>
    <!-- Left Sidebar -->
    @include('backend.layouts.partials.sidebar')
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li> --}}
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red"><div class="red"></div><span>Red</span> </li>
                    <li data-theme="purple"><div class="purple"></div><span>Purple</span> </li>
                    <li data-theme="blue"><div class="blue"></div><span>Blue</span> </li>
                    <li data-theme="cyan"><div class="cyan"></div><span>Cyan</span> </li>
                    <li data-theme="green"><div class="green"></div><span>Green</span> </li>
                    <li data-theme="deep-orange"><div class="deep-orange"></div><span>Deep Orange</span> </li>
                    <li data-theme="blue-grey"><div class="blue-grey"></div><span>Blue Grey</span> </li>
                    <li data-theme="black"><div class="black"></div><span>Black</span> </li>
                    <li data-theme="blush"  class="active"><div class="blush"></div><span>Blush</span> </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
<!--Side menu and right menu -->

<!-- main content -->
<section class="content home">
    @yield('content')
</section>
<!-- main content -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="color-bg"></div>
<style>
    .pagination{
        justify-content: center;
    }
    .page-item.active .page-link {
        z-index: 2;
        color: #fff;
        background-color: #c702d8;
        border-color: #c702d8;
    }
    .page-link {
        position: relative;
        display: block;
        padding: .75rem 1rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #d002bc;
        background-color: #fff;
        border: 1px solid #ddd;
        margin: 6px;
        border-radius: 50px;
    }
    .modal-backdrop{
        z-index: 8;
    }
    .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }
</style>
<!-- Jquery Core Js -->
<script src="{{ asset('backend/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('backend/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('backend/bundles/morphingsearchscripts.bundle.js') }}"></script> <!-- Main top morphing search -->

<script src="{{ asset('backend/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('backend/plugins/chartjs/Chart.bundle.min.js') }}"></script> <!-- Chart Plugins Js -->

<script src="{{ asset('backend/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('backend/js/pages/charts/sparkline.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/ui/modals.js') }}"></script>
<script src="{{ asset('backend/js/pages/index.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    @if(session('delete'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('delete') }}"
        })
    @endif

    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        })
    @endif

    @if(session('update'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('update') }}"
        })
    @endif
    @if (session('status'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('status') }}"
        })
    @endif

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
 $(document).ready(function() {
    $('.select2').select2();
});
$(document).ready(function () {
    $('.delete_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var link = $(this).attr('action');
            $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire('Deleted!', response.msg, 'success');
                        window.location.reload();
                        // Perform any additional actions on success
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseJSON.msg, 'error');
                        // Perform any additional error handling
                    }
                });

        }
        })
    })
});
$(document).ready(function() {
    $('.modal_btn').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        // Make AJAX request
        $.ajax({
        url: url,
        type: 'GET',
        data: {},
        success: function(data) {
            $('#editModal').html(data.html).modal('show');
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
        });
    });

    // Handle save changes button click event
    $('#saveChanges').click(function() {
        // Perform save changes logic here
        // ...

        // Close the modal
        $('#editModal').modal('hide');
    });
    });

    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            toolbar: {
                    plugins: [ 'Image' ],
                    toolbar: [ 'imageUpload', 'imageTextAlternative' ]
                },
                ckfinder: {
                    uploadUrl: "{{route('admin.ckeditor.upload').'?_token='.csrf_token()}}",
                }
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ),{
            toolbar: {
                    plugins: [ 'Image' ],
                    toolbar: [ 'imageUpload', 'imageTextAlternative' ]
                },
                ckfinder: {
                    uploadUrl: "{{route('admin.ckeditor.upload').'?_token='.csrf_token()}}",
                }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $(document).ready(function() {
        // Handle file input change event
        $('#image-input').change(function(e) {
            var file = e.target.files[0];

            // Check if file is an image
            if (file && file.type.includes('image')) {
            var reader = new FileReader();

            // Read the image file
            reader.onload = function() {
                var imageData = reader.result;

                // Display the image preview
                $('#image-preview').attr('src', imageData);
            };

            reader.readAsDataURL(file);
            } else {
            // File is not an image
            $('#image-preview').removeAttr('src');
            }
        });
        });


</script>

@stack('script')

</body>

</html>

