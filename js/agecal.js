
$(document).ready(function(){
  $("#dob").on('change',function(){

      var mdate = $("#dob").val().toString();

      var yearThen = parseInt(mdate.substring(0,4), 10);
      var monthThen = parseInt(mdate.substring(5,7), 10);
      var dayThen = parseInt(mdate.substring(8,10), 10);

      var today = new Date();
      var birthday = new Date(yearThen, monthThen-1, dayThen);
      
      var differenceInMilisecond = today.valueOf() - birthday.valueOf();
      
      var year_age = Math.floor(differenceInMilisecond / 31536000000);

      $("#calage").val(year_age);
    });
});