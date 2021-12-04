@extends('layouts.app_back')

@section('content')
<div class="rows">
    <form action="{{route('article.create')}}" method="post" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="name" class=" form-control-label">名称</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" name="name" placeholder="输入标题"
                       class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                <span class="help-block">Please enter article title</span>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="article_type" class=" form-control-label">分类</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="article_type" id="article_type"
                        class="form-control @error('article_type') is-invalid @enderror">
                    <option value="">请选择</option>
                    @foreach($types as $item)
                    <option value="{{$item['id']}}"
                            @if(old(
                    'article_type')==$item['id']) selected @endif>{{$item['name']}}</option>
                    @endforeach
                </select>
                <span class="help-block">Please select article type</span>
                @error('article_type')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="author" class=" form-control-label">作者</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="author" name="author" placeholder="输入作者"
                       class="form-control" value=" {{ old('author') }}">
                <span class=" help-block">Please enter article author</span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="content" class=" form-control-label">内容</label>
            </div>
            <div class="col-12 col-md-9">
                <textarea name="content" id="summernote" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')
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
<link href="/summernote/summernote-bs4.min.css" rel="stylesheet">
<script src="/summernote/summernote-bs4.min.js"></script>
<script src="/js/summernote.js"></script>
@endsection
