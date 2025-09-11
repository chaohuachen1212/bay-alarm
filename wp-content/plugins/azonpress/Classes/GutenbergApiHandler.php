<?php
namespace Azonpress\Classes;

class GutenbergApiHandler
{
    public function registerRoutes()
    {
        register_rest_route('azonpress/v1', '/get_attributes', [
            'methods' => 'GET',
            'callback' => [$this, 'getAttributes'],
            'permission_callback' => '__return_true'
        ]);
    }

    public function getAttributes($request)
    {
        $url = $request['url'];

        try {
            $headers = get_meta_tags($url, true);
        } catch (\Throwable $th) {
            wp_send_json_error('Attribute not Found');
        }

        $title = $this->getTitle($headers, $url);
        $description = $this->getMetaDescription($headers);
        $image = $this->getFeaturedImage($headers);

        $data = [
            'url'              => $url,
            'meta_title'       => $title,
            'title'            => $title,
            'featured_image'   => $image,
            'meta_description' => $description,
            'headers'          => $headers
        ];

        wp_send_json(array(
            'data' => $data,
        ));
    }

    private function getTitle($headers, $url)
    {
        $possibleValues = [
            'title',
            'twitter:title',
            'og:title',
            'description',
            'twitter:description'
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        $title = '';
        $wp_http = new \WP_Http;
        $result = $wp_http->request($url, array('sslverify' => false));

        if (!$result or is_a($result, 'WP_Error') or !isset($result['body'])) {
            return '';
        }

        $data = $result['body'];

        // Look for <title>(.*?)</title> in the text
        if ($data and preg_match('#<title>[\s\n\r]*?(.*?)[\s\n\r]*?</title>#im', $data, $matches)) {
            $title = html_entity_decode(trim($matches[1]));
        }

        //Attempt to covert cyrillic and other weird shiz to UTF-8 - if it fails we'll just return the slug next
        if (extension_loaded('mbstring') && function_exists('iconv')) {
            $title = iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);
        }

        return $title;
    }

    private function getMetaDescription($headers)
    {
        $possibleValues = [
            'description',
            'twitter:description',
            'title',
            'twitter:title',
            'og:title'
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        return '';
    }

    private function getFeaturedImage($headers)
    {
        $possibleValues = [
            'twitter:image',
            'og:image'
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        return '';
    }
}
