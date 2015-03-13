<?php

function portfolio_default_page($type = NULL) {


    global $user;

    $default_portfolio = $type;
    if (empty($type)) {
        $default_portfolio = theme_get_setting('default_portfolio', 'creatiz');
    }


    $portfolio_type_arr = array('6c', '6c_masonry', '4c', '4c_masonry','3c', '3c_masonry', '2c', '2c_masonry', 'full');
    $build = array();



    if (in_array($default_portfolio, $portfolio_type_arr)) {


        $query = db_select('node', 'n')->extend('PagerDefault');
        $nids = $query
                ->fields('n', array('nid', 'sticky', 'created'))
                ->condition('type', 'portfolio')
                ->condition('status', 1)
                ->orderBy('sticky', 'DESC')
                ->orderBy('created', 'DESC')
                ->limit(theme_get_setting('default_nodes_portfolio', 'creatiz'))
                ->addTag('node_access')
                ->execute()
                ->fetchCol();

        if (isset($nids) && !empty($nids)) {
            $nodes = node_load_multiple($nids);
            $build += array('nodes' => array(
                    '#theme' => 'portfolio_' . $default_portfolio,
                    '#nodes' => $nodes,
                    )); //theme('portfolio_' . $default_portfolio, array('nodes' => $nodes));
            $build['pager'] = array(
                '#theme' => 'pager',
                '#weight' => 5,
            );

        } else {
            drupal_set_message(t('No project entries have been created.'));
        }
    } else {

        drupal_set_message(t('No project entries have been created.'));
    }

    return $build;
}