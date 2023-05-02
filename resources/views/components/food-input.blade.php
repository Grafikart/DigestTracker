<div class="form-group">
    <label for="food" class="form-label">Aliments</label>
    <select  multiple name="food[]" id="food">
        @foreach($foods as $id => $name)
            <option @selected(in_array($id, $selection)) value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
