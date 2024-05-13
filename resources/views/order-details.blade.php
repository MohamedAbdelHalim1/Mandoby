<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>orders-details</title>
    <link rel="website icon" type="png" href="{{asset('assets/images/logoo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://kit.fontawesome.com/cbcafb1e3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


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
                                                            <i class="fa-solid fa-square ms-1"></i>خدمات رئيسية
                                                        </a>
                                                    </li>
                                                    <li class="mb-4">
                                                        <a href="{{route('sub.service.index')}}">
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
                                            <a href="{{route('order.index')}}" class="main-nav"
                                                style="  color: #3736AF; font-weight: bolder;">
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
                            <h3>وداد اشرف
                                <br>
                                <span class="fw-lighter">
                                    @wedad.ash
                                </span>
                            </h3>
                        </div>
                        <div class="circle mt-2">
                            <img src="{{asset('assets/images/IMG_20220205_105633_659.jpg')}}">
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
                                                    <i class="fa-solid fa-square ms-1"></i>خدمات رئيسية
                                                </a>
                                            </li>
                                            <li class="mb-4">
                                                <a href="{{route('sub.service.index')}}">
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
                                    <a href="{{route('order.index')}}" class="main-nav"
                                    style="  color: #3736AF; font-weight: bolder;">
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
                            <h2 class="fw-light fs-4">الطلبات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            <i class="fa-solid fa-house ms-1 pb-1"
                                                style="font-size: 13px; color: gray;"></i>الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">الطلبات
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">تفاصيل الطلب
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-10 bg-white rounded-3 p-4">
                                <h2 class="fw-bold mb-3" style="color: #22219A; font-size: 20px;">{{$order->name}}</h2>
                                <div class="me-5 mb-1">
                                    <span class="ms-2 fw-bolder">اسم الطالبه: </span>
                                    <span>{{$order->member->name}}</span>
                                </div>
                                <div class="me-5 mb-1">
                                    <span class="ms-2 fw-bolder"> التليفون: </span>
                                    <span> {{$order->member->phone}}</span>
                                </div>
                                <div class="mt-5">
                                    <div class="form-check">
                                        <input class="form-check-input common_selector" type="checkbox" value="1" id="flexCheckDefault" data-order-id="{{ $order->id }}"
                                        @if($order->apply_order == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            تم تقديم الطلب بنجاح
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input common_selector" type="checkbox" value="2" id="flexCheckChecked" data-order-id="{{ $order->id }}"
                                        @if($order->receiving_all_papers == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            انتظار استلام الاوراق كاملة
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input common_selector" type="checkbox" value="3" id="flexCheckChecked" data-order-id="{{ $order->id }}"
                                        @if($order->paid_link == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            انتظار الدفع
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input common_selector" type="checkbox" value="4" id="flexCheckChecked" data-order-id="{{ $order->id }}"
                                        @if($order->apply_at_university == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            تم التقديم علي الجامعه
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input common_selector" type="checkbox" value="5" id="flexCheckChecked" data-order-id="{{ $order->id }}"
                                        @if($order->order_accepted == 1) checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            تم الموافقه على الطلب
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end ms-xl-5 ms-lg-5 ms-md-5">
                                    <button onclick="document.getElementById('fileInputorder').click()" type="button"
                                        class="btn button-modal-order" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fa-solid fa-plus ms-2"></i> ارفاق الكارنيه
                                    </button>
                                    <!-- Hidden file input -->
                                    <input type="file" id="fileInputorder" style="display: none;" accept="image/*">
                                    <!-- Display selected image -->
                                    <img id="previewImage2" src="" class="me-3" alt="Preview" style="max-width: 30%; display: none">
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
    <script src="{{asset('assets/js/order-details.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        try {

    
    $('.common_selector').on('change', function() {
        add_req(this); // Pass the checkbox element to the function
    });

    function add_req(checkbox) {
        var requirementId = checkbox.value;
        var orderId = checkbox.dataset.orderId;
        var isChecked = checkbox.checked;
        
        // Send AJAX request to update the requirement status
        jQuery.ajax({
            url: "{{ route('update.req') }}", // Replace with your route for updating the requirement status
            type: 'POST',
            data: {
                order_id: orderId,
                requirement_id: requirementId,
                is_checked: isChecked
            },
            success: function(response) {
                // Handle success response if needed
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
        }catch (error) {
    console.error("An error occurred:", error);
}




</script>

</body>

</html>