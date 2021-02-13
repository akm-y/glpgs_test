<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>郵便番号検索</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="antialiased">
        <div class="contents">
            <h1>住所検索くん</h1>
            <form action="/search" method="GET" class="form">
                <div class="form-group row">
                    <div class="col-md-9 col-sm-12">
                        <input type="text" value='{{ !empty(session("zip")) ? session("zip") :  "" }}' class="input_box form-control" name="zip" placeholder="郵便番号（ハイフンなし、半角数字7桁）" >
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <input type="submit" value="住所検索" class="btn btn-info">
                    </div>
                </div>
            </form>
            <div class="form-group row">
                <div class="col-md-12 col-sm-12">
                    @if ( !empty($addresses) && ( count( $addresses ) > 0 ) )
                        <div class="text-left">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>郵便番号</th>
                                    <th>住所</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($addresses as $address)
                                <tr class="active">
                                    <td>{{ $address->zipcode }}</td>
                                    <td>{{ $address->address1 }}{{ $address->address2 }}{{ $address->address3 }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script><!-- Scripts（Jquery） -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Scripts（bootstrapのjavascript） -->
    </body>
</html>
