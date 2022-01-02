<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            text-align: center;
            background-image: url({{asset('assets/dark-surburb.jpeg')}});
            background-repeat: no-repeat;
            background-size: 100%;
            color: white;
        }

        .ticket{
            width: 100%;
            height: 100%;
            display: inline-block;
            padding: 20px;
            clear: both;
        }
        .first-half,.second-half{
            display: inline-block;
        }
        .first-half{
            margin-top: 40mm;
            width: 50%;
            height: 100%;
            float: left;
        }
        .first-half > .header{
            text-align: center;
            font-size: 50px;
            font-style:oblique;
        }
        .location-and-date-wrapper{
            width: 100%;
            display: inline-block;
        }
        .location,.date{
            width: 50%;
            display: inline-block;
        }
        .location{
            float: left;
        }
        .location-and-date-wrapper  img{
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .location-and-date-wrapper  h3{
            text-align: center;
            font-size: 15px;
        }
        .second-half{
            margin-top: -10mm;
            width: 30%;
            height: 100%;
            float: right;
        }
        .barcode{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div class="ticket">
    <div class="first-half">
        <h3 class="header" style="text-align: center;margin-bottom: 5mm;font-style: oblique;font-size: 15mm">LIVE</h3>
        <div class="location-and-date-wrapper">
            <div class="location">
                <img src="{{asset('assets/gps-device.png')}}" alt="truck icon" style="max-width: 10mm; max-height: 20mm;">
                <h3 style="text-align: center"> Adenta, East-Legon Branch</h3>
            </div>
            <div class="date">
                <img src="{{asset('assets/date-to-xxl.png')}}" alt="affirm icon" style="max-width: 10mm; max-height: 20mm;">
                <h3 style="text-align: center">8th January, 7PM</h3>
            </div>
        </div>

    </div>
    <div class="second-half">
        <img src="{{$qr_code}}" alt=""/>
        <img class="barcode" src="{{$bar_code}}"  alt="" style="margin-top: 5mm"/>
    </div>
</div>
</body>
</html>
