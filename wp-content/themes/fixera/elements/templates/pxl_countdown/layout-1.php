<?php
$time_to = $settings['time_to'];
?>
<div class="pxl-countdown <?php echo esc_attr($settings['box_style']) ?>">
    <div class="pxl-countdown-container font-smooth d-flex-wrap gx-40 gx-md-50 gx-xl-80 align-items-center justify-content-center" data-time="<?php echo esc_attr($time_to); ?>">
        <div class="time-item col-6 col-sm-auto">
            <div class="time-item-inner wow skewIn">
                <div class="day inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Days', 'fixera') ?></div>
            </div>
        </div>
        <div class="time-item col-6 col-sm-auto">
            <div class="time-item-inner wow skewIn">
                <div class="hour inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Hours', 'fixera') ?></div>
            </div>
        </div>
        <div class="time-item col-6 col-sm-auto">
            <div class="time-item-inner wow skewIn">
                <div class="minute inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Minutes', 'fixera') ?></div>
            </div>
        </div>
        <div class="time-item col-6 col-sm-auto">
            <div class="time-item-inner wow skewIn">
                <div class="second inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Seconds', 'fixera') ?></div>
            </div>
        </div>
    </div>
</div>