<template>
    <select name="town" id="town" class="form-control">
        <option value="">Please Select</option>
        <option v-for="town in towns" :value="town.id" :key="town.id">{{ town.title }}</option>
    </select>
</template>

<script>
import { EventBus } from './../libs/event-bus';

export default {
    data() {
        return {
            towns: []
        }
    },
    created() {
        EventBus.$on('city-change', city_id => {
            this.getTowns(city_id);
        });
    },
    mounted() {
        this.getTowns();
    },
    methods: {
        getTowns(city_id = null) {
            if (city_id) {
                axios.get('town', {
                    params: {
                        cityId: city_id
                    }
                }).then((response) => {
                    this.towns = response.data;
                });
            }else{
                this.towns = [];
            }
        }
    }
}
</script>

<style>
    #town{
        height: inherit !important;
    }
</style>
