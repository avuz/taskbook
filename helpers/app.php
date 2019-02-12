<?php
/**
 * Created by PhpStorm.
 * User: professor
 * Date: 10.02.2019
 * Time: 0:05
 */


if (!function_exists('view')) {
    function view($template, array $args = [])
    {
        return \App\Core\View::make($template, $args);
    }
}

if (!function_exists('layout')) {
    function layout($template, array $args = [])
    {
        return \App\Core\View::make($template, $args)->getContent();
    }
}

if (!function_exists('app')) {
    function app()
    {
        return \App\App::getInstance();
    }
}

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        return \App\Core\Config::get($key, $default);
    }
}

if (!function_exists('route')) {
    function route()
    {
        //TODO
        return '';
    }
}

if (!function_exists('session_has')) {
    function session_has($key)
    {
        return \App\Core\Session\Session::has($key);
    }
}

if (!function_exists('session_get')) {
    function session_get($key)
    {
        return \App\Core\Session\Session::get($key);
    }
}

if (!function_exists('session_take')) {
    function session_take($key)
    {
        return \App\Core\Session\Session::take($key);
    }
}


if (!function_exists('paginate')) {
    /**
     * @param $item_count
     * @param $cur_page
     * @param string $link
     * @param array $queryStringArray
     * @return \App\Core\View|string
     */
    function paginate($item_count, $cur_page, $link = '', $queryStringArray = [])
    {
        $queryString = '';
        if ($queryStringArray) {
            if (strpos($link, '?') !== false) {
                $queryString = '&' . http_build_query($queryStringArray);
            } else {
                $queryString = '?' . http_build_query($queryStringArray);
            }
        }
        $limit = config('pagination.limit', 3);
        $page_count = ceil($item_count / $limit);
        $current_range = [
            $cur_page - 2 < 1 ? 1 : $cur_page - 2,
            $cur_page + 2 > $page_count ? $page_count : $cur_page + 2
        ];
        $first_page = $cur_page > 3 ? '<a href="' . sprintf($link, '1') . $queryString . '">1</a>' . ($cur_page < 5 ? ', ' : ' ... ') : null;
        $last_page = $cur_page < $page_count - 2 ? ($cur_page > $page_count - 4 ? ', ' : ' ... ') . '<a href="' . sprintf($link, $page_count) . $queryString . '">' . $page_count . '</a>' : null;
        // prev, next pages
        $previous_page = $cur_page > 1 ? '<a href="' . sprintf($link, ($cur_page - 1)) . $queryString . '">' . config('app.pagination.prev') . '</a> | ' : null;
        $next_page = $cur_page < $page_count ? ' | <a href="' . sprintf($link, ($cur_page + 1)) . $queryString . '">' . config('app.pagination.next') . '</a>' : null;


        // Display pages that are in range
        for ($x = $current_range[0]; $x <= $current_range[1]; ++$x)
            $pages[] = '<a href="' . sprintf($link, $x) . $queryString . '">' . ($x == $cur_page ? '<strong>' . $x . '</strong>' : $x) . '</a>';

        if ($page_count > 1)
            return '<p class="pagination"><strong>Pages:</strong> ' . $previous_page . $first_page . implode(', ', $pages) . $last_page . $next_page . '</p>';
        return view('partials/pagination');
    }
}

