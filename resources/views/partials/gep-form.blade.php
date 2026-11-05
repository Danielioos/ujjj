<div class="col-md-4">
    <label class="form-label" for="gyarto">Gyártó</label>
    <input class="form-control" id="gyarto" name="gyarto" maxlength="8" value="{{ old('gyarto', $gep->gyarto ?? '') }}" required>
</div>
<div class="col-md-8">
    <label class="form-label" for="tipus">Típus</label>
    <input class="form-control" id="tipus" name="tipus" maxlength="100" value="{{ old('tipus', $gep->tipus ?? '') }}" required>
</div>
<div class="col-md-3">
    <label class="form-label" for="kijelzo">Kijelző</label>
    <input class="form-control" id="kijelzo" name="kijelzo" maxlength="8" value="{{ old('kijelzo', $gep->kijelzo ?? '') }}" required>
</div>
<div class="col-md-3">
    <label class="form-label" for="memoria">Memória (MB)</label>
    <input class="form-control" id="memoria" type="number" name="memoria" min="1" value="{{ old('memoria', $gep->memoria ?? '') }}" required>
</div>
<div class="col-md-3">
    <label class="form-label" for="merevlemez">HDD (GB)</label>
    <input class="form-control" id="merevlemez" type="number" name="merevlemez" min="1" value="{{ old('merevlemez', $gep->merevlemez ?? '') }}" required>
</div>
<div class="col-md-3">
    <label class="form-label" for="ar">Ár (Ft)</label>
    <input class="form-control" id="ar" type="number" name="ar" min="0" value="{{ old('ar', $gep->ar ?? '') }}" required>
</div>
<div class="col-md-6">
    <label class="form-label" for="videovezerlo">Videóvezérlő</label>
    <input class="form-control" id="videovezerlo" name="videovezerlo" maxlength="100" value="{{ old('videovezerlo', $gep->videovezerlo ?? '') }}" required>
</div>
<div class="col-md-6">
    <label class="form-label" for="processzorid">Processzor</label>
    <select class="form-select" id="processzorid" name="processzorid" required>
        @foreach($processzorok as $processzor)
            <option value="{{ $processzor->id }}" @selected(old('processzorid', $gep->processzorid ?? '') == $processzor->id)>{{ $processzor->gyarto }} {{ $processzor->tipus }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label class="form-label" for="oprendszerid">Operációs rendszer</label>
    <select class="form-select" id="oprendszerid" name="oprendszerid" required>
        @foreach($oprendszerek as $oprendszer)
            <option value="{{ $oprendszer->id }}" @selected(old('oprendszerid', $gep->oprendszerid ?? '') == $oprendszer->id)>{{ $oprendszer->nev }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label class="form-label" for="db">Raktár (db)</label>
    <input class="form-control" id="db" type="number" name="db" min="0" value="{{ old('db', $gep->db ?? 0) }}" required>
</div>
