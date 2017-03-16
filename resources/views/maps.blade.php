@extends('layouts.app')

@section('content')

<div class="row not-margin">																
								<input type="text" name="dealLocation" id="place" placeholder="Parque Simón Bolivar" size="60" />
							</div>
							<div class="row not-margin">
								<div id="map_canvas" class="map"></div>
              </div>

              @endsection