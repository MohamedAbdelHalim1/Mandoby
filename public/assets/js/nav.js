document.addEventListener('DOMContentLoaded', function() {
    var dropdownImage = document.getElementById('dropdownImage');
    var dropdownContent = document.getElementById('dropdownContent');

    // Toggle dropdown content on image click
    dropdownImage.addEventListener('click', function() {
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.circle-image')) {
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            }
        }
    };
});