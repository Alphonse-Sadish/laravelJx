<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titre:</strong>
            {!! Form::text('titre', null, array('name'=>'titre','placeholder' => 'titre','class' => 'form-control', 'value' => $avis->titre ?? old('titre'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contenu:</strong>
            {!! Form::textarea('contenu', null, array('name'=>'contenu','placeholder' => 'contenu','class' => 'form-control','style'=>'height:150px','value' => $avis->contenu ?? old('contenu'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group ">
            <strong>Note:</strong>
            {!! Form::text('note', null, array('name'=>'note','placeholder' => 'note','class' => 'form-control', 'value' => $avis->note ?? old('note'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


