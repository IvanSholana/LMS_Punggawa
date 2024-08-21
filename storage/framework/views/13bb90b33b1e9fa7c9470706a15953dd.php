
<?php $__env->startSection('instructor'); ?>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
           
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
  
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date </th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td> <?php echo e($item['payment']['order_date']); ?> </td>
                            <td><?php echo e($item['payment']['invoice_no']); ?></td> 
                            <td><?php echo e($item['payment']['total_amount']); ?></td> 
                            <td><?php echo e($item['payment']['payment_type']); ?></td> 
                            <td> <span class="badge bg-success"><?php echo e($item['payment']['status']); ?></span> </td> 
                            <td>
       <a href="<?php echo e(route('instructor.order.details',$item->payment->id)); ?>" class="btn btn-info" title="Edit"><i class="lni lni-eye"></i> </a>   
       <a href="<?php echo e(route('instructor.order.invoice',$item->payment->id)); ?>" class="btn btn-danger"   title="Invoice"><i class="lni lni-download"></i> </a>  
                         
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                    </tbody>
                     
                </table>
            </div>
        </div>
    </div>


   
   
</div>
 



<?php $__env->stopSection(); ?>
<?php echo $__env->make('instructor.instructor_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/instructor/orders/all_orders.blade.php ENDPATH**/ ?>