<?php

class CCWalkernav extends Walker_Nav_Menu
{

    public $megaMenuID;

    public $count;

    public function __construct()
    {
        $this->megaMenuID = 0;

        $this->count = 0;
    }

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\" >\n";

        if ($this->megaMenuID != 0 && $depth == 0) {
            $output .= "<li class=\"megamenu-column megamenu-column-$this->count\"><ul>\n";
            $this->count++;
        }

        if ($this->megaMenuID != 0 && $depth == 1) {
            $output .= "<li class=\"megamenu-column2\"><ul>\n";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        if ($this->megaMenuID != 0 && $depth == 0) {
            $output .= "</ul></li>";
        }

        $output .= "</ul>";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        $args = (object) $args;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if ($this->megaMenuID != 0 && $this->megaMenuID != intval($item->menu_item_parent) && $depth == 0) {
            $this->megaMenuID = 0;
        }

        $column_divider = array_search('column-divider', $classes);
        $menu_products = array_search('menu-products', $classes);
        if ($column_divider !== false) {
            $output .= "</ul></li><li class=\"megamenu-column megamenu-column-$this->count\"><ul>\n";
        }

        // managing divider: add divider class to an element to get a divider before it.
        $divider_class_position = array_search('divider', $classes);
        if ($divider_class_position !== false) {
            $output .= "<li class=\"divider\"></li>\n";
            unset($classes[$divider_class_position]);
        }

        if ($menu_products !== false) {
            $output .= "</ul></li><li class=\"products-column megamenu-column\"><ul>\n";
        }

        if (array_search('megamenu', $classes) !== false) {
            $this->megaMenuID = $item->ID;
        }

        $classes[] = ($args->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ($depth && $args->has_children) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $productColor = get_field('product_color', $item->ID);
        $product_status = get_field('product_status', $item->ID);

        $output .= $indent . '<li style="--product-color: ' . $productColor . '; "' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ($args->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';

        // Check if item has featured image
        $has_image = get_field('product_logo', $item->ID);
        if ($has_image !== false && $this->megaMenuID != 0) {
            if ($has_image) {
                $item_output .= "<div class='image-wrapper'>";
                $item_output .= "<img alt=\"" . esc_attr($item->attr_title) . "\" src=\"" . $has_image['url'] . "\"/>";
                $item_output .= "</div>";
            }
        }


        $item_output .= '<span>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // add support for menu item title
        if (strlen($item->attr_title) > 2) {
            $item_output .= '<h3 class="tit">' . $item->attr_title . '</h3>';
        }
        // add support for menu item descriptions
        if ($item->description) {
            $item_output .= '<small>' . $item->description . '</small>';
        }
        $item_output .= '</span>';

        if ($product_status) {
            $item_output .= '<span class="product-status">' . $product_status . '</span>';
        }

        $item_output .= (($depth == 0 || 1) && $args->has_children) ? '</a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if (is_array($args[0])) {
            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
        } elseif (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }

        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
            foreach ($children_elements[$id] as $child) {
                if (!isset($newlevel)) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge(array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[$id]);
        }

        if (isset($newlevel) && $newlevel) {
            //end the child delimiter
            $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }
}
