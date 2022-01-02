<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body {
            page-break-after: avoid;
            page-break-inside: avoid;
            page-break-before: avoid;
        }

        @page {
          /*  size: 27cm 19.7cm;*/
        }

        @font-face {
            font-family: liveFont;
            src: url({{asset('assets/fonts/Pacifico/Pacifico-Regular.ttf')}});
        }

        @font-face {
            font-family: secular;
            src: url({{asset('assets/fonts/Secular_One/SecularOne-Regular.ttf')}});
        }

        div.ticketBox {
            width: 600px;
            height: 200px !important;
            border: 15px solid #000000;
            padding: 50px;
            background-image: url("{{asset('assets/dark-surburb.jpeg')}}");
           /* background-size: 100%;*/
            background-size: 100%;
            background-repeat: no-repeat !important;
            background-color: #000000;
            color: white;
        }


        .column {
            float: left;
            text-align: center;
        }

        .left {
            width: 70%;
        }

        .right {
            width: 30%;
        }

        .pt-20 {
            padding-top: 200px
        }

        .event-title {
            padding-top: 70px;
            height: 100%;
            font-size: 1.2em;
            font-family: liveFont;
        }

        .row1 {
            height: 100px;
        }

        .row2 {
            height: 50px;
        }

        .secular {
            font-family: secular;
        }
    </style>
</head>
<body>

<div class="ticketBox">
    <div class="row1">
        <div class="column left event-title">
              <span class="pt-20">
                 <h1>
                     LIVE
                 </h1>
             </span>
        </div>
        <div class="column right">
            <img src="{{$qr_code}}" alt="truck icon" width="120">
        </div>
    </div>
    <div class="row2">
        <div class="column left">
            <table style="width: 100%" class="secular">
                <tr>
                    <td>
                        <img src="{{asset('assets/gps-device.png')}}" alt="truck icon" width="100" height="32"
                             style="width:30%">
                    </td>
                    <td>
                        <img src="{{asset('assets/date-to-xxl.png')}}" alt="affirm icon" width="100" height="31"
                             style="width:30%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        AREA BAR
                    </td>
                    <td>
                        8th January, 7PM
                    </td>
                </tr>
            </table>
        </div>
        <div class="column right">
            <img src="{{$bar_code}}" alt="truck icon" width="120">
        </div>
    </div>

</div>

</body>
</html>
