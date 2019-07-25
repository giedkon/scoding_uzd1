<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>scoding 1</title>
    <link href="css/app.css" rel="stylesheet">
    <script type="text/javascript" src="js/app.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
            margin: 0;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body class="bg-light">
<div class="container p-4">

    <div class="row">
        <div class="col-12">
            <button id="create_task_button" class="w-100 btn btn-primary">Create new task</button>
        </div>
    </div>
    <div id="create_task" class="hidden">
        <form method="POST" class="row" action="{{route('tasks.store')}}">
            {{ csrf_field() }}
            <div class="col-8 py-2">
                <input type="text" name="task" class="input-group-text w-100" placeholder="text">
            </div>
            <div class="col-4 py-2">
                <input class="w-100 btn btn-success" type="submit" value="Add"/>
            </div>
        </form>
    </div>
    <table class="table table-borderless table-responsive-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Created</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->task}}</td>
                <td>{{$task->created_at}}</td>

                <td class="text-right">
                    <a class="btn btn-info" href="{{route('tasks.edit', $task->id)}}">Edit</a>
                </td>

                <td class="text-right">
                    <form method="POST" action="{{route('tasks.destroy', $task->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input class="w-100 btn btn-danger delete_task" type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        // Patvirtinimo lentelė
        $('.delete_task').click(function (e) {
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });

        // Paslėpiamas create_task div'as
        $('#create_task').slideUp();

        // Paspausdus Create New Task parodoma formą
        $('#create_task_button').click(function (e) {
            $('#create_task').slideDown(500);
        });
    </script>

</div>
</body>
</html>
