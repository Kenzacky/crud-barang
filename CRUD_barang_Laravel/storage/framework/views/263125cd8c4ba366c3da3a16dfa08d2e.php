

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">Daftar Barang</h2>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <a class="btn btn-success mb-3" href="<?php echo e(route('barangs.create')); ?>">Tambah Barang Baru</a>
            
            
            <?php
                $i = ($barangs->currentPage() - 1) * $barangs->perPage();
            ?>
            

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td> 
                            <td>
                                <?php if($barang->foto): ?>
                                    <img src="<?php echo e($barang->foto); ?>" alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 100px; height: auto;">
                                <?php else: ?>
                                    Tidak ada foto
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($barang->nama_barang); ?></td>
                            <td>Rp<?php echo e(number_format($barang->harga_satuan, 2, ',', '.')); ?></td>
                            <td><?php echo e($barang->jumlah); ?></td>
                            <td>
                                <form action="<?php echo e(route('barangs.destroy',$barang->id)); ?>" method="POST">
                                    <a class="btn btn-info btn-sm" href="<?php echo e(route('barangs.show',$barang->id)); ?>">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('barangs.edit',$barang->id)); ?>">Edit</a>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $barangs->links('pagination::bootstrap-5'); ?> 
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('barangs.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crud_barang_app\resources\views/barangs/index.blade.php ENDPATH**/ ?>