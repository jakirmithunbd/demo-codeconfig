<?php defined('ABSPATH') || exit ;?>

<?php
/**
 * Template Name: Team
 * */

get_header();

$data = [];

get_template_part('template-parts/hero', null, $data);
$members = get_field('members', 'options') ;

if (!empty($members)) : ?>
?>

<section class="teams">
    <?php foreach ($members as $member) : ?>
    <div class="team-partner">
        <div class="container">
            <div class="team-partner__wrapper sl-flex sl-flex-wrap">

                <?php if (!empty($member['image'])) : ?>
                <div class="team-partner__img">
                    <img src="<?php echo esc_url($member['image']['url']); ?>" alt="<?php echo esc_attr($member['image']['title']); ?>">
                </div>
                <?php endif; ?>

                <div class="team-partner__content">
                    <?php if (!empty($member['role'])) : ?>
                <div class="stylist-heading"><span class="line"></span><?php echo esc_html($member['role']); ?></div>
                <?php endif; ?>

                <?php if (!empty($member['name'])) : ?>
                <h2><?php echo esc_html($member['name']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($member['position'])) : ?>
                <span class="team-partner__role sl-uppercase sl-block"><?php echo esc_html($member['position']); ?></span>
                <?php endif; ?>

                <div class="partner-bio sl-flex sl-flex-wrap sl-justify-between">
                    <div class="formation">
                        <h4><?php _e('Formation', 'sentinelegal') ; ?></h4>

                        <?php if (!empty($member['formation'])) : ;?>
                        <p>
                            <?php echo wp_kses_post($member['formation']); ?>
                        </p>
                        <?php endif; ?>

                    </div>
                    <div class="language">
                        <h4><?php _e('Langues', 'sentinelegal') ; ?></h4>

                        <?php if (!empty($member['languages'])) : ;?>
                        <p>
                            <?php echo wp_kses_post($member['languages']); ?>
                        </p>
                        <?php endif; ?>

                    </div>
                </div>

                <?php if (!empty($member['bio'])) : ;?>
                <div class="sl-section-title">
                    <?php echo wp_kses_post($member['bio']); ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($member['email']) || !empty($member['linkedin'])) : ;?>
                <div class="sl-partners-contact sl-flex sl-flex-wrap">

                    <?php if (!empty($member['email'])) : ;?>
                    <a href="mailto:<?php echo esc_attr($member['email']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($member['email']); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($member['linkedin'])) : ;?>
                    <a target="_blank" href="<?php echo esc_url($member['linkedin']); ?>" class="sl-btn outline black"><?php _e('Linkedin', 'sentinelegal') ; ?> →</a>
                    <?php endif; ?>

                </div>
                <?php endif; ?>

            </div>      
        </div>
    </div>
    
    <?php endforeach; ?>    
</section>

<?php endif; ?>

<?php
$cta = get_field('cta') ;
$ctaData = [
    'sub_title' => !empty($cta['sub_title']) ? $cta['sub_title'] : '',
    'title' => !empty($cta['title']) ? $cta['title'] : 'Votre situation mérite une lecture lucide.',
    'phone' => !empty($cta['phone']) ? $cta['phone'] : '022 512 76 00',
    'languages' => !empty($cta['languages']) ? $cta['languages'] : 'Genève & Lyon  ·  Français, English, Deutsch',
    'button' => !empty($cta['button']) ? $cta['button'] : [],
];
get_template_part('template-parts/cta', null, $ctaData) ;?>

<?php get_footer(); ?>