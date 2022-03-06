$(document).ready(function(){

  $(".generate").on("click",function () //e
  {
    // e.preventDefault();
    $(".generate").attr("disabled", true);
    $(".generate").text("Generating...");

    $.ajax({
    url : "api/admin/generate-api",
    type : "POST",
    success : function(result){
      var data = result
      $("#api_field").val(data);

      $(".generate").attr("disabled", true);
      $(".generate").text("Generate");
    }
    });
    
  })
  
  $("#copy").on("click",function (){
    var copy = $("#api_field").val()
      navigator.clipboard.writeText(copy).then(function () {
          console.log('It worked! Do a CTRL - V to paste')
      }, function () {
          console.log('Failure to copy. Check permissions for clipboard')
      });
  })

})