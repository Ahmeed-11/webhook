
<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    {{-- <style>
        .content {
            position: relative;
            top: 60px;
            right: -150px;

        }

        input {
            border-radius: 7px !important;
            height: 45px;
            width: 400px;
            color: black;
        }

        .btn {
            background-color: #0f1015;
            width: 67px;
            height: 37px
        }

        .btn:hover {
            background-color: black;
            transform: scale(1.14);
        }

        .New_Product {
            text-align: center;
            margin-bottom: 30px;
        }
        .Add_Product{
            width: 100vw;
        }
    </style> --}}
</head>

<body>

    <div class="container-scroller">

        @include('admin.navbar')

        <div class="content" style="position:relative;top:70px;right:-150px">
            <div style="position:relative;top:30px;right:-5px; ">
                <table class="table table-dark table-striped-columns" style="width:60%;">
                    <thead>
                        <tr align="center">
                            <th style="padding:30px" scope="col">#</th>
                            <th style="padding:30px" scope="col">Name</th>
                            <th style="padding:30px" scope="col">Email</th>
                            <th style="padding:30px" scope="col">Phone</th>
                            <th style="padding:30px" scope="col">Date</th>
                            <th style="padding:30px" scope="col">Time</th>
                            <th style="padding:30px" scope="col">Message</th>
                            <th style="padding:30px" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr align="center">
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->time }}</td>
                                <td>{{ $data->message }}</td>
                                <td>
                                    <a href="{{ url('/updateview', $data->id) }}" class="btn btn-primary"
                                        role="button">Edit</a>
                                    <a href="{{ url('/deletemenu', $data->id) }}" class="btn btn-danger"
                                        role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br><br><br><br><br>




            </div>

        </div>


    </div>

    @include('admin.adminscript')
</body>

</html>
