<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class News extends REST_Controller {

    public $news_table = 'news';
    public $newsfeed_table = 'news_feed';

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->library('session');
        $this->ci->load->library('webhose');
        $this->ci->load->model('news_model');
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

 

    function print_filterwebdata_titles($api_response) {
        if ($api_response == null) {
            echo "<p>Response is null, no action taken.</p>";
            return;
        }
        if (isset($api_response->posts))
            foreach ($api_response->posts as $post) {
                echo "<p>" . $post->title . "</p>";
            }
    }

   

    public function gather_news_get() {
        $inserted = $insert_array = 0;
        $this->webhose->config("ca6aff3e-c5f7-4a26-8f5e-35987cc8db86");
        $insert_array = '';
        $params = array(
            "q" => "thread.country:IN language:english site_category:legal_issues site_category:legal_issues",
            "sort" => "crawled"
        );
        $posts = $this->webhose->query("filterWebContent", $params);
        if (isset($posts) && !empty($posts)) {
            foreach ($posts as $key => $thread_value) {
                if (isset($thread_value) && !empty($thread_value) && is_array($thread_value)) {
                    foreach ($thread_value as $value_t) {

                        $insert_array[] = array(
                            'thread' => json_encode($value_t->thread),
                            'uuid' => $value_t->uuid,
                            'url' => $value_t->url,
                            'author' => $value_t->author,
                            'published' => $value_t->published,
                            'title' => $value_t->title,
                            'text' => $value_t->text,
                            'language' => $value_t->language,
                            'rating' => $value_t->rating,
                            'crawled' => $value_t->crawled
                        );
                    }

                    $inserted = $this->db->insert_batch($this->newsfeed_table, $insert_array);
                    
                }
            }

            if ($inserted) {
                $this->response(apiresponse('1', 'Success', $inserted), 200);
            } else {
                $this->response(apiresponse('0', "failed", ''), 404);
            }
        } else {
            $this->response(apiresponse('0', "failed", ''), 404);
        }
    }

    

    

}
