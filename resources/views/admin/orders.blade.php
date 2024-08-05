<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>

    <div class="container-scroller">

        @include('admin.navbar')


                <table class="table table-dark table-striped-columns" style="width:60%;">
                    <thead>
                        <tr align="center">
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Food Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr align="center">
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->foodname }}</td>
                                <td>{{ $data->price }}$</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->price * $data->quantity }}$</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br><br><br><br><br>

    </div>

    @include('admin.adminscript')
</body>

</html>
