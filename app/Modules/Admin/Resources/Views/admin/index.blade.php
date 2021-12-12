@extends('layouts.app_back')

@section('title', 'MenuManagement')



@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
{{--                <a href="{{ route('admin.role_add') }}" class="button">添加</a>--}}
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['email']}}</td>
                        <td><a href="{{route("admin.admin_edit",['id'=>$item['id']])}}">编辑</a>|<a href="{{route("admin.set_role",['id'=>$item['id']])}}">设置权限</a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="right">
                {{ $admin->links() }}
            </div>
        </div>
    </div>
@endsection
