jQuery(document).ready(function(){
    jQuery(".showDetailSite").on("click", showDetailSite);
    jQuery(".sendCoordinates").on("click", sendCoordinates)
})

function showDetailSite(){
    var icon = jQuery(this).find("[name='icon']").val();
    jQuery("#iconSite").removeAttr('class')
    jQuery("#iconSite").addClass(icon).addClass('fa')
    var name = jQuery(this).find("[name='name']").val();
    jQuery("#siteName").html(name)
    var address = jQuery(this).find("[name='address']").val();
    jQuery("#siteAddress").html(address)
    var contact = jQuery(this).find("[name='contact']").val();
    jQuery("#siteContact").html(contact)
    var description = jQuery(this).find("[name='description']").val();
    jQuery("#siteDescription").html(description)
    var requirements = jQuery(this).find("[name='requirements']").val();
    jQuery("#siteRequirements").html(requirements)
    var coordinates = jQuery(this).find("[name='coordinates']").val();
    jQuery("#siteCoordinates").attr('href', 'http://maps.google.com/?q='+coordinates);
    jQuery(".sendCoordinates").attr("coordinates", coordinates);
    jQuery(".sendCoordinates").attr("nameSite", name);
}

function sendCoordinates(){
	var coordinates = jQuery(this).attr("coordinates");
	coordinates = coordinates.split(",");
	jQuery("#coordinates").val('{"lat" : '+coordinates[0]+',"lng" :'+coordinates[1]+'}');
	var nameSite = jQuery(this).attr("nameSite");
	jQuery("#place").val(nameSite);
}