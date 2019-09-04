
//(function (window, document) {

//})(window, document);
var imgCount = 0;
var imgCount1 = 0;

//var imgI = 0;
function slide(){

var imgArray = ["2018/2019 Admision in progress", "Get your form today!", "In search for a good school...we are here for you"];
var imgColor = ["cyan", "yellow", "pink", "red", "orange","gray","brown","white"];

var slider;
slider = document.getElementById("admission-slider");

slider.innerHTML = imgArray[imgCount];
slider.style.color = imgColor[imgCount1];
imgCount = imgCount + 1;
imgCount1 = imgCount1 + 1;
if(imgCount > imgArray.length - 1){
	imgCount = 0;
	}
	 if(imgCount1 > imgColor.length - 1){
	imgCount1 = 0;
	}
	 if(imgCount <= imgArray.length - 1){
	 setTimeout("slide()",3000);
	}
}
window.onload = slide;
