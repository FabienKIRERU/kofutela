@php

    $class ??= null;
    $multiple ??= false;

@endphp

<div @class(['form-group', 'font-bold' => true, $class])>
    <label for="{{$name}}">{{$label}} </label>
    
        <input @if ($multiple) multiple @endif class="form-control @error($name) is-invalid @enderror" type="file" name="{{ $name . ($multiple ? '[]' : '') }}" id="{{$name}}">
        
    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        
    @enderror
</div>