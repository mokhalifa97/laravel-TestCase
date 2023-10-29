<!DOCTYPE html>
<html>
<head>
    <title>Import Export Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Import Export Your Excel Files</h4>
        </div>
        <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger" >{{session('error')}}</div>
        @endif

            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
            </form>
            

            <table class="table table-bordered mt-3">
                <form action="{{ route('users.export') }}" method="get" enctype="multipart/form-data">
                    @csrf
                <tr>
                    <th colspan="4">
                        List Of Users
                        <button type="submit" class="btn btn-danger float-end">Export User Data</button>
                    </th>
                </tr>

                @if ($users->count()>0)
                    
                <tr>
                    
                    <div class="form-group">
                        <th>ID <input type="checkbox" name="columns[]" value="id" class="float-end" checked></th>
                        <th>Name <input type="checkbox" name="columns[]" value="full_name" class="float-end" checked></th>
                        <th>Phone <input type="checkbox" name="columns[]" value="phone_number" class="float-end" checked></th>
                        <th>Email <input type="checkbox" name="columns[]" value="email" class="float-end" checked></th>
                    </div>
                    
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </form>
            @endif
            </table>

        </div>
    </div>
</div>

</body>
</html>