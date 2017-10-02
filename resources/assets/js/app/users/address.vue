<script>
    export default {
        props: ['address'],
        computed: {
            hasAddress () {
                return this.address !== undefined
            }
        },
    }
</script>

<template>
    <div>
        <div class="address" v-if="hasAddress">
            <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i> {{ address.street }}, {{ address.number }} - {{ address.city }}, {{ address.state }}
        </div>
    </div>
</template>

<style scoped>
    .address {
        padding: 5px;
        margin: 5px 5px 5px 0;
        background-color: #f9f7ee;
        border: 1px solid #f3ede5;
        border-radius: 5px;
    }
</style>