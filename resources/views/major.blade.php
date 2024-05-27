<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>majors</title>
    <link rel="website icon" type="png" href="assets/images/logoo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/index.css">
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
                                            <a href="{{route('faculty.index')}}" class="main-nav"
                                              >
                                                <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{route('major.index')}}" class="main-nav"
                                            style="  color: #3736AF; font-weight: bolder;">
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
                                    <a href="{{route('faculty.index')}}" class="main-nav"
                                   >
                                        <i class="fa-solid fa-graduation-cap ms-3 fw-semibold"></i>كليات
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="{{route('major.index')}}" class="main-nav"
                                    style="  color: #3736AF; font-weight: bolder;">
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
                            <h2 class="fw-light fs-4">الكليات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard.index')}}" class="text-decoration-none" style="color: #22219A;">
                                            <i class="fa-solid fa-house ms-1 pb-1"
                                                style="font-size: 13px; color: gray;"></i>الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" style="color: #22219A;" aria-current="page"> اضافة تخصص
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
                                        <i class="fa-solid fa-plus ms-2"></i>أضافة تخصص
                                    </button>
                                </div>

                                <!-- Modal -->
                                <form id="majorForm" action="{{ route('major.store') }}" method="POST" enctype="multipart/form-data">
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
                                                     
                                                          <label for="disabledSelect" class="form-label text-dark">اختر الجامعة</label>
                                                                <select id="universitySelect" class="form-select" name="university_id">
                                                                    <option value>اختر الجامعة </option>
                                                                    @foreach($universities as $university)
                                                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                 
                                                    </div>

                                                    <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label text-dark">اختر الكلية </label>

                                                                <select id="facultySelect" class="form-select common_selector" name="faculty_id" disabled>
                                                                    <option value>اختر الكليه </option>
                                                                </select>
                                                       
                                                    </div>

                                                    <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label text-dark">اكتب التخصص
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="اكتب اسم التخصص " name="name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label text-dark"> اكتب متطلبات
                                                        المؤهل<small class="fw-bolder me-1"
                                                            style="font-size: 10px;">(أفصل بين كل متطلب واخر
                                                            بفصله)</small>
                                                    </label>
                                                    <textarea class="form-control p-3"
                                                        aria-label="With textarea"
                                                        placeholder="اكتب هنا متطلبات المؤهل...." name="requirement"></textarea>
                                                </div>
                                                <div>
                                                    <label for="exampleInputEmail1"
                                                        class="form-label text-dark">اختر المؤهلات
                                                    </label>
                                                    <div class="border border-1 p-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="بكالريوس" id="flexCheckDefault" name="qualification[]">
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault">
                                                                بكالريوس
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="ماجستير" id="flexCheckChecked" name="qualification[]">
                                                            <label class="form-check-label"
                                                                for="flexCheckChecked">
                                                                ماجستير
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="دكتوراه" id="flexCheckChecked" name="qualification[]">
                                                            <label class="form-check-label"
                                                                for="flexCheckChecked">
                                                                دكتوراه
                                                            </label>
                                                        </div>
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

                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6">
                                <select id="universitySelectsec" class="form-select p-2">
                                    <option value>اختر الجامعة </option>
                                    @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6">
                                <select id="facultySelectsec" class="form-select p-2 common_selector" disabled>
                                    <option value>اختر الكليه </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <form id="editForm" action="{{ route('major.upload')  }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <input type="hidden" id="majorId" name="major_id"> 
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
                                                                        class="form-label text-dark">اكتب التخصص
                                                                    </label>
                                                                    <input type="text" class="form-control" id="major"
                                                                        placeholder="اكتب اسم التخصص " name="name" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label text-dark">موقوف حاليا
                                                                    </label>
                                                                    <input type="text" class="form-control" id="majorActivation"
                                                                        name="is_active" required>
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
                            </div>
                        </div>
                    </div>
                </form>

                    <div class="container text-center mt-4" id="table-container">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-10 table-responsive bg-white rounded-3 pt-3 pb-3">
                                <table class="table table align-middle" id="facultyTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">اسم التخصص</th>
                                            <th scope="col">الكليه</th>
                                            <th scope="col">الجامعه</th>
                                            <th scope="col">المؤهلات</th>
                                            <th scope="col">متوقفه حاليا</th>
                                            <th scope="col">اخري</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($majors as $major)
                                        <tr>
                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>{{$major->name}} </td>
                                            <td>{{$major->faculty->name}} </td>
                                            <td>{{$major->faculty->university->name}}</td>
                                            <td>
                                                {{$major->qualification}}
                                            </td>
                                            <td>@if($major->is_active == 0)
                                                    نعم
                                                @else
                                                    لا
                                                @endif 
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                <div class="ms-2">
                                                        <button type="button" class="btn text-white button-modal2"
                                                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal" onclick="openEditModal({{ $major->id }})"
                                                            style="background-color: #1C7A36;">تعديل</button>
                                                    </div>

                                                    <div>
                                                        <button type="button" class="btn text-white" onclick="deleteMajor({{ $major->id }})"
                                                            style="background-color: #7A1C1C;">مسح</button>
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
    </section>

    <!-- script tags -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/nav.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
        document.getElementById('majorForm').addEventListener('submit', function(event) {
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



       function deleteMajor(major_id) {

        if (confirm('Are you sure you want to delete this Major?')) {
            fetch('/major/' + major_id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    // Handle error response
                    console.error('Error deleting Major:', response.statusText);
                    alert('Failed to delete Major. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error deleting Major:', error);
                alert('An error occurred while deleting the Major. Please try again.');
            });
        }
    }

    $('.common_selector').on('change',function(){
       filter_data(this);
    });


    function filter_data(selectElement){
      //  console.log('Select changed'); // Check
         var selectedFacultyId = $(selectElement).val(); 

    // Send AJAX request to filter data
        jQuery.ajax({
            url: '{{ route("filter.major.data") }}',
            type: 'POST',
            data: {
                faculty_id: selectedFacultyId
            },
            success: function(response) {
                // Replace the table with the filtered view
                $('#table-container').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }




    $(document).ready(function() {
    $('#universitySelect').change(function() {
        var universityId = $(this).val();
        if (universityId) {
            // Enable the faculty select element
            $('#facultySelect').prop('disabled', false);
            // Fetch faculties based on selected university
            $.ajax({
                url: '/getFaculties', // Replace with your route for fetching faculties
                type: 'POST',
                data: {
                    university_id: universityId
                },
                success: function(response) {
                    // Clear previous options
                    $('#facultySelect').empty();
                    $('#facultySelect').append('<option value="">اختر الكلية</option>');

                    // Append new options
                    $.each(response.faculties, function(index, faculty) {
                        $('#facultySelect').append('<option value="' + faculty.id + '">' + faculty.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no university is selected, disable the faculty select element
            $('#facultySelect').prop('disabled', true);
            // Clear previous options
            $('#facultySelect').empty();
            // Add default option
            $('#facultySelect').append('<option value="">اختر الكلية</option>');
        }
    });
});





$(document).ready(function() {
    $('#universitySelectsec').change(function() {
        var universityId = $(this).val();
        if (universityId) {
            // Enable the faculty select element
            $('#facultySelectsec').prop('disabled', false);
            // Fetch faculties based on selected university
            $.ajax({
                url: '/getFaculties', // Replace with your route for fetching faculties
                type: 'POST',
                data: {
                    university_id: universityId
                },
                success: function(response) {
                    // Clear previous options
                    $('#facultySelectsec').empty();
                    $('#facultySelectsec').append('<option value="">اختر الكلية</option>');
                    // Append new options
                    $.each(response.faculties, function(index, faculty) {
                        $('#facultySelectsec').append('<option value="' + faculty.id + '">' + faculty.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no university is selected, disable the faculty select element
            $('#facultySelectsec').prop('disabled', true);
            // Clear previous options
            $('#facultySelectsec').empty();
            // Add default option
            $('#facultySelectsec').append('<option value="">اختر الكلية</option>');
        }
    });
});



function openEditModal(majorId) {
    console.log(majorId);
        jQuery.ajax({
            url: '/major/' + majorId + '/edit', // Replace with your route for fetching subService data
            type: 'GET',
            success: function(response) {
                //console.log(response);
                //console.log(response.subService);
                // Populate form fields with subService data
                 $('#majorId').val(response.id);
                 $('#major').val(response.name);
                 $('#majorActivation').val(response.is_active);

                // //$('#subServiceBasic').val(response.basicService.id);

                // // Set the selected option in the select element
                //   $('#subServiceBasic').val(selectedBasicServiceId);
                // Set image source if photo exists
                // if (response.SubService.photo) {
                //     $('#subServiceImagePreview').html('<img src="' + response.SubService.photo + '" class="img-fluid">');
                // } else {
                //     $('#subServiceImagePreview').text('No image selected');
                // }
               // $('#editsubServiceModal').modal('show');

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateSubService() {
        // Send updated data to server via AJAX
        var formData = $('#editForm').serialize();
        $.ajax({
            url: '/major/update', // Replace with your route for updating
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