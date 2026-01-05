<?php
/**
 * Comments template
 * MMCODE WP – Replies styled & professional
 */

if ( post_password_required() ) {
  return;
}
?>

<section id="comments" class="my-20 max-w-5xl mx-auto">

  <!-- Title -->
  <?php if ( have_comments() ) : ?>
    <h2 class="mb-8 text-2xl font-bold text-primary">
      💬 <?php comments_number('No comments', '1 comment', '% comments'); ?>
    </h2>
  <?php endif; ?>

  <!-- Comments list -->
  <?php if ( have_comments() ) : ?>
    <ol class="space-y-6">
      <?php
        wp_list_comments([
          'style'      => 'ol',
          'avatar_size'=> 48,
          'short_ping' => true,
          'reverse_top_level'  => true, // 👈 NIEUWSTE BOVENAAN
          'reverse_children'   => true, // 👈 replies ook correct
          'callback'   => function ($comment, $args, $depth) {

            // Check if this comment is a reply
            $is_reply = $comment->comment_parent != 0;

            // Styles based on parent / reply
            $comment_classes = $is_reply
  ? 'ml-10 rounded-2xl border border-borderBase bg-gray-100 p-5 dark:bg-surfaceLight'
  : 'mt-10 rounded-2xl border border-borderBase bg-white p-6 dark:bg-surface';

      ?>
        <li <?php comment_class($comment_classes); ?>
            id="comment-<?php comment_ID(); ?>">

          <div class="flex gap-4">

            <!-- Avatar -->
            <div class="shrink-0">
              <?php echo get_avatar($comment, 48, '', '', [
                'class' => 'rounded-full'
              ]); ?>
            </div>

            <!-- Body -->
            <div class="flex-1">

              <!-- Author + date -->
              <div class="mb-1 flex items-center gap-2 text-sm">
                <span class="font-semibold text-black dark:text-textBase">
                  <?php comment_author(); ?>
                </span>
                <span class="text-textMuted">
                  • <?php comment_date(); ?>
                </span>
              </div>

              <!-- Replying to text -->
              <?php if ( $is_reply ) : ?>
                <p class="mb-2 text-xs italic text-textMuted">
                  Replying to
                  <span class="font-semibold text-primary">
                    <?php
                      $parent = get_comment($comment->comment_parent);
                      echo esc_html($parent->comment_author);
                    ?>
                  </span>
                </p>
              <?php endif; ?>

              <!-- Comment text -->
              <div class="prose max-w-none text-black dark:text-textBase">
                <?php comment_text(); ?>
              </div>

              <!-- Reply link -->
              <div class="mt-3 text-sm text-primary">
                <?php
                  comment_reply_link(array_merge($args, [
                    'reply_text' => 'Reply',
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                  ]));
                ?>
              </div>

            </div>
          </div>

        </li>
      <?php } ]);
      ?>
    </ol>
  <?php endif; ?>

  <!-- Closed notice -->
  <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="mt-6 text-sm text-textMuted">
      🔒 Comments are closed.
    </p>
  <?php endif; ?>

  <!-- Comment form -->
  <?php if ( comments_open() ) : ?>
    <div id="respond"
         class="mt-14 rounded-2xl border border-borderBase
                bg-gray-50 p-6 dark:bg-surface">

      <h3 id="reply-title"
          class="mb-4 text-lg font-semibold text-primary">
        Leave a reply
        <small class="ml-2 text-sm">
          <?php cancel_comment_reply_link('Cancel reply'); ?>
        </small>
      </h3>

      <?php
        comment_form([
          'title_reply'        => '',
          'title_reply_to'     => 'Reply to %s',
          'class_form'         => 'space-y-4',
          'class_submit'       =>
            'inline-flex items-center rounded-lg
             bg-primary px-6 py-2 text-sm font-medium text-white
             hover:bg-primaryHover transition',

          'comment_field' => '
            <textarea id="comment" name="comment" rows="4"
              class="w-full rounded-lg border border-borderBase
                     bg-white p-3 text-black
                     placeholder:text-textMuted
                     focus:outline-none focus:ring-2 focus:ring-primary
                     dark:bg-bg dark:text-textBase"
              placeholder="Write your reply…" required></textarea>
          ',

          'fields' => [
            'author' => '
              <input id="author" name="author" type="text"
                class="w-full rounded-lg border border-borderBase
                       bg-white p-3 text-black
                       placeholder:text-textMuted
                       focus:outline-none focus:ring-2 focus:ring-primary
                       dark:bg-bg dark:text-textBase"
                placeholder="Your name" required />
            ',
            'email' => '
              <input id="email" name="email" type="email"
                class="w-full rounded-lg border border-borderBase
                       bg-white p-3 text-black
                       placeholder:text-textMuted
                       focus:outline-none focus:ring-2 focus:ring-primary
                       dark:bg-bg dark:text-textBase"
                placeholder="Your email" required />
            ',
          ],
        ]);
      ?>

    </div>
  <?php endif; ?>

</section>
