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
                                                <td @click='myData.newsite = true;myData.siteId = {{$site->id}}' class='openEdit'>
                                                   {{$site->name}}
                                                   <input type="hidden" name='name' value="{{$site->name}}">
                                                   <input type="hidden" name='address' value="{{$site->address}}">
                                                   <input type="hidden" name='requirements' value="{{$site->requirements}}">
                                                   <input type="hidden" name='contact' value="{{$site->contact}}">
                                                   <input type="hidden" name='description' value="{{$site->description}}">
                                                   <input type="hidden" name='coordinates' value="{{$site->coordinates}}">
                                                   <input type="hidden" name='id' value="{{$site->id}}">
                                                   <input type="hidden" name='categoryId' v-model='myData.categoryId'>
                                               </td>
                                                <td @click='myData.newsite = true;myData.siteId = {{$site->id}}' class='openEdit'>
                                                   {{$site->address}}
                                                   <input type="hidden" name='name' value="{{$site->name}}">
                                                   <input type="hidden" name='address' value="{{$site->address}}">
                                                   <input type="hidden" name='requirements' value="{{$site->requirements}}">
                                                   <input type="hidden" name='contact' value="{{$site->contact}}">
                                                   <input type="hidden" name='description' value="{{$site->description}}">
                                                   <input type="hidden" name='coordinates' value="{{$site->coordinates}}">
                                                   <input type="hidden" name='id' value="{{$site->id}}">
                                                   <input type="hidden" name='categoryId' v-model='myData.categoryId'>
                                                </td>
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
<script src="{{ asset('js/admin/transition.js') }}"></script>
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
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({'location': marker.position}, function(results, status) {
                if(status === 'OK') {
                    document.getElementById('siteName').value = results[1].formatted_address;
                }
            });
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

    jQuery(".openEdit").on("click", loadform);
    jQuery(".openEdit").on("click", loadSite);
    jQuery(".closeForm").on("click", closeForm);

    function loadform(){
        var name = jQuery(this).find("[name='name']").val();
        jQuery("#editName").val(name);
        var address = jQuery(this).find("[name='address']").val();
        jQuery("#address").val(address);
        var requirements = jQuery(this).find("[name='requirements']").val();
        jQuery("#requirements").val(requirements);
        var contact = jQuery(this).find("[name='contact']").val();
        jQuery("#contact").val(contact);
        var description = jQuery(this).find("[name='description']").val();
        jQuery("#description").val(description);
        var coordinates = jQuery(this).find("[name='coordinates']").val();
        jQuery("#coordinates").val(coordinates);
        var id = jQuery(this).find("[name='id']").val();
        jQuery("#siteId").val(id);
    }

    function closeForm(){
        jQuery("#editName").val("");
        jQuery("#address").val("");
        jQuery("#requirements").val("");
        jQuery("#contact").val("");
        jQuery("#description").val("");
        jQuery("#coordinates").val("");
        jQuery("#siteId").val("");
        jQuery("#categoryId").val("");
        jQuery("#siteName").val("");
    }

    function loadSite(){
        var position = jQuery("#coordinates").val().split(",");
        map.setCenter({lat: parseFloat(position[0]), lng : parseFloat(position[1])});
        marker.setPosition({lat: parseFloat(position[0]), lng : parseFloat(position[1])});
        var geocoder = new google.maps.Geocoder;
        var location = {lat : parseFloat(position[0]), lng : parseFloat(position[1])};
        geocoder.geocode({'location': location}, function(results, status) {
            if(status === 'OK') {
                document.getElementById('siteName').value = results[1].formatted_address;
            }
        });
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhcDkWcXQ-qm6-1vZC8RDjJz0lUrXCAMw&callback=initMap&libraries=places"></script>

@endsection
