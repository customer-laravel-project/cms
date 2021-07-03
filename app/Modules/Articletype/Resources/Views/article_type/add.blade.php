@extends('layouts.app_back')

@section('title', 'MenuManagement33')


@section('content')
<div class="rows">
    <form action="{{route('article.create')}}" method="post" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="name" class=" form-control-label">分类名称</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" name="name" placeholder="输入分类名称"
                       class="form-control @error('name') is-invalid @enderror">
                <span class="help-block">Please enter article type name</span>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="abbr" class=" form-control-label">缩写</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="abbr" name="abbr" placeholder="输入缩写"
                       class="form-control @error('abbr') is-invalid @enderror">
                <span class="help-block">Please enter article type  abbr</span>
                @error('abbr')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="sorts" class=" form-control-label">序号</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="number" id="sorts" name="sorts" placeholder="输入序号"
                       class="form-control @error('sorts') is-invalid @enderror" value="0">
                <span class="help-block">Please enter article type  sort</span>
                @error('sorts')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
</div>

@endsection
