{{-- regular object attribute --}}
@php
	$value = data_get($entry, $column['name']);

	if (is_array($value)) {
		$value = json_encode($value);
	}
@endphp

<a class="btn btn-xs btn-default" href="{{'/s/'.$value}}" target="_blank">{{$column['label']}}</a>
