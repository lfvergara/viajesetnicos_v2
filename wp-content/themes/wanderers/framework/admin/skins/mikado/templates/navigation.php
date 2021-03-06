<div class="mkdf-tabs-navigation-wrapper">
    <ul class="nav nav-tabs">
        <?php
        foreach (wanderers_mkdf_options()->adminPages as $key => $page ) {
            $slug = "";
            if (!empty($page->slug)) $slug = "_tab".$page->slug;
            ?>
            <li<?php if ($page->slug == $tab) echo " class=\"active\""; ?>>
                <a href="<?php echo esc_url(get_admin_url().'admin.php?page=wanderers_mkdf_theme_menu'.$slug); ?>">
                    <?php if($page->icon !== '') { ?>
                        <i class="<?php echo esc_attr($page->icon); ?> mkdf-tooltip mkdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr($page->title); ?>"></i>
                    <?php } ?>
                    <span><?php echo esc_html($page->title); ?></span>
                </a>
            </li>
        <?php
        }
        ?>
	    <?php if (wanderers_mkdf_core_plugin_installed()) { ?>
			<li <?php if($isBackupOptionsPage) { echo "class='active'"; } ?>><a href="<?php echo esc_url(get_admin_url().'admin.php?page=wanderers_mkdf_theme_menu_backup_options'); ?>"><i class="fa fa-download mkdf-tooltip mkdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php esc_attr_e('Backup Options','wanderers'); ?>"></i><span><?php esc_html_e('Backup Options','wanderers'); ?></span></a></li>
	        <li <?php if($isImportPage) { echo "class='active'"; } ?>><a href="<?php echo esc_url(get_admin_url().'admin.php?page=wanderers_mkdf_theme_menu_tabimport'); ?>"><i class="fa fa-download mkdf-tooltip mkdf-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php esc_attr_e('Import','wanderers'); ?>"></i><span><?php esc_html_e('Import','wanderers'); ?></span></a></li>
	    <?php } ?>
    </ul>
</div>