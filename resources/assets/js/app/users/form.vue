<script>
    import bus from '../utils/events/bus'
    export default {
        props: ['token'],
        data () {
            return {
                fillUser: {
                    id: '',
                    name: '',
                    email: '',
                    created_at: '',
                    updated_at: ''
                },
                newUser: {
                    name: '',
                    email: '',
                    password: ''
                },
                isEditing: false,
            }
        },
        computed: {
            action () {
                if (this.isEditing) {
                    return `/usuarios/atualizar/${this.fillUser.id}`
                } else {
                    return `/usuarios/criar`
                }
            },
        },
        mounted () {
            const editUserModal = jQuery(this.$refs.editUserModal)
            const newUserModal = jQuery(this.$refs.newUserModal)

            bus.$on('open-form', (obj) => {
                if (obj !== undefined){
                    this.isEditing = true
                    this.fillUser = obj.user
                    editUserModal.modal('show')
                } else {
                    this.isEditing = false
                    this.newUser.name = ''
                    this.newUser.email = ''
                    this.newUser.password = ''
                    newUserModal.modal('show')
                }
            })

            editUserModal.on('hidden.bs.modal', () => {
                this.isEditing = false
            })
        }
    }
</script>

<template>
    <div>
        <!-- /.modal -->
        <div ref="editUserModal" class="modal fade" tabindex="-1" role="dialog">
            <!-- /.modal-dialog -->
            <div class="modal-dialog" role="document">
                <!-- /.modal-content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-fw fa-user"></i>Alterar Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" :action="action">
                            <input id="_token" name="_token" type="hidden" :value="token">
                            <div class="form-group">
                                <label for="name" class="control-label">Nome</label>
                                <input id="name" name="name" type="text" class="form-control" v-model="fillUser.name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail</label>
                                <input id="email" name="email" type="email" class="form-control" v-model="fillUser.email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" name="password" type="password" class="form-control" v-model="fillUser.password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /.modal -->
        <div ref="newUserModal" class="modal fade" tabindex="-1" role="dialog">
            <!-- /.modal-dialog -->
            <div class="modal-dialog" role="document">
                <!-- /.modal-content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-fw fa-user"></i>Criar Novo Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" :action="action">
                            <input id="_token" name="_token" type="hidden" :value="token">
                            <div class="form-group">
                                <label for="name" class="control-label">Nome</label>
                                <input id="name" name="name" type="text" class="form-control" v-model="newUser.name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail</label>
                                <input id="email" name="email" type="email" class="form-control" v-model="newUser.email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" name="password" type="password" class="form-control" v-model="newUser.password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</template>