<!doctype html>
<html lang="en">

<head>
    <title>Manage users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
    div form {
        display: inline;

    }

    .update {
        display: none;

    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 10px;
    }

    table {
        border-spacing: 5px;
        width: 100%;
    }
    </style>
</head>

<body style="height: 100%; width: 50%; margin: auto; text-align: center;">

    <br><br>
    <h1 style="text-align: center;">Manage Users</h1>
    <div class="row">
        <table>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->role}}</td>
                <td style="width:100px;">
                    <form action="/admin/users/{{$user->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-primary">Delete</button>
                    </form>
                </td>

                <td style=" width:100px;">
                    <form action="/admin/users/{{$user->id}}/edit" method="GET">
                        @csrf
                        <button class="btn btn-primary">Edit</button>
                    </form>
                </td>
           
            </tr>
        
        @endforeach
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>