<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="{{asset('js/resources.js')}}" async></script>
</head>
<body>

<div class="container">
    <br><br>

    <div>

        <div class="form-group">
            <label for="visitor_id">Visitor ID:</label>
            <input type="text" class="form-control" id="visitor_id">
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" class="form-control" id="rating" min="0" max="10" step="1">
        </div>

        <button id="submit_rating" type="submit" class="btn btn-block btn-primary">Submit rating</button>

    </div>

    <div id="current_resource"></div>

</div>


<script>

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
        });
    }
</script>


</body>
</html>
