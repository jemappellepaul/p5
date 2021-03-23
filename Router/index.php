<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function () {
     echo 'homepage';
});

$router->get('/posts', function () {
     echo 'tous les articles';
});
$router->get('/posts/:id-:slug', function ($id, $slug) use ($router) {
     echo $router->url('posts.show', ['id' => '1', 'slug' =>'salut-les-gens']);
}, 'posts.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9])+');

$router->get('/posts/:id', function ($id) {
?>

     <form action="" method="post">

          <input type="text" name="name">
          <button type="submit"> Envoyer</button>
     </form>

<?php
});

$router->post('/posts/:id', function ($id) {
     echo 'poster l\'aricle' . $id . '<pre>' . print_r($_POST, true) . '<pre>';
});

$router->run();
