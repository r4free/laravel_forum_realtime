@extends('layouts.defaults')
@section('content')
<div class="container">
    <div class="row">
            <h2>{{ __("no itens found") }}</h2>

        @forelse ($threads as $thread)
        <div class="col s12 m6 l4">
            <card-component title="{{$thread->title}}" body="{{$thread->body}}" />
        </div>
          
        @empty
        <div class="col s12 m6 l4">
            <h2>{{ trans('no itens found') }}</h2>
        </div>
        @endforelse
    </div>
</div>

@endsection