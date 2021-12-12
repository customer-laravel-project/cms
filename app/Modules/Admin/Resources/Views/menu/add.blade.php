@extends('layouts.app_back')

@section('title', 'add menu')



@section('content')
    <div class="row">
        <div class="col-lg-12">
    <form action="{{Route("admin.menu_store")}}" method="post" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">parent</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('parent_id') is-invalid @enderror" type="text" name="parent_id"
                       placeholder="父级分类"  id="parent_id" value="{{ old('parent_id') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
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
            <label class="col-sm-2 col-form-label">icon</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('icon') is-invalid @enderror" type="text" name="icon"
                       placeholder="icon"  id="icon" value="{{ old('icon') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">order</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('order') is-invalid @enderror" type="number" name="order"
                       placeholder="order"  id="order" value="{{ old('order') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">uri</label>
            <div class="col-sm-10">
                <input class="form-control au-input au-input--full @error('uri') is-invalid @enderror" type="text" name="uri"
                       placeholder="uri"  id="uri" value="{{ old('uri') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="box-footer">
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
