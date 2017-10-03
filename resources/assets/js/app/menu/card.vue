<script>
    export default {
        props: ['menuitem'],
        computed: {
            hasItem () {
                return this.menuitem !== undefined
            }
        },
    }
</script>

<template>
    <div>
        <div class="thumbnail" v-show="hasItem">
            <img :src="menuitem.img" :alt="menuitem.title">
            <div class="caption">
                <h3 class="title">{{ menuitem.title }}</h3>
                <p class="description">{{ menuitem.description }}</p>
                <p><a :href="menuitem.url" class="btn btn-primary" role="button" :class="menuitem.disabled ? 'disabled': ''">Abrir</a></p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .title {
        font-variant-caps: all-small-caps;
    }
    .description {
        text-transform: capitalize;
    }
</style>