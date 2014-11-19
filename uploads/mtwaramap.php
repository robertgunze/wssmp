
<!DOCTYPE html>
<html>
<head> 
	<title>Mtwara Webmap</title>
	
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
				<script src='data/exp_mtwarapoints.js' ></script>
				
				<script src='data/exp_TAN18.js' ></script>
				
	<script>
		var map = L.map('map', { zoomControl:true }).fitBounds([[-11.5884675217,37.9556659405],[-9.94095438827,40.4034742195]]);
		var additional_attrib = 'created w. <a href="https://github.com/geolicious/qgis2leaf" target ="_blank">qgis2leaf</a> by <a href="http://www.geolicious.de" target ="_blank">Geolicious</a> & contributors<br>';
	var feature_group = new L.featureGroup([]);

	var raster_group = new L.LayerGroup([]);
	
	var basemap= L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
	map.attributionControl.addAttribution(additional_attrib + '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>');	
	basemap.addTo(map);	
	var layerOrder=new Array();
				function pop_TAN18(feature, layer) {
										var popupContent = '<table><tr><th scope="row">ID</th><td>' + Autolinker.link(String(feature.properties.ID)) + '</td></tr><tr><th scope="row">LBL</th><td>' + Autolinker.link(String(feature.properties.LBL)) + '</td></tr><tr><th scope="row">FIP</th><td>' + Autolinker.link(String(feature.properties.FIP)) + '</td></tr><tr><th scope="row">MMT_ID</th><td>' + Autolinker.link(String(feature.properties.MMT_ID)) + '</td></tr><tr><th scope="row">SHORT__FRM</th><td>' + Autolinker.link(String(feature.properties.SHORT__FRM)) + '</td></tr><tr><th scope="row">LONG_FRM</th><td>' + Autolinker.link(String(feature.properties.LONG_FRM)) + '</td></tr><tr><th scope="row">ADM0</th><td>' + Autolinker.link(String(feature.properties.ADM0)) + '</td></tr><tr><th scope="row">ADM1</th><td>' + Autolinker.link(String(feature.properties.ADM1)) + '</td></tr><tr><th scope="row">ADM2</th><td>' + Autolinker.link(String(feature.properties.ADM2)) + '</td></tr><tr><th scope="row">ADM3</th><td>' + Autolinker.link(String(feature.properties.ADM3)) + '</td></tr><tr><th scope="row">ADM4</th><td>' + Autolinker.link(String(feature.properties.ADM4)) + '</td></tr><tr><th scope="row">ADM5</th><td>' + Autolinker.link(String(feature.properties.ADM5)) + '</td></tr><tr><th scope="row">STL_0</th><td>' + Autolinker.link(String(feature.properties.STL_0)) + '</td></tr><tr><th scope="row">STL_1</th><td>' + Autolinker.link(String(feature.properties.STL_1)) + '</td></tr><tr><th scope="row">STL_2</th><td>' + Autolinker.link(String(feature.properties.STL_2)) + '</td></tr><tr><th scope="row">STL_3</th><td>' + Autolinker.link(String(feature.properties.STL_3)) + '</td></tr><tr><th scope="row">STL_4</th><td>' + Autolinker.link(String(feature.properties.STL_4)) + '</td></tr><tr><th scope="row">STL_5</th><td>' + Autolinker.link(String(feature.properties.STL_5)) + '</td></tr></table>';
					layer.bindPopup(popupContent);


				}
						
				var exp_TAN18JSON = new L.geoJson(exp_TAN18,{
					onEachFeature: pop_TAN18,
					style: function (feature) {
						return {color: feature.properties.border_color_qgis2leaf,
								fillColor: feature.properties.color_qgis2leaf,
								weight: feature.properties.radius_qgis2leaf,
								opacity: feature.properties.transp_qgis2leaf,
								fillOpacity: feature.properties.transp_qgis2leaf};
						}
					});
				feature_group.addLayer(exp_TAN18JSON);
				layerOrder[layerOrder.length] = exp_TAN18JSON;
				for (index = 0; index < layerOrder.length; index++) {
					map.removeLayer(layerOrder[index]);map.addLayer(layerOrder[index]);
				}
				
						//add comment sign to hide this layer on the map in the initial view.
						exp_TAN18JSON.addTo(map);
				function pop_mtwarapoints(feature, layer) {
										var popupContent = '<table><tr><th scope="row">GID</th><td>' + Autolinker.link(String(feature.properties.GID)) + '</td></tr><tr><th scope="row">OBJECTID</th><td>' + Autolinker.link(String(feature.properties.OBJECTID)) + '</td></tr><tr><th scope="row">VALID_FROM</th><td>' + Autolinker.link(String(feature.properties.VALID_FROM)) + '</td></tr><tr><th scope="row">VALID_TO</th><td>' + Autolinker.link(String(feature.properties.VALID_TO)) + '</td></tr><tr><th scope="row">AMOUNT_TSH</th><td>' + Autolinker.link(String(feature.properties.AMOUNT_TSH)) + '</td></tr><tr><th scope="row">BREAKDOWN</th><td>' + Autolinker.link(String(feature.properties.BREAKDOWN)) + '</td></tr><tr><th scope="row">DATE_OF_RE</th><td>' + Autolinker.link(String(feature.properties.DATE_OF_RE)) + '</td></tr><tr><th scope="row">FUNDER</th><td>' + Autolinker.link(String(feature.properties.FUNDER)) + '</td></tr><tr><th scope="row">GPS_HEIGHT</th><td>' + Autolinker.link(String(feature.properties.GPS_HEIGHT)) + '</td></tr><tr><th scope="row">INSTALLER</th><td>' + Autolinker.link(String(feature.properties.INSTALLER)) + '</td></tr><tr><th scope="row">X_ARC1960</th><td>' + Autolinker.link(String(feature.properties.X_ARC1960)) + '</td></tr><tr><th scope="row">Y_ARC1960</th><td>' + Autolinker.link(String(feature.properties.Y_ARC1960)) + '</td></tr><tr><th scope="row">WPTNAME</th><td>' + Autolinker.link(String(feature.properties.WPTNAME)) + '</td></tr><tr><th scope="row">NUMBER_PRI</th><td>' + Autolinker.link(String(feature.properties.NUMBER_PRI)) + '</td></tr><tr><th scope="row">BASIN</th><td>' + Autolinker.link(String(feature.properties.BASIN)) + '</td></tr><tr><th scope="row">SUBVILLAGE</th><td>' + Autolinker.link(String(feature.properties.SUBVILLAGE)) + '</td></tr><tr><th scope="row">REGION</th><td>' + Autolinker.link(String(feature.properties.REGION)) + '</td></tr><tr><th scope="row">LGA</th><td>' + Autolinker.link(String(feature.properties.LGA)) + '</td></tr><tr><th scope="row">WARD</th><td>' + Autolinker.link(String(feature.properties.WARD)) + '</td></tr><tr><th scope="row">POPULATION</th><td>' + Autolinker.link(String(feature.properties.POPULATION)) + '</td></tr><tr><th scope="row">PUBLIC_MEE</th><td>' + Autolinker.link(String(feature.properties.PUBLIC_MEE)) + '</td></tr><tr><th scope="row">REASON_WPT</th><td>' + Autolinker.link(String(feature.properties.REASON_WPT)) + '</td></tr><tr><th scope="row">RECORDING</th><td>' + Autolinker.link(String(feature.properties.RECORDING)) + '</td></tr><tr><th scope="row">SCHEME_MAN</th><td>' + Autolinker.link(String(feature.properties.SCHEME_MAN)) + '</td></tr><tr><th scope="row">SCHEMENAME</th><td>' + Autolinker.link(String(feature.properties.SCHEMENAME)) + '</td></tr><tr><th scope="row">PERMIT</th><td>' + Autolinker.link(String(feature.properties.PERMIT)) + '</td></tr><tr><th scope="row">WPTCODE</th><td>' + Autolinker.link(String(feature.properties.WPTCODE)) + '</td></tr><tr><th scope="row">WPTPHOTOID</th><td>' + Autolinker.link(String(feature.properties.WPTPHOTOID)) + '</td></tr><tr><th scope="row">YEAR_OF_CO</th><td>' + Autolinker.link(String(feature.properties.YEAR_OF_CO)) + '</td></tr><tr><th scope="row">EXTRACTION</th><td>' + Autolinker.link(String(feature.properties.EXTRACTION)) + '</td></tr><tr><th scope="row">EXTRACTI_1</th><td>' + Autolinker.link(String(feature.properties.EXTRACTI_1)) + '</td></tr><tr><th scope="row">EXTRACTI_2</th><td>' + Autolinker.link(String(feature.properties.EXTRACTI_2)) + '</td></tr><tr><th scope="row">HARDWARE_P</th><td>' + Autolinker.link(String(feature.properties.HARDWARE_P)) + '</td></tr><tr><th scope="row">HARDWARE_1</th><td>' + Autolinker.link(String(feature.properties.HARDWARE_1)) + '</td></tr><tr><th scope="row">MANAGEMENT</th><td>' + Autolinker.link(String(feature.properties.MANAGEMENT)) + '</td></tr><tr><th scope="row">MANAGEME_1</th><td>' + Autolinker.link(String(feature.properties.MANAGEME_1)) + '</td></tr><tr><th scope="row">PAYMENT</th><td>' + Autolinker.link(String(feature.properties.PAYMENT)) + '</td></tr><tr><th scope="row">PAYMENT_GR</th><td>' + Autolinker.link(String(feature.properties.PAYMENT_GR)) + '</td></tr><tr><th scope="row">QUALITY</th><td>' + Autolinker.link(String(feature.properties.QUALITY)) + '</td></tr><tr><th scope="row">QUALITY_GR</th><td>' + Autolinker.link(String(feature.properties.QUALITY_GR)) + '</td></tr><tr><th scope="row">QUANTITY</th><td>' + Autolinker.link(String(feature.properties.QUANTITY)) + '</td></tr><tr><th scope="row">QUANTITY_G</th><td>' + Autolinker.link(String(feature.properties.QUANTITY_G)) + '</td></tr><tr><th scope="row">SOURCE</th><td>' + Autolinker.link(String(feature.properties.SOURCE)) + '</td></tr><tr><th scope="row">SOURCE_GRO</th><td>' + Autolinker.link(String(feature.properties.SOURCE_GRO)) + '</td></tr><tr><th scope="row">SOURCE_CLA</th><td>' + Autolinker.link(String(feature.properties.SOURCE_CLA)) + '</td></tr><tr><th scope="row">STATUS</th><td>' + Autolinker.link(String(feature.properties.STATUS)) + '</td></tr><tr><th scope="row">STATUS_GRO</th><td>' + Autolinker.link(String(feature.properties.STATUS_GRO)) + '</td></tr><tr><th scope="row">WATERPOINT</th><td>' + Autolinker.link(String(feature.properties.WATERPOINT)) + '</td></tr><tr><th scope="row">WATERPOI_1</th><td>' + Autolinker.link(String(feature.properties.WATERPOI_1)) + '</td></tr></table>';
					layer.bindPopup(popupContent);


				}
						
				var exp_mtwarapointsJSON = new L.geoJson(exp_mtwarapoints,{
					onEachFeature: pop_mtwarapoints,
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
				
				var cluster_groupmtwarapointsJSON= new L.MarkerClusterGroup({showCoverageOnHover: false});				
				cluster_groupmtwarapointsJSON.addLayer(exp_mtwarapointsJSON);
				
						//add comment sign to hide this layer on the map in the initial view.
						cluster_groupmtwarapointsJSON.addTo(map);
		var title = new L.Control();
		title.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
			this.update();
			return this._div;
	    };
	    title.update = function () {
			this._div.innerHTML = '<h2>Mtwara Region</h2>WSS Master Plan'
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

	L.control.layers({'OSM Standard': basemap},{"mtwarapoints": cluster_groupmtwarapointsJSON,"TAN-18": exp_TAN18JSON},{collapsed:false}).addTo(map);
		function updateOpacity(value) {
	}
	L.control.scale({options: {position: 'bottomleft',maxWidth: 100,metric: true,imperial: false,updateWhenIdle: false}}).addTo(map);
	</script>
</body>
</html>
	
