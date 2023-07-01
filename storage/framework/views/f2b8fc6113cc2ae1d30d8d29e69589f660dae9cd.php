<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e(URL::to('/games/' . $url)); ?></loc>
        <lastmod><?php echo e(now()->toIso8601String()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH /var/www/modgamesmm/resources/views/sitemap.blade.php ENDPATH**/ ?>