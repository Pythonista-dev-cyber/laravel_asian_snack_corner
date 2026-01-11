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
        <!-- Page Header -->
<div class="container-fluid py-3 bg-dark text-white shadow">
    <h3 class="text-center m-0">
        <i class="fa fa-tachometer-alt"></i> Admin Dashboard <span class="text-secondary">›</span> Edit Item
    </h3>
</div>

<!-- Breadcrumb & Back Button -->
<div class="container mt-4 d-flex align-items-center">
    <a class="btn btn-outline-primary me-2" href="{{ route('category.index') }}">
        <i class="fa fa-home"></i> Dashboard
    </a>
    <span class="text-muted">
        <i class="fa fa-chevron-right mx-2"></i> Edit
    </span>
</div>

<!-- Form Card -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0"><i class="fa fa-plus-circle"></i> Edit Item</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('items.update',$item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                         <div class="mb-3">
                            <select name="category" >
                                <label class="form-label fw-bold">Choose Category</label>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Item Name</label>
                            <input type="text" value="{{ $item->name }}" name="name" class="form-control" placeholder="Enter item name">
                        </div>

                        <div class="mb-3">
                        <ul>
                            <li>
                                <img src="{{ asset('images') }}/{{ $item->photo }}" alt="Error">
                            </li>
                            <li>
                                Current photo
                            </li>
                        </ul>
                        <input type="hidden" name="curr_photo" value="{{ $item->photo }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload Item Image</label>
                            <input type="file" name="edit_photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Item Price</label>
                            <input type="number" value="{{ $item->price }}" name="price" class="form-control" placeholder="Enter Item price">
                        </div>

                        <button class="btn btn-success w-100" type="submit">
                            <i class="fa fa-save me-2"></i> Save Item
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>
