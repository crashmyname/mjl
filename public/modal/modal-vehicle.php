                <!-- Modal Add -->
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form id="formaddvehicle" class="form form-horizontal" method="POST"
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
                                                <select name="truck_type" id="truck_type" class="form-control">
                                                    <option value="" hidden disabled selected>Pilih</option>
                                                    <option value="CDE">CDE</option>
                                                    <option value="CDD">CDD</option>
                                                    <option value="CDD LONG">CDD LONG</option>
                                                    <option value="FUSO">FUSO</option>
                                                    <option value="FUSO LONG">FUSO LONG</option>
                                                    <option value="TRONTON">TRONTON</option>
                                                    <option value="TRAILER">TRAILER</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Sub Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="truck_sub_type" id="truck_sub_type" class="form-control">
                                                    <option value="" hidden disabled selected>Pilih</option>
                                                    <option value="BOX">BOX</option>
                                                    <option value="BAK">BAK</option>
                                                    <option value="WINGBOX">WINGBOX</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Color</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_color" id="plat_color" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="statusvehicle" id="statusvehicle" class="form-control">
                                                    <option value="" hidden selected disabled> Pilih </option>
                                                    <option value="Internal">Internal</option>
                                                    <option value="External">External</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>STNK</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="stnk" id="stnk" class="form form-control" accept=".jpeg,.jpg,.png">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KIR</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="kir" id="kir" class="form form-control" accept=".jpeg,.jpg,.png">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" id="addvehicle" class="btn btn-primary me-1 mb-1">Simpan</button>
                                                <button class="btn btn-primary me-1 mb-1" id="loading" type="button" disabled="" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Processing...
                                                </button>
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
                                                <select name="truck_type" id="utruck_type" class="form-control">
                                                    <option value="CDE">CDE</option>
                                                    <option value="CDD">CDD</option>
                                                    <option value="CDD LONG">CDD LONG</option>
                                                    <option value="FUSO">FUSO</option>
                                                    <option value="FUSO LONG">FUSO LONG</option>
                                                    <option value="TRONTON">TRONTON</option>
                                                    <option value="TRAILER">TRAILER</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Truck Sub Type</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="truck_sub_type" id="utruck_sub_type" class="form-control">
                                                    <option value="BOX">BOX</option>
                                                    <option value="BAK">BAK</option>
                                                    <option value="WINGBOX">WINGBOX</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Color</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="plat_color" id="uplat_color" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status Vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="statusvehicle" id="ustatusvehicle" class="form-control">
                                                    <option value="Internal">Internal</option>
                                                    <option value="External">External</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>STNK</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="stnk" id="ustnk" class="form form-control" accept=".jpeg,.jpg,.png">
                                                <img src="" id="imgstnk" alt="" width="20%">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KIR</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="kir" id="ukir" class="form form-control" accept=".jpeg,.jpg,.png">
                                                <img src="" id="imgkir" alt="" width="20%">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" id="updatevehicle" class="btn btn-warning me-1 mb-1">Simpan</button>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalImportVehicle" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formimportvehicle" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Vehicle</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Excel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="filevehicle" id="filevehicle" class="form form-control" accept=".xlsx,.xls">
                                                <hr>
                                                <a href="<?= asset('template/importvehicle.xlsx')?>" class="badge bg-light-success">Template</a>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" id="importvehicle" class="btn btn-success me-1 mb-1">Simpan</button>
                                            <button class="btn btn-success me-1 mb-1" id="loadingimportvehicle" type="button" disabled="" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Processing...
                                                </button>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>