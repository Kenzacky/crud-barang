

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Edit Barang</h2>
            <a class="btn btn-primary mb-3" href="<?php echo e(route('barangs.index')); ?>">Kembali</a>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('barangs.update', $barang->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_barang" value="<?php echo e($barang->nama_barang); ?>" class="form-control" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Harga Satuan:</strong>
                    <input type="number" step="0.01" name="harga_satuan" value="<?php echo e($barang->harga_satuan); ?>" class="form-control" placeholder="Harga Satuan">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="number" name="jumlah" value="<?php echo e($barang->jumlah); ?>" class="form-control" placeholder="Jumlah">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi"><?php echo e($barang->deskripsi); ?></textarea>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Foto Saat Ini:</strong><br>
                    <?php if($barang->foto): ?>
                        <img src="<?php echo e($barang->foto); ?>" alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 150px; height: auto;">
                    <?php else: ?>
                        Tidak ada foto
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <strong>Ganti Foto (Opsional):</strong>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('barangs.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crud_barang_app\resources\views/barangs/edit.blade.php ENDPATH**/ ?>