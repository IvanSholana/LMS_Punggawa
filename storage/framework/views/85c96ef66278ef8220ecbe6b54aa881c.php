
<?php $__env->startSection('instructor'); ?>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Coupon</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
           <a href="<?php echo e(route('instructor.add.coupon')); ?>" class="btn btn-primary px-5">Add Coupon </a>  
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
                            <th>Coupon Name  </th>
                            <th>Coupon Discount</th> 
                            <th>Coupon Status </th> 
                            <th>Course </th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
<?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<tr>
    <td><?php echo e($key+1); ?></td>
    <td> <?php echo e($item->coupon_name); ?> </td>
    <td><?php echo e($item->coupon_discount); ?>%</td> 
     
    <td>  
 <?php if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d')): ?>
 <span class="badge bg-success">Valid</span>   
 <?php else: ?> 
 <span class="badge bg-danger">Invalid</span>
 <?php endif; ?>
    </td>

    <td> <?php echo e($item['course']['course_name']); ?> </td>

    <td>
<a href="<?php echo e(route('instructor.edit.coupon',$item->id)); ?>" class="btn btn-info px-5">Edit </a>   
<a href="<?php echo e(route('instructor.delete.coupon',$item->id)); ?>" class="btn btn-danger px-5" id="delete">Delete </a>                    
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
<?php echo $__env->make('instructor.instructor_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/instructor/coupon/coupon_all.blade.php ENDPATH**/ ?>