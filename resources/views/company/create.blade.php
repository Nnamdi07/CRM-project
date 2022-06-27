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

        <h1>Create Company</h1>

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{Form::open(array('url' => 'company', 'files' => true))}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website','' , array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('logo', 'Logo') }}
            {{ Form::file('logo') }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', '', array('class' => 'form-control')) }}
        </div>


        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>