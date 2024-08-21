
<?php $__env->startSection('admin'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .large-checkbox{
        transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Active Review </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
          
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
                            <th>Course Name </th>
                            <th>Username </th> 
                            <th>Comment </th> 
                            <th>Rating </th>  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($item['course']['course_name']); ?></td> 
                            <td><?php echo e($item['user']['name']); ?></td> 
                            <td><?php echo e($item->comment); ?></td> 
                            <td> 
                           <?php if($item->rating == NULL): ?>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <?php elseif($item->rating == 1): ?>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <?php elseif($item->rating == 2): ?>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <?php elseif($item->rating == 3): ?>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <?php elseif($item->rating == 4): ?>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-secondary"></i>
                           <?php elseif($item->rating == 5): ?>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <i class="bx bxs-star text-warning"></i>
                           <?php endif; ?>
                            </td> 


                            <td>
    <div class="form-check-danger form-check form-switch">
        <input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-review-id="<?php echo e($item->id); ?>" <?php echo e($item->status ? 'checked' : ''); ?>  >
        <label class="form-check-label" for="flexSwitchCheckCheckedDanger"> </label>
    </div>                  
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                    </tbody>
                     
                </table>
            </div>
        </div>
    </div>


   
   
</div>
 
<script>
    $(document).ready(function(){
        $('.status-toggle').on('change', function(){
            var reviewId = $(this).data('review-id');
            var isChecked = $(this).is(':checked');

            // send an ajax request to update status 

            $.ajax({
                url: "<?php echo e(route('update.review.stauts')); ?>",
                method: "POST",
                data: {
                    review_id : reviewId,
                    is_checked: isChecked ? 1 : 0,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response){
                    toastr.success(response.message);
                },
                error: function(){

                }
            });

        });
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/review/active_review.blade.php ENDPATH**/ ?>