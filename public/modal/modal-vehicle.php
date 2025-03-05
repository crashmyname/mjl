<!-- Modal Add -->
<div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddvehicle" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Vehicle</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Plat Number</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_number" id="plat_number" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="truck_type" id="truck_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Sub Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="truck_sub_type" id="truck_sub_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Color</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_color" id="plat_color" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>STNK</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="stnk" id="stnk" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KIR</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="kir" id="kir" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addvehicle" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Update -->
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEditVehicle" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdatevehicle" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Vehicle</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Plat Number</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_number" id="uplat_number" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="truck_type" id="utruck_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Sub Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="truck_sub_type" id="utruck_sub_type" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Color</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_color" id="uplat_color" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>STNK</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="stnk" id="ustnk" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KIR</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="kir" id="ukir" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updatevehicle" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>