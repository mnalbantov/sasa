<template>
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
    <div id="gende1r" style="display: none;" class="input-group">
        <div class="btn-group">
            <a class="btn-sm btn-primary notActive" data-toggle="gender" data-title="1">Мъже</a>
            <a class="btn-sm btn-danger notActive" data-toggle="gender" data-title="2">Жени</a>
            <a class="btn-sm btn-info notActive" data-toggle="gender" data-title="3">И двете</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Roommates.vue"
    }
</script>

<style scoped>

</style>