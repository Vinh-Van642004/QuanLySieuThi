
<div class="container">
    <h2>Tăng số lượng sản phẩm: {{ $product->product_name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('product.increase.update', $product->product_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="quantity">Số lượng cần thêm:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật số lượng</button>
    </form>

    <p>Số lượng hiện tại: {{ $product->stock_quantity }}</p>
</div>

