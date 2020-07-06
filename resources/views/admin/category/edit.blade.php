@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Category',
            'action' => 'Edit'
        ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $category->name }}"
                                       placeholder="Nhập tên danh mục">
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
