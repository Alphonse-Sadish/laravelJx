<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titre:</strong>
            {!! Form::text('titre', null, array('name'=>'titre','placeholder' => 'titre','class' => 'form-control', 'value' => $categories->titre ?? old('titre'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur:</strong>
            {!! Form::text('couleur', null, array('name'=>'couleur','placeholder' => 'couleur','class' => 'form-control','value' => $categories->couleur ?? old('couleur'))) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


