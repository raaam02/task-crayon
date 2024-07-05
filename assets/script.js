$(document).ready(() => {
  // Check Number Exists or not
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

  //   add more expe

  let expIndex = 1;
  $("#addExp").click(function () {
    expIndex++;
    let expHtml = `<div class="exp">
                    <div class="mb-3">
                      <label for="" class="form-label">Comapny${expIndex} Name</label>
                      <input
                        type="text"
                        class="form-control shadow-none"
                        name="experience[${expIndex}][company]"
                        id="company${expIndex}"
                        aria-describedby="helpId"
                        placeholder="Crayon infotech"
                        required
                      />
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label"
                        >Years of experience${expIndex}</label
                      >
                      <input
                        type="number"
                        class="form-control shadow-none"
                        name="experience[${expIndex}][year]"
                        id="year${expIndex}"
                        aria-describedby="helpId"
                        placeholder="5"
                        required
                      />
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label"
                        >Months of experience${expIndex}</label
                      >
                      <input
                        type="number"
                        class="form-control shadow-none"
                        name="experience[${expIndex}][months]"
                        id="months${expIndex}"
                        aria-describedby="helpId"
                        placeholder="5"
                        required
                      />
                    </div>
                  </div>
                  `;
    $("#experience").append(expHtml);
  });
});
