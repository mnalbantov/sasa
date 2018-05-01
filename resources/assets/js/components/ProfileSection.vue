<template>
    <div class="ad-profile section">
        <div class="user-profile">
            <div class="user-images">
                <img src="" alt="User Images" class="img-circle">
            </div>
            <div class="user">
                <h2><a href="#">Иван Димитров</a></h2>
                <h5>Последно онлайн на: 14-01-2016 6:40 AM [ USA time (GMT + 6:00hrs)]</h5>
            </div>

            <div class="favorites-user">
                <div class="favorites">
                    <a href="my-ads.html">23<small>Мои обяви</small></a>
                </div>
                <div class="favorites">
                    <a href="#">18<small>Любими</small></a>
                </div>
            </div>
        </div>
        <!-- user-profile -->

        <ul class="user-menu">
            <li  class=" active"><a href="#" @click.prevent="profile" >Профил</a></li>
            <li><a href="my-ads">Обяви</a></li>
            <li><a href="favourite-ads.html">Любими</a></li>
            <li><a href="archived-ads.html">Архивирани</a></li>
            <li><a href="pending-ads.html">Чакащи</a></li>
            <li><a href="delete-account.html">Настройки</a></li>
        </ul>
    </div>
</template>

<script>
    import  Vue from 'vue';
    import VueResource from 'vue-resource';
    Vue.use(VueResource);
    export default {
        name: "ProfileSection.vue",
        data() {
            return {
                user: []
            }
        },
        mounted() {
            this.$http.get('/profile',{}).then(function(data) {
                this.user = data.body;
            });
        },
            methods: {
                profile:function() {
                    this.$http.get('/profile',{}).then(function(data) {
                        this.user = data.body;
                        console.log(this.user.name);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
    }
</script>

<style scoped>

</style>