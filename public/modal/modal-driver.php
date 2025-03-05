<!-- Modal Add -->
<div class="modal fade text-left modal-borderless modal-lg" id="border-lessDriver" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formadddriver" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Driver</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Driver Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="driver_name" id="driver_name" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver KSUID</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="driver_ksuid" id="driver_ksuid" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="phone_number" id="phone_number" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sim Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="sim_type" id="sim_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KTP</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="ktp" id="ktp" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>SIM</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="sim" id="sim" class="form form-control">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" id="adddriver" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Update -->
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEditDriver" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdatedriver" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Driver</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Driver Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="driver_name" id="udriver_name" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver KSUID</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="driver_ksuid" id="udriver_ksuid" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="phone_number" id="uphone_number" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sim Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="sim_type" id="usim_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KTP</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="ktp" id="uktp" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>SIM</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="sim" id="usim" class="form form-control">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" id="updatedriver" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>