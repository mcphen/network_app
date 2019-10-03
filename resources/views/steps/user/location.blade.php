<div class="form-group">
    <label for="name">Ville</label>
    <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? $step->data('name') }}">
    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>
<?php
$pays = \Illuminate\Support\Facades\DB::table('pays')
    ->get();

?>
<div class="form-group">
    <label for="pays">Pays</label>
    <select name="pays" id="pays" class="form-control{{ $errors->has('pays') ? ' is-invalid' : '' }}">
        <option value="">Selectionnez un pays...</option>
        @foreach($pays as $p)
            <option value="{{$p->idpays}}">{{$p->libelle_pays}}</option>

        @endforeach

    </select>
    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>