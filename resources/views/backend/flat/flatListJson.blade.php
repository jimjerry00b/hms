<option selected id="flatSelect">Select...</option>
@foreach($flats as $flat)
<option value="{{ $flat->id }}">{{ $flat->name }}</option>
@endforeach