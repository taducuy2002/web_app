@if(!empty($breadcrumbs))
<nav aria-label="breadcrumb">
    <ol>
        @foreach($breadcrumbs as $crumb)
            @if(isset($crumb['url']))
                <li><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
            @else
                <li aria-current="page">{{ $crumb['label'] }}</li>
            @endif
        @endforeach
    </ol>
@endif



