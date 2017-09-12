@if($type == 1)

    @include('barNav.nav1')

@elseif($type == 2)

    @include('barNav.nav2')

@elseif($type == 3)

    @include('barNav.nav3')

@endif
@include('partial.messagesSystem')
