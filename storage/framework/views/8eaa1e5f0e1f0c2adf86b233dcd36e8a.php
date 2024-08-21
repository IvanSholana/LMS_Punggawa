
<?php $__env->startSection('admin'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Order Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
           
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card"> 
                
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong> <?php echo e($payment->name); ?></strong> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>  <?php echo e($payment->email); ?></strong> 
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>  <?php echo e($payment->phone); ?></strong> 
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>  <?php echo e($payment->address); ?></strong> 
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Payment Type </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>  <?php echo e($payment->cash_delivery); ?></strong> 
                                </div>
                            </div>
                               
                
                        </div> 
                     
                
                
                    </div>
                 
                </div>


<div class="col-lg-6">
    <div class="card">
 
        <div class="card-body">
            
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Total Amount  </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <strong> $<?php echo e($payment->total_amount); ?></strong> 
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Payment Type </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                 <strong><?php echo e($payment->payment_type); ?></strong>   
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Invoice Number </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <strong> <?php echo e($payment->invoice_no); ?></strong> 
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Order Date </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <strong>  <?php echo e($payment->order_date); ?></strong> 
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Status  </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?php if($payment->status == 'pending'): ?>
                    <a href="<?php echo e(route('pending-confrim',$payment->id)); ?>" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                    <?php elseif($payment->status == 'confirm'): ?>    
                    <a href="" class="btn btn-block btn-success">Confirm Order</a>
                    <?php endif; ?> 
                     
                </div>
            </div>


        </div> 
     


    </div>


    
</div>
            </div>




<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            
         <div class="flex-grow-1 ms-3">
            <div class="table-responsive">
                <table class="table" style="font-weight: 600;">
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <label>Image</label>
                            </td>
                            <td class="col-md-2">
                                <label>Course Name</label>
                            </td>
                            <td class="col-md-2">
                                <label>Category </label>
                            </td>

                            <td class="col-md-2">
                                <label>Instructor</label>
                            </td>
                            <td class="col-md-2">
                                <label>Price</label>
                            </td> 
                        </tr>
<?php
    $totalPrice = 0;
?>
                        <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="col-md-1">
                                <label><img src="<?php echo e(asset($item->course->course_image)); ?>" alt="" style="width: 50px; height:50px;"> </label>
                            </td>

                            <td class="col-md-2">
                                <label> <?php echo e($item->course->course_name); ?>  </label>
                            </td>

                            <td class="col-md-2">
                                <label><?php echo e($item->course->category->category_name); ?></label>
                            </td>

                            <td class="col-md-2">
                                <label> <?php echo e($item->instructor->name); ?> </label>
                            </td>

                            <td class="col-md-2">
                                <label> $<?php echo e($item->price); ?> </label>
                            </td>
                        </tr>

             <?php
                 $totalPrice += $item->price; 
             ?>           
 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             <tr>
                <td colspan="4"></td>
                <td class="col-md-3">
                <strong>Total Price : $<?php echo e($totalPrice); ?></strong>    
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
</div>

 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/admin/backend/orders/admin_order_details.blade.php ENDPATH**/ ?>