<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        // Lấy danh sách sản phẩm có phân trang và kèm theo danh mục
        $query = Product::with('category');
        if($request->filled('ma_san_pham')) {
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }
        if($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }
        // Tương tự thực hiện tim kiếm sản phẩm theo:
        // Tên sản phẩm, Danh mục, Khoảng giá, Ngày nhập, Trạng thái
        $products = $query->paginate(10);
        // Trả về view admin.products.index và truyền biến $products
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        // Lấy ra dữ liệu chi tiết theo id
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));

        // Đổ dữ liệu thông tin chi tiết ra giao diện
    }

        // Xây dựng master layout trang quản trị
        // Tạo trang để quản lí thông tin sản phẩm
        // Thực hiện hiển thị danh sách sản phẩm bảng (có phần tranh)
}
