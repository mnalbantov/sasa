<template>
    <div class="col-md-8">
        <form ref="form" v-on:submit.prevent="submit" method="post" action="post-ad">
            <div id="maps" ref="map"></div>
            <hr>
            <div :class="{'has-error': errors.has('location')}" class="form-group">
                <label for="pac-input">Локация на жилището</label>
                <input v-validate="'required'" data-vv-as="Локация" data-vv-id="1" name="location"
                       v-on:keypress.enter.prevent="show" id="pac-input" ref="autocomplete"
                       placeholder="Например: бул Черни Връх, София"
                       class="form-control"
                       type="text"/>
                <span class="help-block" v-if="errors.has('location')">
                                <strong>{{errors.first('location')}}</strong>
                            </span>
            </div>

            <input name="lat" :value="lat" type="hidden">
            <input name="lng" :value="lng" type="hidden">
            <input name="address" :value="address" type="hidden">
            <input name="city" :value="city" type="hidden">
            <input name="neighborhood" :value="neighborhood" type="hidden">
            <input name="zip_code" :value="zip_code" type="hidden">
            <input name="_token" :value="csrf" type="hidden"><br>
            <!--<a v-on:click="confirm" class="btn form-control btn-info">Подтвърди адрес</a>-->

            <fieldset>
                <input name="_token" :value="csrf" type="hidden">
                <div class="section postdetails">
                    <h4>Публикуване на обява<span class="pull-right">* Задължителни полета</span></h4>
                    <div class="form-group selected-product">
                        <ul class="list-inline">
                            <li>
                                <a href="#">
                                    <img src="images/icon/3.png" alt="Images" class="img-responsive">
                                </a>
                                <h3>За жилището</h3>
                            </li>
                        </ul>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3">Тип жилище<span class="required">*</span></label>
                        <div class="col-sm-9 user-type">

                            <span v-for="type,index in propertyTypes">
                                <input :id="type.name" ref="type" data-vv-id="2" name="propertyType" :value="type.id"
                                       type="radio"
                                       v-model="propertyType">
                                <label :for="type.name">{{ type.name }}</label>
                            </span>
                        </div>
                    </div>
                    <div class="row form-group additional">
                        <label class="col-sm-3 label-title">Удобства<span
                                class="required">*</span></label>
                        <div class="col-sm-9" :class="{'has-error': errors.has('propertyAttr[]')}">
                            <div class="checkbox" v-model="chosenAttributes" v-validate="'required:true'" data-vv-id='3'
                                 data-vv-as="Удобства">
                                <div v-for="attr in propertyAttributes">
                                    <label :for="attr.name">
                                        <input v-model="chosenAttributes" type="checkbox" name="propertyAttr[]"
                                               :value="attr.id"
                                               :id="attr.name">{{ attr.name }}
                                    </label>
                                </div>
                            </div>
                            <span class="help-block" v-if="errors.has('propertyAttr[]')">
                                <strong>{{errors.first('propertyAttr[]')}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Заглавие на обявата<span
                                class="required">*</span></label>
                        <div class="col-sm-9 " :class="{'has-error': errors.has('title')}">
                            <input data-vv-as="Заглавие на обява" v-model="title" data-vv-id="4"
                                   v-validate="'required|min:10'" type="text" value="" class="form-control " id="text"
                                   name="title"
                                   placeholder="пр. Двустаен апартамент / Стая от многостаен">
                            <span class="help-block" v-if="errors.has('title')">
                                <strong>{{errors.first('title')}}</strong>
                            </span>
                        </div>

                    </div>

                    <div class="row form-group select-condition">
                        <label class="col-sm-3">Състояние на жилището<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="radio" name="condition" value="new" id="new">
                            <label for="new">Ново</label>
                            <input type="radio" name="condition" value="used" id="used">
                            <label for="used">Използвано</label>
                        </div>
                    </div>
                    <div class="row form-group select-price">
                        <label class="col-sm-3 label-title">Наем (за месец)<span class="required"> *</span></label>
                        <div class="col-sm-6" :class="{'has-error': errors.has('price')}">
                            <label>BGN лв</label>
                            <input type="number" step="any" data-vv-as="Наем" v-model="price" name="price" data-vv-id="5"
                                   v-validate="'required|min:0'" placeholder="650 лв" class="form-control">
                            <span class="help-block" v-if="errors.has('price')">
                                <strong>{{errors.first('price')}}</strong>
                            </span>
                            <div class="checkbox">
                                <label for="uBills">
                                    <input type="checkbox" value="" id="uBills">Разходи за комунални услуги,които се
                                    заплащат с наема</label>
                            </div>
                            <div id="utilityCosts" style="display: none;" class=" col-sm-5">
                                <small for="">Комунални сметки на месец (лв)</small>
                                <input type="number"  step="any" name="utilityCosts" value="" class="form-control" id="text1"
                                       placeholder="300 лв">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Текущи съквартиранти</h3>
                    <br>
                    <label for="fun" class="control-label">Брой съквартиранти</label>
                    <div class="input-group">
                        <div id="radioBtn" class="btn-group">
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">0</a>
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">1</a>
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="2">2</a>
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="3">3</a>
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="4+">4+</a>
                        </div>
                        <input type="hidden" name="roommates" id="roommates">
                    </div>
                    <br>
                    <div id="gender" style="display: none;" class="input-group">
                        <div class="btn-group">
                            <a class="btn-sm btn-primary notActive" data-toggle="gender" data-title="1">Мъже</a>
                            <a class="btn-sm btn-danger notActive" data-toggle="gender" data-title="2">Жени</a>
                            <a class="btn-sm btn-info notActive" data-toggle="gender" data-title="3">И двете</a>
                        </div>
                    </div>
                    <hr>
                    <h3>Предпочитани съквартиранти</h3><br>
                    <div class="input-group">
                        <div id="radioBtn" class="btn-group">
                            <a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">Мъже</a>
                            <a class="btn btn-danger btn-sm notActive" data-toggle="roommates" data-title="1">Жени</a>
                            <a class="btn btn-warning btn-sm notActive" data-toggle="roommates" data-title="1">Без
                                значение</a>
                        </div>
                        <input type="hidden" name="roommates" id="roommates">
                    </div>

                </div><!-- section -->

                <div class="section seller-info">
                    <h4>Информация за теб</h4>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Аз съм:<span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="radio" name="sellerType" value="individual" id="individual">
                            <label for="individual">Квартирант</label>
                            <input v-model="landlord" type="radio" name="sellerType" value="landlord" id="landlord">
                            <label for="landlord">Хазяин</label>
                            <input type="radio" name="sellerType" value="dealer" id="dealer">
                            <label for="dealer">Агент</label>
                        </div>
                        <div  class="row col-sm-9 checkbox">
                            <label for="living">
                                <input type="checkbox" name="send" id="living">
                                Живея в жилището
                            </label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Your Name<span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"
                                   placeholder="ex, Jhon Doe">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">E-mail адрес<span class="required">*</span></label>
                        <!--<div class="col-sm-9">-->
                        <!--<input type="email"  {{ isset($user->email) ? 'disabled' : '' }} class="form-control" value="{{ $user->email or '' }}"-->
                        <!--placeholder="{{ $user->email or '' }}">-->
                        <!--</div>-->
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="mobileNumber" class="form-control"
                                   placeholder="ex, +912457895">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 label-title">Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control"
                                   placeholder="ex, alekdera House, coprotec, usa">
                        </div>
                    </div>
                </div><!-- section -->

                <div class="section">
                    <h4>Make your Ad Premium </h4>
                    <p>More replies means more interested buyers. With lots of interested buyers, you
                        have a better chance of selling for the price that you want. <a href="#">Learn
                            more</a></p>
                    <ul class="premium-options">
                        <li class="premium">
                            <input type="radio" name="premiumOption" value="day-one" id="day-one">
                            <label for="day-one">Regular Ad Per Day</label>
                            <span>$20.00</span>
                        </li>
                        <li class="premium">
                            <input type="radio" name="premiumOption" value="day-two" id="day-two">
                            <label for="day-two">Top Ad for 3 days</label>
                            <span>$30.00</span>
                        </li>
                        <li class="premium">
                            <input type="radio" name="premiumOption" value="day-three" id="day-three">
                            <label for="day-three">Top Ad for 7 days</label>
                            <span>$50.00</span>
                        </li>
                        <li class="premium">
                            <input type="radio" name="premiumOption" value="day-four" id="day-four">
                            <label for="day-four">Daily Bump Up for 7 days</label>
                            <span>$100.00</span>
                        </li>
                    </ul>
                </div><!-- section -->

                <div class="checkbox section agreement">
                    <label for="send">
                        <input type="checkbox" name="send" id="send">
                        Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www
                        By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a
                            href="#">Privacy Policy</a> and acknowledge that you are the rightful
                        owner of this item and using Trade to find a genuine buyer.
                    </label>
                    <button type="submit" class="btn btn-primary">Публикувай</button>
                </div><!-- section -->

            </fieldset>
        </form><!-- form -->
    </div>
</template>
<script>
    import Vue from 'vue';
    import VueResource from 'vue-resource';
    import {Validator} from 'vee-validate';

    Validator.localize('bg');
    Vue.use(VueResource);
    export default {
        name: 'app',
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                propertyTypes: [],
                propertyAttributes: {},
                user: {},
                propertyType: 0,
                chosenAttributes: [],
                title: '',
                price: '',
                lat: 0,
                lng: 0,
                address: '',
                neighborhood: '',
                city: '',
                zip_code: '',
                showForm: null,
                landlord: false,
            }
        },

        mounted() {
            this.$http.get('/getAdOptions', {
                function () {
                }
            }).then(function (data) {
                this.propertyTypes = data.body.propertyTypes
                this.propertyAttributes = data.body.propertyAttributes;
                this.user = data.body.user;

            });
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
                zoom: 12,
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
                address = address.replace(/\d/g, '');
                address = address.trim();
                this.address = address;
                this.neighborhood = '';
                this.zip_code = '';
                for (var i = 0; i < ac.length; i++) {
                    for (var j = 0; j < ac[i].types.length; j++) {
                        if (ac[i].types[j] == 'neighborhood') {
                            this.neighborhood = ac[i].short_name;
                        }
                        if (ac[i].types[j] == 'postal_code') {
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
        methods: {
            submit(e) {
                e.preventDefault();
                this.$validator.validateAll().then(res => {
                    // console.log(this.$validator.errors.items);
                    if (!res) {
                        this.$el.querySelector('[data-vv-id="' + this.$validator.errors.items[0].id + '"]').scrollIntoView();
                        return false;
                    }
                    this.$refs.form.submit();
                }).catch(reason => {
                    console.log(reason);
                });
            },
            confirm: function () {
                if (this.lat === 0 || this.lng === 0) {
                    return false;
                }
                this.showForm = true;
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
                    zoom: 16,
                    minZoom: 9,
                    maxZoom: 15,
                    draggable: false,
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

<style scoped>
    #maps {
        width: 100%;
        height: 300px;
    }
</style>