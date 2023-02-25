<?php

namespace EasyFie;


class EasyFie
{

    public function getToken($user, $pass)
    {
        if (!empty($user) and !empty($pass)) {
            // login method
            $usepass = array(
                "username" => $user,
                "password" => $pass
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/login");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $usepass);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $token = curl_exec($ch);
            curl_close($ch);

            return json_decode($token);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }

    public function Me($token)
    {

        if (!empty($token)) {

            //view profile data
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/me");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $me = curl_exec($ch);
            curl_close($ch);
            return json_decode($me);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function WebData($token)
    {
        if (!empty($token)) {

            //header data
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/web-data");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $web_data = curl_exec($ch);
            curl_close($ch);

            return json_decode($web_data);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function getAllCategories($token)
    {
        if (!empty($token)) {

            //category for menu
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/categories");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $categories = curl_exec($ch);
            curl_close($ch);
            return json_decode($categories);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function getThemesColor($token)
    {

        if (!empty($token)) {

            //themes-color
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/themes-color");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $themes_color = curl_exec($ch);
            curl_close($ch);
            return json_decode($themes_color);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function generatedPages($token)
    {

        if (!empty($token)) {

            //generated-pages
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/generated-pages");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $generated_page = curl_exec($ch);
            curl_close($ch);
            return json_decode($generated_page);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function generatedPageSingle($token, $slug)
    {

        if (!empty($token) and !empty($slug)) {

            //generated-pages
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/generated-pages/$slug");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $single_page = curl_exec($ch);
            curl_close($ch);
            return json_decode($single_page);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function getMetaData($token)
    {
        if (!empty($token)) {

            //meta-data
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/meta-data");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $meta = curl_exec($ch);
            curl_close($ch);
            return json_decode($meta);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function ProductsOrBlogs($token, $type, $limit, $order, $paginate = 1)
    {

        $check_types = ['products', 'offer', 'service', 'shouts', 'article'];

        if (
            !empty($token) and
            !empty($type) and
            !empty($limit) and
            !empty($order) and
            in_array($type, $check_types) and
            $order == 'asc' or
            $order == 'desc'
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/type/$type/limit/$limit/order/$order?page=$paginate");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $productsOrblogs = curl_exec($ch);
            curl_close($ch);

            return json_decode($productsOrblogs);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function SingleData($token, $type, $id)
    {

        $check_types = ['products', 'offer', 'service', 'shouts', 'article'];

        if (
            !empty($token) and
            !empty($type) and
            !empty($id) and
            in_array($type, $check_types)
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/type/$type/id/$id");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            return json_decode($data);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function singleCategories($token, $category_id, $limit, $paginate = 1)
    {

        if (
            !empty($token) and
            !empty($category_id) and
            !empty($limit)
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/categories/$category_id/limit/$limit?page=$paginate");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $categories = curl_exec($ch);
            curl_close($ch);

            return json_decode($categories);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function Search($token, $type, $keyword, $limit)
    {

        $check_types = ['products', 'offer', 'service', 'shouts', 'article'];

        if (
            !empty($token) and
            !empty($type) and
            !empty($keyword) and
            !empty($limit) and
            in_array($type, $check_types)
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/type/$type/search/$keyword/limit/$limit");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            return json_decode($data);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }


    public function Orders($token, $postRequest)
    {
        if (
            !empty($token) and
            !empty($postRequest)
        ) {
            $postRequest = http_build_query($postRequest);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/orders");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $order = curl_exec($ch);
            curl_close($ch);

            return json_decode($order);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }



    public function OrdersPayment()
    {
        if (
            !empty($token) and
            !empty($order_id) and
            !empty($payment_status)
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/order-payment/order_id/$order_id/payment_status/$payment_status");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            return json_decode($data);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }

    public function notify($token)
    {
        if (
            !empty($token)
        ) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/notify");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $notify = curl_exec($ch);
            curl_close($ch);

            return json_decode($notify);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }

    public function Paginate($page, $total, $limit)
    {
        if (
            !empty($page) and
            !empty($total) and
            !empty($limit)
        ) {
            $links = 5;
            $last       = ceil($total / $limit);
            $start      = (($page - $links) > 0) ? $page - $links : 1;
            $end        = (($page + $links) < $last) ? $page + $links : $last;

            $html       = '<ul class="d-flex mx-auto">';
            $class      = ($page == 1) ? "disabled" : "";
            $html       .= '<li class="' . $class . '"><a class="page-link" href="?page=' . ($page - 1) . '">&laquo;</a></li>';

            if ($start > 1) {
                $html   .= '<li><a class="page-link" href="?page=1">1</a></li>';
                $html   .= '<li class="disabled"><span>...</span></li>';
            }

            for ($i = $start; $i <= $end; $i++) {
                $class  = ($page == $i) ? "active" : "";
                $html   .= '<li class="' . $class . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }

            if ($end < $last) {
                $html   .= '<li class="disabled"><span>...</span></li>';
                $html   .= '<li><a class="page-link" href="?page=' . $last . '">' . $last . '</a></li>';
            }

            $class      = ($page == $last) ? "disabled" : "";
            $html       .= '<li class="' . $class . '"><a class="page-link" href="?page=' . ($page + 1) . '">&raquo;</a></li>';

            return $html       .= '</ul>';
        } else {
            return ['error' => 'Missing Variable'];
        }
    }


    public function Portfolio($token, $limit, $order, $paginate)
    {

        if (!empty($token) and !empty($limit) and !empty($order) and !empty($paginate)) {
            //view profile data

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/portfolio/limit/$limit/order/$order/?page=$paginate");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $portfolio = curl_exec($ch);

            curl_close($ch);
            return json_decode($portfolio);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }
  
  
  	public function plugin_checker($token, $plugin_id)
    {
        if (
            !empty($token) and
            !empty($plugin_id)
        ) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.easyfie.com/rest-api/data-api/plugin_checker/$plugin_id");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $token
            ));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            return json_decode($data);
        } else {
            return json_encode(['error' => 'one or more fields are missing or invalid.']);
        }
    }

}
