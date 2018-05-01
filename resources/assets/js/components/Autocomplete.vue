<template>
    <form ref="form" v-on:submit.prevent="submit" method="post" action="ads">
        <div id="maps" ref="map"></div>
        <input v-on:keypress.enter.prevent="show" id="pac-input" ref="autocomplete"
               placeholder="Например: бул Черни Връх, София"
               class="form-control"
               type="text"/>
        <input name="lat" :value="lat" type="hidden">
        <input name="lng" :value="lng" type="hidden">
        <input name="address" :value="address" type="hidden">
        <input name="city" :value="city" type="hidden">
        <input name="neighborhood" :value="neighborhood" type="hidden">
        <input name="zip_code" :value="zip_code" type="hidden">
        <input name="_token" :value="csrf" type="hidden">
        <button id="search" type="submit" class="form-control" value="Търси">Търсене</button>
    </form>
</template>

<script>
    export default {
        mounted() {
            let options = {
                types: ['geocode'],
                componentRestrictions: {country: "bg"}
            };
            this.autocomplete = new google.maps.places.Autocomplete(
                (this.$refs.autocomplete),
                options
            );
            this.map = new google.maps.Map((this.$refs.map), {
                center: {lat: 42.681771, lng: 23.322644},
                minZoom: 9,
                maxZoom: 17,
                zoom:12,
                scrollwheel: false,
                navigationControl: false,
                mapTypeControl: false,
                scaleControl: false,
                draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            });

            this.autocomplete.addListener('place_changed', () => {
                let place = this.autocomplete.getPlace();
                let ac = place.address_components;
                let lat = place.geometry.location.lat();
                let lon = place.geometry.location.lng();
                let city = ac[0]["short_name"];
                this.lat = parseFloat(lat);
                this.lng = parseFloat(lon);
                let address = place.formatted_address;
                address = address.replace(/\d/g,'');
                address = address.trim();
                this.address = address;
                this.neighborhood = '';
                this.zip_code = '';
                for (var i = 0; i < ac.length; i++){
                   for( var j =0; j < ac[i].types.length; j++){
                       if(ac[i].types[j] == 'neighborhood'){
                            this.neighborhood = ac[i].short_name;
                       }
                       if(ac[i].types[j] == 'postal_code'){
                           this.zip_code = ac[i].short_name;
                       }
                    }
                }
                // console.log(ac[1]['short_name']);
                // console.log(ac[2]['short_name']);
                this.setMap(this.lat, this.lng);
                this.addMarker(this.lat, this.lng, this.address);
            });
        },

        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                lat: 0,
                lng: 0,
                address: '',
                neighborhood: '',
                city : '',
                zip_code : '',
                error: false
            }
        },
        methods: {
            submit: function () {
                if (this.lat === 0 || this.lng === 0) {
                    return false;
                }
                this.$refs.form.submit();
            },
            show: function () {
                if (this.lat === 0 || this.lng === 0 || !this.address) {
                    this.error = true;
                    return false;
                }
                this.setMap(this.lat, this.lng);
                this.addMarker(this.lat, this.lng, this.address);

                        this.error = false;
            },
            setMap: function (lat, lng) {
                this.map = new google.maps.Map((this.$refs.map), {
                    center: {lat: lat, lng: lng},
                    zoom: 13,
                    minZoom: 9,
                    maxZoom: 15,
                });
            },
            addMarker: function (lat, lng, address) {
                let myLatLng = {lat: parseFloat(lat), lng: parseFloat(lng)};
                new google.maps.Marker({
                    position: myLatLng,
                    map: this.map,
                    title: 'Локация : ' + address,
                });
                let bounds = new google.maps.LatLngBounds();
                // console.log(this.map.getBounds().getNorthEast().lat());
                // console.log(this.map.getBounds().getNorthEast().lng());
                // console.log(this.map.getBounds().getSouthWest().lat());
                // console.log(this.map.getBounds().getSouthWest().lng());
            }
        }
    }
</script>
<style>
    #maps {
        width: 730px;
        height: 300px;
    }
</style>
