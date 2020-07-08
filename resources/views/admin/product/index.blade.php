@extends('layouts.admin')

@section('title')
    <title>Danh sách sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('js')
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Product',
            'action' => 'List'
        ])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá (VNĐ)</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)

                                <tr>
                                    <th scope="row">{{ $productItem->id }}</th>
                                    <td>{{ $productItem->name }}</td>
                                    <td>{{ number_format($productItem->price) }}</td>
                                    <td>
                                        <img src="{{ $productItem->feature_image_path }}"
                                             class="product_feature_image"
                                             alt="">
                                    </td>
                                    {{--optional() ->return null neu khong co object category (vd: category bi xoa)--}}
                                    <td>{{ optional($productItem->category)->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('products.edit', $productItem->id) }}"
                                           class="btn btn-warning">Edit</a>

                                        <form action="{{ route('products.destroy', $productItem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Xác nhận xóa?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
