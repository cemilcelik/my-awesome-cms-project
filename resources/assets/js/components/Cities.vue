<template>
    <select name="city" id="city" class="form-control" @change="getTowns">
        <option value="">Please Select</option>
        <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.title }}</option>
    </select>
</template>

<script>
import { EventBus } from './../libs/event-bus';

export default {
    data() {
        return {
            cities: []
        }
    },
    created() {
        this.getCities();
    },
    methods: {
        getCities() {
            axios.get('city').then((response) => {
                this.cities = response.data;
            });
        },
        getTowns(e) {
            EventBus.$emit('city-change', e.target.value);
        }
    }
};
</script>

<style>
    #city{
        height: inherit !important;
    }
</style>
