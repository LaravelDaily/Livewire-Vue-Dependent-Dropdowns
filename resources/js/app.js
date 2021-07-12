require("./bootstrap");

import Vue from "vue";

Vue.component("country-city", require("./components/CountryCity.vue").default);

const app = new Vue({
    el: "#app"
});
