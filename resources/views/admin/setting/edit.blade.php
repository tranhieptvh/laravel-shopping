@extends('layouts.admin')

@section('title')
    <title>Sửa setting</title>
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Setting',
            'action' => 'Edit'
        ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       class="form-control"
                                       name="config_key"
                                       value="{{ $setting->config_key }}">
                            </div>

                            <div class="form-group">
                                <label>Config value</label>
                                <textarea class="form-control"
                                          name="config_value"
                                          cols="30" rows="5"
                                          placeholder="Nhập config value">{{ $setting->config_value }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
