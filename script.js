$(document).ready(function() {
    $("#profile").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var fullNameInput = $("#fullName");
        var fullNamePattern = /^[A-Za-z,. ]+$/;
        if (!fullNamePattern.test(fullNameInput.val())) {
            fullNameInput.next(".validation-error").show();
            return; 
        } else {
            fullNameInput.next(".validation-error").hide();
        }

        $.ajax({
            type: "POST",
            url: "submit.php",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    $("#message").text("Form submitted successfully!");
                } else {
                    $("#message").text("Error: " + response.message);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                $("#message").text("Error: " + errorThrown);
            }
        });
    });

    $("#dateOfBirth").change(function() {
        var dob = new Date($(this).val());
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
            age--;
        }
        $("#age").val(age);
    });
});
