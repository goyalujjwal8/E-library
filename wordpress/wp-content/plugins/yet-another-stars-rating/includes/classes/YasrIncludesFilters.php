<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit( 'You\'re not allowed to see this page' );
} // Exit if accessed directly

/**
 * Public filters
 *
 * @since 2.4.3
 *
 * Class YasrPublicFilters
 */
class YasrIncludesFilters {

    private $yasr_stored_options = array();

    /**
     * This filters will hook for show custom texts
     *
     * @author Dario Curvino <@dudo>
     * @since 2.6.6
     *
     * @param $yasr_stored_options
     */
    public function filterCustomTexts($yasr_stored_options) {
        $this->yasr_stored_options = $yasr_stored_options;

        add_filter('yasr_cstm_text_before_overall', array($this, 'filterTextOverall'), 99);
        add_filter('yasr_cstm_text_before_vv',      array($this, 'filterTextVVBefore'), 99, 3);
        add_filter('yasr_cstm_text_after_vv',       array($this, 'filterTextVVAfter'), 99, 4);
        add_filter('yasr_cstm_text_already_voted',  array($this, 'filterTextAlreadyVoted'), 99, 2);
        add_filter('yasr_must_sign_in',             array($this, 'filterTextMustSignIn'), 99 );

    }

    /**
     * Get text_before_overall from db if exists and return it replacing %overall_rating% pattern with the vote
     *
     * @author Dario Curvino <@dudo>
     * @since 2.6.6
     *
     * @param $overall_rating
     *
     * @return string|string[]
     */
    public function filterTextOverall ($overall_rating) {
        if(array_key_exists('text_before_overall', $this->yasr_stored_options)) {
            $custom_text = htmlspecialchars_decode($this->yasr_stored_options['text_before_overall']);
        } else {
            $custom_text = '';
        }
        return str_replace('%rating%', $overall_rating, $custom_text);
    }

    /**
     * Get text_before_visitor_rating from db if exists and return it replacing the patterns with the votes
     *
     * @author Dario Curvino <@dudo>
     * @since 2.6.6
     *
     * @param $number_of_votes
     * @param $average_rating
     * @param $unique_id
     *
     * @return string|string[]
     */
    public function filterTextVVBefore ($number_of_votes, $average_rating, $unique_id) {
        if(array_key_exists('text_before_visitor_rating', $this->yasr_stored_options)) {
            $custom_text = htmlspecialchars_decode($this->yasr_stored_options['text_before_visitor_rating']);
        } else {
            $custom_text = '';
        }
        return $this->strReplaceInput($custom_text, $number_of_votes, $average_rating, $unique_id);
    }

    /**
     * Get text_after_visitor_rating from db if exists and return it
     *
     * @author Dario Curvino <@dudo>
     * @since  2.6.6
     *
     * @param $default_text
     * @param $number_of_votes
     * @param $average_rating
     * @param $unique_id
     *
     * @return string|string[]
     */
    public function filterTextVVAfter ($default_text, $number_of_votes, $average_rating, $unique_id) {
        if(array_key_exists('text_after_visitor_rating', $this->yasr_stored_options)) {
            $custom_text = htmlspecialchars_decode($this->yasr_stored_options['text_after_visitor_rating']);
        } else {
            $custom_text = '';
        }
        return $this->strReplaceInput($custom_text, $number_of_votes, $average_rating, $unique_id);
    }

    public function filterTextAlreadyVoted ($default_text, $rating) {
        if(array_key_exists('custom_text_user_voted', $this->yasr_stored_options)) {
            $custom_text = htmlspecialchars_decode($this->yasr_stored_options['custom_text_user_voted']);
        } else {
            $custom_text = '';
        }
        return str_replace('%rating%', $rating, $custom_text);
    }

    /**
     * @author Dario Curvino <@dudo>
     * @since  2.6.6
     *
     * @return mixed|string|void
     */
    public function filterTextMustSignIn ($default_text) {
        if(array_key_exists('custom_text_must_sign_in', $this->yasr_stored_options)) {
            $custom_text = htmlspecialchars_decode($this->yasr_stored_options['custom_text_must_sign_in']);
        } else {
            $custom_text = '';
        }
        return $custom_text;
    }

    /**
     * @author Dario Curvino <@dudo>
     * @since  2.5.9
     *
     * @param $subject
     * @param $number_of_votes
     * @param $average_rating
     * @param $unique_id
     *
     * @return string|string[]
     */
    protected function strReplaceInput($subject, $number_of_votes, $average_rating, $unique_id) {
        //This will contain the number of votes
        $number_of_votes_container  = '<span id="yasr-vv-votes-number-container-'. $unique_id .'">';

        //this will contain the average
        $average_rating_container   = '<span id="yasr-vv-average-container-'. $unique_id .'">';

        return str_replace(
            array(
                '%total_count%',
                '%average%'
            ),
            array(
                $number_of_votes_container . $number_of_votes . '</span>',
                $average_rating_container  . $average_rating  . '</span>'
            ),
            $subject
        );
    }

}