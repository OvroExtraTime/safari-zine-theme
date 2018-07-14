<?php

function site_name(array $array = []) {
  $defaults = [
    'class'      => '',
    'logo'       => 'logo.svg',
    'name'       => 'Safari Zine',
    'href'       => get_home_url(),
    'target'     => '_self',
    'menu'       => null,
    'menu_class' => 'inline-list',
    'menu_cont'  => false,
    'only_logo'  => false
  ];
  $array = array_merge($defaults, array_intersect_key($array, $defaults));

  list($class, $logo, $name, 
       $href, $target, $menu, 
       $menu_class, $menu_cont,
       $only_logo) = array_values($array);

  $a_settings = "target='$target' href='$href'";
  $has_menu = $menu ? "has-menu" : "no-menu";

  ?>
  <div class="site-name <?php echo $class ?> <?php echo $has_menu ?>">
    <a <?php echo $a_settings ?>>
      <?php echo file_get_contents(__DIR__ . "/../images/logo/$logo") ?>
    </a>

    <?php if(!$only_logo): ?>
      <div class="site-name-contents">
        <a class="site-title" <?php echo $a_settings ?>>
          <?php echo $name ?>
        </a>

        <?php if($menu) {
          wp_nav_menu([
            'menu'           => $menu,
            'menu_class'     => $menu_class,
            'container' => $menu_cont
          ]);
        } ?>
      </div>
    <?php endif; ?>
  </div>
<?php }



/*
<?php foreach($categories as $category):
        $id = get_cat_ID($category->name);
        $url = get_category_link($id);
      ?>
      <a class="category category-<?php echo $category->slug ?>-name" href="<?php echo $url ?>"><?php echo $category->name ?></a>
    <?php endforeach ?>
*/



function paginate($dir, $word, $url) { ?>
  <div class="pagination-area">
    <a class="pagination-area-card pagination-area-card-<?php echo $dir ?>" href="<?php echo $url ?>">
      <?php if ($dir === 'left') {
        fa('arrow-circle-left');
        ?> 
          <span class="pagination-title"><?php echo $word ?> Posts</span>
        <?php
      } else if ($dir === 'right') {
        ?> 
          <span class="pagination-title"><?php echo $word ?> Posts</span>
        <?php       
        fa('arrow-circle-right');
      } ?>
    </a>
  </div>
<?php }

?>