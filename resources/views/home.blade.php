<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Mandoby</title>
    <link rel="website icon" type="png" href="assets/images/logoo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://kit.fontawesome.com/cbcafb1e3c.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <header class="rtl">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <nav class="navbar nav-mob" style="background-color: #3736AF;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo-white.png" style="width: 140px;">
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
                                            <a class="button-ser-small" id="menuButton-ser-small">
                                                <i class="fa-solid fa-bars ms-3 fw-semibold"></i>خدمات
                                                <i class="fa-solid fa-caret-down me-3"></i>
                                            </a>
                                            <nav id="menu-ser-small" class="menu-ser-small mt-3">
                                                <ul class="me-3">
                                                    <li class="mb-2">
                                                        <a href="{{ route('basic.service.index') }}">
                                                            <i class="fa-solid fa-square ms-2"></i>خدمات رئيسية
                                                        </a>
                                                    </li>
                                                    <li class="mb-4">
                                                        <a href="{{ route('sub.service.index') }}">
                                                            <i class="fa-solid fa-square ms-2"></i>خدمات فرعية
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </li>
                                        <li class="mb-4">
                                            <a class="button-unv-small" id="menuButton-unv-small">
                                                <i class="fa-solid fa-building-columns ms-3 fw-semibold"></i>جامعات
                                                <i class="fa-solid fa-caret-down me-3"></i>
                                            </a>
                                            <nav id="menu-unv-small" class="menu-unv-small mt-3">
                                                <ul class="me-3">
                                                    <li class="mb-2">
                                                        <a href="{{ route('university.index') }}">
                                                            <i class="fa-solid fa-square ms-2"></i>أضافة جامعة
                                                        </a>
                                                    </li>
                                                    <li class="mb-4">
                                                        <a href="{{ route('university.index') }}">
                                                            <i class="fa-solid fa-square ms-2"></i>تفاصيل جامعة
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('faculty.index')}}" class="main-nav">
                                                <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="majors.html" class="main-nav">
                                                <i class="fa-solid fa-angles-down  ms-3 fw-semibold"></i>تخصصات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="orders.html" class="main-nav">
                                                <i class="fa-solid fa-list-check ms-3 fw-semibold"></i>طلبات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="members.html" class="main-nav">
                                                <i class="fa-solid fa-user-group ms-3 fw-semibold"></i>اعضاء
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="users.html" class="main-nav">
                                                <i class="fa-solid fa-user-check ms-3 fw-semibold"></i>المستخدمين
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="news.html" class="main-nav">
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
                        <a href="index.html">
                            <img src="assets/images/logo-white.png" style="width: 140px;">
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
                        <div class="circle mt-2">
                            <img src="assets/images/IMG_20220205_105633_659.jpg">
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
                                                <a href="{{ route('basic.service.index') }}">
                                                    <i class="fa-solid fa-square ms-2"></i>خدمات رئيسية
                                                </a>
                                            </li>
                                            <li class="mb-4">
                                                <a href="{{ route('sub.service.index') }}">
                                                    <i class="fa-solid fa-square ms-2"></i>خدمات فرعية
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </li>
                                <li class="mb-4">
                                    <a class="button-unv" id="menuButton-unv">
                                        <i class="fa-solid fa-building-columns ms-3 fw-semibold"></i>جامعات
                                        <i class="fa-solid fa-caret-down me-3"></i>
                                    </a>
                                    <nav id="menu-unv" class="menu-unv mt-3">
                                        <ul class="me-3">
                                            <li class="mb-2">
                                                <a href="{{route('university.index') }}">
                                                    <i class="fa-solid fa-square ms-2"></i>أضافة جامعة
                                                </a>
                                            </li>
                                            <li class="mb-4">
                                                <a href="{{ route('university.index') }}">
                                                    <i class="fa-solid fa-square ms-2"></i>تفاصيل جامعة
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('faculty.index')}}" class="main-nav">
                                        <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="majors.html" class="main-nav">
                                        <i class="fa-solid fa-angles-down  ms-3 fw-semibold"></i>تخصصات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="orders.html" class="main-nav">
                                        <i class="fa-solid fa-list-check ms-3 fw-semibold"></i>طلبات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="members.html" class="main-nav">
                                        <i class="fa-solid fa-user-group ms-3 fw-semibold"></i>اعضاء
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="users.html" class="main-nav">
                                        <i class="fa-solid fa-user-check ms-3 fw-semibold"></i>المستخدمين
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="news.html" class="main-nav">
                                        <i class="fa-solid fa-envelope-open-text ms-3 fw-semibold"></i>اخبار
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-9 col-md-3 mb-5">
                    <div class="row">
                        <div class="col-12 p-4" style="background-color: #3736AF;">
                            <p class="my-auto">
                                <span class="text-white fw-bold fs-5">
                                    <i class="fa-solid fa-house text-white ms-1"></i> لوحة التحكم
                                </span>
                                <small class="text-white fw-lighter me-1">مرحبا بعودتك, وداد اشرف!</small>
                            </p>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row justify-content-around">
                            <div class="col-xl-4 col-lg-5 col-md-5 bg-white rounded-3 p-3 on-mob">
                                <div class="mt-3">
                                    <p class="fw-bolder fs-4 my-auto" style="color: #22219A;">
                                        نحن نقدم اكثر من <span class="rounded-2 text-white ps-1 pe-1"
                                            style="background-color: #FAAB2E;">60</span> خدمة على مستوى العالم
                                    </p>
                                    <!-- Button trigger modal -->
                                    <div class="d-flex justify-content-end mt-5 mb-xl-3">
                                        <button type="button" class="btn button-modal" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            <i class="fa-solid fa-plus ms-2"></i>أضافة خدمة جديدة
                                        </button>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class=" modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3">
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="form col-xl-12 col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label text-dark">اسم
                                                                        الخدمة الرئيسية</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="اكتب هنا اسم الخدمة">
                                                                </div>
                                                                <!-- Dropzone area -->
                                                                <div>
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label text-dark ">ارفاق
                                                                        الايقون الخاصة بخدمة</label>
                                                                </div>
                                                                <!-- Input for selecting images -->
                                                                <input type="file" id="fileInput" accept="image/*"
                                                                    style="display: none;">
                                                                <div class="dropzone" id="previewContainer"
                                                                    onclick="document.getElementById('fileInput').click();">
                                                                    <div class="mt-3"
                                                                        style="overflow-y: hidden !important;">
                                                                        <span><i class="fa-solid fa-cloud-arrow-up"
                                                                                style="color: rgba(2, 58, 170, 0.8);"></i></span>
                                                                        <br>
                                                                        <span
                                                                            class="my-auto mx-auto text-dark fw-semibold">قم
                                                                            بإسقاط الصورة هنا أو انقر للتحميل .</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn text-white"
                                                        style="background-color: #066569;">اضافة</button>
                                                    <button type="button" class="btn text-white"
                                                        style="background-color: #7A1C1C;"
                                                        data-bs-dismiss="modal">الغاء</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 bg-white rounded-3 p-4">
                                <div class="d-flex justify-content-between">
                                    <div style="width: 50%;">
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #2C42F0;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة عين شمس
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #64EDB5;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة القاهرة
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #64CBED;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة الاسكندرية
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #649FED;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة المنصورة
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #64EDE4;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة مصر
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="square-color" style="background-color: #B3DEED;"></div>
                                            <div class="fw-semibold" style="font-size: 13px; width:80%;">
                                                جامعة الفيوم
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 50%;">
                                        <img src="assets/images/sl_062023_60260_07-[Converted].png"
                                            style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container text-center mt-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-11 col-md-11 bg-white rounded-3 pt-3 pb-3">
                                <div class="col-xl-12 mb-3">
                                    <h2 class="fw-bold text-dark fs-5 text-end">البلاد</h2>
                                    <p class="fw-lighter text-end" style="color: #22219A; font-size: 12px;">الجنسيات
                                        المتاحة معنا</p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="background-color: #E9E9F2;">#</th>
                                                <th scope="col" style="background-color: #E9E9F2;">الجنسيات</th>
                                                <th scope="col" style="background-color: #E9E9F2;">عدد الاعضاء</th>
                                                <th scope="col" style="background-color: #E9E9F2;">العلم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   
                                        @foreach ($nationalities as $nationality)
                                            <tr>
                                                <th scope="row">{{$loop->index+1}}</th>
                                                <td>{{ $nationality->name }}</td>
                                                <td>{{ $nationality->members->count() }}</td>
                                                <td>
                                                @if ($nationality->photo)
                                                    <img src="{{ asset('storage/' . $nationality->photo) }}"
                                                        alt="{{ $nationality->name }} Photo"
                                                        style="width: 68px; height: 41px;">
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- script tags -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/index.js"></script>

</body>

</html>