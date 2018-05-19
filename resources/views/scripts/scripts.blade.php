<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/owl.carousel.min.js') }}"></script>--}}
<script src="{{ asset('js/scrollup.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/price-range.js') }}"></script>
{{--<script src="{{ asset('js/smoothscroll.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/smoothscroll.min.js') }}"></script>--}}

{{--<script>--}}
    {{--// This example requires the Places library. Include the libraries=places--}}
    {{--// parameter when you first load the API. For example:--}}
    {{--// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">--}}

    {{--function initMap() {--}}
        {{--var map = new google.maps.Map(document.getElementById('map'), {--}}
            {{--center: {lat: 42.681771, lng: 23.322644},--}}
            {{--zoom: 17--}}
        {{--});--}}
        {{--var card = document.getElementById('pac-card');--}}
        {{--var input = document.getElementById('pac-input');--}}
        {{--var types = ['neighborhood'];--}}
        {{--var strictBounds = document.getElementById('strict-bounds-selector');--}}
        {{--var options = {--}}
            {{--types: ['geocode']--}}
        {{--};--}}
        {{--map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);--}}

        {{--var autocomplete = new google.maps.places.Autocomplete(input, options);--}}

        {{--// Set initial restrict to the following country.--}}
        {{--autocomplete.setComponentRestrictions(--}}
            {{--{'country': 'bg'});--}}

        {{--// Bind the map's bounds (viewport) property to the autocomplete object,--}}
        {{--// so that the autocomplete requests use the current map bounds for the--}}
        {{--// bounds option in the request.--}}
        {{--autocomplete.bindTo('bounds', map);--}}

        {{--var infowindow = new google.maps.InfoWindow();--}}
        {{--var infowindowContent = document.getElementById('infowindow-content');--}}
        {{--infowindow.setContent(infowindowContent);--}}
        {{--var marker = new google.maps.Marker({--}}
            {{--map: map,--}}
            {{--anchorPoint: new google.maps.Point(0, -29)--}}
        {{--});--}}

        {{--autocomplete.addListener('place_changed', function () {--}}
            {{--infowindow.close();--}}
            {{--marker.setVisible(false);--}}
            {{--var place = autocomplete.getPlace();--}}
            {{--if (!place.geometry) {--}}
                {{--// User entered the name of a Place that was not suggested and--}}
                {{--// pressed the Enter key, or the Place Details request failed.--}}
                {{--window.alert("Не са намерени данни за : '" + place.name + "'Опитайте със сходно имe.");--}}
                {{--return;--}}
            {{--}--}}
            {{--console.log(place);--}}
            {{--var lat = place.geometry.location.lat();--}}
            {{--var lng = place.geometry.location.lng();--}}
            {{--console.log(place.geometry.location.lat());--}}
            {{--console.log(place.geometry.location.lng());--}}
            {{--console.log(place.formatted_address);--}}
            {{--var test =$('input#lat').val(lat);--}}
            {{--var tes1 = $('input#lng').val(lng);--}}
            {{--// If the place has a geometry, then present it on a map.--}}
            {{--if (place.geometry.viewport) {--}}
                {{--map.fitBounds(place.geometry.viewport);--}}
            {{--} else {--}}
                {{--map.setCenter(place.geometry.location);--}}
                {{--map.setZoom(17);  // Why 17? Because it looks good.--}}
            {{--}--}}
            {{--marker.setPosition(place.geometry.location);--}}
            {{--marker.setVisible(true);--}}

            {{--for (var i = 0; i < place.address_components.length; i++) {--}}
                {{--for (var j = 0; j < place.address_components[i].types.length; j++) {--}}
                    {{--if (place.address_components[i].types[j] == "postal_code") {--}}
                        {{--console.log(place.address_components[i].long_name);--}}
                    {{--}--}}
                {{--}--}}
            {{--}--}}

            {{--var address = '';--}}
            {{--if (place.address_components) {--}}
                {{--address = [--}}
                    {{--(place.address_components[0] && place.address_components[0].short_name || ''),--}}
                    {{--(place.address_components[1] && place.address_components[1].short_name || ''),--}}
                    {{--(place.address_components[2] && place.address_components[2].short_name || '')--}}
                {{--].join(' ');--}}
            {{--}--}}

            {{--infowindowContent.children['place-icon'].src = place.icon;--}}
            {{--infowindowContent.children['place-name'].textContent = place.name;--}}
            {{--infowindowContent.children['place-address'].textContent = address;--}}
            {{--infowindow.open(map, marker);--}}
        {{--});--}}

{{--//            autocomplete.setTypes(types);--}}


    {{--}--}}
{{--</script>--}}

{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=--}}
{{--AIzaSyAEw6OPS5Cscr1vP_VCb_PfAmlTU0onm5k&libraries=places&language=bg&callback=initMap" async defer></script>--}}