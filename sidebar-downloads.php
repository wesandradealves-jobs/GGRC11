              <aside class="sidebar">

                <p><strong>Filtrar por</strong></p>

                <form class="categories" action="<?php the_permalink(); ?>" method="GET">

                  <ul>

                    <?php 

                      $permalink = get_the_permalink();



                      $terms = get_terms([

                          'taxonomy' => 'downloads_categories',

                          'hide_empty' => false,

                      ]);



                      if($terms):

                        foreach ($terms as $key => $value) {

                          ?>

                            <li class="<?php echo isset($_GET['cat']) && $_GET['cat'] === $value->slug ? 'active' : ''; ?>"><a href="javascript:void(0)" data-slug="<?php echo $value->slug; ?>"><?php echo $value->name; ?></a> <?php if(isset($_GET['cat']) && $_GET['cat'] === $value->slug) : ?> <a class="backto" href="<?php echo get_page_link(get_page_by_path('central-de-downloads')->ID); ?>"><i class="fas fa-backspace"></i></a> <? endif; ?></li>

                          <?php 

                        }

                      endif;

                    ?> 

                    <input type="hidden" name="cat" value="">

                    

                    <?php if(isset($_GET['sort'])) : ?>

                      <input type="hidden" name="sort" value="<?php echo $_GET['sort'];  ?>">

                    <?php endif; ?>                                        

                  </ul>

                </form>

              </aside>