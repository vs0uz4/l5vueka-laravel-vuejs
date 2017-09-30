<script>
    export default {
        methods: {
            mensagem () {
                alert('Olá!')
            }
        },
        data (){
            return {
                buttonLabel: 'Diga Olá!'
            }
        },
    }
</script>

<template>
    <div>
        <h2>Componente Vue</h2>
        <div>Primeiro Componente</div>
        <button @click="mensagem" class="btn btn-default btn-xs">
            {{ buttonLabel }}
        </button>
        <hr>
        <input type="text" class="form-control" v-model="buttonLabel" placeholder="Digite Aqui a Label do Botão">
    </div>
</template>