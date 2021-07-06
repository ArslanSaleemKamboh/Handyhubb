<div class="custom-control custom-switch mb-1">
			<input type="checkbox" wire:model.lazy="status"  @if($user->status)checked @endif class="custom-control-input" id="{{$uniqueId}}"/>
		<label class="custom-control-label" for="{{$uniqueId}}"></label>
</div>