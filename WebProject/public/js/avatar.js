var check = true;

$("#mySuperPuperAvatar").click(function() {
  if (check) {
    $("#mySuperPuperAvatar").animate({
      width: '75%',
      marginTop: '40px'
    }, 500);
    $("#mainDiv").addClass("d-flex align-items-center");
    check = false;
  } else {
    $("#mainDiv").removeClass("d-flex align-items-center");
    $("#mySuperPuperAvatar").animate({
      width: '40%',
      marginTop: '0px'
    }, 500);
    check = true;
  }
});
