<script>
    import VdUsersTable from './table.vue'
    import VdUserForm from './form.vue'
    import bus from '../utils/events/bus'
    export default {
        props: ['list', 'token', 'success'],
        components: {
            VdUsersTable,
            VdUserForm
        },
        methods: {
            form (){
                bus.$emit('open-form')
            }
        }
    }
</script>

<template>
    <div>
        <h1>
            <i class="fa fa-w fa-users" aria-hidden="true"></i> Gerenciamento de Usuários
            <a href="#" @click.prevent="form" class="btn btn-default"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Novo Usuário</a>
        </h1>
        <div class="alert alert-success" v-show="success != ''">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ success }}
        </div>
        <vd-user-form :token="token"></vd-user-form>
        <vd-users-table :list="list"></vd-users-table>
    </div>
</template>
