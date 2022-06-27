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

        <h1>Edit {{ $company->name }}</h1>

        <p><img src="{{ url($company->logo ?? '') }}" alt="No Logo found" style="height: 100px; width: 100px;"></p>

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::model($company, array('route' => array('company.update', $company->id), 'files' => true ,'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('logo', 'Logo') }}
            {{ Form::file('logo') }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>