/**
 * Created by Marko on 5.8.2017..
 */

var uri = $(location).prop('href').split('/')[3];

$(function () {
    loadResource(uri);
});

$("#submit_rating").on('click', function () {
    submitRating($('#visitor_id').val(), $('#rating').val())
});

function loadResource(uri) {
    $.ajax({
        url: "/api/uri/" + uri
    }).done(function (data) {
        if (!$.trim(data)) {
            alert("No URI found by given name");
            return;
        }

        $("#current_resource").html('').append("<h2>Resource: " + data.uri + "</h2><h2>Current rating: " + data.sum_ratings / data.sum_users + "</h2>")
    });
}

function submitRating(visitor_id, rating) {
    $.ajax({
        type: 'POST',
        url: "/api/rating",
        data: {
            "visitor_id": visitor_id,
            "rating": rating,
            "uri": uri
        }
    }).done(function (data) {
        loadResource(uri);
    }).fail(function (error){
        alert('Submission failed: ' + JSON.stringify(error));
    });
}