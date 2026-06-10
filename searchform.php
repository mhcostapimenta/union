<!-- Template Name: Search Form -->
<form role="search" method="get" class="d-flex align-items-center formBusca"
      action="<?php echo esc_url(home_url('/')); ?>">
      <input class="form-control search-field" type="search" id="search-field" name="s"
            placeholder="<?php echo union_get_string('Pesquisar ...'); ?>" value="<?php echo get_search_query(); ?>">
      <button class="btn btn-primary" type="submit" aria-label="Pesquisar conteúdo"><i
                  class="fa fa-search"></i></button>
</form>