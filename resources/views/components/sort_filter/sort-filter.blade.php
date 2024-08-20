<!-- reviews filter/sort: start -->
@forelse ($method as $key=>$label)
    @php
        $current = \Request::input($feature);
        $routeVariable = $hostName == null ? [$feature => $key] : [$hostName => $hostValue, $feature => $key];
    @endphp

    <a href="{{ route($routeName, $routeVariable) }}"
        class="{{ $key === $current || ($key === '' && $current === null) ? 'btn-active' : 'btn' }}">
        {{ $label }}
    </a>
@empty
@endforelse
<!-- reviews filter/sort: end -->
