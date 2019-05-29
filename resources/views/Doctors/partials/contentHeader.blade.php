<div class="row">
    <div class="col-sm-8">
        <h1>{{ $title }}</h1>
    </div>
    <div class="col-sm-4 text-right ">
        @if(isset($btnGroups))
            <div class="btn-group">
                @foreach($btnGroups as $btnGroup)
                    {!! $btnGroup !!}
                @endforeach
            </div>
        @endif
    </div>
</div>