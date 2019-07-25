<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>scoding 1</title>
    <link href="{{url("css/app.css")}}" rel="stylesheet">
    <script type="text/javascript" src="{{url("js/app.js")}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            font-family: 'Nunito', sans-serif;
            font-weight: 500;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body class="bg-light">
<div class="container p-4">

    <form class="row" method="POST" action="{{route('tasks.update', $task->id)}}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="col-8 py-2">
            <input class="w-100 input-group-text" name="task" value="{{$task->task}}"/>
        </div>
        <div class="col-4 py-2">
            <input class="w-100 btn btn-success" type="submit" value="Change"/>
        </div>
    </form>

</div>
</body>
</html>
