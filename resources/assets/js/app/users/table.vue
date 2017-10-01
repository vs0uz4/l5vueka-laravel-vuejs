<script>
    import moment from 'moment'

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
            }
        }
    }
</script>

<template>
    <div>
        <table class="table table-bordered table-striped">
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
                <td class="text-center">
                    <a href="#" @click.prevent="toggle(user.id)">
                        <i class="fa fa-fw" :class="{
                                    'fa-plus-circle red'  : !details.includes(user.id),
                                    'fa-minus-circle green' : details.includes(user.id)
                                }" aria-hidden="true"></i>
                    </a>
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td class="text-center">{{ formatDate(user.created_at) }}</td>
                <td class="text-center">
                    <a href="#"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-fw fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <tr v-show="details.includes(user.id)">
                <td colspan="5">
                    <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i>Placeholder para Endereço
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style>
    .green {
        color: red;
    }
    .red {
        color: green;
    }
</style>
