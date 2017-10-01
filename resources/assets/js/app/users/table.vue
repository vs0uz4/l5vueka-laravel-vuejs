<script>
    import moment from 'moment'
    import bus from '../utils/events/bus'

    export default {
        props: ['list'],
        data() {
            return {
                details: [],
            }
        },
        computed: {
            users () {
                return JSON.parse(this.list)
            },
            hasUsers () {
                return this.users.length > 0
            },
        },
        methods: {
            toggle (id) {
                if (id === undefined) {
                    this.toggleAll()
                } else {
                    this.toggleOne(id)
                }
            },
            toggleAll () {
                if (this.details.length > 0) {
                    this.details = []
                } else {
                    this.details = this.users.map(user => user.id)
                }
            },
            toggleOne (id){
                if (this.details.includes(id)) {
                    const index = this.details.indexOf(id)
                    this.details.splice(index, 1)
                } else {
                    this.details.push(id)
                }
            },
            formatDate (date) {
                return moment(date).format('DD/MM/YYYY')
            },
            edit (user) {
                bus.$emit('open-form', { user: user, title: 'Editar Usuário'})
            },
            remove (id) {
                const confirm = window.confirm('Tem Certeza da Exclusão?')

                if (confirm) {
                    window.location = `usuarios/remover/${id}`
                }
            },
        }
    }
</script>

<template>
    <div>
        <h5 v-show="!hasUsers">
            Ainda Não Há Usuários Cadastrados.
        </h5>
        <table class="table table-bordered table-striped" v-show="hasUsers">
            <thead>
            <tr>
                <th class="text-center">
                    <a href="#" @click.prevent="toggle()">
                        <i class="fa fa-fw" :class="{
                                    'fa-plus-circle red'    : details.length === 0,
                                    'fa-minus-circle green' : details.length > 0
                                }" aria-hidden="true"></i>
                    </a>
                </th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="text-center">Data de Criação</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody v-for="user in users">
            <tr>
                <td width="2%" nowrap>
                    <a href="#" @click.prevent="toggle(user.id)">
                        <i class="fa fa-fw" :class="{
                                    'fa-plus-circle red'  : !details.includes(user.id),
                                    'fa-minus-circle green' : details.includes(user.id)
                                }" aria-hidden="true"></i>
                    </a>
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td width="12%" class="text-center" nowrap>{{ formatDate(user.created_at) }}</td>
                <td width="1%" class="text-center" nowrap>
                    <a href="#" @click.prevent="edit(user)"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i></a>
                    <a href="#" @click.prevent="remove(user.id)"><i class="fa fa-fw fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <tr v-show="details.includes(user.id)">
                <td colspan="5">
                    <div class="row col-md-6" v-for="address in user.addresses">
                        <div class="address">
                            <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i> {{ address.street }}, {{ address.number }} - {{ address.city }}, {{ address.state }}
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style>
    .address {
        padding: 5px;
        margin: 5px 5px 5px 0;
        background-color: #f9f7ee;
        border: 1px solid #f3ede5;
        border-radius: 5px;
    }
    .green {
        color: red;
    }
    .red {
        color: green;
    }
</style>
