<?php

function cmb2_lst_metaboxes() {

    $prefix = 'lst';

    /*
     * @description:  Adding slider metaboxes
     */

    $slider_metaboxes = new_cmb2_box(array(
        'id' => 'slider-content',
        'title' => 'Slider content',
        'object_types' => array('slider'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $slider_metaboxes->add_field(array(
        'name' => __('Afbeelding', 'lemonscentedtea'),
        'id' => $prefix . '_slider_image',
        'type' => 'file',
        'preview_size' => array(400, 200),
    ));

    $slider_metaboxes->add_field(array(
        'name' => __('Headline', 'lemonscentedtea'),
        'id' => $prefix . '_slider_headline',
        'type' => 'text',
    ));

    $slider_metaboxes->add_field(array(
        'name' => __('Klant', 'lemonscentedtea'),
        'id' => $prefix . '_slider_klant',
        'type' => 'text',
    ));

    $slider_metaboxes->add_field(array(
        'name' => __('Link naar case', 'lemonscentedtea'),
        'id' => $prefix . '_testimonial_text',
        'type'    => 'select',
        'options' => get_cases_taxonomy(),
    ));

    /*
     * @description:  Adding homepage metaboxes
     */

    $home_metaboxes = new_cmb2_box(array(
        'id' => 'homepage-content',
        'title' => 'Homepage content',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-home.php'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $home_metaboxes->add_field(array(
        'name' => __('Payoff', 'lemonscentedtea'),
        'id' => $prefix . '_homepage_payoff',
        'type' => 'text',
    ));

    /*
     * @description:  Adding single case metaboxes
     */
    $case_metaboxes = new_cmb2_box(array(
        'id' => 'case-content',
        'title' => 'Case content',
        'object_types' => array('cases'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $case_metaboxes->add_field(array(
        'name' => __('Sub-headline', 'lemonscentedtea'),
        'id' => $prefix . '_case_subheadline',
        'type' => 'text',
    ));

    $content_id = $case_metaboxes->add_field(array(
        'id' => 'content_group',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Content blok {#}', 'lemonscentedtea'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('Voeg content blok toe', 'lemonscentedtea'),
            'remove_button' => __('Verwijder content blok', 'lemonscentedtea'),
            'sortable' => true, // beta
        ),
    ));

    $case_metaboxes->add_group_field($content_id, array(
        'name' => 'Content type',
        'id' => 'content_type',
        'type'             => 'select',
      	'show_option_none' => true,
      	'default'          => 'standard',
      	'options'          => array(
      		'image' => __( 'Afbeelding/Slider', 'lemonscentedtea' ),
      		'video'   => __( 'Video', 'lemonscentedtea' ),
      		'text'     => __( 'Tekst', 'lemonscentedtea' ),
      	),
    ));

    $case_metaboxes->add_group_field($content_id, array(
        'name' => 'Afbeelding(en)',
        'id' => 'image',
        'type' => 'file_list',
        'preview_size' => array(400, 200),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_id, 'content_type' ) ),
          'data-conditional-value' => 'image',
    		),
    ));

    $case_metaboxes->add_group_field($content_id, array(
        'name' => 'Video URL',
        'id' => 'video_url',
        'type' => 'text_url',
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_id, 'content_type' ) ),
          'data-conditional-value' => 'video',
    		),
    ));

    $case_metaboxes->add_group_field($content_id, array(
        'name' => 'Tekst kolom 1',
        'id' => 'text-column-1',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_id, 'content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));

    $case_metaboxes->add_group_field($content_id, array(
        'name' => 'Tekst kolom 2',
        'id' => 'text-column-2',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_id, 'content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));

    /*
     * @description:  Over Ons Metaboxes
     */

    $over_ons_metaboxes = new_cmb2_box(array(
        'id' => 'over-ons-page-content',
        'title' => 'Over Ons intro',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-over-ons.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Header afbeelding', 'lemonscentedtea'),
        'id' => $prefix . '_overons_header',
        'type' => 'file',
        'preview_size' => array(400, 200),
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Intro titel', 'lemonscentedtea'),
        'id' => $prefix . '_overons_intro_title',
        'type' => 'text',
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Intro linker kolom', 'lemonscentedtea'),
        'id' => $prefix . '_overons_columnleft',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Intro rechter kolom', 'lemonscentedtea'),
        'id' => $prefix . '_overons_columnright',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $over_ons_metaboxes = new_cmb2_box(array(
        'id' => 'over-ons-video',
        'title' => 'Over Ons video',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-over-ons.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Video URL', 'lemonscentedtea'),
        'id' => $prefix . '_overons_video',
        'type' => 'text_url',
    ));

    $over_ons_metaboxes = new_cmb2_box(array(
        'id' => 'over-ons-text',
        'title' => 'Over Ons copy',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-over-ons.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Over ons titel', 'lemonscentedtea'),
        'id' => $prefix . '_overons_title',
        'type' => 'text',
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Over ons tekst', 'lemonscentedtea'),
        'id' => $prefix . '_overons_text',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $over_ons_metaboxes->add_field(array(
        'name' => __('Over ons afbeelding', 'lemonscentedtea'),
        'id' => $prefix . '_overons_image',
        'type' => 'file',
        'preview_size' => array(400, 200),
    ));

    $over_ons_metaboxes = new_cmb2_box(array(
        'id' => 'over-ons-logos',
        'title' => 'Klanten Logo\'s',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-over-ons.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $logo_id = $over_ons_metaboxes->add_field(array(
        'id' => $prefix . '_overons_logos',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Logo {#}', 'lemonscentedtea'),
            'add_button' => __('Voeg nieuw logo toe', 'lemonscentedtea'),
            'remove_button' => __('Verwijder logo', 'lemonscentedtea'),
            'sortable' => true,
        ),
    ));

    $over_ons_metaboxes->add_group_field($logo_id, array(
        'name' => __('Afbeelding', 'lemonscentedtea'),
        'id' => '_image',
        'type' => 'file',
        'preview_size' => array(200, 100),
    ));

    $over_ons_metaboxes->add_group_field($logo_id, array(
        'name' => __('Link naar case', 'lemonscentedtea'),
        'id' => '_link',
        'type'    => 'select',
        'options' => get_cases_taxonomy()
    ));

    /*
     * @description:  Adding Team metaboxes
     */

    $team_member_metaboxes = new_cmb2_box(array(
        'id' => 'team-member-content',
        'title' => 'Teamlid',
        'object_types' => array('team'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('Afbeelding', 'lemonscentedtea'),
        'id' => $prefix . '_teammember_image',
        'type' => 'file',
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('Functie', 'lemonscentedtea'),
        'id' => $prefix . '_teammember_role',
        'type' => 'text',
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('Omschrijving', 'lemonscentedtea'),
        'id' => $prefix . '_team_member_text',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('Telefoonnummer', 'lemonscentedtea'),
        'id' => $prefix . '_team_member_phone',
        'type' => 'text',
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('LinkedIn profiel URL', 'lemonscentedtea'),
        'id' => $prefix . '_team_member_linkedin',
        'type' => 'text_url',
    ));

    $team_member_metaboxes->add_field(array(
        'name' => __('Twitter profiel URL', 'lemonscentedtea'),
        'id' => $prefix . '_team_member_twitter',
        'type' => 'text_url',
    ));

    /*
     * @description:  Contact Metaboxes
     */

    $contact_metaboxes = new_cmb2_box(array(
        'id' => 'contact-page-content',
        'title' => 'Contact details',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'templates/template-contact.php'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $contact_metaboxes->add_field(array(
        'name' => __('Adres blok links', 'lemonscentedtea'),
        'id' => $prefix . '_contact_address_left',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $contact_metaboxes->add_field(array(
        'name' => __('Facebook URL', 'lemonscentedtea'),
        'id' => $prefix . '_contact_facebook',
        'type' => 'text_url',
    ));

    $contact_metaboxes->add_field(array(
        'name' => __('Linkedin URL', 'lemonscentedtea'),
        'id' => $prefix . '_contact_linkedin',
        'type' => 'text_url',
    ));

    $contact_metaboxes->add_field(array(
        'name' => __('Twitter URL', 'lemonscentedtea'),
        'id' => $prefix . '_contact_twitter',
        'type' => 'text_url',
    ));

    /*
     * @description:  Vacancies Metaboxes
     */

    $vacancies_metaboxes = new_cmb2_box(array(
        'id' => 'vacancies-content',
        'title' => 'Vacatures',
        'object_types' => array('vacatures'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $vacancies_metaboxes->add_field(array(
        'name' => __('Afbeelding', 'lemonscentedtea'),
        'id' => $prefix . '_vacancies_image',
        'type' => 'file',
        'preview_size' => array(400, 200),
    ));

    $vacancies_metaboxes->add_field(array(
        'name' => __('Samenvatting voor overzicht', 'lemonscentedtea'),
        'id' => $prefix . '_vacancies_intro',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
    ));

    $content_vacancy_id = $vacancies_metaboxes->add_field(array(
        'id' => 'vacancies_content_group',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Content blok {#}', 'lemonscentedtea'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('Voeg content blok toe', 'lemonscentedtea'),
            'remove_button' => __('Verwijder content blok', 'lemonscentedtea'),
            'sortable' => true, // beta
        ),
    ));

    $vacancies_metaboxes->add_group_field($content_vacancy_id, array(
        'name' => 'Content type',
        'id' => 'vacancies_content_type',
        'type'             => 'select',
      	'show_option_none' => true,
      	'default'          => 'standard',
      	'options'          => array(
      		'image' => __( 'Afbeelding/Slider', 'lemonscentedtea' ),
      		'video'   => __( 'Video', 'lemonscentedtea' ),
      		'text'     => __( 'Tekst', 'lemonscentedtea' ),
      	),
    ));

    $vacancies_metaboxes->add_group_field($content_vacancy_id, array(
        'name' => 'Afbeelding(en)',
        'id' => 'vacancies_image',
        'type' => 'file_list',
        'preview_size' => array(400, 200),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_vacancy_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'image',
    		),
    ));

    $vacancies_metaboxes->add_group_field($content_vacancy_id, array(
        'name' => 'Video URL',
        'id' => 'vacancies_video_url',
        'type' => 'text_url',
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_vacancy_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'video',
    		),
    ));

    $vacancies_metaboxes->add_group_field($content_vacancy_id, array(
        'name' => 'Tekst kolom 1',
        'id' => 'vacancies_text-column-1',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_vacancy_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));

    $vacancies_metaboxes->add_group_field($content_vacancy_id, array(
        'name' => 'Tekst kolom 2',
        'id' => 'vacancies_text-column-2',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_vacancy_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));

    /*
     * @description:  Single page Metaboxes
     */

    $page_metaboxes = new_cmb2_box(array(
        'id' => 'page-content',
        'title' => 'Content',
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'page.php'),
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true,
    ));

    $content_page_id = $page_metaboxes->add_field(array(
        'id' => 'page_content_group',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Content blok {#}', 'lemonscentedtea'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('Voeg content blok toe', 'lemonscentedtea'),
            'remove_button' => __('Verwijder content blok', 'lemonscentedtea'),
            'sortable' => true, // beta
        ),
    ));

    $page_metaboxes->add_group_field($content_page_id, array(
        'name' => 'Content type',
        'id' => 'vacancies_content_type',
        'type'             => 'select',
      	'show_option_none' => true,
      	'default'          => 'standard',
      	'options'          => array(
      		'image' => __( 'Afbeelding/Slider', 'lemonscentedtea' ),
      		'video'   => __( 'Video', 'lemonscentedtea' ),
      		'text'     => __( 'Tekst', 'lemonscentedtea' ),
      	),
    ));

    $page_metaboxes->add_group_field($content_page_id, array(
        'name' => 'Afbeelding(en)',
        'id' => 'vacancies_image',
        'type' => 'file_list',
        'preview_size' => array(400, 200),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_page_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'image',
    		),
    ));

    $page_metaboxes->add_group_field($content_page_id, array(
        'name' => 'Video URL',
        'id' => 'vacancies_video_url',
        'type' => 'text_url',
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_page_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'video',
    		),
    ));

    $page_metaboxes->add_group_field($content_page_id, array(
        'name' => 'Tekst kolom 1',
        'id' => 'vacancies_text-column-1',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_page_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));

    $page_metaboxes->add_group_field($content_page_id, array(
        'name' => 'Tekst kolom 2',
        'id' => 'vacancies_text-column-2',
        'type' => 'textarea_small',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'textarea_rows' => 12,
        ),
        'attributes' => array(
    			'required'            => true, // Will be required only if visible.
    			'data-conditional-id' => wp_json_encode( array( $content_page_id, 'vacancies_content_type' ) ),
          'data-conditional-value' => 'text',
    		),
    ));



}

add_action('cmb2_init', 'cmb2_lst_metaboxes');

function get_team_taxonomy(){
    $team = array();
    $teammembers = get_posts( array(
        'post_type' => 'team',
        'numberposts' => -1,
        'hide_empty' => false,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    foreach($teammembers as $teammember){
        $team[$teammember->ID] = $teammember->post_title;
    }
    return $team;
}

function get_cases_taxonomy(){
    $cases = array();
    $getcases = get_posts( array(
        'post_type' => 'cases',
        'numberposts' => -1,
        'hide_empty' => false,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    $cases[0] = __( 'Selecteer een case', 'lemonscentedtea' );
    foreach($getcases as $case){
        $cases[$case->ID] = $case->post_title;
    }
    return $cases;
}

function get_pages_with_branches() {
    $get_page_args = array(
        'post_type' => "page",
        'numberposts' => -1,
        'suppress_filters' => false,
        'meta_key' => '_wp_page_template',
        'meta_value' => array('templates/template-service.php')
    );
    $brancheoptions = array();
    foreach (get_posts($get_page_args) as $page) {
        $brancheoptions += array(
            $page->ID => $page->post_title,
        );
    }
    return $brancheoptions;
}

?>
