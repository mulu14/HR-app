$(function() {
    $("#filterId").change(function() {
        var $value = $(this).val();
        var url = "/employees/filter";
        $.cookie("filter", $value, { expires: 1 });
        $.ajax({
            type: "GET",
            url: url,
            data: $value,
            success: function(data) {
                console.log("success");
            },
            error: function(data) {
                console.log("error");
            }
        });
        return false;
    });
});
