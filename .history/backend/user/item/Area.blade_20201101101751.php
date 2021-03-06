<hr>
<div class="col-md-4">
    <label for="state_id" class="text-black">{{ __('backend.state.state') }}</label>
    <select id="select_state_id_" class="custom-select @error('state_id') is-invalid @enderror"
        name="state_id">
        <option selected>{{ __('backend.item.select-state') }}</option>
        @foreach($all_states as $key => $state)
        <option value="{{ $state->id }}" {{ $state->id == old('state_id') ? 'selected' : '' }}>
            {{ $state->state_name }}</option>
        @endforeach
    </select>
    @error('state_id')
    <span class="invalid-tooltip">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="col-md-4">
    <label for="city_id" class="text-black">{{ __('backend.city.city') }}</label>
    <select id="select_city_id_" class="custom-select @error('city_id') is-invalid @enderror"
        name="city_id">
        <option selected>{{ __('backend.item.select-city') }}</option>
    </select>
    @error('city_id')
    <span class="invalid-tooltip">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<br>
<button class="btn"><i class="fa fa-home"></i></button>
<button class="btn"><i class="fa fa-home"></i></button>

<hr>
<br>