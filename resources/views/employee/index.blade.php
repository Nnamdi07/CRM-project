<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('company') }}">Companies</a>
                <a class="navbar-brand" href="{{ URL::to('employee') }}">Employees</a>
            </div>
        </nav>

        <a class="btn btn-small btn-success" href="{{ URL::to('employee/create') }}">Create Employee</a><br />
        <h1>Employees List</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Company</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $key => $value)
                <tr>
                    <td>{{ $value-> id }}</td>
                    <td>{{ $value-> first_name }}</td>
                    <td>{{ $value-> last_name }}</td>
                    <td>{{ $value-> company -> name }}</td>
                    <td>{{ $value-> phone }}</td>
                    <td>{{ $value-> email }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the employee (uses the destroy method DESTROY /employee/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'employee/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}

                        <!-- show the employee (uses the show method found at GET /employee/{id} -->
                        <a class="btn btn-small btn-primary" href="{{ URL::to('employee/' . $value->id) }}">View</a>

                        <!-- edit this employee (uses the edit method found at GET /employee/{id}/edit -->
                        <a class="btn btn-small btn-primary" href="{{ URL::to('employee/' . $value->id . '/edit') }}">Edit</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>