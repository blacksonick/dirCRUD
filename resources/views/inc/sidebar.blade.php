<div class="col-md-3">
	<div class="card mb-3">
        <div class="card-header bg-color-12 text-white text-center">
            <h2>Menú</h2>
        </div>
    </div>
	<div id="accordion">
		<div class="card mb-2">
			<button class="btn btn-secondary btn-block" data-toggle="collapse" data-target="#collapse_estados" aria-expanded="true" aria-controls="collapse_estados">
		      Estados
		    </button>

		<div id="collapse_estados" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
		  <div class="list-group" id="list-tab" role="tablist">
			<a class="list-group-item " href="{{ url('/estado') }}" >Listado de estados</a>
			<a class="list-group-item " href="{{ url('/estado/create') }}" >Nuevo estado</a>
			</div>
		</div>
		</div>

		<div class="card mb-2">
			<button class="btn btn-secondary btn-block collapsed" data-toggle="collapse" data-target="#collapse_municipios" aria-expanded="false" aria-controls="collapse_municipios">
		      Municipios
		    </button>
		<div id="collapse_municipios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
		 <div class="list-group" id="list-tab" role="tablist">
			<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Listado de municipios</a>
			<a class="list-group-item list-group-item-action" id="list-municipios-list" data-toggle="list" href="#" role="tab" aria-controls="municipios">Nuevo municipio</a>
			</div>
		</div>
		</div>

		<div class="card mb-2">
		<button class="btn btn-secondary btn-block collapsed" data-toggle="collapse" data-target="#collapse_ciudades" aria-expanded="false" aria-controls="collapse_ciudades">
		      Ciudades
		    </button>
		<div id="collapse_ciudades" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
		  <div class="list-group" id="list-tab" role="tablist">
			<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Listado de ciudades</a>
			<a class="list-group-item list-group-item-action" id="list-ciudades-list" data-toggle="list" href="#" role="tab" aria-controls="ciudades">Nueva ciudad</a>
			</div>
		</div>
		</div>

		<div class="card mb-2">
			<button class="btn btn-secondary btn-block collapsed" data-toggle="collapse" data-target="#collapse_parroquias" aria-expanded="false" aria-controls="collapse_parroquias">
			      Parroquias
			   </button>
			<div id="collapse_parroquias" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
		  		<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Listado de parroquias</a>
					<a class="list-group-item list-group-item-action" id="list-parroquias-list" data-toggle="list" href="#" role="tab" aria-controls="parroquias">Nueva parroquia</a>
				</div>
			</div>
		</div>
	</div>
	
</div>