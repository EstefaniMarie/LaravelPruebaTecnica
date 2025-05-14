<!-- Modal para editar una tarea si eres usuario con rol = 1 -->
<div class="modal fade" id="editarTareaModal{{ $tarea->id }}" tabindex="-1"
    aria-labelledby="editarUsuarioModal{{ $tarea->id }}" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTareaModal{{ $tarea->id }}">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body px-3 py-2">
                <form method="POST" action="{{ route('tareas.actualizar', $tarea->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="name form-group">
                                <label for="title" style="color:black;">Título</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ old('title') }}">
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="correo form-group">
                                <label for="description" style="color:black;">Descripción</label>
                                <input type="text" class="correo form-control" id="description" name="description"
                                    required value="{{ old('description') }}">
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="correo form-group">
                                <label for="due_date" style="color:black;">Plazo</label>
                                <input type="text" class="correo form-control" id="due_date" name="due_date" required
                                    value="{{ old('due_date') }}">
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="status" required>
                                    <option value="" disabled selected>Selecciona un estatus</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en progreso">En progreso</option>
                                    <option value="completada">Completada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset class="form-group">
                                <label>Prioridad</label>
                                <select class="form-control" name="priority" required>
                                    <option value="" disabled selected>Selecciona una prioridad</option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="user_id" style="color:black;">Usuario</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">Seleccione un usuario</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->correo }})</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6 text-center">
                                <button type="reset" class="btn-gradient-secondary btn-sm white"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                            <div class="col-6 text-center">
                                <button type="submit" class="btn-gradient-primary btn-sm white">Editar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>