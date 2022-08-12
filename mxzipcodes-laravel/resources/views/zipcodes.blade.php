<!DOCTYPE html>
<html>
<head>
    <title>MX Zip Codes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
           MX Zipcodes - Import Excel to Database
        </div>
        <div class="card-body">
            <form action="{{ route('zipcodes.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import zipcodes Data</button>
            </form>

            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">

                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                @foreach($zipcodes as $zipcode)
                <tr>
                    <td>{{ $zipcode->id }}</td>
                    <td>{{ $zipcode->zipcode }}</td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

</body>
</html>
