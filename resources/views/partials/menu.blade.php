@if (!isset($item['children']))
<li>
    <a class="js-arrow" href="{{$item['uri']}}">
        <i class="fas fa-tachometer-alt"></i>{{$item['name']}}</a>

</li>
@else
<li>
    <a class="js-arrow" href="{{$item['uri']}}">
        <i class="fas fa-tachometer-alt"></i>{{$item['name']}}</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        @foreach($item['children'] as $item)
        @include('partials.menu', $item)
        @endforeach
    </ul>
</li>
@endif

