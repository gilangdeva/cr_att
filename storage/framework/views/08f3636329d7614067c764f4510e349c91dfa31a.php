
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
                        <form class="row g-3" action="<?php echo e(route('store.configatt')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-lg-12">
                                <p class="text-muted">Input nilai dalam satuan Menit sebagai range toleransi jam kehadiran.</p>
                                <div class="input-group">
                                    <input type="number" class="form-control" 
                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="check_in_before" value="<?php echo e($data->check_in_before); ?>">
                                    <span class="input-group-text" id="basic-addon2">Menit</span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
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
    <!-- End Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cr_att\resources\views/church/config/attendance.blade.php ENDPATH**/ ?>