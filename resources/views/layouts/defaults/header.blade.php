
<nav>
    <div class="nav-wrapper">
     <div class="container">
            <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="{{route('thread.index')}}">{{__('threads')}}</a></li>
            <li><a href="{{ route('locale.change',['locale'=>'en']) }}">Ingles</a></li>
            <li><a href="{{ route('locale.change',['locale'=>'pt-br']) }}">Portugues</a></li>

        </ul>
     </div>
    </div>
</nav>
<div class="parallax-container">

        <div class="parallax">
            <img src="{{ asset('images/pr1.jpg') }}">
        </div>
    </div>

