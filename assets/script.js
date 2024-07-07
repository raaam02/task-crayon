$(document).ready(() => {
  let namePattern = /^[a-zA-Z\s]+$/;
  let mobileNumPattern = /^\d{10}$/;
  // Check Number Exists or not
  $("#mobile").on("blur", function () {
    var phone = $(this).val();
    if (mobileNumPattern.test(phone)) {
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
      $("#numberError").show().text("Number should be 10 digit and 0-9 only");
    }
  });
  $("#userForm").on("submit", function (e) {
    if ($("#numberError").is(":visible")) {
      e.preventDefault();
      alert("Please enter a unique phone number.");
    }
  });

  // Check name string
  $("#name").on("blur", function () {
    let element = $(this);
    let nameValue = element.val();

    if (!namePattern.test(nameValue)) {
      element.next("#nameError").show();
    } else {
      element.next("#nameError").hide();
    }
  });

  // Check Month is less than 12
  $(document).on("blur", ".months", function () {
    let element = $(this);
    let monthValue = parseInt(element.val());

    if (monthValue > 12 || monthValue < 0) {
      element.next(".monthError").show();
    } else {
      element.next(".monthError").hide();
    }
  });
  // Check Company name
  $(document).on("blur", ".company", function () {
    let element = $(this);
    let companyValue = element.val();

    if (!namePattern.test(companyValue)) {
      element.next(".companyError").show();
    } else {
      element.next(".companyError").hide();
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
                        class="form-control shadow-none months"
                        name="experience[${expIndex}][months]"
                        id="months${expIndex}"
                        aria-describedby="helpId"
                        placeholder="5"
                        required
                      />
                      <span
                        id=""
                        class="form-text text-danger monthError"
                        style="display: none"
                      >Enter months between 1-12 only</span>
                    </div>
                  </div>
                  `;
    $("#experience").append(expHtml);
  });
});
