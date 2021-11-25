<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?> ')">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-info-bottom clearfix">
                    <div class="mkdf-post-info-bottom-left">
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>