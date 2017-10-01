<script>
    import bus from '../utils/events/bus'
    export default {
        props: ['token'],
        mounted () {
            jQuery(this.$refs.userFormModal).on('hidden.bs.modal', () => {
                this.$refs.userForm.reset()
            })

            bus.$on('open-form', () => {
                jQuery(this.$refs.userFormModal).modal('show')
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
                        <form ref="userForm" method="post" action="/usuarios/criar">
                            <input id="_token" name="_token" type="hidden" :value="token">
                            <div class="form-group">
                                <label for="name" class="control-label">Nome</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail</label>
                                <input id="email" name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" name="password" type="password" class="form-control">
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