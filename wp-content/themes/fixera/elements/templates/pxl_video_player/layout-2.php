<?php 
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
if(!empty($settings['image_bg']['id'])) : 
$img = pxl_get_image_by_size( array(
    'attach_id'  => $settings['image_bg']['id'],
    'thumb_size' => 'full',
));
$thumbnail = $img['thumbnail'];
endif;
?>
<div class="pxl-video-player pxl-video-player2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner bg-image" <?php if(!empty($settings['image_bg']['id'])) { ?>style="background-image: url(<?php echo esc_url($settings['image_bg']['url']); ?>);"<?php } ?>>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <a class="btn-video <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php endif; ?>
                    <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                            <?php $img_icon  = pxl_get_image_by_size( array(
                                    'attach_id'  => $settings['icon_image']['id'],
                                    'thumb_size' => 'full',
                                ) );
                                $thumbnail_icon    = $img_icon['thumbnail'];
                            echo pxl_print_html($thumbnail_icon); ?>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php
    if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): ?>
        <ul class="pxl-list">
            <?php foreach ($settings['link'] as $key => $link): ?>
                <li>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.818 3.64318C15.7008 3.51944 14.6012 3.25961 13.5417 2.86898C12.5697 2.50986 11.6372 2.0431 10.7601 1.47665C10.5313 1.33019 10.2683 1.25269 10 1.25269C9.73173 1.25269 9.46869 1.33019 9.23991 1.47665C8.36285 2.04311 7.43035 2.50988 6.45833 2.86898C5.39879 3.25962 4.29921 3.51946 3.18197 3.6432C2.82337 3.68169 2.49119 3.85791 2.24975 4.13776C2.0083 4.4176 1.87477 4.78115 1.875 5.15801V9.68423C1.87558 11.3543 2.30304 12.9939 3.11315 14.4334C3.92326 15.8728 5.08659 17.0598 6.48275 17.8714L9.29117 19.5024C9.50756 19.6292 9.75146 19.6959 9.99954 19.6959C10.2476 19.696 10.4916 19.6295 10.708 19.5028L13.5172 17.8714C14.9134 17.0598 16.0767 15.8728 16.8868 14.4334C17.697 12.9939 18.1244 11.3543 18.125 9.68423V5.15801C18.1252 4.78114 17.9917 4.41759 17.7503 4.13774C17.5088 3.85789 17.1766 3.68166 16.818 3.64318Z" fill="#F0EAFF"/>
                    <path d="M9.41547 13.2716C9.17049 13.2719 8.93403 13.1777 8.75141 13.007L6.37673 10.8005C6.27819 10.7094 6.1978 10.5989 6.14017 10.4754C6.08254 10.3518 6.04879 10.2175 6.04088 10.0803C6.03296 9.94304 6.05102 9.80552 6.09402 9.67559C6.13703 9.54566 6.20413 9.42588 6.29149 9.3231C6.37885 9.22033 6.48474 9.13659 6.60311 9.07667C6.72148 9.01676 6.84999 8.98185 6.98128 8.97394C7.11258 8.96604 7.24407 8.98529 7.36823 9.0306C7.4924 9.07592 7.60679 9.1464 7.70486 9.238L9.35199 10.7681L12.6446 7.09653C12.8261 6.89469 13.0768 6.77632 13.3416 6.76739C13.6064 6.75846 13.8638 6.85969 14.0574 7.04888C14.2509 7.23859 14.3644 7.50081 14.3731 7.77798C14.3818 8.05514 14.285 8.32459 14.1038 8.52714L10.1454 12.9415C10.0521 13.0461 9.93902 13.1294 9.81341 13.1862C9.6878 13.243 9.55232 13.2721 9.41547 13.2716Z" fill="#7AA1D3"/>
                    </svg>
                    <span><?php echo pxl_print_html($link['text']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>