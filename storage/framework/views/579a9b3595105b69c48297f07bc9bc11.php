
<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All User</li>
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
                            <th>User Image </th>
                            <th>Name</th> 
                            <th>Email</th> 
                            <th>Phone</th> 
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td> <img src="<?php echo e((!empty($item->photo)) ? url('upload/user_images/'.$item->photo) : url('upload/no_image.jpg')); ?>" alt="" style="width: 70px; height:40px;"> </td>
                            <td><?php echo e($item->name); ?></td> 
                            <td><?php echo e($item->email); ?></td> 
                            <td><?php echo e($item->phone); ?></td> 
                            <td>
        <?php if($item->UserOnline()): ?>
        <span class="badge badge-pill bg-success">Active Now</span>
        <?php else: ?> 
        <span class="badge badge-pill bg-danger"><?php echo e(Carbon\Carbon::parse($item->last_seen)->diffForHumans()); ?> </span>  
             
        <?php endif; ?>    
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
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/user/user_all.blade.php ENDPATH**/ ?>