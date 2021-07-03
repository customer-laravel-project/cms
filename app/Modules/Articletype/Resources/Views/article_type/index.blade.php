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
