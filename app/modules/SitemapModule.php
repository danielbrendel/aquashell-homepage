<?php

/**
 * This class represents your module
 */
class SitemapModule {
    /**
     * @return string
     * @throws \Exception
     */
    public static function generate()
    {
        try {
            $sitemap = [
                '/',
                '/download',
                '/snippets',
                '/plugins',
                '/documentation'
            ];

            if (env('APP_ENABLETUTORIALS')) {
                $sitemap[] = '/tutorials';
            }

            foreach (SnippetsModel::getAll() as $snippet) {
                $sitemap[] = '/snippets/show/' . $snippet->get('id') . '/' . slug($snippet->get('title'));
            }

            $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">{%URLS%}</urlset>';
            $node = '<url><loc>{%URL%}</loc></url>';

            $nodes = '';

            foreach ($sitemap as $url) {
                $nodes .= str_replace('{%URL%}', url($url), $node);
            }

            return str_replace('{%URLS%}', $nodes, $xml);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
