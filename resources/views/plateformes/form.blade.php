<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom</strong>
            {!! Form::text('nom', null, array('name'=>'nom','placeholder' => 'nom','class' => 'form-control', 'value' => $plateforme->nom ?? old('nom'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur:</strong>
            {!! Form::textarea('couleur', null, array('name'=>'couleur','placeholder' => 'couleur','class' => 'form-control','style'=>'height:150px','value' => $plateforme->couleur ?? old('couleur'))) !!}
        </div>
    </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


