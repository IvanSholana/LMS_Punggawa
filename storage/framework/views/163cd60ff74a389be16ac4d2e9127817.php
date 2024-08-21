
<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Report By Month </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
         
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
  <h3> Seach By Year : <?php echo e($year); ?>  </h3>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date </th>
                            <th>User</th> 
                            <th>Email</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status </th> 
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td> <?php echo e($item->order_date); ?>  </td>
                            <td><?php echo e($item->name); ?></td> 
                            <td><?php echo e($item->email); ?></td> 
                            <td><?php echo e($item->invoice_no); ?></td> 
                            <td><?php echo e($item->total_amount); ?></td> 
                            <td><?php echo e($item->payment_type); ?></td> 
                            <td> <span class="badge rounded-pill bg-success"><?php echo e($item->status); ?></span> </td> 
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                    </tbody>
                     
                </table>
            </div>
        </div>
    </div>


   
   
</div>
 



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/report/report_by_year.blade.php ENDPATH**/ ?>