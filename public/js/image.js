
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
upload = document.querySelector('#file-input'),
cropper = '';
var rs ;
var OEM = Tesseract.OEM;
const submitButton = document.getElementById("submitButton");
const clButton = document.getElementById("cl");
const resultDiv = document.getElementById("wagennummer");
var a ="";
// on change show image with crop options
upload.addEventListener('change', (e) => {
if (e.target.files.length) {
    // start file reader
    const reader = new FileReader();
    reader.onload = (e) => {
        if (e.target.result) {
            // create new image
            let img = document.createElement('img');
            img.id = 'image';
            img.src = e.target.result
            // clean result before
            result.innerHTML = '';
            // append new image
            result.appendChild(img);
            // show save btn and options
            save.classList.remove('hide');
            options.classList.remove('hide');
            // init cropper
            cropper = new Cropper(img);
        }
    };
    reader.readAsDataURL(e.target.files[0]);
}
});

// save on click
save.addEventListener('click', (e) => {
e.preventDefault();
let loadingScreen = document.getElementById("loading");
loadingScreen.style.display = "block";
// get result to data uri
let imgSrc ="";
 imgSrc = cropper.getCroppedCanvas({
    width: img_w.value // input value
}).toDataURL();
// remove hide class of img
cropped.classList.remove('hide');
img_result.classList.remove('hide');
// show image cropped
cropped.src = imgSrc;

rs=imgSrc
if (!rs) {
    console.error("No image selected");
    return;
  }

  const image = new Image();
  image.src = rs;

  image.addEventListener("load", function () {
    Tesseract.recognize(image, 'eng', {
        init_oem: OEM.TESSERACT_ONLY,
    tessedit_char_whitelist: '0123456789',
    })
      .then(({ data: { text } }) => {
        console.log(text);
        a = text.replace(/\D/g, "");
        

        let input = a; // Remove non-numeric characters
        let formattedNumber = '';

        // Add spaces
        if (input.length > 2) {
            formattedNumber += input.substring(0, 2) + ' ';
            input = input.substring(2);
        }
        if (input.length > 2) {
            formattedNumber += input.substring(0, 2) + ' ';
            input = input.substring(2);

        }

        if (input.length > 4) {
            formattedNumber += input.substring(0, 4) + ' ';
            input = input.substring(4);

        }
        if (input.length > 3) {
            formattedNumber += input.substring(0, 3) + '-';
            input = input.substring(3);

        }
        console.log(input);
        formattedNumber += input;
        this.value = formattedNumber.substring(0, 16);
        res.value = formattedNumber.replace(/\D/g, '').substring(0, 12);
        document.getElementById("input-rs").value = formattedNumber;
        

        resultDiv.setAttribute('value',formattedNumber);
        if(a.length<12){
            document.getElementById("error-message").style.display = "block";
            
        }
        text ="";
          
        loadingScreen.style.display = "none";
        setTimeout(clButton.click(),5000);
        Swal.fire({
            position: 'top-center',
            icon: 'info',
            title: 'Bitte überprüfen Sie die Nummer',
            showConfirmButton: false,
            timer: 2000
          })
      })
      
  });

  
});


    
      
       
    
      
    
  
 