<?php
    $courses = App\Models\Course::where('status',1)->orderBy('id','ASC')->limit(6)->get();
    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
?>

<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Choose your desired courses</h5>
            <h2 class="section__title">The world's largest selection of courses</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        
        <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="business-tab" data-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="true">All</a>
            </li>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
           
            <li class="nav-item">
                <a class="nav-link" id="business-tab" data-toggle="tab" href="#business<?php echo e($category->id); ?>" role="tab" aria-controls="business" aria-selected="false"><?php echo e($category->category_name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
        </ul>
    </div><!-- end container -->


    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        
      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     
    <div class="col-lg-4 responsive-column-half">
        <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1<?php echo e($course->id); ?>">
            <div class="card-image">
                <a href="<?php echo e(url('course/details/'.$course->id.'/'.$course->course_name_slug)); ?>" class="d-block">
                    <img class="card-img-top lazy" src="<?php echo e(asset($course->course_image)); ?>" data-src="images/img8.jpg" alt="Card image cap">
                </a>

                   
    <?php
        $amount = $course->selling_price - $course->discount_price;
        $discount = ($amount/$course->selling_price) * 100;
    ?>

                <div class="course-badge-labels">

                    <?php if($course->bestseller == 1): ?>
                    <div class="course-badge">Bestseller</div>
                    <?php else: ?>
                    <?php endif; ?>

                    <?php if($course->highestrated == 1): ?>
                    <div class="course-badge sky-blue">Highest Rated</div>
                    <?php else: ?>
                    <?php endif; ?>

                    <?php if($course->discount_price == NULL): ?>
                    <div class="course-badge blue">New</div>
                    <?php else: ?>
                    <div class="course-badge blue"><?php echo e(round($discount)); ?>%</div>
                    <?php endif; ?>
                   


                </div>
            </div><!-- end card-image -->

            <?php
            $reviewcount = App\Models\Review::where('course_id',$course->id)->where('status',1)->latest()->get();
            $avarage = App\Models\Review::where('course_id',$course->id)->where('status',1)->avg('rating');
     
        ?>   


            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3"><?php echo e($course->label); ?></h6>
                <h5 class="card-title"><a href="<?php echo e(url('course/details/'.$course->id.'/'.$course->course_name_slug)); ?>"><?php echo e($course->course_name); ?></a></h5>
          <p class="card-text"><a href="<?php echo e(route('instructor.details',$course->instructor_id)); ?>"><?php echo e($course['user']['name']); ?></a></p>
                <div class="rating-wrap d-flex align-items-center py-2">
                    <div class="review-stars">
                        <span class="rating-number"><?php echo e(round($avarage,1)); ?></span>
                        <?php if($avarage == 0): ?>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <?php elseif($avarage == 1 || $avarage < 2): ?>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <?php elseif($avarage == 2 || $avarage < 3): ?>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <?php elseif($avarage == 3 || $avarage < 4): ?>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <?php elseif($avarage == 4 || $avarage < 5): ?>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <?php elseif($avarage == 5 || $avarage < 5): ?>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <?php endif; ?> 
                    </div>
                    <span class="rating-total pl-1">(<?php echo e(count($reviewcount)); ?>)</span>
                </div><!-- end rating-wrap -->
                <div class="d-flex justify-content-between align-items-center">
                   
                    <?php if($course->discount_price == NULL): ?>
                    <p class="card-price text-black font-weight-bold">$<?php echo e($course->selling_price); ?>  </p>
                    <?php else: ?>
                    <p class="card-price text-black font-weight-bold">$<?php echo e($course->discount_price); ?> <span class="before-price font-weight-medium">$<?php echo e($course->selling_price); ?></span></p> 
                    <?php endif; ?>
                    
                    
                    
            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist" id="<?php echo e($course->id); ?>" onclick="addToWishList(this.id)" ><i class="la la-heart-o"></i></div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-lg-4 -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   


                       
                    </div><!-- end row -->
                </div><!-- end tab-pane -->



   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <div class="tab-pane fade" id="business<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
  <?php
      $catwiseCourse = App\Models\Course::where('category_id',$category->id)->where('status',1)->orderBy('id','DESC')->get();
  ?>                      
          
          <?php $__empty_1 = true; $__currentLoopData = $catwiseCourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-4 responsive-column-half">
            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_2">
                <div class="card-image">
                    <img class="card-img-top lazy" src="<?php echo e(asset($course->course_image)); ?>" data-src="images/img8.jpg" alt="Card image cap">
                </div><!-- end card-image -->
                <div class="card-body">
         <h6 class="ribbon ribbon-blue-bg fs-14 mb-3"><?php echo e($course->label); ?></h6>
           <h5 class="card-title"><a href="course-details.html"><?php echo e($course->course_name); ?></a></h5>
          <p class="card-text"><a href=" "><?php echo e($course['user']['name']); ?></a></p>
                    <div class="rating-wrap d-flex align-items-center py-2">
                        <div class="review-stars">
                            <span class="rating-number">4.4</span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                        </div>
                        <span class="rating-total pl-1">(20,230)</span>
                    </div><!-- end rating-wrap -->
                    <div class="d-flex justify-content-between align-items-center">
                       
                    <?php if($course->discount_price == NULL): ?>
                    <p class="card-price text-black font-weight-bold">$<?php echo e($course->selling_price); ?>  </p>
                    <?php else: ?>
                    <p class="card-price text-black font-weight-bold">$<?php echo e($course->discount_price); ?> <span class="before-price font-weight-medium">$<?php echo e($course->selling_price); ?></span></p> 
                    <?php endif; ?>

                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col-lg-4 --> 
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <h5 class="text-danger"> No Course Found </h5>
              
        <?php endif; ?>

                         

                    </div><!-- end row -->
                </div><!-- end tab-pane -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    


            </div><!-- end tab-content -->
            <div class="more-btn-box mt-4 text-center">
                <a href="course-grid.html" class="btn theme-btn">Browse all Courses <i class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end more-btn-box -->
        </div><!-- end container -->
    </div><!-- end card-content-wrapper -->
</section><!-- end courses-area -->


<?php
    $courseData = App\Models\Course::get();
?>

<!-- tooltip_templates -->
<?php $__currentLoopData = $courseData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
<div class="tooltip_templates">
    <div id="tooltip_content_1<?php echo e($item->id); ?>">
        <div class="card card-item">
            <div class="card-body">
                <p class="card-text pb-2">By <a href="teacher-detail.html"><?php echo e($item['user']['name']); ?></a></p>
                <h5 class="card-title pb-1"><a href="course-details.html"> <?php echo e($item->course_name); ?></a></h5>
                <div class="d-flex align-items-center pb-1">
                    <?php if($item->bestseller == 1): ?>
                    <h6 class="ribbon fs-14 mr-2">Bestseller</h6>
                    <?php else: ?>
                    <h6 class="ribbon fs-14 mr-2">New</h6> 
                    <?php endif; ?>
                   
                    <p class="text-success fs-14 font-weight-medium">Updated<span class="font-weight-bold pl-1"><?php echo e($item->created_at->format('M d Y')); ?></span></p>
                </div>
                <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                    <li><?php echo e($item->duration); ?> total hours</li>
                    <li><?php echo e($item->label); ?></li>
                </ul>
                <p class="card-text pt-1 fs-14 lh-22"><?php echo e($item->prerequisites); ?></p>

    <?php
       $goals = App\Models\Course_goal::where('course_id',$item->id)->orderBy('id','DESC')->get(); 
    ?>
                <ul class="generic-list-item fs-14 py-3">
                    <?php $__currentLoopData = $goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><i class="la la-check mr-1 text-black"></i> <?php echo e($goal->goal_name); ?></li> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                   
                    
                    <button type="submit" class="btn theme-btn flex-grow-1 mr-3" onclick="addToCart(<?php echo e($item->id); ?>, '<?php echo e($item->course_name); ?>','<?php echo e($item->instructor_id); ?>','<?php echo e($item->course_name_slug); ?>' )" ><i class="la la-shopping-cart mr-1 fs-18"></i>Add to Cart</button>
                    
                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div><!-- end tooltip_templates -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/frontend/home/courses-area.blade.php ENDPATH**/ ?>