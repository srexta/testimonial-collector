jQuery(document).ready(function ($) {

    $('#tc-data-collector').on("submit", function (event) {
        event.preventDefault();

        var form = $(this);
        console.log(rest_array.rest_url)
        $.ajax(
            {
                type: "POST",
                url: rest_array.rest_url,
                data: form.serialize()
            }
        );
    });

});
