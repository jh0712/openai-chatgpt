$(document).ready(function() {
    // Show/hide loading indicator
    function toggleLoadingIndicator(show) {
        if (show) {
            $("#loading-indicator").show();
        } else {
            $("#loading-indicator").hide();
        }
    }

    // Fade in/out response message
    function toggleResponseMessage(show) {
        if (show) {
            $("#result").fadeIn();
        } else {
            $("#result").fadeOut();
        }
    }

    // Submit user input to ChatGPT API
    $("#chat-form").submit(function(e) {
        e.preventDefault();
        toggleLoadingIndicator(true);
        toggleResponseMessage(false);

        var userInput = $("#user-input").val();
        if (!userInput) {
            alert('Please enter a text');
            return;
        }
        $('#loading').show();
        $.ajax({
            type: "POST",
            url: "chatGPT.php",
            data: {
                text: userInput
            },
            success: function(response) {
                console.log(response);
                $('#loading').hide();
                $("#result").text(response.text);
                toggleLoadingIndicator(false);
                toggleResponseMessage(true);
            }
        });
    });
});
