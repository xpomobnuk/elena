</div><!-- end mainContent -->

<div class="mainFooter">

    <div class="customContainer">

        <div class="footerRowWrap">

            <div class="leftBox">

                <ul class="addressWrap">

                    <?php if (ot_get_option('address')) : ?>

                    <li>
                        <i class="icon">
                            <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 363.91 485.21">
                                <title>marker</title>
                                <g class="cls-2">
                                    <path d="M182,0C81.47,0,0,81.47,0,182A181.13,181.13,0,0,0,36.31,291L182,485.21,327.6,291A181.11,181.11,0,0,0,363.91,182c0-100.48-81.47-182-182-182m0,303.26A121.3,121.3,0,1,1,303.26,182,121.31,121.31,0,0,1,182,303.26"
                                          transform="translate(0 0)"/>
                                </g>
                            </svg>
                        </i>

                        <?php echo ot_get_option('address'); ?>

                        <?php endif; ?>

                    </li>

                    <?php if (ot_get_option('metro')) : ?>

                    <li>
                        <i class="icon">
                            <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 93.71 76.24">
                                <title>metro</title>
                                <polygon
                                        points="77.32 0 47.38 42.52 16.8 0.99 0 70.52 22.73 70.52 26.89 48.28 47.01 76.24 67.02 48.9 71.05 70.64 93.71 70.64 77.32 0"/>
                            </svg>
                        </i>

                        <?php echo ot_get_option('metro'); ?>

                        <?php endif; ?>

                    </li>

                </ul>

                <ul class="workTimeWrap">

                    <?php if (ot_get_option('time')) : ?>

                    <li>
                        <i class="icon">
                            <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 438.53 438.53">
                                <title>clock</title>
                                <g class="cls-2">
                                    <path d="M409.13,109.2a218.35,218.35,0,0,0-79.8-79.8Q278.94,0,219.27,0T109.21,29.41a218.29,218.29,0,0,0-79.8,79.8Q0,159.6,0,219.27T29.41,329.33a218.35,218.35,0,0,0,79.8,79.8q50.4,29.41,110.06,29.41t110.06-29.41a218.29,218.29,0,0,0,79.8-79.8q29.4-50.39,29.4-110.06T409.13,109.2m-55.39,188a154.84,154.84,0,0,1-56.53,56.53,151.81,151.81,0,0,1-77.94,20.83,151.82,151.82,0,0,1-77.94-20.83A154.85,154.85,0,0,1,84.8,297.21,151.78,151.78,0,0,1,64,219.27,151.81,151.81,0,0,1,84.8,141.32a154.81,154.81,0,0,1,56.53-56.53A151.8,151.8,0,0,1,219.27,64a151.8,151.8,0,0,1,77.94,20.84,154.82,154.82,0,0,1,56.53,56.53,151.8,151.8,0,0,1,20.84,77.94,151.8,151.8,0,0,1-20.84,77.94"/>
                                    <path d="M246.68,109.63H228.41a8.79,8.79,0,0,0-9.14,9.14v100.5h-64a8.79,8.79,0,0,0-9.14,9.13v18.27a8.79,8.79,0,0,0,9.14,9.13h91.37a8.8,8.8,0,0,0,9.13-9.13V118.77a8.8,8.8,0,0,0-9.14-9.14"/>
                                </g>
                            </svg>
                        </i>

                        <?php echo ot_get_option('time'); ?>

                        <?php endif; ?>

                    </li>

                    <li><a href="#contacts">Показать на карте</a></li>

                </ul>

            </div>


            <div class="rightBox">

                <?php $phones = ot_get_option('phones');

                if ($phones) : ?>

                    <ul class="phoneNumbersWrap">

                        <?php foreach ($phones as $phone) : ?>

                            <li><a href="tel:<?php echo $phone['number']; ?>"
                                   class="phoneNumbersWrap__phone"><?php echo $phone['number']; ?></a></li>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

                <div class="rowWrap">
                    <a href="#" class="callbackBtn showPopup" data-popup-name="callback">Обратный звонок</a>
                </div>

            </div>

        </div><!-- end footerRowWrap -->

    </div><!-- end customContainer -->

</div><!-- end mainFooter -->

</div><!-- end mainWrapper -->


<!-- Popups -->
<div id="callback" class="popup callback">
    <div class="wrapper">
        <div class="secondaryWrapper">
            <div class="formWrap">
                <div class="titles">
                    <h2 class="title">Обратный звонок</h2>
                    <div class="separator"></div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="147" title="Обратный звонок"]'); ?>
            </div>
        </div>
    </div>
</div>


<div id="makeAppointment" class="popup makeAppointment">
    <div class="wrapper">
        <div class="secondaryWrapper">
            <div class="formWrap">
                <div class="titles">
                    <h2 class="title">Записаться на прием</h2>
                    <div class="separator"></div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="6" title="Записаться на прием"]'); ?>
            </div>
        </div>
    </div>
</div>


<div id="findOutPrice" class="popup findOutPrice">
    <div class="wrapper">
        <div class="secondaryWrapper">
            <div class="formWrap">
                <div class="titles">
                    <h2 class="title">Узнать цену</h2>
                    <div class="separator"></div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="149" title="Узнать цену"]'); ?>
            </div>
        </div>
    </div>
</div>


<div id="insertTestimonial" class="popup insertTestimonial">
    <div class="wrapper">
        <div class="secondaryWrapper">
            <div class="formWrap">
                <div class="titles">
                    <h2 class="title">Оставить отзыв</h2>
                    <div class="separator"></div>
                </div>
                <form id="testimonial" method="post">
                    <div class="fieldRow">
                        <input type="text" name="username" placeholder="Ваше имя">
                    </div>

                    <div class="fieldRow">
                        <textarea name="message" cols="40" rows="4" placeholder="Что вы о нас думаете?"></textarea>
                    </div>

                    <div class="fieldRow center">
                        <input type="submit" name="insert" value="Я так думаю!">
                    </div>
                </form>
                <div id="ajaxMsgField" class="ajax_msg_field"></div>
            </div>
        </div>
    </div>
</div>
<!-- end Popups -->

<script src="<?php echo get_template_directory_uri() . '/inc/js/google.maps.js'; ?>"></script>

<?php wp_footer(); ?>

</body>
</html>