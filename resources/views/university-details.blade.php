<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>university-details</title>
    <link rel="website icon" type="png" href="{{ asset('assets/images/logoo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
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
                                            <a class="button-ser-small" id="menuButton-ser-small">
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
                            <img src="asset('assets/images/logo-white.png')}}" style="width: 140px;">
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
                            <h2 class="fw-light fs-4">الجامعات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            <i class="fa-solid fa-house ms-1 pb-1"
                                                style="font-size: 13px; color: gray;"></i>الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">جامعات</li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page">تفاصيل
                                        الجامعة
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
                                        <i class="fa-solid fa-plus ms-2"></i>أضافة تفاصيل جامعة
                                    </button>
                                </div>
                                <form id="universityForm" action="{{ route('university.store.details' , ['id' => $university->id]) }}" method="POST" enctype="multipart/form-data">
                                     @csrf
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
                                                        <span id="nameError" class="text-danger"></span>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label text-dark">
                                                                    اكتب تفاصيل الجامعة</label>
                                                                <textarea class="form-control p-3"
                                                                    aria-label="With textarea"
                                                                    placeholder="اكتب هنا تفاصيل الجامعة...." name="details" required></textarea>
                                                            </div>
                                                            <!-- Dropzone area -->
                                                            <div>
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label text-dark ">ارفاق
                                                                    اللوجو الخاص بالجامعة</label>
                                                            </div>
                                                            <!-- Input for selecting images -->
                                                            <input type="file" id="fileInput" accept="image/*"
                                                                style="display: none;" name="photo" required>
                                                            <div class="dropzone" id="previewContainer"
                                                                onclick="document.getElementById('fileInput').click();">
                                                                <div class="mt-3">
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
                    <div class="container text-center mt-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-3 mb-3">
                                <div class="card" style="width: 100%;">
                                @if ($university->photo)
                                    <img src="{{ $university->photo }}"
                                        alt="{{ $university->name }} photo"
                                        class="card-img-top">
                                @endif
                                        <div class="card-body">
                                        <h2 class="text-end fs-6 fw-bolder mb-3">{{$university->name}}</h2>
                                        <h4 class="text-end fs-6 mb-3">{{$university->details}}</h4>
                                        <div class="d-flex justify-content-end">
                                        <div class="ms-2">
                                                        <button type="button" class="btn text-white button-modal2"
                                                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal" onclick="openEditModal({{ $university->id }})"
                                                            style="background-color: #1C7A36;">تعديل</button>
                                                    </div>
                                         <div>
                                         <button type="button" class="btn text-white"  onclick="deleteUniversity({{ $university->id }})"
                                                style="background-color: #7A1C1C;" data-bs-dismiss="modal">مسح</button>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form id="editForm" action="{{ route('details.upload')  }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <input type="hidden" id="detailsId" name="details_id"> 
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-end">
                                                <div class="container">
                                           
                                                    <div class="row justify-content-center">
                                                        <div class="form col-xl-12 col-lg-12">                                                         
                                                        <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label text-dark">
                                                                    اكتب تفاصيل الجامعة</label>
                                                                <textarea class="form-control p-3"
                                                                    aria-label="With textarea" id="details"
                                                                    placeholder="اكتب هنا تفاصيل الجامعة...." name="details" required></textarea>
                                                            </div>
                                                          
                                                            <div>
                                                                <label 
                                                                    class="form-label text-dark fw-semibold">
                                                                    اللوجو الخاص بالجامعة
                                                                     </label>
                                                                <input type="file" class="form-control" id="imageName"
                                                                    name="photo">
                                                            </div>
                                                            <div class="mt-2 d-flex justify-content-center" id="detailsImagePreview" style="height:150px;"></div>

                                                        </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn text-white"
                                                    style="background-color: #066569;" id="saveButton">حفظ</button>
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
            </div>
        </div>
    </section>

    <!-- script tags -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{asset('assets/js/nav.js')}}"></script>

    

<script>

document.getElementById('universityForm').addEventListener('submit', function(event) {
event.preventDefault();
var formData = new FormData(this);

// Submit the form data using Ajax
fetch(this.action, {
    method: 'POST',
    body: formData
})
.then(response => {
    if (response.ok) {
        // Clear all error messages when form is submitted successfully
        var errorElements = document.querySelectorAll('.text-danger');
        errorElements.forEach(function(element) {
            element.textContent = '';
        });
        window.location.reload();
    } else {
        response.json().then(data => {
            // Loop through each field with errors
            for (var key in data.errors) {
                if (Object.prototype.hasOwnProperty.call(data.errors, key)) {
                    var errorMessages = data.errors[key]; // Get the error messages array
                    var errorElement = document.getElementById(key + 'Error'); // Assuming ID format is fieldNameError
                    if (errorElement) {
                        // Join all error messages and display them
                        errorElement.textContent = errorMessages.join(' ');
                    }
                }
            }
        });
    }
})
.catch(error => {
    console.error('Error:', error);
});
});


    function deleteUniversity(university_id) {

    if (confirm('Are you sure you want to delete this university?')) {
        // Send AJAX request to delete the university
        fetch('/university/' + university_id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                // Check if response is JSON
                if (response.headers.get('content-type').includes('application/json')) {
                    return response.json(); // Parse JSON response
                } else {
                    throw new Error('Response is not JSON');
                }
            } else {
                throw new Error('Failed to delete university');
            }
        })
        .then(data => {
            // Assuming data contains a 'redirect_url' property
            if (data.redirect_url) {
                window.location.href = data.redirect_url; // Redirect to the specified URL
            } else {
                throw new Error('Redirect URL not found in response data');
            }
        })
        .catch(error => {
            console.error('Error deleting university:', error);
            alert('An error occurred while deleting the university. Please try again.');
        });
    }
    }


    function openEditModal(universityId) {
        jQuery.ajax({
            url: '/details/' + universityId + '/edit', // Replace with your route for fetching nationality data
            type: 'GET',
            success: function(response) {
                console.log(response);
                //console.log(response.nationality);
                // Populate form fields with nationality data
                 $('#detailsId').val(response.id);
                $('#details').val(response.details);
                // // Set image source if photo exists
                if (response.photo) {
                    $('#detailsImagePreview').html('<img src="' + response.photo + '" class="img-fluid">');
                } else {
                    $('#detailsImagePreview').text('No image selected');
                }
               // $('#editNationalityModal').modal('show');

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateUniversity() {
        // Send updated data to server via AJAX
        var formData = $('#editForm').serialize();
        $.ajax({
            url: '/details/update', // Replace with your route for updating
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>
</body>

</html>