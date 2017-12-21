$(document).ready(function () {
  $("#mainForm").on("submit", function() {
    var formValid = true;
    var nameIsValid = $("#name").prop("validity").valid;
    if(nameIsValid) {
      $("#nameError").hide();
    } else {
      $("#nameError").show();
      formValid = false;
    }

    //Email
    if($("#address").prop("validity").valueMissing) {
      $("#emailError").show();
      formValid = false;

    } else {
      $("#emailError").hide();
    }

    if($("#address").prop("validity").typeMismatch) {
      $("#emailErrorFill").show();
      formValid = false;

    } else {
      $("#emailErrorFill").hide();
    }
    return formValid;

  });
});
