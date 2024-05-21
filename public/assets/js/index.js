///

let buttonser = document.querySelector(".button-ser");

buttonser.onclick = function () {

    if (buttonser.classList.contains("click")) {
        buttonser.classList.remove("click");
    }
    else {
        buttonser.classList.add("click");
    }

};


// Get the button and menu elements by their ids
var button = document.getElementById("menuButton-ser");
var menu = document.getElementById("menu-ser");

// Add click event listener to the button
button.addEventListener("click", function () {
    // Toggle the 'active' class on the menu to show/hide it
    menu.classList.toggle("active");
});



// Function to handle file selection
var buttonall = document.getElementById('fileInput');
buttonall.addEventListener('change', function (event) {
    const file = event.target.files[0];

    // Check if a file is selected
    if (file) {
        // Check if the selected file is an image
        if (file.type.startsWith('image/')) {
            // Create a FileReader to read the selected image file
            const reader = new FileReader();

            // Callback function for when the image is loaded
            reader.onload = function (e) {
                const previewContainer = document.getElementById('previewContainer');
                // Clear previous preview images
                previewContainer.innerHTML = '';

                // Create a new image element for the preview
                const img = document.createElement('img');
                img.classList.add('preview-image');               
                img.src = e.target.result;

                // Append the image to the preview container
                previewContainer.appendChild(img);
            };

            // Read the selected image file as a data URL
            reader.readAsDataURL(file);
        } else {
            alert('من فضلك قم بأختيار الصورة');
        }
    }
});

