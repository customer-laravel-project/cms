       @if (!empty($menus))
           
       @foreach ($menus as $key=>$item)
            @if (!isset($item['children']))
                <li>
                <a class="js-arrow" href="{{$item['url']}}">
                <i class="fas fa-tachometer-alt"></i>{{ $item['title'] }}</a>
                </li>
            @else
            <li>
                    <a class="js-arrow" href="{{$item['url']}}">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                            @foreach($item['children'] as $item)
                                                @include('partials.menu', $item)
                                            @endforeach
                                        </ul>
                    </li>
            @endif
        @endforeach
        @endif

