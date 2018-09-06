@extends('layouts.defaults')
@section('content')
<div class="container">
    <div class="row">
        {{ __("no itens found") }}
        <div class="col s12">
            <card-component title="{{$thread->title}}" body=" {{$thread->body}}" ></card-component>
            <replies-component :thread_id="{{$thread->id}}">
            </replies-component>    
        </div>
    </div>
</div>

@endsection