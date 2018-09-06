
@forelse ($thread->replies as $reply)
<div class="col s12" >
    <blockquote>
        {{$thread->body}}
    </blockquote>
    <h6 class="right">{{ trans('user') }} : {{$reply->user->name}}</h6>
</div>  
@empty
{{ trans('theres no replies for this thread') }} 
@endforelse