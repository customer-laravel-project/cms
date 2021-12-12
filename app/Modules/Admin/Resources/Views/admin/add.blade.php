@extends('layouts.app_back')

@section('title', 'add menu')



@section('content')
    <div class="row">
        <div class="col-lg-12">
    <form action="{{Route("admin.role_store")}}" method="post" class="form-horizontal">
        @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">名称</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('name') is-invalid @enderror" type="text" name="name"
                       placeholder="menu名称"  id="name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">slug</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('slug') is-invalid @enderror" type="text" name="slug"
                       placeholder="slug"  id="slug" value="{{ old('slug') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="btn-group pull-left">
                    <button type="reset" class="btn btn-warning pull-right">Reset</button>
                </div>

                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
@endsection