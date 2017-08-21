/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadMarkers() {
    map.markers = map.markers || []
    downloadUrl(xmlUrl, function(data) {
        var xml = data.responseXML;
        markers = xml.documentElement.getElementsByTagName("marker");
        //console.log(markers.length);
        for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var mark_id = markers[i].getAttribute("mark_id");
            var type= markers[i].getAttribute("type");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lng")));
            var html = "<div class='infowindow'><b>" + name + "</b> <br/>" + address+'<br/></div>';
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              //icon: image, 
              title: name
            });
            map.markers.push(marker);
            bindInfoWindow(marker, map, infoWindow, html);
        }
    });
}
function downloadUrl(url, callback) {
                      var request = window.ActiveXObject ?
                          new ActiveXObject('Microsoft.XMLHTTP') :
                          new XMLHttpRequest;

                      request.onreadystatechange = function() {
                        if (request.readyState == 4) {
                          //request.onreadystatechange = doNothing;
                          callback(request, request.status);
                        }
                      };

                      request.open('GET', url, true);
                      request.send(null);
}