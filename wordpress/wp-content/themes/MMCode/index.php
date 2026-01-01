<?php get_header(); ?>

  <main class="bg-white text-black border-b border-gray-200
               dark:bg-bg dark:text-textBase dark:border-borderBase">


<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

    <article class="mx-auto max-w-3xl px-6 py-16">

      <!-- Featured Image -->
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="mb-10 overflow-hidden rounded-2xl border border-neutral-800">
          <?php the_post_thumbnail(
            '',
            ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']
          ); ?>
        </div>
      <?php endif; ?>

      <!-- Meta -->
      <div class="mb-4 flex flex-wrap items-center gap-3 text-sm text-neutral-400">
        <span class="rounded-full bg-neutral-800 px-3 py-1 text-xs">
          <?php echo get_the_category_list(', '); ?>
        </span>

        <span>•</span>

         <span>
          Comments <strong class="text-neutral-200">
            <?php comments_popup_link('0 Comments','1 Comments','% Comments','comment-url','Comments Off'); ?>
          </strong>
        </span>
        <span>
          By <strong class="text-neutral-200">
            <?php the_author_posts_link(); ?>
          </strong>
        </span>

        <span>•</span>
<span>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>
        <!-- <span><?php echo get_the_date(); ?></span> -->
      </div>
          <p class="text-sm text-neutral-400">
            <?php 
            if (has_tag()){
              the_tags();
            }else{
              echo 'Tags: There\'s no Tags';
            }
            
            ?>
          </p>

      <!-- Title -->
      <h1 class="mb-6 text-4xl font-bold tracking-tight text-primary">
        <a href="<?php the_permalink() ?>">
        <?php the_title(); ?>
      </h1>
        </a> 
      <!-- Content -->
      <div class="prose prose-invert max-w-none
                  prose-headings:text-neutral-100
                  prose-p:text-neutral-300
                  prose-a:text-primary">

        <?php the_content('Read The Full Article ...'); ?>

      </div>

      <!-- Author box -->
      <div class="mt-16 flex items-center gap-6 rounded-2xl border border-neutral-800 bg-neutral-900 p-6">

        <?php echo get_avatar( get_the_author_meta('ID'), 64, '', '', [
          'class' => 'h-16 w-16 rounded-full'
        ] ); ?>

        <div>
          <p class="text-sm text-neutral-400">Written by</p>
          <p class="text-lg font-semibold"><?php the_author(); ?></p>
          <p class="text-sm text-neutral-400">
            <?php the_author_meta('description'); ?>
          </p>
        </div>
      </div>

    </article>

  <?php endwhile; ?>
<?php endif; ?>
<!-- Archive navigation -->
<div class="mt-16 flex justify-between border-t border-borderBase pt-6">

  <?php if ( get_previous_posts_link() ) : ?>
    <?php previous_posts_link('<span class="btn-nav">← Previous</span>'); ?>
  <?php else : ?>
    <span> No Prev Pages</span>
  <?php endif; ?>

  <?php if ( get_next_posts_link() ) : ?>
    <?php next_posts_link('<span class="btn-nav">Next →</span>'); ?>
      <?php else : ?>
    <span> No Next Pages</span>
  <?php endif; ?>

</div>


</main>

<?php get_footer(); ?>
