<script>
    import VdCard from './card.vue'
    export default {
        components: {
            VdCard
        },
        data (){
            return {
                menuitems: [
                    {
                        title: 'usuarios',
                        description: 'cadastro de usuários',
                        url: '/usuarios',
                        img: 'imgs/users.png',
                        disabled: false,
                    },
                    {
                        title: 'endereços',
                        description: 'cadastro de endereços',
                        url: '/enderecos',
                        img: 'imgs/addresses.png',
                        disabled: true,
                    }
                ]
            }
        },
    }
</script>

<template>
    <div>
        <div class="row">
            <div class="col-sm-6 col-md-4" v-for="menuitem in menuitems">
                <vd-card :menuitem="menuitem"></vd-card>
            </div>
        </div>
    </div>
</template>