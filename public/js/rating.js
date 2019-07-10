$(function () {
    $('#upVote').on('click', function () {
        var rating =1;
        var news= $(this).val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/user/api/rating",
            data: {'rating_val': rating,'news_val':news},
            cache: false,
            success: function (data) {
                console.log(data);
            }
        });
    })
});
$(function () {
    $('#downVote').on('click', function () {
        var rating=$(this).val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/user/api/rating",
            data: {'rating_val': rating},
            cache: false,
            success: function (data) {
                console.log(data);
            }
        });
    })
})