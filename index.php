<?php
$args = array(
    ‘post_type’ => ‘post’,  // 投稿タイプ
    ‘posts_per_page’ => 50, // 表示件数。 -1ならすべての投稿を取得
    ‘orderby’ => ‘date’,    // ソート
                            // ・date  ：日付
                            // ・rand  ：ランダム
    ‘order’ => ‘DESC’
);    // 降順(日付の場合、日付が新しい順)// ループ
$the_query = new WP_Query($args);
if ($the_query->have_posts()):
    while ($the_query->have_posts()): $the_query->the_post();
    $content = $post->post_content;
    $pattern = "/(https?:\/\/)([-_.!~*'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)/";
    preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE);
    echo the_title();
    echo ‘<br>‘;
    //echo the_id();
    if ($matches) {
        //var_dump($matches);
        foreach ($matches[0] as $_matches) {
            echo $_matches[0].“<br>“;
        }
        echo ‘<hr>’;
    }    endwhile;
endif;// リセット(元の投稿データの復元)
wp_reset_postdata();
?>