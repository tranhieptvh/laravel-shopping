@extends('layouts.admin')

@section('title')
    <title>Danh sách slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/list.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Slider',
            'action' => 'List'
        ])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $sliderItem)

                                <tr>
                                    <th scope="row">{{ $sliderItem->id }}</th>
                                    <td>{{ $sliderItem->name }}</td>
                                    <td>{{ $sliderItem->description }}</td>
                                    <td>
                                        <img src="{{ $sliderItem->image_path }}"
                                             class="slider_image"
                                             alt="">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('sliders.edit', $sliderItem->id) }}"
                                           class="btn btn-warning">Edit</a>

                                        <form action="{{ route('sliders.destroy', $sliderItem->id) }}" method="POST">
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
                        {{ $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
