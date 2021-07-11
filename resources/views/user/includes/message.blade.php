@if($message=Session::get('success'))
<div class="notification success closeable">
				<p> {{$message}}</p>
				<a class="close"></a>
			</div>
@endif
@if($message=Session::get('error'))
<div class="notification error closeable">
				<p>{{$message}}</p>
				<a class="close"></a>
			</div>
@endif

@if ($errors->any())
            <div class="notification error closeable">
                {!! implode('', $errors->all('<p>:message</p>')) !!}
            </div>
        @endif