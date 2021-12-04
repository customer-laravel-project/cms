@extends('layouts.app_back')

@section('title', 'MenuManagement33')


@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="table-responsive">
            <a href="{{ route('article.add') }}" class="button">添加</a>
            <table class="table table-borderless table-earning">
                <thead>
                <tr>
                    <th>名称</th>
                    <th>类型</th>
                    <th>作者</th>
                    <th>创建人</th>
                    <th>最后修改人</th>
                    <th>审核人</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($article as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['type_name']}}</td>
                    <td>{{$item['author']}}</td>
                    <td>{{$item['operator_name']}}</td>
                    <td>{{$item['last_operator_name']}}</td>
                    <td>{{$item['audit_name']}}</td>
                    <td>
                        @if($item['status']==1)未审核@endif
                        @if($item['status']==2)已审核@endif
                        @if($item['status']==3)已删除@endif
                    </td>
                    <td>{{$item['created_at']}}</td>
                    <td>
                        <a href="{{route('article_type.edit',['id'=>$item['id']])}}">编辑</a>
                        |<a href="#" data-toggle="modal" data-target="#contentmodal"
                            data-content="{{$item['content']}}">查看文章内容</a>
                        @if($item['status']==1)|<a class="button deltype" href="#"
                                                   data-del="{{route('article_type.del',['id'=>$item['id']])}}"
                                                   data-title="删除分类"
                                                   data-recover="{{route('article_type.recover',['id'=>$item['id']])}}"
                                                   data-toggle="modal" data-target="#delmodal"
                                                   id="a_id_{{$item['id']}}">删除</a>@endif
                        @if($item['status']==2)|<a class="button recovertype" href="#"
                                                   data-recover="{{route('article_type.recover',['id'=>$item['id']])}}"
                                                   data-title="恢复分类"
                                                   data-del="{{route('article_type.del',['id'=>$item['id']])}}"
                                                   data-toggle="modal" data-target="#recovermodal"
                                                   id="a_id_{{$item['id']}}">恢复</a>@endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="right">
            {{ $article->links() }}
        </div>
    </div>
</div>
@endsection




