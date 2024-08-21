
<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"> 
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
            
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Blog Category</button>
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
                            <th>Category Name </th>
                            <th>Category Slug</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td> <?php echo e($item->category_name); ?>  </td>
                            <td><?php echo e($item->category_slug); ?></td> 
                            <td>
      
       <button type="button" class="btn btn-info px-5" data-bs-toggle="modal" data-bs-target="#category" id="<?php echo e($item->id); ?>" onclick="categoryEdit(this.id)">Edit</button>

       <a href="<?php echo e(route('delete.blog.category',$item->id)); ?>" class="btn btn-danger px-5" id="delete">Delete </a>                    
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                    </tbody>
                     
                </table>
            </div>
        </div>
    </div>


   
   
</div>
 

	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
                  
                </div>
                <div class="modal-body"> 
           <form action="<?php echo e(route('blog.category.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group col-md-12">
                <label for="input1" class="form-label">Blog Category Name</label>
                <input type="text" name="category_name" class="form-control" id="input1"  >
            </div>
                    
                </div>
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Blog Category</h5>
                  
                </div>
                <div class="modal-body"> 
           <form action="<?php echo e(route('blog.category.update')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="cat_id" id="cat_id">

            <div class="form-group col-md-12">
                <label for="input1" class="form-label">Blog Category Name</label>
                <input type="text" name="category_name" class="form-control" id="cat"  >
            </div>
                    
                </div>
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        function categoryEdit(id){
            $.ajax({
                type: 'GET',
                url: '/edit/blog/category/'+id,
                dataType: 'json',

                success:function(data){
                    // console.log(data)
                    $('#cat').val(data.category_name);
                    $('#cat_id').val(data.id);

                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/blogcategory/blog_category.blade.php ENDPATH**/ ?>