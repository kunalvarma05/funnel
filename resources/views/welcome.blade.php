<!DOCTYPE html>
<html>
    <head>
        <title>Funnel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }
            a{
                background: #333;
                color: #fff;
                text-decoration: none;
                padding: 8px 20px;
                border-radius: 4px;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">FUNNEL</div>
                <div class="quote">WORLD, HOLD ON!</div>
                <p>
                    <a href="{{route('auth.connect')}}">Connect with Facebook</a>
                </p>
            </div>
        </div>
    </body>
</html>
