    <!-- Modal Crear-->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content modal-blur">
                <div class="modal-header bg-personal ">
                    <h5 class="modal-title " id="exampleModalLabel" style="color:white">Nueva  Denunciado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <form method="POST" action="{{ url('/admin/denunciados') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.denunciados.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
