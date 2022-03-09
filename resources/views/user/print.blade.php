<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>

    <link rel="stylesheet" href="/css/print.css">
    <style>
        .certi{
            font-size: 35px;
            text-transform: uppercase;
            margin-bottom: 0px;
        }

        .name{
            font-size: 40px;
            text-transform: uppercase;
            color: #03045e;
        }

        .cname{
            font-size: 35px;
            text-transform: uppercase;
        }

        .certi2{
            margin-top: 0;
            text-transform: uppercase;
            font-size: 20px;
        }

        .text{
            font-size: 25px;
            margin-bottom: 5px;
        }
        .border{
            margin: 20px;
            border: 4px solid #03045e;
            height: 470px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="border">
        <h2 class="certi">certificate</h2>
        <p class="certi2">of compliation</p>

        <p class="text">This certificate has been awarded to</p>
        <h2 class="name">{{$enroll->student->name}}</h2>

        <p class="text">For successful compliation of this course</p>

        <h1 class="cname">{{$enroll->course->title}}</h1>

        <h4>{{$setting->title}}</h4>
    </div>
</body>
</html>