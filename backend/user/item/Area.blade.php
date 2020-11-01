<hr>
<div class="col-md-12">
    <label for="item_address" class="text-black">مناطق العمل</label>

    <select multiple class="form-control" id="sel2" name="a1[]">
        @foreach(DB::table('states')->orderBy('id','desc')->get() as $item_reference_point)
        <option value='{{$item_reference_point->id}}'>{{$item_reference_point->state_name}}</option>
        @endforeach
    </select>
    <span>يمكنك اختيار مناطق العمل</span>
    @error('item_address')
    <span class="invalid-tooltip">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="col-md-12">
    <label for="item_address" class="text-black">مدن العمل </label>
    <select multiple class="form-control" id="sel2" name="a2[]">
        @foreach(DB::table('cities')->orderBy('id','desc')->get() as $item_reference_point)
        <option value='{{$item_reference_point->id}}'>{{$item_reference_point->city_name}}</option>
        @endforeach
    </select> <span>يمكنك أختيار مدن العمل</span>
    @error('item_address')
    <span class="invalid-tooltip">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<br>
<hr>
<br>