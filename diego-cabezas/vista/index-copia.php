    <!-- Modal para visualizar archivos Word -->
    <div class="modal fade" id="modalWord" tabindex="-1" aria-labelledby="modalWord" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="iframeWord" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function openModelWord(url) {
                $('#modalWord').modal('show');
                $('#iframeWord').attr('src', url);
            }
            $('.btn-visualizar-word').click(function() {
                var url = $(this).data('url');
                var confirmDownload = confirm("Este archivo solo se puede descargar. ¿Desea descargarlo?");
                if (confirmDownload) {
                    window.location.href = url;
                }
            });

            $('.btn-visualizar-pdf').click(function() {
                var url = $(this).data('url');
                $('#modalWord').modal('show');
                $('#iframeWord').attr('src', url);
            });
        });
    </script>