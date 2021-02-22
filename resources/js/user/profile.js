let fileButton = document.getElementById('my_file');
let uploadButton = document.getElementById('upload_profile_image');


uploadButton.onclick = () => {
  fileButton.click();
  fileButton.addEventListener('change', () => {
    let filename = fileButton.value.split("\\");
    
    uploadButton.innerHTML = filename[filename.length - 1];
  });
};