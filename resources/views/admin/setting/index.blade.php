@extends('layouts.admin')

@section('title')
    <title>Danh sách setting</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/index/list.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Setting',
            'action' => 'List'
        ])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <a href="{{ route('settings.create') }}" class="btn btn-success float-right m-2">Add</a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($settings as $settingItem)

                                <tr>
                                    <th scope="row">{{ $settingItem->id }}</th>
                                    <td>{{ $settingItem->config_key }}</td>
                                    <td>{{ $settingItem->config_value }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('settings.edit', $settingItem->id) }}"
                                           class="btn btn-warning">Edit</a>

                                        <form action="{{ route('settings.destroy', $settingItem->id) }}" method="POST">
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
                        {{ $settings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
