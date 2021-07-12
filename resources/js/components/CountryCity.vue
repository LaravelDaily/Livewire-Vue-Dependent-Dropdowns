<template>
    <div>
        <div class="mt-4">
            <label
                class="block font-medium text-sm text-gray-700"
                for="country"
            >
                Country*
            </label>
            <select
                name="country"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required
                v-model="selectedCountry"
                v-on:change="getCities(selectedCountry.id)"
            >
                <option value="">-- choose country --</option>
                <option
                    v-for="country in countries"
                    :value="country"
                    v-bind:key="country.id"
                    >{{ country.name }}</option
                >
            </select>
        </div>

        <div class="mt-4">
            <label
                class="block font-medium text-sm text-gray-700"
                for="country"
            >
                City*
            </label>
            <select
                name="city"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required
                v-model="selectedCity"
            >
                <option value="" v-if="cities.length == 0">-- choose country first --</option>
                <option
                    v-for="city in cities"
                    :value="city"
                    v-bind:key="city.id"
                    >{{ city.name }}</option
                >
            </select>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            countries: [],
            cities: [],
            selectedCity: "",
            selectedCountry: ""
        };
    },
    mounted() {
        axios
            .get("/api/countries")
            .then(response => (this.countries = response.data.data));
    },
    methods: {
        getCities(countryId) {
            axios
                .get("api/countries/" + countryId + "/cities")
                .then(response => (
                    (this.cities = response.data.data),
                    (this.selectedCity = this.cities[0])
                ));
        }
    }
};
</script>
