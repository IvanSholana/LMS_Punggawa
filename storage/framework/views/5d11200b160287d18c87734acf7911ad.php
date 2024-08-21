
<?php $__env->startSection('admin'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .form-check-label{
        text-transform: capitalize;
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
                    <li class="breadcrumb-item active" aria-current="page">Add Role In Permission</li>
                </ol>
            </nav>
        </div>
         
    </div>
    <!--end breadcrumb-->
 
    <div class="card">
        <div class="card-body p-4">
            
            <form id="myForm" action="<?php echo e(route('role.permission.store')); ?>" method="post" class="row g-3" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
 
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label"> Roles Name</label>
            <select name="role_id" class="form-select mb-3" aria-label="Default select example">
              <option selected="" disabled>Open Roles</option>
               <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        
                    </select>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckMain">
                    <label class="form-check-label" for="flexCheckMain">Permission All </label>
                </div>

<hr>

<?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
    <div class="col-3">

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault"> <?php echo e($group->group_name); ?></label>
        </div>

    </div>

    <div class="col-9">
        <?php
            $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
        ?>

        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>" id="checkDefault<?php echo e($permission->id); ?>">
            <label class="form-check-label" for="checkDefault<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
        </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>

    </div>

</div>
  
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 
 
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
          <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>


   
   
</div>
 

<script>
    $('#flexCheckMain').click(function(){
        if ($(this).is(':checked')) {
          $('input[ type=checkbox]').prop('checked',true)  
        }else{
            $('input[ type=checkbox]').prop('checked',false)  
        }
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/pages/rolesetup/add_roles_permission.blade.php ENDPATH**/ ?>