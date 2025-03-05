<!-- Modal Add -->
<div class="modal fade text-left modal-borderless modal-lg" id="border-lessPrice" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddprice" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Price</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                    <?php foreach($vehicle as $vhc): ?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number?> | <?= $vhc->truck_type?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Origin City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="origin_city" id="origin_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="destination_city" id="destination_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>MIN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="min" id="min" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>MAX</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="max" id="max" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="price" id="price" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addprice" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Update -->
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEditPrice" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdateprice" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Price</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vehicle_id" id="uvehicle_id" class="form-control">
                                                    <?php foreach($vehicle as $vhc): ?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number?> | <?= $vhc->truck_type?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Origin City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="origin_city" id="uorigin_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="destination_city" id="udestination_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>MIN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="min" id="umin" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>MAX</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="max" id="umax" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="price" id="uprice" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updateprice" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>