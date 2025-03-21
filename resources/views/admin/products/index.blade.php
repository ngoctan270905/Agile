@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Danh sách sản phẩm</h2>
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm sản phẩm</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.products.index') }}">
                <div class="row g-3">
                    <!-- Mã sản phẩm -->
                    <div class="col-md-3">
                        <label class="form-label">Mã sản phẩm</label>
                        <input type="text" name="ma_san_pham" class="form-control" placeholder="Nhập mã sản phẩm"
                            value="{{ request('ma_san_pham') }}">
                    </div>

                    <!-- Tên sản phẩm -->
                <div class="col-md-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm"
                        value="{{ request('ten_san_pham') }}">
                </div>
                    
                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100 ms-1">
                            <i class="fas fa-sync"></i> Làm mới
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Giá Khuyến Mãi</th>
                <th>Số Lượng</th>
                <th>Ngày Nhập</th>
                <th>Hình Ảnh</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ma_san_pham }}</td>
                <td>{{ $product->ten_san_pham }}</td>
                <td>{{ number_format($product->gia, 0, ',', '.') }} VND</td>
                <td>{{ $product->gia_khuyen_mai ? number_format($product->gia_khuyen_mai, 0, ',', '.') . ' VND' : 'Không' }}</td>
                <td>{{ $product->so_luong }}</td>
                <td>{{ $product->ngay_nhap }}</td>
                <td>
                    <img src="{{ asset('storage/app/public' . $product->hinh_anh) }}" alt="Hình ảnh" width="80">
                </td>
                <td>
                  @if ($product->so_luong > 0)
                      <span class="badge bg-success">Còn hàng</span>
                  @else
                      <span class="badge bg-danger">Hết hàng</span>
                  @endif
              </td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="#" class="btn btn-primary btn-sm">Sửa</a>
                    <a href="#" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3"> 
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
