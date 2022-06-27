<!DOCTYPE html>
<html>

<head>
    <title>Employee</title>
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

        <h3>{{ $employee->first_name .' '. $employee->last_name }}</h3>

        <div class="jumbotron text-center">
            <h2>{{ $employee->first_name .' '. $employee->last_name }}</h2>
            <p>
                <strong>First Name:</strong> {{ $employee->first_name }}<br>
                <strong>Last Name:</strong> {{ $employee->last_name }}<br>
                <strong>Company:</strong> {{ $employee->company->name }}<br>
                <strong>Phone:</strong> {{ $employee->phone }}<br>
                <strong>Email:</strong> {{ $employee->email }}
            </p>
        </div>

    </div>
</body>

</html>