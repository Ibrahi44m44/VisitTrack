

@props(['label' => '', 'placeholder' => '', 'name', 'type', 'oldval' => ''])

<label class="form-label font-weight-bold">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
    class="form-control font-weight-bold @error($name) is-invalid @enderror" id="{{ $name }}"
    value="{{ old($name, $oldval) }}" {{ $attributes }}>

@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror



{{-- <div class="mb-3">
   <label class="form-control">
       {{ $label ?? '' }}
   </label>
       <input class="form-control" type="{{ $type ?? '' }}" name="{{ $name  ?? ''}}" , placeholder="{{ $placeholder ?? ''}}"
           {{ $attributes }}>
</div> --}}


{{-- @props(['label' => '', 'placeholder' => '', 'name', 'type', 'oldval' => ''])
--}}
