<?php defined('ABSPATH') || exit; ?>

<?php
/**
 * Template Name: Contact
 * */

get_header();

$data = [];

get_template_part('template-parts/hero', null, $data); 

$contacts = get_field('contacts', 'options') ;
$members = get_field('members', 'options') ;
$form = get_field('form_shortcode') ;

?>

<section class="sl-contact">
    <div class="container">
        <div class="grid form-contact">
            <div class="col-xs-12 col-lg-6">

                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php _e('Formulaire', 'sentinelegal') ;?></span>
                </div>
                <h2><?php _e('Nous écrire', 'sentinelegal') ;?></h2>

                <?php if (!empty($form)) : ?>
                    <div class="contact-form">
                        <?php echo do_shortcode($form); ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="col-xs-12 col-lg-6">

                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php _e('Coordonnées', 'sentinelegal') ;?></span>
                </div>

                <?php if (!empty($contacts['offices'])) : ?>

                <h2><?php _e('Nous trouver', 'sentinelegal') ;?></h2>

                <div class="sl-locations">

                    <?php foreach ($contacts['offices'] as $office) : ?>
                    <div class="sl-locations__item">
                        <?php if (!empty($office['title'])) : ?>
                        <h4 class="sl-locations__item__city"><?php echo esc_html($office['title']); ?></h4>
                        <?php endif; ?>

                        <?php if (!empty($office['office'])) : ?>
                        <p class="sl-locations__item__address"><?php echo wp_kses_post($office['office']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($office['map'])) : ?>
                        <a href="<?php echo esc_url($office['map']); ?>" target="_blank" class="sl-locations__item__link"><?php _e('Voir sur la carte →', 'sentinelegal'); ?></a>
                        <?php endif; ?>

                    </div>
                    <?php endforeach; ?>
                        
                </div>
                <?php endif; ?>

                <?php if (!empty($members)) : ?>
                <div class="direct-contact">
                    <h4><?php _e('Contacts directs', 'sentinelegal') ;?></h4>

                    <?php if (!empty($contacts['phone'])) : ?>
                    <a href="tel:<?php echo esc_attr($contacts['phone']); ?>" class="direct-contact__tel sl-block"><?php echo esc_html($contacts['phone']); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($contacts['email'])) : ?>
                    <a href="mailto:<?php echo esc_attr($contacts['email']); ?>" class="direct-contact__email sl-block"><?php echo esc_html($contacts['email']); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($members)) : ?>
                        <?php foreach ($members as $member) : ?>
                            <?php if (!empty($member['email'])) : ?>
                                <a href="mailto:<?php echo esc_attr($member['email']); ?>" class="direct-contact__email-secondary sl-block"><?php echo esc_html($member['name']); ?> — <?php echo esc_html($member['email']); ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
$cta = get_field('cta');
$ctaData = [
    'sub_title' => !empty($cta['sub_title']) ? $cta['sub_title'] : '',
    'title' => !empty($cta['title']) ? $cta['title'] : 'Votre situation mérite une lecture lucide.',
    'phone' => !empty($cta['phone']) ? $cta['phone'] : '022 512 76 00',
    'languages' => !empty($cta['languages']) ? $cta['languages'] : 'Genève & Lyon  ·  Français, English, Deutsch',
    'button' => !empty($cta['button']) ? $cta['button'] : [],
];
get_template_part('template-parts/cta', null, $ctaData); ?>

<?php get_footer(); ?>