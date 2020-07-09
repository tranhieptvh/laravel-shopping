@extends('layouts.admin')

@section('title')
    <title>Thêm setting</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/create/create.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Setting',
            'action' => 'Add'
        ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       class="form-control @error('config_key') is-invalid @enderror"
                                       name="config_key"
                                       placeholder="Nhập config key">
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Config value</label>
                                <textarea class="form-control @error('config_value') is-invalid @enderror"
                                          name="config_value"
                                          cols="30" rows="5"
                                          placeholder="Nhập config value"></textarea>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
