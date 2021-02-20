//global values
const allImages = ['slider1.jpg','slider2.jpg','slider3.jpg'];
const totalImages = allImages.length;
let currentImage = Math.floor(Math.random() * totalImages);
let el = document.getElementsByClassName('imageInSlider');
// checking if there is any image slider found
if(el[0]) {
    el[0].style.background = "url(./images/"+ allImages[currentImage]+")";
    el[0].style.backgroundPosition = "center";
    el[0].style.backgroundSize = "cover";
}
// up to here all the variable are for image slider
// function that changes the image
function changeImage(changeValue) {
    currentImage += changeValue;
    if(currentImage > totalImages - 1) {
        currentImage = 0;
    }else if(currentImage < 0) {
        currentImage = totalImages - 1;
    }
    $('.imageInSlider').css({'background':'url("./images/'+ allImages[currentImage] +'")','background-position':'center','background-size':'cover'});
}
// this is to check if the user uploaded any profile pic
// if he uploaded then that picture will be shown here
const userPicUploaded = $('#userDP').val();
if(userPicUploaded) {
    $('#userImageLabel').css({'background':'url('+ userPicUploaded +')','background-position':'center','background-size':'cover'});
}
// This is where we change our profile picture
$('#user-image-upload').on('change',function(e){
    e.preventDefault();
    let ImageValue = $('#user-image-upload').prop('files')[0];
    let form_data = new FormData();
    form_data.append('file', ImageValue);
    $('#userImageLabel').css({'background':'url(./images/loading.gif)','background-position':'center','background-size':'cover'});
    $.ajax({
        url: 'ajax/changeImage.ajax.php',
        type: 'POST',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(dataResult) {
            console.log(dataResult);
            $('#userImageLabel').css({'background':'url('+ dataResult +')','background-position':'center','background-size':'cover'});
        }
    });
});
//change user weight
function changeWeight() {
    let userWeight = $('#userWeight').val();

    $.ajax({
        url: 'ajax/changeWeightHeight.ajax.php',
        type: 'POST',
        data: {
            mode: 'changeWeight',
            weight: userWeight
        },
        success: function(dataResult) {
            console.log(dataResult);
            findBMI();
        }
    });
}
//change user height
function changeHeight() {
    let userHeight = $('#userHeight').val();

    $.ajax({
        url: 'ajax/changeWeightHeight.ajax.php',
        type: 'POST',
        data: {
            mode: 'changeHeight',
            height: userHeight
        },
        success: function(dataResult) {
            console.log(dataResult);
            findBMI();
        }
    });
}
//finding BMI
findBMI();
function findBMI() {
    let height = $('#userHeight').val()/100;
    let weight = $('#userWeight').val();
    let bmiVal = weight/(height * height);
    if(height != 0 || weight != 0) {
        if(bmiVal < 18.5) {
            $('#bmiResult').text('Under Weight');
        }else if(bmiVal> 18.5 && bmiVal < 25) {
            $('#bmiResult').text('Normal');
        }else {
            $('#bmiResult').text('Over Weight');
        }
        $('.bmiCard').css("display","block");
    }
}
//close bmi box
function closeBmi() {
    $('.bmiCard').css("display","none");
}
//add to cart button
function addToCart(cart) {
    let id = $(cart).attr('data-id');
    $.ajax({
        url: 'ajax/addToCart.ajax.php',
        type: 'POST',
        data: {
            id: id
        },
        success: function(dataResult) {
            alert(' '+dataResult);
        }
    });
}

function clearAlert() {
    $('.alertBox').hide();
}