<!-- textarea -->
<div @include('crud::inc.field_wrapper_attributes') >
  <label>{{ $field['label'] }}
  @if(isset($field['required']))
    <span style="color: red">*</span>
  @endif</label>    @include('crud::inc.field_translatable_icon')
    <textarea @if(isset($field['rows'])) rows="{{$field['rows']}}" @else rows="8" @endif style="resize: none;"
    	name="{{ $field['name'] }}"
        @include('crud::inc.field_attributes')
        @if(isset($field['required']))
        required
        @endif

    	>{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}</textarea>

    {{-- HINT --}}
    @if (isset($field['hint']))
      <p class="help-block">{!! $field['hint'] !!}</p>
      @if(isset($entry))
        <div class="">
          <iframe src="{{$field['value']}}" ></iframe>
        </div>
      @endif
    @endif
</div>
