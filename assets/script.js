$(document).ready(() => {
  $("#mobile").on("blur", function () {
    var phone = $(this).val();
    if (/^\d{10}$/.test(phone)) {
      $("#numberError").hide();
      $.ajax({
        type: "POST",
        url: "checkNumber.php",
        data: { phone: phone },
        success: function (response) {
          if (response.trim() === "exists") {
            $("#numberError").show().text("Number already exists");
          } else {
            $("#numberError").hide();
          }
        },
      });
    } else {
      $("#numberError").show().text("Number should be 10 digit only");
    }
  });
  $("#userForm").on("submit", function (e) {
    if ($("#numberError").is(":visible")) {
      e.preventDefault();
      alert("Please enter a unique phone number.");
    }
  });
});
