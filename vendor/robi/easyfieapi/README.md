# EasyfieApi


composer require robi/easyfieapi


Usages: 

require 'vendor/autoload.php';

$easyfie = new \EasyFie\EasyFie();

//call now function

Api Usages...

    $exmple_types = ['products', 'offer', 'service', 'shouts', 'article'];

    $token = $easyfie->getToken($user, $pass)

    $me = $easyfie->Me($token)

    $web_data = $easyfie->WebData($token)

    $categories = $easyfie->getAllCategories($token)

    $themes_colors = $easyfie->getThemesColor($token) 

    $generated_pages = $easyfie->generatedPages($token)

    $generated_single = $easyfie->generatedPageSingle($token, $slug)

    $meta = $easyfie->getMetaData($token)

    $easyfie->ProductsOrBlogs($token, $type, $limit, $order $paginate)

    $easyfie->SingleData($token, $type, $id)

    $easyfie->singleCategories($token, $category_id, $limit, $paginate)

    $easyfie->Search($token, $type, $keyword, $limit)
    
    $easyfie->Orders($token, $postRequest)
    
    $easyfie->Portfolio($limit, $order, $paginate)
   
    $easyfie->paginate($page, $total, $limit)
    
    
    
