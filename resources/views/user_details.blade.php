<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-details</title>
    <link rel="website icon" type="png" href="assets/images/logoo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://kit.fontawesome.com/cbcafb1e3c.js" crossorigin="anonymous"></script>
<style>
    .image-container {
    position: relative;
    display: inline-block;
}

.circular-image {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-top: 20px;
}

.editButton {
    position: absolute;
    bottom: 10px;
    left: 10px;
    padding: 2px 8px 2px 8px;
    background-color: #E9E9F2;
    color: #1C7A36;
    font-size: 14px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.editButton:hover {
    background-color:rgba(233, 233, 242 ,.6);
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
                <div class="col-xl-5 col-lg-5 col-md-5 mb-5 my-auto mx-auto">
                    <h4 class="fw-bold fs-5">معلومات الملف الشخصي</h4>
                    <hr>
                    <div>
                        <form method="post" action="{{route('update.dashboard.user')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">الاسم</label>
                                <input type="text" class="form-control p-3" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{Auth::user()->name}}" name="name" required>                             
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">الايميل</label>
                                <input type="email"  value="{{Auth::user()->email}}"  class="form-control p-3" id="exampleInputPassword1" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">حالته</label>
                                <input type="text"  value="{{Auth::user()->role}}" class="form-control p-3" id="exampleInputPassword1" name="role" required>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn text-white w-25" style="background-color: #066569;">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="image-container">
                        @if(Auth::user()->photo)
                        <img src="{{Auth::user()->photo}}" alt="Example Image" class="circular-image" style="margin-top: 80px !important;" id="imageToEdit">
                        @else
                        <img src="assets/images/IMG_default.png" alt="Example Image" class="circular-image" style="margin-top: 80px !important;" id="imageToEdit">
                        @endif
                        <button class="editButton" onclick="openModal()">تعديل</button>
                    </div>
                
                    <!-- The Modal -->
                    <form id="editForm" action="{{ route('dashboard.user.photo.upload')  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close text-start" onclick="closeModal()">&times;</span>
                                <form id="editForm">
                                    <img id="modalImage" src="" alt="Edit Image" class="circular-image"><br><br>
                                    <input type="file" id="imageInput" accept="image/*" name="photo"><br><br>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="text-white btn" style="background-color: #066569;" id="saveButton">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </form>                
                </div>
            </div>
        </div>
    </section>

    <!-- script tags -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/nav.js"></script>

    <script>
        function openModal() {
    var modal = document.getElementById('myModal');
    var imageToEdit = document.getElementById('imageToEdit');
    var modalImage = document.getElementById('modalImage');

    // Set the modal image to the current image source
    modalImage.src = imageToEdit.src;

    // Display the modal
    modal.style.display = 'block';
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
}

function saveImage() {
    var imageInput = document.getElementById('imageInput');
    var imageToEdit = document.getElementById('imageToEdit');
    var modalImage = document.getElementById('modalImage');

    var file = imageInput.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Update the image sources
            imageToEdit.src = e.target.result;
            modalImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Close the modal
    closeModal();
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        closeModal();
    }
};

    </script>

</body>

</html>