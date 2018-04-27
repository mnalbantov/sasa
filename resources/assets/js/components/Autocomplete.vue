<template>
        <form ref="form" v-on:submit.prevent="submit" method="post" action="ads">
                <input  v-on:keypress.enter.prevent="show"  id="pac-input" ref="autocomplete"
                       placeholder="Например: бул Черни Връх, София"
                        class="form-control"
                       type="text" />
                <input name="lat" :value="lat" type="hidden">
                <input name="lng" :value="lng" type="hidden">
                <input name="address" :value="address" type="hidden">
                <input name="_token" :value="csrf" type="hidden">
                <button id="search" type="submit" class="form-control" value="Търси">Търсене</button>
        </form>
</template>

<script>
    export default {
        mounted(){
            let options = {
                types:['geocode'],
                componentRestrictions: {country: "bg"}
            };
            this.autocomplete = new google.maps.places.Autocomplete(
                (this.$refs.autocomplete),
                options
            );
            this.autocomplete.addListener('place_changed',() => {
                
                let place = this.autocomplete.getPlace();
                let ac = place.address_components;
                let lat = place.geometry.location.lat();
                let lon = place.geometry.location.lng();
                let city = ac[0]["short_name"];
                this.lat = JSON.stringify(lat);
                this.lng = JSON.stringify(lon);
                this.address = place.formatted_address;
                console.log(ac);
            });
        },

        data: function() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                lat: 0,
                lng: 0,
                address: '',
                error: false
            }
        },
        methods: {
                submit: function(){
                    if(this.lat === 0 || this.lng === 0){
                        return false;
                    }
                    this.$refs.form.submit();
                },
                show: function(){
                  if(this.lat === 0 || this.lng === 0 || !this.address){
                      this.error = true;
                      return false;
                  }
                }
        }
    }
</script>
