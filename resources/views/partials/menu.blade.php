@if (!isset($item['children']))
<li>
    @php
        $flag="false";
        $uri = app('request')->server('REQUEST_URI');
        if($uri == $item['uri']){
            $flag="true";
        }
    @endphp
    <a href="{{$item['uri']}}">
        {{$item['name']}}</a>

</li>
@else
<li>
    <a class="js-arrow" href="{{$item['uri']}}">
        {{$item['name']}}</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        @foreach($item['children'] as $item)
        @include('partials.menu', $item)
        @endforeach
    </ul>
</li>
@endif


