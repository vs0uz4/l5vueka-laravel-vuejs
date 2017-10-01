<script>
    import bus from '../utils/events/bus'
    export default {
        props: ['token'],
        data () {
            return {
                user: {
                    id: 0,
                    name: '',
                    email: '',
                    password: '',
                    created_at: '',
                    updated_at: '',
                }
            }
        },
        computed: {
            isEditing () {
                return this.user.id !== 0
            },
            action () {
                if (this.isEditing) {
                    return `/usuarios/atualizar/${this.user.id}`
                } else {
                    return `/usuarios/criar`
                }
            },
        },
        mounted () {
            const userFormModal = jQuery(this.$refs.userFormModal)

            bus.$on('open-form', (obj) => {
                if (obj !== undefined){
                    this.user = obj.user
                }

                userFormModal.modal('show')
            })

            userFormModal.on('hidden.bs.modal', () => {
                this.user.id = 0
                this.user.name = ''
                this.user.email = ''
                this.user.password = ''
                this.user.created_at = ''
                this.user.updated_at = ''
            })
        }
    }
</script>

<template>
    <div>
        <!-- /.modal -->
        <div ref="userFormModal" class="modal fade" tabindex="-1" role="dialog">
            <!-- /.modal-dialog -->
            <div class="modal-dialog" role="document">
                <!-- /.modal-content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Criar Novo Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form ref="userForm" method="post" :action="action">
                            <input id="_token" name="_token" type="hidden" :value="token">
                            <div class="form-group">
                                <label for="name" class="control-label">Nome</label>
                                <input id="name" name="name" type="text" class="form-control" v-model="user.name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail</label>
                                <input id="email" name="email" type="email" class="form-control" v-model="user.email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" name="password" type="password" class="form-control" v-model="user.password">
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