<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contenu:</strong>
            {!! Form::textarea('contenu', null, array('name'=>'contenu','placeholder' => 'contenu','class' => 'form-control','style'=>'height:150px','value' => $avis->contenu ?? old('contenu'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group ">
            <strong>Jeux:</strong>
            <select  class="form-control" name="jeux" >
                @foreach(\App\Models\Jeux::all() as $j)
                    <option  value="{{$j->id}}">{{$j->nom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


