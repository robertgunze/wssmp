
<!DOCTYPE html>
<html>
<head> 
	<title>Lindi- Webmap</title>
	
	<meta charset="utf-8" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css" /> <!-- we will us e this as the styling script for our webmap-->
	<link rel="stylesheet" href="css/MarkerCluster.css" />
	<link rel="stylesheet" href="css/MarkerCluster.Default.css" />
	<link rel="stylesheet" type="text/css" href="css/own_style.css">
        <link rel="stylesheet" href="http://k4r573n.github.io/leaflet-control-osm-geocoder/Control.OSMGeocoder.css" />	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> <!-- this is the javascript file that does the magic-->
	<script src="js/Autolinker.min.js"></script>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
</head>
<body>
	<div id="map"></div> <!-- this is the initial look of the map. in most cases it is done externally using something like a map.css stylesheet were you can specify the look of map elements, like background color tables and so on.-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script> <!-- this is the javascript file that does the magic-->
	<script src="http://k4r573n.github.io/leaflet-control-osm-geocoder/Control.OSMGeocoder.js"></script>
	<script src="js/leaflet.markercluster.js"></script>
	<input id="slide" type="range" min="0" max="1" step="0.1" value="1" onchange="updateOpacity(this.value)">
				<script src='data/exp_LindiWaterpoints.js' ></script>
				
				<script src='data/exp_LindiRegion.js' ></script>
				
	<script>
		var map = L.map('map', { zoomControl:true }).fitBounds([[-10.6988809969,36.6830829667],[-8.22534488915,40.6851598733]]);
		var additional_attrib = 'created w. <a href="https://github.com/geolicious/qgis2leaf" target ="_blank">qgis2leaf</a> by <a href="http://www.geolicious.de" target ="_blank">Geolicious</a> & contributors<br>';
	var feature_group = new L.featureGroup([]);

	var raster_group = new L.LayerGroup([]);
	
	var basemap= L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
	map.attributionControl.addAttribution(additional_attrib + '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>');	
	basemap.addTo(map);	
	var layerOrder=new Array();
				function pop_LindiRegion(feature, layer) {
										var popupContent = '<table><tr><th scope="row">ID</th><td>' + Autolinker.link(String(feature.properties.ID)) + '</td></tr><tr><th scope="row">LBL</th><td>' + Autolinker.link(String(feature.properties.LBL)) + '</td></tr><tr><th scope="row">FIP</th><td>' + Autolinker.link(String(feature.properties.FIP)) + '</td></tr><tr><th scope="row">MMT_ID</th><td>' + Autolinker.link(String(feature.properties.MMT_ID)) + '</td></tr><tr><th scope="row">SHORT__FRM</th><td>' + Autolinker.link(String(feature.properties.SHORT__FRM)) + '</td></tr><tr><th scope="row">LONG_FRM</th><td>' + Autolinker.link(String(feature.properties.LONG_FRM)) + '</td></tr><tr><th scope="row">ADM0</th><td>' + Autolinker.link(String(feature.properties.ADM0)) + '</td></tr><tr><th scope="row">ADM1</th><td>' + Autolinker.link(String(feature.properties.ADM1)) + '</td></tr><tr><th scope="row">ADM2</th><td>' + Autolinker.link(String(feature.properties.ADM2)) + '</td></tr></table>';
					layer.bindPopup(popupContent);


				}
						
				var exp_LindiRegionJSON = new L.geoJson(exp_LindiRegion,{
					onEachFeature: pop_LindiRegion,
					style: function (feature) {
						return {color: feature.properties.border_color_qgis2leaf,
								fillColor: feature.properties.color_qgis2leaf,
								weight: feature.properties.radius_qgis2leaf,
								opacity: feature.properties.transp_qgis2leaf,
								fillOpacity: feature.properties.transp_qgis2leaf};
						}
					});
				feature_group.addLayer(exp_LindiRegionJSON);
				layerOrder[layerOrder.length] = exp_LindiRegionJSON;
				for (index = 0; index < layerOrder.length; index++) {
					map.removeLayer(layerOrder[index]);map.addLayer(layerOrder[index]);
				}
				
						//add comment sign to hide this layer on the map in the initial view.
						exp_LindiRegionJSON.addTo(map);
				function pop_LindiWaterpoints(feature, layer) {
										var popupContent = '<table><tr><th scope="row">GID</th><td>' + Autolinker.link(String(feature.properties.GID)) + '</td></tr><tr><th scope="row">OBJECTID</th><td>' + Autolinker.link(String(feature.properties.OBJECTID)) + '</td></tr><tr><th scope="row">VALID_FROM</th><td>' + Autolinker.link(String(feature.properties.VALID_FROM)) + '</td></tr><tr><th scope="row">VALID_TO</th><td>' + Autolinker.link(String(feature.properties.VALID_TO)) + '</td></tr><tr><th scope="row">AMOUNT_TSH</th><td>' + Autolinker.link(String(feature.properties.AMOUNT_TSH)) + '</td></tr><tr><th scope="row">BREAKDOWN</th><td>' + Autolinker.link(String(feature.properties.BREAKDOWN)) + '</td></tr><tr><th scope="row">DATE_OF_RECORDING</th><td>' + Autolinker.link(String(feature.properties.DATE_OF_RECORDING)) + '</td></tr><tr><th scope="row">FUNDER</th><td>' + Autolinker.link(String(feature.properties.FUNDER)) + '</td></tr><tr><th scope="row">GPS_HEIGHT</th><td>' + Autolinker.link(String(feature.properties.GPS_HEIGHT)) + '</td></tr><tr><th scope="row">INSTALLER</th><td>' + Autolinker.link(String(feature.properties.INSTALLER)) + '</td></tr><tr><th scope="row">X_ARC1960</th><td>' + Autolinker.link(String(feature.properties.X_ARC1960)) + '</td></tr><tr><th scope="row">Y_ARC1960</th><td>' + Autolinker.link(String(feature.properties.Y_ARC1960)) + '</td></tr><tr><th scope="row">WPTNAME</th><td>' + Autolinker.link(String(feature.properties.WPTNAME)) + '</td></tr><tr><th scope="row">NUMBER_PRIVATE_CONNECTIONS</th><td>' + Autolinker.link(String(feature.properties.NUMBER_PRIVATE_CONNECTIONS)) + '</td></tr><tr><th scope="row">BASIN</th><td>' + Autolinker.link(String(feature.properties.BASIN)) + '</td></tr><tr><th scope="row">SUBVILLAGE</th><td>' + Autolinker.link(String(feature.properties.SUBVILLAGE)) + '</td></tr><tr><th scope="row">REGION</th><td>' + Autolinker.link(String(feature.properties.REGION)) + '</td></tr><tr><th scope="row">LGA</th><td>' + Autolinker.link(String(feature.properties.LGA)) + '</td></tr><tr><th scope="row">WARD</th><td>' + Autolinker.link(String(feature.properties.WARD)) + '</td></tr><tr><th scope="row">POPULATION_SERVED</th><td>' + Autolinker.link(String(feature.properties.POPULATION_SERVED)) + '</td></tr><tr><th scope="row">PUBLIC_MEETING</th><td>' + Autolinker.link(String(feature.properties.PUBLIC_MEETING)) + '</td></tr><tr><th scope="row">REASON_WPT</th><td>' + Autolinker.link(String(feature.properties.REASON_WPT)) + '</td></tr><tr><th scope="row">RECORDING</th><td>' + Autolinker.link(String(feature.properties.RECORDING)) + '</td></tr><tr><th scope="row">SCHEME_MANAGEMENT</th><td>' + Autolinker.link(String(feature.properties.SCHEME_MANAGEMENT)) + '</td></tr><tr><th scope="row">SCHEMENAME</th><td>' + Autolinker.link(String(feature.properties.SCHEMENAME)) + '</td></tr><tr><th scope="row">PERMIT</th><td>' + Autolinker.link(String(feature.properties.PERMIT)) + '</td></tr><tr><th scope="row">WPTCODE</th><td>' + Autolinker.link(String(feature.properties.WPTCODE)) + '</td></tr><tr><th scope="row">WPTPHOTOID</th><td>' + Autolinker.link(String(feature.properties.WPTPHOTOID)) + '</td></tr><tr><th scope="row">YEAR_OF_CONSTRUCTION</th><td>' + Autolinker.link(String(feature.properties.YEAR_OF_CONSTRUCTION)) + '</td></tr><tr><th scope="row">EXTRACTION_TYPE</th><td>' + Autolinker.link(String(feature.properties.EXTRACTION_TYPE)) + '</td></tr><tr><th scope="row">EXTRACTION_TYPE_GROUP</th><td>' + Autolinker.link(String(feature.properties.EXTRACTION_TYPE_GROUP)) + '</td></tr><tr><th scope="row">EXTRACTION_TYPE_CLASS</th><td>' + Autolinker.link(String(feature.properties.EXTRACTION_TYPE_CLASS)) + '</td></tr><tr><th scope="row">HARDWARE_PROBLEMS</th><td>' + Autolinker.link(String(feature.properties.HARDWARE_PROBLEMS)) + '</td></tr><tr><th scope="row">HARDWARE_PROBLEMS_GROUP</th><td>' + Autolinker.link(String(feature.properties.HARDWARE_PROBLEMS_GROUP)) + '</td></tr><tr><th scope="row">MANAGEMENT</th><td>' + Autolinker.link(String(feature.properties.MANAGEMENT)) + '</td></tr><tr><th scope="row">MANAGEMENT_GROUP</th><td>' + Autolinker.link(String(feature.properties.MANAGEMENT_GROUP)) + '</td></tr><tr><th scope="row">PAYMENT</th><td>' + Autolinker.link(String(feature.properties.PAYMENT)) + '</td></tr><tr><th scope="row">PAYMENT_GROUP</th><td>' + Autolinker.link(String(feature.properties.PAYMENT_GROUP)) + '</td></tr><tr><th scope="row">QUALITY</th><td>' + Autolinker.link(String(feature.properties.QUALITY)) + '</td></tr><tr><th scope="row">QUALITY_GROUP</th><td>' + Autolinker.link(String(feature.properties.QUALITY_GROUP)) + '</td></tr><tr><th scope="row">QUANTITY</th><td>' + Autolinker.link(String(feature.properties.QUANTITY)) + '</td></tr><tr><th scope="row">QUANTITY_GROUP</th><td>' + Autolinker.link(String(feature.properties.QUANTITY_GROUP)) + '</td></tr><tr><th scope="row">SOURCE</th><td>' + Autolinker.link(String(feature.properties.SOURCE)) + '</td></tr><tr><th scope="row">SOURCE_GROUP</th><td>' + Autolinker.link(String(feature.properties.SOURCE_GROUP)) + '</td></tr><tr><th scope="row">SOURCE_CLASS</th><td>' + Autolinker.link(String(feature.properties.SOURCE_CLASS)) + '</td></tr><tr><th scope="row">STATUS</th><td>' + Autolinker.link(String(feature.properties.STATUS)) + '</td></tr><tr><th scope="row">STATUS_GROUP</th><td>' + Autolinker.link(String(feature.properties.STATUS_GROUP)) + '</td></tr><tr><th scope="row">WATERPOINT_TYPE</th><td>' + Autolinker.link(String(feature.properties.WATERPOINT_TYPE)) + '</td></tr><tr><th scope="row">WATERPOINT_TYPE_GROUP</th><td>' + Autolinker.link(String(feature.properties.WATERPOINT_TYPE_GROUP)) + '</td></tr><tr><th scope="row">More_Details</th><td>' + Autolinker.link(String(feature.properties.More_Details)) + '</td></tr></table>';
					layer.bindPopup(popupContent);


				}
						
				var exp_LindiWaterpointsJSON = new L.geoJson(exp_LindiWaterpoints,{
					onEachFeature: pop_LindiWaterpoints,
					pointToLayer: function (feature, latlng) {  
						return L.circleMarker(latlng, {
							radius: feature.properties.radius_qgis2leaf,
							fillColor: feature.properties.color_qgis2leaf,
							color: '#000',
							weight: 1,
							opacity: feature.properties.transp_qgis2leaf,
							fillOpacity: feature.properties.transp_qgis2leaf
							})
						}
					});
				
				feature_group.addLayer(exp_LindiWaterpointsJSON);
				layerOrder[layerOrder.length] = exp_LindiWaterpointsJSON;
				for (index = 0; index < layerOrder.length; index++) {
					feature_group.removeLayer(layerOrder[index]);feature_group.addLayer(layerOrder[index]);
				}
				
						//add comment sign to hide this layer on the map in the initial view.
						exp_LindiWaterpointsJSON.addTo(map);
		var title = new L.Control();
		title.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
			this.update();
			return this._div;
	    };
	    title.update = function () {
			this._div.innerHTML = '<h2>Lindi  Region</h2>WSS Master Plan'
		};
		title.addTo(map);
		var osmGeocoder = new L.Control.OSMGeocoder({
            collapsed: false,
            position: 'topright',
            text: 'Find!',
			});
		osmGeocoder.addTo(map);
		
		var legend = L.control({position: 'bottomright'});
		
		legend.onAdd = function (map) {
		var div = L.DomUtil.create('div', 'info legend');
		div.innerHTML = "<h3>Legend</h3><table></table>";
    		return div;
		};
		legend.addTo(map);

	L.control.layers({'OSM Standard': basemap},{"LindiWaterpoints": exp_LindiWaterpointsJSON,"LindiRegion": exp_LindiRegionJSON},{collapsed:false}).addTo(map);
		function updateOpacity(value) {
	}
	L.control.scale({options: {position: 'bottomleft',maxWidth: 100,metric: true,imperial: false,updateWhenIdle: false}}).addTo(map);
	</script>
</body>
</html>
	
