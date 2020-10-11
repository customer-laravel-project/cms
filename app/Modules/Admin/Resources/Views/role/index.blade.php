@extends('layouts.app_back')

@section('title', 'MenuManagement')



@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <a href="{{ route('admin.role_add') }}" class="button">添加</a>
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>slug</th>
                        <th>menu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($role as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['slug']}}</td>
                        <td>
                            @foreach($item['menu'] as $m)
                                {{$m['name']}},
                                @endforeach
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection