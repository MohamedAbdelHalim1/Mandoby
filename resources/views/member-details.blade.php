<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>members-details</title>
    <link rel="website icon" type="png" href="{{asset('assets/images/logoo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://kit.fontawesome.com/cbcafb1e3c.js" crossorigin="anonymous"></script>

    <style>
        .delete-button {
            background-color: transparent;
            border: none;
            transition: background-color 0.3s ease;
        }

        .delete-button:hover {
            background-color: #dc3545; /* Bootstrap danger color */
        }

        
    </style>
</head>

<body>

    <header class="rtl">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <nav class="navbar nav-mob" style="background-color: #3736AF;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{route('dashboard.index')}}">
                            <img src="{{asset('assets/images/logo-white.png')}}" style="width: 140px;">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title fw-bolder" id="offcanvasNavbarLabel">مندوبي</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <!-- Define the menu -->
                                <nav class="menu">
                                    <ul>
                                        <li class="mb-4">
                                            <a href="{{route('nationalities.index')}}" class="main-nav">
                                                <i class="fa-regular fa-flag ms-3 fw-semibold"></i>جنسيات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a class="button-ser-small" id="menubutton-ser-small">
                                                <i class="fa-solid fa-bars ms-3 fw-semibold"></i>خدمات
                                                <i class="fa-solid fa-caret-down me-3"></i>
                                            </a>
                                            <nav id="menu-ser-small" class="menu-ser-small mt-3">
                                                <ul class="me-3">
                                                    <li class="mb-2">
                                                        <a href="{{route('basic.service.index')}}">
                                                            <i class="fa-solid fa-square ms-2"></i>خدمات رئيسية
                                                        </a>
                                                    </li>
                                                    <li class="mb-4">
                                                        <a href="{{route('sub.service.index')}}">
                                                            <i class="fa-solid fa-square ms-2"></i>خدمات فرعية
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('university.index')}}" class="main-nav">
                                                <i class="fa-solid fa-building-columns ms-3 fw-semibold"></i>جامعات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('faculty.index')}}" class="main-nav">
                                                <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('major.index')}}" class="main-nav">
                                                <i class="fa-solid fa-angles-down  ms-3 fw-semibold"></i>تخصصات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('order.index')}}" class="main-nav">
                                                <i class="fa-solid fa-list-check ms-3 fw-semibold"></i>طلبات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('member.index')}}" class="main-nav"
                                                style="  color: #3736AF; font-weight: bolder;">
                                                <i class="fa-solid fa-user-group ms-3 fw-semibold"></i>اعضاء
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('user.index')}}" class="main-nav">
                                                <i class="fa-solid fa-user-check ms-3 fw-semibold"></i>المستخدمين
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('news.index')}}" class="main-nav">
                                                <i class="fa-solid fa-envelope-open-text ms-3 fw-semibold"></i>اخبار
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="col-xl-2 col-lg-3 col-md-3 p-3 nav-pc" style="background-color: #3736AF;">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('dashboard.index')}}">
                            <img src="{{asset('assets/images/logo-white.png')}}" style="width: 140px;">
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-9" style="background-color: #22219A;">
                    <div class="d-flex justify-content-end ms-xl-5 ms-lg-5 ms-md-5 top-side">
                        <div class="d-flex justify-content-end mt-3">
                            <div class="square ms-2">
                                <i class="fa-regular fa-user icon"></i>
                            </div>
                            <div class="square ms-2">
                                <i class="fa-regular fa-bell icon"></i>
                            </div>
                            <div class="square ms-5">
                                <i class="fa-solid fa-gear icon"></i>
                            </div>
                        </div>
                        <div class="text-white ms-2 mt-3">
                            <h3>{{Auth::user()->name}}
                                <br>
                                <span class="fw-lighter">
                                    {{Auth::user()->email}}
                                </span>
                            </h3>
                        </div>
                        <div class="circle mt-2 dropdown">
                            @if(Auth::user()->photo)
                                <img src="{{Auth::user()->photo}}" alt="Example Image" class="circle-image" id="dropdownImage">
                                <div class="dropdown-content rounded-2" id="dropdownContent">
                                <a href="{{route('dashboard.user')}}">الصفحه الشخصية</a>
                                <a href="{{route('dashboard.logout')}}"> خروج</a>
                                </div>
                            @else
                                <img src="assets/images/IMG_default.png" alt="Example Image" class="circle-image" id="dropdownImage">
                                <div class="dropdown-content rounded-2" id="dropdownContent">
                                <a href="{{route('dashboard.user')}}">الصفحه الشخصية</a>
                                <a href="{{route('dashboard.logout')}}"> خروج</a>
                                </div>
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="rtl">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-xl-2 col-lg-3 col-md-3 nav-pc" style="background-color: white;">
                    <small class="fw-semibold" style="color: #22219A; font-size: 12px;">القائمة الرئيسية</small>
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <button class="btn button-slidebar w-75">
                            <i class="fa-regular fa-compass ms-2"></i> لوحة التحكم
                            <i class="fa-solid fa-caret-down me-3"></i>
                        </button>
                    </div>
                    <div class="me-4">
                        <!-- Define the menu -->
                        <nav class="menu">
                            <ul>
                                <li class="mb-4">
                                    <a href="{{route('nationalities.index')}}" class="main-nav">
                                        <i class="fa-regular fa-flag ms-3 fw-semibold"></i>جنسيات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a class="button-ser" id="menuButton-ser">
                                        <i class="fa-solid fa-bars ms-3 fw-semibold"></i>خدمات
                                        <i class="fa-solid fa-caret-down me-3"></i>
                                    </a>
                                    <nav id="menu-ser" class="menu-ser mt-3">
                                        <ul class="me-3">
                                            <li class="mb-2">
                                                <a href="{{route('basic.service.index')}}">
                                                    <i class="fa-solid fa-square ms-2"></i>خدمات رئيسية
                                                </a>
                                            </li>
                                            <li class="mb-4">
                                                <a href="{{route('sub.service.index')}}">
                                                    <i class="fa-solid fa-square ms-2"></i>خدمات فرعية
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('nationalities.index')}}" class="main-nav">
                                        <i class="fa-solid fa-building-columns ms-3 fw-semibold"></i>جامعات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('faculty.index')}}" class="main-nav">
                                        <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('major.index')}}" class="main-nav">
                                        <i class="fa-solid fa-angles-down  ms-3 fw-semibold"></i>تخصصات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('order.index')}}" class="main-nav">
                                        <i class="fa-solid fa-list-check ms-3 fw-semibold"></i>طلبات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('member.index')}}" class="main-nav"
                                        style="  color: #3736AF; font-weight: bolder;">
                                        <i class="fa-solid fa-user-group ms-3 fw-semibold"></i>اعضاء
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('user.index')}}" class="main-nav">
                                        <i class="fa-solid fa-user-check ms-3 fw-semibold"></i>المستخدمين
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('news.index')}}" class="main-nav">
                                        <i class="fa-solid fa-envelope-open-text ms-3 fw-semibold"></i>اخبار
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
                <div class="col-xl-10 col-lg-9 col-md-3 mb-5">
                    <div class="row">
                        <div class="col-12 p-3" style="background-color: white;">
                            <h2 class="fw-light fs-4">الاعضاء</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            <i class="fa-solid fa-house ms-1 pb-1"
                                                style="font-size: 13px; color: gray;"></i>الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            الاعضاء
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">  {{$member->name}}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="container mt-4 me-4">
                        <div class="row justify-content-start">
                            <div class="col-xl-2 col-lg-2 rounded-circle text-center">
                                <img src="{{asset('assets/images/IMG_default.png')}}" style="width: 150px; height: 150px;">
                                <h2 class="mt-2" style="font-size: 15px;">{{$member->name}}</h2>
                                <h2 class="mt-2" style="font-size: 15px;"> {{$member->nationality->name}}</h2>
                                <span class="text-center">
                                    {{$member->phone}}
                                </span>
                            </div>
                            <div class="col-xl-10 col-lg-10 my-auto mx-auto">
                                <h6 class="fw-bolder fs-4" style="color: #22219A;">دليل طلباتك
                                </h6>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-4">
                        @foreach($member_orders as $order)

                            <div class="col-xl-3 col-lg-3 col-md-4 mb-3 ms-3 p-3 bg-white rounded-2 position-relative">
                                <div class="mt-2 ms-2">
                                    <!-- Button trigger modal -->
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn button-modal2" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $order->id }}">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    <form id="memberPhotoForm{{ $order->id }}" action="{{ route('member.photo.store' , ['order_id' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $order->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $order->id }}"
                                            aria-hidden="true">
                                            <div class=" modal-dialog modal-dialog-centered">
                                                <div class="modal-content p-3">
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row justify-content-center">
                                                                <div class="form col-xl-12 col-lg-12">
                                                                    <!-- Dropzone area -->
                                                                    <div>
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label text-dark fw-semibold">ارفاق
                                                                            صور
                                                                            للطلب</label>
                                                                    </div>
                                                                    <!-- Input for selecting images -->
                                                                    <input type="file" id="fileInput{{ $order->id }}" accept="image/*"
                                                                        style="display: none;" name="photos[]" multiple required>
                                                                    <div class="dropzone" id="previewContainer{{ $order->id }}"
                                                                    onclick="document.getElementById('fileInput{{ $order->id }}').click();">
                                                                        <div class="mt-3">
                                                                            <span><i class="fa-solid fa-cloud-arrow-up"
                                                                                    style="color: rgba(2, 58, 170, 0.8);"></i></span>
                                                                            <br>
                                                                            <span
                                                                                class="my-auto mx-auto text-dark fw-bold">قم
                                                                                بإسقاط الصورة هنا أو انقر للتحميل .</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn text-white"
                                                            style="background-color: #066569;">اضافة</button>
                                                        <button type="button" class="btn text-white"
                                                            style="background-color: #7A1C1C;"
                                                            data-bs-dismiss="modal">الغاء</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <small class="text-decoration-underline" style="font-size: 12px;">
                                    تفاصيل الطلب
                                </small>
                                <ul style="list-style: none;" class="mt-3">
                                    <li class="fw-normal mb-3 text-end" style="color: black; font-size: 15px;">
                                        الخدمة : <span class="fw-semibold" style="color: #22219A;"> {{$order->name}}</span>
                                    </li>
                                    <li class="fw-normal mb-3 text-end" style="color: black; font-size: 15px;">
                                        حالة الطلب : 
                                        @if($order->apply_order == 1 && $order->receiving_all_papers == 1 && $order->paid_link == 1 && $order->apply_at_university == 1 && $order->order_accepted == 1)
                                            <span class="fw-semibold" style="color: #22219A;">تم قبول الطلب</span>
                                        @else
                                            <span class="fw-semibold" style="color: #22219A;">طلب غير مقبول</span>
                                        @endif
                                    </li>
                                    <li class="fw-normal text-end mb-2" style="color: black; font-size: 15px;">
                                        الصور المرفقة مع الطلب :
                                    </li>
                                    <div class="row justify-content-center" style="padding-bottom: 50px;">
                                        <div class="col-12">
                                        <div class="row justify-content-center">
                                            @foreach($order->images as $image)
                                            <div class="col-4 mt-3">
                                                <div class="position-relative border border-1">
                                                    <a href="{{$image->photo}}" target="_blank">
                                                        <img src="{{$image->photo}}" style="width: 100%;">
                                                    </a>
                                                    <form action="{{ route('deletePhoto', ['id' => $image->id]) }}" method="POST" onsubmit="return confirm('هل واثق من مسح هذه الصوره؟');" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border: none; background: none; padding: 0; position: absolute; top: 0; left: 0;">
                                                            <div class="position-absolute top-0 start-0 translate-middle rounded-circle" style="width: 20px; height: 20px; background-color: rgba(122, 28, 28, .8); cursor: pointer;">
                                                                <i class="fa-solid fa-times text-white d-flex justify-content-center text-center mt-1" style="font-size: 12px;"></i>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                
                                        </div>
                                    </div>



                                    
                                </ul>
                                <div class="d-flex justify-content-end position-absolute bottom-0 start-0">                                 
                                    <div>
                                    <form action="{{ route('deleteOrder', ['order_id' => $order->id]) }}" method="POST" onsubmit="return confirm('هل واثق من مسح هذا الطلب؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-white mb-4 ms-3"
                                            style="background-color: #7A1C1C;">مسح الطلب</button>
                                    </form>
                                    </div>
                                </div>
                            </div>   
                            @endforeach
                       
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- script tags -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    <script src="assets/js/nav.js"></script>

</body>

</html>