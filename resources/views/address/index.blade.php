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
                    <a class="navbar-brand" href="{{ URL::to('addresses') }}">Addresses</a>
                </div>
                <ul class="nav navbar-nav">
                   <li> <a class="btn btn-small btn-info" href="{{action('AddressController@create')}}">Create an address</a></li>
                </ul>
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
                @foreach($addresses as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->firstname }}</td>
                        <td>{{ $value->lastname }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->telephone }}</td>
                        <td>{{ $value->postcode }}</td>
                        <td>{{ $value->street }}</td>
                        <td>{{ $value->city }}</td>
                        <td>{{ $value->country }}</td>
                        <td>{{ $value->company }}</td>
                    </tr>
                        <td>
                            <a class="btn btn-small btn-info" href="{{URL::to('addresses/' . $value->id)}}">Show</a>
                        </td>
                        <td>
                            <a class="btn btn-small btn-info" href="{{action('AddressController@edit', ['id' => $value->id])}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-small btn-info" href="#">Delete</a>
                        </td>

                @endforeach
                </tbody>

            </table>

            {{ $addresses->links() }}
        </div>
    </body>
</html>
