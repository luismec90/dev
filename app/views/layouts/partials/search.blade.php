<h3>
    Que deseas hacer hoy?
</h3>
{{ Form::open(['route'=>'search_path','class'=>'validate','method'=>'GET']) }}
<div class="row">
    <br>
    <div class="col-sm-3 col-sm-offset-3">
        <select id="town" name="town" class="form-control">
            <option></option>
            @foreach($towns as $town)
            <option value="{{ $town->id }}" {{ isset($selectedTown) && $selectedTown==$town->id ? 'selected':''; }}>{{ $town->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <select id="activity" name="activity" class="form-control">
            <option></option>
            @foreach($activities as $activity)
            <option value="{{ $activity->id }}" {{ isset($selectedActivity) && $selectedActivity==$activity->id ? 'selected':''; }}>{{ $activity->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <br>
    <br>
    <div class="col-xs-2 col-xs-offset-5 text-center">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>
    </div>
</div>
{{ Form::close() }}
