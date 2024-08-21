
<?php $__env->startSection('admin'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Course Details </div>
         
        <div class="ms-auto">
           
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(asset($course->course_image)); ?>" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mt-0"><?php echo e($course->course_name); ?></h5>
                        <p class="mb-0"><?php echo e($course->course_title); ?></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0">
                                
    <tbody>
        <tr> 
            <td><strong>Category : </strong></td>
            <td> <?php echo e($course['category']['category_name']); ?> </td> 
        </tr>
        <tr> 
            <td><strong>SubCategory :</strong> </td>
            <td> <?php echo e($course['subcategory']['subcategory_name']); ?></td> 
        </tr>
        <tr> 
            <td><strong>Instructor :</strong> </td>
            <td> <?php echo e($course['user']['name']); ?></td> 
        </tr>
        <tr> 
            <td><strong>Label :</strong> </td>
            <td> <?php echo e($course->label); ?></td> 
        </tr>
        <tr> 
            <td><strong>Duration :</strong> </td>
            <td> <?php echo e($course->duration); ?></td> 
        </tr>

        <tr> 
            <td><strong>Video :</strong> </td>
            <td>  
                <video width="300" height="200" controls>
                    <source src="<?php echo e(asset($course->video)); ?>" type="video/mp4">
                </video>
                
            </td> 
        </tr>

            
    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                                
                <tbody>
                    <tr> 
                        <td><strong>Resources : </strong></td>
                        <td> <?php echo e($course->resources); ?> </td> 
                    </tr>
                    <tr> 
                        <td><strong>certificate :</strong> </td>
                        <td> <?php echo e($course->certificate); ?></td> 
                    </tr>
                    <tr> 
                        <td><strong>Selling Price :</strong> </td>
                        <td> $<?php echo e($course->selling_price); ?></td> 
                    </tr>
                    <tr> 
                        <td><strong> Discount Price :</strong> </td>
                        <td>$<?php echo e($course->discount_price); ?></td> 
                    </tr>
                    <tr> 
                        <td><strong>Status :</strong> </td>
                        <td> 
                            <?php if($course->status == 1): ?>
                            <span class="badge bg-success">Active</span>
                            <?php else: ?>
                            <span class="badge bg-danger">Inactive</span>
                            <?php endif; ?>
                        </td> 
                    </tr>
            
                   
                        
                </tbody>
                                        </table>
        </div>
    </div>


    
</div>
            </div>
        </div>
    </div>
</div>

 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/courses/course_details.blade.php ENDPATH**/ ?>