/* mode enum */

/* Map global variable */
var map;
var markers;
var vectors;
var cnt = 0;
var currentMode;
var pts = [];

/* Add marker function.
 * ARGUMENTS:
 *   - coordinate (in ESPG4326):
 *       LonLat;
 *   - icon reference:
 *       iconRef;
 *   - icon size:
 *       iconSize;
 *   - popup id:
 *       popupId,
 *   - popup div size:
 *       popupSize;
 *   - HTML text:
 *       text;
 * RETURNS: None.
 */
function addMarker( lonLat, iconRef, iconSize, popupId, popupSize, text ) {
    /* Create popup */
    var popup = new OpenLayers.Popup(popupId,
        lonLat, popupSize, text, true);

    /* Create marker */
    var offset = new OpenLayers.Pixel(-(iconSize.w/2), -iconSize.h);
    var icon = new OpenLayers.Icon(iconRef, iconSize, offset);
    var marker = new OpenLayers.Marker(lonLat, icon);

    /* Set click function */
    marker.events.on({"mousedown" : function(evt) {
        if (evt.button == 0) {  // left
            popup.toggle();
        }
    }
    });

    marker.events.on({"dblclick" : function() {
        //alert('DBL');
        pts.push(lonLat);

        if (pts.length == 1)
            return;

        var points = new Array(
            new OpenLayers.Geometry.Point(pts[pts.length - 2].lon, pts[pts.length - 2].lat),
            new OpenLayers.Geometry.Point(pts[pts.length - 1].lon, pts[pts.length - 1].lat),
        );

        var myLine = new OpenLayers.Geometry.LineString(points);
        var myLineStyle = {strokeColor:"#00bd0e", strokeWidth:3};
        var myFeature = new OpenLayers.Feature.Vector(myLine, {}, myLineStyle);

        vectors.addFeatures([myFeature]);
    }});

    /* Attach marker */
    markers.addMarker(marker);
    /* Attach popup */
    map.addPopup(popup);
    popup.hide();
} /* End of 'addMarker' function */

/* Load map function.
 * ARGUMENTS: None.
 * RETURNS: None.
 */
function loadMap( id, lon, lat, is4326, zoom ) {
    /* Create map context */
    map = new OpenLayers.Map(id);

    /* Create layer of OSM */
    var osm = new OpenLayers.Layer.OSM();
    map.addLayer(osm);

    /* Create markers layer */
    markers = new OpenLayers.Layer.Markers("Markers");
    vectors = new OpenLayers.Layer.Vector("Vectors");

    map.addLayer(vectors);
    map.addLayer(markers);

    map.zoomToMaxExtent();

    /* Set coord */
    var LonLat = new OpenLayers.LonLat(lon, lat);

    if (is4326)
        LonLat.transform(
            new OpenLayers.Projection('EPSG:4326'),
            map.getProjectionObject()
        );

    map.moveTo(LonLat, zoom);
} /* End of 'loadMap' function */

/* Show stations function.
 * ARGUMENTS:
 *   - stations array:
 *       name, code, lon, lat;
 *   - paths array:
 *       from, to
 * RETURNS: None.
 */
 function showStations( stations, paths ) {
     /* This will be called in the loop for stations */
     var callb = function(i) {
         var text =
             '<table border="1">' +
                '<tr>' +
                    '<td>' +
                        '<b style="align: center">Станция</b>' +
                    '</td>' +
                    '<td>' +
                        '<b style="align: center">Код в АСУ</b>' +
                    '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td><a href="act_station.php?station_lon=' + stations[i].lon + '&station_lat=' + stations[i].lat + '\">' + stations[i].name + '</a></td>' +
                    '<td>' + stations[i].code + '</td>' +
                '</tr>' +
             '</table>';
         addMarker(new OpenLayers.LonLat(stations[i].lon, stations[i].lat), "images/rail.png",
             new OpenLayers.Size(30, 30), "station" + cnt++, new OpenLayers.Size(200, 80), text);
         };

     for (i = 0; i < stations.length; i++)
        callb(i);

     var myFeatures = new Array();
     for (i = 0; i < paths.length; i++) {
         var points = new Array(
             new OpenLayers.Geometry.Point(paths[i].LonFrom, paths[i].LatFrom),
             new OpenLayers.Geometry.Point(paths[i].LonTo, paths[i].LatTo),
         );

         var myLine = new OpenLayers.Geometry.LineString(points);
         var myLineStyle = {strokeColor:"#bd0e1a", strokeWidth:3};
         var myFeature = new OpenLayers.Feature.Vector(myLine, {}, myLineStyle);
         myFeatures.push(myFeature);
     }
     vectors.addFeatures(myFeatures);
 } /* End of 'showStations' function */

/* Add map click control (set new marker) function.
 * ARGUMENTS: None.
 * RETURNS: None.
 */
function addClickControl() {
    /* Add mouse position control */

    map.events.on({"mousedown" : function(evt) {
        if (evt.button == 2) { // right
            var f = document.createElement('form');
            f.method = 'post';
            f.action = 'act_railroad.php';
            document.body.appendChild(f);

            for (i = 0, n = pts.length; i < n; i++) {
                var el = document.createElement('input');

                el.style = 'display: none';
                el.type = 'text';
                el.name = 'point_lat_' + i;
                el.value = pts[i].lat;
                f.appendChild(el);

                el = document.createElement('input');
                el.style = 'display: none';
                el.type = 'text';
                el.name = 'point_lon_' + i;
                el.value = pts[i].lon;
                f.appendChild(el);
            }

            var sub = document.createElement('input');
            sub.style = 'display: none';
            sub.type = 'submit';
            f.appendChild(sub);
            sub.click();
        }
    }});

    OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
        initialize: function(options) {
            this.handlerOptions = OpenLayers.Util.extend(
                {}, this.defaultHandlerOptions
            );
            OpenLayers.Control.prototype.initialize.apply(
                this, arguments
            );
            this.handler = new OpenLayers.Handler.Click(
                this, {
                    'click': this.trigger
                }, this.handlerOptions
            );
        },

        trigger: function(e) {
            var lonlat = map.getLonLatFromViewPortPx(e.xy);
            var text =
                "<form method='POST' action='act_railroad.php'>" +
                "<input type='text' placeholder='Название станции' name='st_name' />" +
                "<input type='text' placeholder='Код АСУЖТ' name='st_code' />" +
                "<input type='submit' value='Добавить станцию' />" +
                "<input type='text' style=\"display: none\" name='st_lon' value=" + lonlat.lon + " />" +
                "<input type='text' style=\"display: none\" name='st_lat' value=" + lonlat.lat + " />" +
                "</form>";
            addMarker(lonlat, "https://pp.userapi.com/c845417/v845417003/deaf2/xzNURXcsTZ4.jpg",
                new OpenLayers.Size(30, 30), "station" + cnt++, new OpenLayers.Size(300, 100), text);
        }

    });

    /* Activate clicker */
     var click = new OpenLayers.Control.Click();
     map.addControl(click);
     click.activate();
} /* End of 'addClickControl' function */
