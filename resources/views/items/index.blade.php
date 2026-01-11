<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-7.1.0-web/css/all.min.css') }}">
</head>
<body>
    <div class="container text-center bg-secondary text-white my-4" style="height:50px;">
        Admin dashboard x Items
    </div>


    <div class="container my-4">
        <a class="btn btn-primary" href="{{route('items.create')}}">
            <i class="fa fa-plus">
            </i>
            Create
        </a>
    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-lg-6">
                {{ $items->links() }}
            </div>

            <div class="col-lg-6">
                <form action="{{ route('items.search') }}" method="get">
                    <input type="text" name="search_term" placeholder="search here">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>



    <div class="container my-4">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Category</td>
                <td>Name</td>
                <td>Price</td>
                <td>Photo</td>
                <td>Actions</td>
            </tr>

            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <img style="width:200px;height:auto;" src="{{ asset('images') }}/{{ $item->photo }}" alt="error">
                    </td>
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}" >
                            <i class="fa fa-pencil"></i>
                        </a>

                        <form action="{{ route('items.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
