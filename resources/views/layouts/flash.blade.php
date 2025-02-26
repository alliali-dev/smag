@foreach (['danger', 'warning', 'info', 'success'] as $msg)
@if(Session::has($msg))
{{--<p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>--}}
<div class="alert alert-{{$msg}} alert-dismissible fade show" role="alert" id="alertShowMessage">
    @switch($msg)
    @case("danger")
    <i class="fa fa-exclamation-triangle" role="alert"></i>
    @break
    @case("warning")
    <i class="fa fa-exclamation-triangle" role="alert"></i>
    @break
    @case("info")
    <i class="fa fa-exclamation-circle" role="alert"></i>
    @break
    @case("success")
    <i class="fa fa-check-circle" role="alert"></i>
    @break
    @endswitch
    &nbsp;&nbsp;{{ Session::get($msg) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
