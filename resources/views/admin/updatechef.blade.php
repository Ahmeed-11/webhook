
<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">

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
    </style>
</head>

<body>

    <div class="container-scroller">

        @include('admin.navbar')


        <div class="content" style="width:100vw;">
            <form action="{{ url('/updatefoodchef',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label><br>
                    <input type="text" name="name" value="{{ $data->name }}" required><br><br>
                </div>
                <div>
                    <label>Speciality</label><br>
                    <input type="num" name="speciality" value="  {{ $data->speciality }}" required><br><br>
                </div>
                <div>
                    <label>Image</label><br>
                    <img src="/images/foodchefs/{{ $data->image }}" style="height: 100px">
                    <input type="file" name="image" style="color:white;"><br><br>
                </div>
                <div>
                    <br>
                    <input class="btn" type="submit" value="Save"><br><br><br><br><br>
                </div>
            </form>

        </div>


    </div>

    @include('admin.adminscript')
</body>

</html>
