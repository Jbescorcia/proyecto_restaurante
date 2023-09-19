<!-- Modal -->
<div class="modal fade" id="numevoPedido" tabindex="-1" aria-labelledby="numevoPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Pedido</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="POST" enctype="multipart/form-data">

                    <!--- Formulario -->

                    <div class="mb-3">
                        <label class="form-label" for="cedula">Cédula del Cliente:</label>
                        <input type="text" name="cedula" required>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label" for="pedido">
                            <h5>Seleccione los Productos:</h5>
                        </label><br>

                        <label class="form-label" for="hamburguesas">
                            <h5>Hamburguesas: 10.000 COP</h5>
                        </label>
                        <br>
                        <span>Cantidad</span>
                        <input type="number" name="hamburguesas" min="0" value="0"><br>

                        <br>
                        <label class="form-label" for="bebidas">
                            <h5>Bebidas: 5.000 COP</h5>
                        </label>
                        <br>
                        <span>Cantidad:</span>
                        <input type="number" name="bebidas" min="0" value="0"><br>

                        <br>
                        <label class="form-label" for="snacks">
                            <h5>Snacks: 5.000 COP</h5>
                        </label>
                        <br>
                        <span>Cantidad:</span>
                        <input type="number" name="snacks" min="0" value="0"><br><br>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="file">Foto o Firma:</label>
                        <hr>
                        <input type="file" name="file" accept="image/*"><br><br>
                    </div>

                    <input id="enviar" name="enviar" type="submit" class="btn btn-primary" value="Enviar">

                </form>
            </div>
        </div>
    </div>
</div>