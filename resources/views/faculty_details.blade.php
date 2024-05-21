<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nationalities</title>
    <link rel="website icon" type="png" href="{{ asset('assets/images/logoo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://kit.fontawesome.com/cbcafb1e3c.js" crossorigin="anonymous"></script>

    <style>
        .dropdown-menu {
            max-height: 200px; /* Set maximum height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        /* Optional: Add custom styles to dropdown button */
        .btn-dropdown {
            background-color: #007bff;
            color: #ffffff;
            border: none;
        }

        /* Optional: Adjust checkbox alignment */
        .dropdown-menu input[type="checkbox"] {
            margin-right: 5px;
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
                                            <a href="{{ route('nationalities.index')  }}" class="main-nav"
                                                style="  color: #3736AF; font-weight: bolder;">
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
                                                        <a href="{{ route('basic.service.index') }}">
                                                            <i class="fa-solid fa-square ms-1"></i>خدمات رئيسية
                                                        </a>
                                                    </li>
                                                    <li class="mb-4">
                                                        <a href="{{ route('sub.service.index') }}">
                                                            <i class="fa-solid fa-square ms-1"></i>خدمات فرعية
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
                                            <a href="{{route('member.index')}}" class="main-nav">
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
                        <button class="btn button-slidebar w-100">
                            <i class="fa-regular fa-compass ms-2"></i> لوحة التحكم
                            <i class="fa-solid fa-caret-down me-3"></i>
                        </button>
                    </div>
                    <div class="me-4">
                        <!-- Define the menu -->
                        <nav class="menu">
                            <ul>
                                <li class="mb-4">
                                    <a href="{{ route('nationalities.index')  }}" class="main-nav"
                                   >
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
                                                    <i class="fa-solid fa-square ms-1"></i>خدمات رئيسية
                                                </a>
                                            </li>
                                            <li class="mb-4">
                                                <a href="{{ route('sub.service.index') }}">
                                                    <i class="fa-solid fa-square ms-1"></i>خدمات فرعية
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
                                    <a href="{{route('faculty.index')}}"  style="  color: #3736AF; font-weight: bolder;" class="main-nav">
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
                                    <a href="{{route('member.index')}}" class="main-nav">
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
                            <h2 class="fw-light fs-4">الجنسيات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            <i class="fa-solid fa-house ms-1 pb-1"
                                                style="font-size: 13px; color: gray;"></i>الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">
                                    <a href="{{route('nationalities.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            
                                                جنسيات
                                        </a>
                                    
                                   </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">الجنسيات المتاحه
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                      <div class="container mt-5">
                        <div class="row">
                            <div>
                                <!-- Button trigger modal -->
                                <div class="d-flex justify-content-end ms-xl-5 ms-lg-5 ms-md-5">
                                    <button type="button" class="btn button-modal2 p-3" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fa-solid fa-plus ms-2"></i>أضافة جنسية
                                    </button>
                                </div>

                                <!-- Modal -->
                                <form id="facultyForm" action="{{route('add.faculty.nationality.degree' , ['faculty_id'=>$faculty->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class=" modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-3">
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="form col-xl-12 col-lg-12">
                                                        <span id="nameError" class="text-danger"></span>

                                                            <div class="mb-3">
                                                                <label for="disabledSelect"
                                                                    class="form-label text-dark">اختر الجنسية
                                                                     </label>
                                                                <select id="disabledSelect" class="form-select" name="nationality">
                                                                    <option value>اختر الجنسية </option>
                                                                    @foreach($nationalities as $nationality)
                                                                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                           
                                                            <div>
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label text-dark">اكتب نسبة القبول فى الكلية
                                                                     </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="اكتب نسبة القبول هنا " name="degree">
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
                        </div>
                    </div>
             
                    <div class="container nation-details">
                    @if(session('success'))

                    <div class="row justify-content-center rtl">
                    <div class="col-3 alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <span class="me-3">
                    {{ session('success') }}
                    </span>
                        
                        </div>
                    </div>

                    @endif
                                <div class="row justify-content-center mt-5">
                                    <div class="col-xl-6 col-lg-6 col-md-12 bg-white rounded-3 pt-3 pb-3">
                                        <div class="col-xl-12 mb-3">
                                            <h2 class="fw-bold text-dark fs-5 text-end">الجنسيات الملتحقة</h2>
                                            <p class="fw-lighter text-end" style="color: #22219A; font-size: 9px;">
                                                الجنسيات المتاحة لكل كليه
                                                 </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table align-middle text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="background-color: #E9E9F2;">#</th>
                                                        <th scope="col" style="background-color: #E9E9F2;">الجنسيه</th>
                                                        <th scope="col" style="background-color: #E9E9F2;">نسبه القبول</th>
                                                        <th scope="col" style="background-color: #E9E9F2;">
                                                            اخرى
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($faculty->nationalities as $nationality)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $nationality->name }}</td>
                                                        <td>{{ $nationality->pivot->degree }} %</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <div>
                                                                <form action="{{ route('deleteNationalityDegree', ['faculty_id' => $faculty->id, 'nationality_id' => $nationality->id]) }}" method="POST" onsubmit="return confirm('هل واثق من مسح هذه الجنسيه؟');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn text-white" style="background-color: #7A1C1C;" type="submit">مسح</button>
                                                                </form>
                                                                </div>
                                                            </div>
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
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    <script src="{{asset('assets/js/nav.js')}}"></script>



</body>

</html>