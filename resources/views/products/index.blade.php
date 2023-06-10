<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS của Bootstrap 4 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- JavaScript của Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <h2>Danh sách sản phẩm</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
        <div class="col">
            <div class="card">
                @if ($product->image)
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Chỉnh sửa</a>
                        </div>
                        <span class="badge bg-primary">{{ $product->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>

