<!-- Template Name: Search Form -->
<form role="search" method="get" class="form-inline formBusca" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input class="form-control search-field" type="search" id="search-field" name="s" placeholder="Pesquisar ..." value="<?php echo get_search_query(); ?>">
      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
</form>