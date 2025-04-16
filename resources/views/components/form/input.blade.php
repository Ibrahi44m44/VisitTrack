@props(['label' => '', 'placeholder' => '', 'name', 'type', 'oldval'  ])

<label class="text-white-50">
    {{ $label ?? '' }}
</label>

<input class="form-control @error($name)is-invalid @enderror bg-success-subtle  " type="{{ $type  }}"
    name="{{ $name  }}" , placeholder="{{ $placeholder ?? '' }}" {{ $attributes }}
    {{ $attributes }} value="{{ old($name) }}">
@error($name)
    <span class="invalid-feedback">{{ $message }}</span>
@enderror
