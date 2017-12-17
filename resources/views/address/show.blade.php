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
                margin: 0;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <h1>Laravel-wieg16</h1>


            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('addresses') }}">Addresses</a>->address
                </div>

            </nav>


            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Email</td>
                        <td>Telephone</td>
                        <td>Postcode</td>
                        <td>Street</td>
                        <td>City</td>
                        <td>Country</td>
                        <td>Company</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->firstname }}</td>
                        <td>{{ $address->lastname }}</td>
                        <td>{{ $address->email }}</td>
                        <td>{{ $address->telephone }}</td>
                        <td>{{ $address->postcode }}</td>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->country }}</td>
                        <td>{{ $address->company }}</td>
                    </tr>
                </tbody>


            </table>
            <a href="{{ URL::to('addresses') }}">Go back</a>
        </div>
    </body>
</html>
