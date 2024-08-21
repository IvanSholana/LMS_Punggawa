
<?php
    $blog = App\Models\BlogPost::latest()->limit(3)->get();
?>

<section class="blog-area section--padding bg-gray overflow-hidden">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">News feeds</h5>
            <h2 class="section__title">Latest News & Articles</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        <div class="blog-post-carousel owl-action-styled half-shape mt-30px">
           
           
           <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card card-item">
                <div class="card-image">
                    <a href="blog-single.html" class="d-block">
                        <img class="card-img-top" src="<?php echo e(asset($item->post_image)); ?>" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">
                        <div class="course-badge">
                            <?php echo e($item->created_at->format('M d Y')); ?></div>
                    </div>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title"><a href="<?php echo e(url('blog/details/'.$item->post_slug)); ?>"><?php echo e($item->post_title); ?></a></h5>
                    <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                        <li class="d-flex align-items-center">By<a href="#">Admin</a></li>
                        <li class="d-flex align-items-center"><a href="#">4 Comments</a></li>
                        <li class="d-flex align-items-center"><a href="#">130 Likes</a></li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <a href="blog-single.html" class="btn theme-btn theme-btn-sm theme-btn-white">Read More <i class="la la-arrow-right icon ml-1"></i></a>
                        <div class="share-wrap">
                            <ul class="social-icons social-icons-styled">
                                <li class="mr-0"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                                <li class="mr-0"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                                <li class="mr-0"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                            </ul>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card --> 
               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        </div><!-- end blog-post-carousel -->
    </div><!-- end container -->
</section><!-- end blog-area --><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/frontend/home/blog-area.blade.php ENDPATH**/ ?>