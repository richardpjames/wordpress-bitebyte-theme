 <div class="rounded-2xl border border-gray-700 p-5 m-2 col-span-1 bg-gray-800" id="<?php echo $args['post_id']; ?>">
     <div>
         <h2 class="mt-2 text-lg text-white max-lg:text-center">
             <a href="<?php echo $args['permalink']; ?>"><?php echo $args['title']; ?></a>
         </h2>
         <div class="mt-2 max-w-lg text-sm/6">
             <?php echo $args['excerpt']; ?>
         </div>
     </div>
 </div>