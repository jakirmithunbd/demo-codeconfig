
<div class="cc-footer-description">
    <p class="subscribe-title">
        <strong>
            <?php echo __('Subscribe', 'codeconfig'); ?>
        </strong>
        <?php echo __('to our newsletter', 'codeconfig'); ?>
    </p>
    <div class="subscribe-form">
        <?php get_template_part('/template-parts/brevo_subscribe_form'); ?>
    </div>
    <div class="social-icons">
        <ul class="unstyle d-flex">
            <li class="cc-facebook"><a class="flex-center transition" target="_blank"
                    href="<?php echo esc_url('https://www.facebook.com/codeconfig'); ?>">
                    <?php esc_attr_e('Facebook', 'codeconfig'); ?>
                </a></li>
            <li class="cc-twitter"><a class="flex-center transition" target="_blank"
                    href="<?php echo esc_url('https://twitter.com/Code_Config'); ?>"><?php esc_attr_e('Twitter', 'codeconfig'); ?></a>
            </li>
            <li class="cc-youtube"><a class="flex-center transition" target="_blank"
                    href="<?php echo esc_url('https://www.youtube.com/@CodeConfigs'); ?>"><?php esc_attr_e('Youtube', 'codeconfig'); ?></a>
            </li>
            <li class="cc-linkedin"><a class="flex-center transition" target="_blank"
                    href="<?php echo esc_url('https://www.linkedin.com/company/codeconfig/?viewAsMember=true'); ?>"><?php esc_attr_e('Linkedin', 'codeconfig'); ?></a>
            </li>
            <li class="cc-wordpress"><a class="flex-center transition" target="_blank"
                    href="<?php echo esc_url('https://profiles.wordpress.org/codeconfig/#content-plugins'); ?>"><?php esc_attr_e('Wordpress', 'codeconfig'); ?></a>
            </li>
        </ul>
    </div>
</div>