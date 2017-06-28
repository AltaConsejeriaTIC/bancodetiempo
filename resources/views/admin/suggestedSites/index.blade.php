@extends('layouts.appAdmin')

@section('content')
    <div class="container" id="app">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

                    <div class="panel-heading">
                        <h2 class="title1">Sitios sugeridos</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-raised btn-primary" @click='myData.newcategory = true'>Nueva categoria <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Icono</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>

                        @foreach($categories as $key => $category)

                            <tr >
                                <td @click='myData.editcategory = true;myData.nameCategory = "{{$category->name}}";myData.iconCategory = "{{$category->icon}}";myData.categoryId = {{$category->id}};'><i class="fa fa-{{$category->icon}} text-center" style="font-size:25px"></i></td>
                                <td @click='myData.editcategory = true;myData.nameCategory = "{{$category->name}}";myData.iconCategory = "{{$category->icon}}";myData.categoryId = {{$category->id}};'>{{$category->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-raised btn-primary btn-xs" title="Editar categoria" @click='myData.editcategory = true;myData.nameCategory = "{{$category->name}}";myData.iconCategory = "{{$category->icon}}";myData.categoryId = {{$category->id}};'><i class="material-icons">mode_edit</i></button>    
                                    <button type="button" class="btn btn-raised btn-primary btn-xs" title="Borrar categoria" @click='myData.deletecategory=true;myData.categoryId="{{$category->id}}";myData.categorySites="{{$category->sites->count()}}"'><i class="material-icons">delete</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-raised btn-primary btn-xs" data-toggle="collapse" data-target="#category{{$key}}">Ver sitios</button>
                                    <button class="btn btn-raised btn-primary btn-xs" @click='myData.newsite = true;myData.categoryId = {{$category->id}}'>Nuevo sitio</button>
                                </td>
                            </tr>
                            <tr class="collapse" id="category{{$key}}">
                               <td colspan="3">
                                   <table class="table table-striped table-hover">
                                        <tr class="info">
                                            <th>Nombre</th>
                                            <th>Direecion</th>
                                            <th>Acciones</th>
                                        </tr>
                                        @foreach($category->sites as $site)
                                            <tr>
                                                <td @click='myData.newsite = true;
                                               myData.siteName="{{$site->name}}";
                                               myData.siteAddress="{{$site->address}}";
                                               myData.siteRequirements="{{$site->requirements}}";
                                               myData.siteContact="{{$site->contact}}";
                                               myData.siteDescription="{{$site->description}}";
                                               myData.siteCoordinates="{{$site->coordinates}}";
                                               myData.siteId = {{$site->id}}' onClick='loadSite();'>{{$site->name}}</td>
                                                <td @click='myData.newsite = true;
                                               myData.siteName="{{$site->name}}";
                                               myData.siteAddress="{{$site->address}}";
                                               myData.siteRequirements="{{$site->requirements}}";
                                               myData.siteContact="{{$site->contact}}";
                                               myData.siteDescription="{{$site->description}}";
                                               myData.siteCoordinates="{{$site->coordinates}}";
                                               myData.siteId = {{$site->id}}' onClick='loadSite();'>{{$site->address}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-raised btn-primary btn-xs" title="Borrar categoria" @click='myData.deletesite=true;myData.siteId = {{$site->id}}'><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                   </table>
                                </td>
                            </tr>

                        @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>

       @include('admin.suggestedSites.partial.newCategory')
       @include('admin.suggestedSites.partial.editCategory')
       @include('admin.suggestedSites.partial.newSite')
       @include('admin.suggestedSites.partial.deleteCategory')
       @include('admin.suggestedSites.partial.deleteSite')

    </div>



<style>
    #map{
        height: 250px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var map;
    var marker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 4.637379, lng: -74.091972},
          zoom: 15
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: 4.637379, lng: -74.091972}
        });

        marker.addListener('dragend', function() {
            jQuery("#coordinates").val(marker.position.lat()+","+marker.position.lng());
        });

        var input = (document.getElementById('siteName'));

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        autocomplete.addListener('place_changed', function() {
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("No se encontro el lugar '" + place.name + "'");
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            jQuery("#coordinates").val(place.geometry.location.lat()+","+place.geometry.location.lng());
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        });

      }
    function loadSite(){
        var position = jQuery("#coordinates").val().split(",");
        map.setCenter({lat: parseFloat(position[0]), lng : parseFloat(position[1])});
        marker.setPosition({lat: parseFloat(position[0]), lng : parseFloat(position[1])});
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhcDkWcXQ-qm6-1vZC8RDjJz0lUrXCAMw&callback=initMap&libraries=places"></script>

@endsection
