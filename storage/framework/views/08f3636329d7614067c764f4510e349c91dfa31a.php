
<?php $__env->startSection('title'); ?> Konfigurasi  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Konfigurasi <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Konfigurasi Jam  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <!-- Start Content -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Data Konfigurasi</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form id="attConfigForm" class="row g-3" action="<?php echo e(route('store.configatt')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-lg-12">
                                <p class="text-muted">Input nilai dalam satuan Menit sebagai range toleransi jam kehadiran.</p>
                                <div class="input-group">
                                    <?php if(isset($data)): ?>
                                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="check_in_before" value="<?php echo e($data->check_in_before); ?>">
                                    <?php else: ?>
                                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="check_in_before" value="0">
                                    <?php endif; ?>
                                    <span class="input-group-text" id="basic-addon2">Menit</span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="button" data-bs-target="#confirm" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade" id="confirm" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:150px;height:150px"></lord-icon>
                    <div class="mt-4 pt-3">
                        <h4 class="mb-3">Konfirmasi</h4>
                        <p class="text-muted mb-4">Apakah Anda yakin ingin menyimpan data ini?</p>
                        <div class="hstack gap-2 justify-content-center">
                            <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                            <button class="btn btn-soft-success" data-bs-target="#firstmodal" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="submitForm()">
                                Simpan
                            </button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/modal.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script>
        function submitForm() {
            document.getElementById("attConfigForm").submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cr_att\resources\views/church/config/attendance.blade.php ENDPATH**/ ?>