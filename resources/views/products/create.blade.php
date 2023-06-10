<!-- resources/views/products/create.blade.php -->

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Tên điện thoại:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="image">Ảnh:</label>
        <input type="file" name="image" id="image">
    </div>
    <div>
        <label for="price">Giá:</label>
        <input type="number" name="price" id="price">
    </div>
    <div>
        <label for="brand">Hãng:</label>
        <input type="text" name="brand" id="brand">
    </div>
    <div>
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <button type="submit">Thêm sản phẩm</button>
</form>
