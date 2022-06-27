<!DOCTYPE html>
<html>

<head>
    <title>Company</title>
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

        <h1>{{ $company->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $company->name }}</h2>
            <p><img src="{{ url($company->logo ?? '') }}" alt="No Logo found" style="height: 50px; width: 100px;"></p>
            <p>
                <strong>Name:</strong> {{ $company->name }}<br>
                <strong>Website:</strong> {{ $company->website }}<br>
                <strong>Email:</strong> {{ $company->email }}
            </p>
        </div>

    </div>
</body>

</html>