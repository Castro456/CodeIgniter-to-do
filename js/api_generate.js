var copyToClipboard; // To solve the 'Uncaught ReferenceError: (function) is not defined at HTMLButtonElement.onclick'
$(document).ready(function(){
  $(".generate").on("click",function () //e
  {
    // e.preventDefault();
    $.ajax({
    url : "api/admin/generate-api",
    type : "POST",
    success : function(result){
      var data = result
      $("#api_field").val(data);
    }
    });
  })

  copyToClipboard = function(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

}
})