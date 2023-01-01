@php $formates = isset($formates) ? 'jpg,jpeg,png,'.$formates : 'jpg,jpeg,png'; @endphp
@php $sizes = isset($sizes) ? '1920x1018,'.$sizes : '1920x1018'; @endphp

<small class="form-text text-muted">
    {{__('allowed image format :'  ). $formates ?? ''}}
    {{__('and image size :'  ). $sizes ?? ''}}
</small>