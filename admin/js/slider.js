$(document).ready(function(){
$("#slider_submit").live("click",function(){
var image_file_path = $("#slider_image_path1").val();
var image_text_path = $("#slider_image_path2").val();
var image_title = $("#DlrSlider_slider_image_title").val();
if(image_title=="")
{
alert("Please enter Slide Image Title");
return false;
}
if(image_file_path=="" && image_text_path=="")
{
alert("Please select atleast one field to upload image.");
return false;
}
if(image_file_path!="" && image_text_path!="")
{
alert("Please select only one field to upload image.");
return false;
}
else{
return true;
}

});
});
