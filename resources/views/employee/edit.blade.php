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

        <h1>Edit {{ $employee->first_name .' '. $employee->last_name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('company_id', 'Company') }}
            {!! Form::select('company_id', $company, $employee->company_id, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>


        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>