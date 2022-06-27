<!DOCTYPE html>
<html>

<head>
    <title>Companies</title>
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
        <a class="btn btn-small btn-success" href="{{ URL::to('company/create') }}">Create Company</a><br />
        <h1>Companies List</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Website</td>
                    <td>Logo</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($company as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name  }}</td>
                    <td>{{ $value->website ?? '' }}</td>
                    <td><img src="{{ url($value->logo ?? '') }}" alt="No Logo found" style="height: 50px; width: 100px;"></td>
                    <td>{{ $value->email ?? '' }}</td>

                    <!-- view, edit, and delete buttons -->
                    <td>

                        <!-- delete the company (uses the destroy method DESTROY /company/{id} -->
                        {{ Form::open(array('url' => 'company/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}

                        <!-- show the company (uses the show method found at GET /company/{id} -->
                        <a class="btn btn-small btn-primary" href="{{ URL::to('company/' . $value->id) }}">View</a>




                        <!-- edit this company (uses the edit method found at GET /company/{id}/edit -->
                        <a class="btn btn-small btn-primary" href="{{ URL::to('company/' . $value->id . '/edit') }}">Edit</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $company->links() !!}
        </div>

    </div>
</body>

</html>