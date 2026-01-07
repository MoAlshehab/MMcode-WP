<?php
if ( post_password_required() ) {
  return;
}
?>

<section id="comments" class="comments-section">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      💬 <?php comments_number('No comments', '1 comment', '% comments'); ?>
    </h2>
  <?php endif; ?>

  <?php if ( have_comments() ) : ?>
    <ol class="comments-list">
      <?php
        wp_list_comments([
          'style' => 'ol',
          'avatar_size' => 48,
          'reverse_top_level' => true,
          'reverse_children' => true,
          'callback' => function ($comment, $args, $depth) {

            $is_reply = $comment->comment_parent != 0;
            $classes = $is_reply ? 'comment-item reply' : 'comment-item';

        ?>
        <li <?php comment_class($classes); ?> id="comment-<?php comment_ID(); ?>">

          <div class="comment-body">

            <div class="comment-avatar">
              <?php echo get_avatar($comment, 48); ?>
            </div>

            <div class="comment-content">

              <div class="comment-header">
                <span class="comment-author"><?php comment_author(); ?></span>
                <span class="comment-date"><?php comment_date(); ?></span>
              </div>

              <?php if ( $is_reply ) : ?>
                <p class="comment-replying">
                  Replying to
                  <span class="comment-parent">
                    <?php
                      $parent = get_comment($comment->comment_parent);
                      echo esc_html($parent->comment_author);
                    ?>
                  </span>
                </p>
              <?php endif; ?>

              <div class="comment-text">
                <?php comment_text(); ?>
              </div>

              <div class="comment-reply-link">
                <?php
                  comment_reply_link(array_merge($args, [
                    'reply_text' => 'Reply',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
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

  <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="comments-closed">🔒 Comments are closed.</p>
  <?php endif; ?>

  <?php if ( comments_open() ) : ?>
    <div id="respond" class="comment-form-wrapper">

      <h3 id="reply-title" class="comment-form-title">
        Leave a reply
        <small><?php cancel_comment_reply_link('Cancel reply'); ?></small>
      </h3>

      <?php comment_form([
        'title_reply' => '',
        'class_form' => 'comment-form',
        'comment_field' => '
          <textarea name="comment" rows="4"
            class="comment-input"
            placeholder="Write your reply…" required></textarea>
        ',
        'fields' => [
          'author' => '<input name="author" class="comment-input" placeholder="Your name" required />',
          'email'  => '<input name="email" type="email" class="comment-input" placeholder="Your email" required />',
        ],
        'class_submit' => 'comment-submit',
      ]); ?>

    </div>
  <?php endif; ?>

</section>
