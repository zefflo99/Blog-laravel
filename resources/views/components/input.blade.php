@if(($type ?? null) === "textarea")
    <div class="form-group">
        <label for="{{$name}}">{{$label ?? null}}</label>
        <textarea class="form-control @error($name) is-invalid @enderror" name="{{$name}}" >{{$slot}}</textarea>
    </div>

@else
    <div class="form-group">
        <label for="{{$name}}">{{$label ?? null}}</label>
        <input class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{$value}}" type="{{$type ?? null}}">
    </div>

@endif

@error($name)
    <div class="alert alert-info">
        {{$message}}
    </div>
@enderror
