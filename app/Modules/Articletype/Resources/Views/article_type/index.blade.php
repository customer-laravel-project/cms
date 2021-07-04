@extends('layouts.app_back')

@section('title', 'MenuManagement33')


@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-30">
            <a href="{{ route('admin.menu_add') }}" class="button">添加</a>
            <table class="table table-borderless table-striped table-earning">
                <thead>
                <tr>
                    <th>名称</th>
                    <th>缩写</th>
                    <th>序号</th>
                    <th>创建人</th>
                    <th>最后修改人</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($type as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['abbr']}}</td>
                    <td>{{$item['sorts']}}</td>
                    <td>{{$item['operator_name']}}</td>
                    <td>{{$item['last_operator_name']}}</td>
                    <td>
                        @if($item['status']==1)正常@endif
                        @if($item['status']==2)已删除@endif
                    </td>
                    <td>
                        <a href="{{route('article_type.edit',['id'=>$item['id']])}}">编辑</a>
                        @if($item['status']==1)|<a class="button deltype" href="#"
                                                   data-url="{{route('article_type.del',['id'=>$item['id']])}}"
                                                   data-title="删除分类">删除</a>@endif
                        @if($item['status']==2)|<a class="button" href="#" data-toggle="modal"
                                                   data-target="#recovermodal" data-id="{{$item['id']}}">恢复</a>@endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="right">
            {{ $type->links() }}
        </div>
    </div>
</div>
@endsection




