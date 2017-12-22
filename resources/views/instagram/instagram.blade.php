<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
    <img src="https://www.instagram.com/p/BLTjMU_je4TulfMH07dhCkPijTwM5FZtdahoUQ0/" alt="Smiley face" height="42" width="42">
    <div class="container">
                @foreach($links as $key => $value)

                    <div class="row text-center text-lg-left">

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <a href="#" class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="https://www.instagram.com/p/BLTjMU_je4TulfMH07dhCkPijTwM5FZtdahoUQ0/" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>



    </body>
</html>
