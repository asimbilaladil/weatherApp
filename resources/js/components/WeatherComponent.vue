<template>
    <div>
        <select v-model="city" @change="filter">
            <option value="All">All</option>
            <option value="Mitte">Mitte</option>
            <option value="Berlin">Berlin</option>
        </select>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Time</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Temp</th>
                <th scope="col">Pressure</th>
                <th scope="col">Humidity</th>
                <th scope="col">Temp Min</th>
                <th scope="col">Temp Max</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="item in weather">
                <td>{{item.name}}</td>
                <td>{{item.time}}</td>
                <td>{{item.latitude}}</td>
                <td>{{item.longitude}}</td>
                <td>{{item.temp}}</td>
                <td>{{item.pressure}}</td>
                <td>{{item.humidity}}</td>
                <td>{{item.temp_min}}</td>
                <td>{{item.temp_max}}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    const axios = require("axios");

    export default {
        name: "WeatherComponent",
        mounted () {
            this.weatherInformation();
        },
        data(){
            return {
                weather:[],
                city:null,
            }
        },
        methods:{
            filter(){
                let self = this;
                if(self.city == 'All'){
                    self.weatherInformation()
                    return;
                }
                self.weatherInformationByName();
                return;
            },
            async weatherInformationByName(){
                let self = this;
                await axios.get("api/weather/data/"+self.city)
                    .then(function (response) {
                        let status = response.data;
                        if (response.status == 200) {
                            self.weather = response.data.data;
                        }
                    })
                    .catch(function (error) {
                        return [];
                    });
            },
            async weatherInformation(){
                let self = this;
                await axios.get("api/weather/data")
                    .then(function (response) {
                        let status = response.data;
                        if (response.status == 200) {
                            self.weather = response.data.data;
                        }
                    })
                    .catch(function (error) {
                        return [];
                    });
            },
        }
    }
</script>

<style scoped>

</style>

