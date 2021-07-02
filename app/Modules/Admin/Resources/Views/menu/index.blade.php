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
                    <th>name</th>
                    <th>icon</th>
                    <th>uri</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menu as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['icon']}}</td>
                    <td>{{$item['uri']}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
