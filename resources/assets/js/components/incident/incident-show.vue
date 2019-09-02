<template>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4"> {{ brand.name }} </h3>
                    <h5 class="card-subtitle mb-3 text-muted"> Brand Created Date: {{ brand.created_at }} </h5>
                    <p v-bind:class="status(brand.brand_active)">{{ brand.name }} Is Currently {{ defaultActive(brand.brand_active) }}</p>
                    <p class="card-text"> Client Name: {{ client.firstname }}</p>
                    <p class="card-text"> Model: {{ vehicle.model }}</p>
                    <p class="card-text"> Name: {{ vehicle.name }}</p>
                    <p class="card-text"> Type: {{ vehicle.type }}</p>
                    <p v-bind:class="status(vehicle.car_active)">Vehicle Is Currently {{ defaultActive(vehicle.car_active) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Client ID No: 2018{{ client.id }}</h3>
                    <h5 class="card-subtitle mb-3">Case reported: {{ lv_case.created_at }}</h5>
                    <p class="card-text">Firstname: {{ client.firstname }}</p>
                    <p class="card-text">Lastname: {{ client.lastname }}</p>
                    <p  v-bind:class="status(lv_case.case_active)">Case no:2018{{ lv_case.id }} Is {{ defaultActive(lv_case.case_active) }}</p>
                    <p class="card-text">Car Name: {{ vehicle.name }}</p>
                    <p class="card-text">Color: {{ vehicle.color }}</p>
                    <p class="card-text">Type: {{ vehicle.type }}</p>
                    <p class="card-text">Registration no: {{ vehicle.registration }}</p>
                    <p  v-bind:class="status(lv_case.is_found)">{{ carFound(lv_case.is_found) }}</p>
                    <p  v-bind:class="status(lv_case.is_collected)">{{ carCollected(lv_case.is_collected) }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                client : '',
                vehicle : '',
                brand : '',
                lv_case : this.incident
            }
        },
        props: ['incident'],
        methods: {

            defaultActive: function (status){
                if (status == 1 || status == true || status == 'on') {
                    return ' Active';
                }else {
                    return ' NOT Active';
                }
            },

            status: function(status){
                if (status == 1) {
                    return 'card-text text-success';
                }else {
                    return 'card-text text-danger';
                }
            },

            carFound: function (isfound) {
                if (isfound == 1) {
                    return 'Car Has Been Found';
                } else {
                    return 'Car Has NOT Been Found Yet';
                }
            },

            carCollected: function (iscollected) {
                if (iscollected == 1) {
                    let client_name = this.client.firstname+ " "+ this.client.lastname;
                    return 'Car Has Been Collected by '+client_name;
                } else {
                    return 'Car is NOT Collected Yet';
                }
            }




        },
        created () {
            // isBrand();
        },
        mounted() {

            axios.get('/api/client/'+this.incident.client_id).then((response) => {
                this.client = response.data;
                /* Success */
            }).catch((error) => { 
                console.log(error.message);
                // error log here
            });

            axios.get('/api/vehicle/'+this.incident.vehicle_id).then((response) => {
                this.vehicle = response.data;
                /* Successs */
            }).catch((error) => { 
                console.log(error.message);
                // error lo here
            });

            axios.get('/api/brand/'+this.incident.brand_id).then((response) => {
                this.brand = response.data;
                /* success*/
            }).catch((error) => { 
                console.log(error.message);
                // error log here
            });
        }
    }
</script>