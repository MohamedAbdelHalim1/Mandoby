
 // Function to handle file selection
 
 var buttonorder =  document.getElementById("fileInputorder");
 buttonorder.addEventListener('change', function(event2) {
     const file2 = event2.target.files[0];
 
     // Check if a file is selected and it's an image
     if (file2 && file2.type.startsWith('image/')) {
         // Display selected image
         const reader2 = new FileReader();
         reader2.onload = function(e2) {
             const previewImage2 = document.getElementById('previewImage2');
             previewImage2.src = e2.target.result;
             previewImage2.style.display = 'block';
         };
         reader2.readAsDataURL(file2);
     } else {
         alert('من فضلك قم بأختيار الصورة');
     }
 });
 