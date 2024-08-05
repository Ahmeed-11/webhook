<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
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

        .Add_Product {
            width: 100vw;
        }
    </style>
</head>

<body>

    <div class="container-scroller">

        @include('admin.navbar')

        <div class="content" style="width:100vw;">
            <div style="width:100vw;">
                <table class="table table-dark table-striped-columns" style="width:60%;">
                    <thead>
                        <tr align="center">
                            <th style="padding:30px" scope="col">#</th>
                            <th style="padding:30px" scope="col">Chef Name</th>
                            <th style="padding:30px" scope="col">Speciality</th>
                            <th style="padding:30px" scope="col">Image</th>
                            <th style="padding:30px" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr align="center">
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->speciality }}</td>
                                <td><img src="/images/foodchefs/{{ $data->image }}" style="max-height: 30px;"></td>
                                <td>
                                    <a href="{{ url('/updatechef', $data->id) }}" class="btn btn-primary"
                                        role="button">Edit</a>
                                    <a href="{{ url('/deletechef', $data->id) }}" class="btn btn-danger"
                                        role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br><br><br><br><br>


                <hr>
                <div class="Add_Product">
                    <label class="New_Product">
                        <h3>Add New Chef</h3>
                    </label>
                    <form action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label>Name</label><br>
                            <input type="text" name="name" placeholder="Name" required><br><br>
                        </div>
                        <div>
                            <label>Speciality</label><br>
                            <input type="num" name="speciality" placeholder="  Speciality" required><br><br>
                        </div>
                        <div>
                            <label>Image</label><br>
                            <input type="file" name="image" style="color:white;"><br><br>
                        </div>
                        <div>
                            <br>
                            <input class="btn" type="submit" value="Save"><br><br><br><br><br>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>

    @include('admin.adminscript')
</body>

</html>
