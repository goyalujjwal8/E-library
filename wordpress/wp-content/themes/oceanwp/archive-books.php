<?php
get_header();
?>
<?php
if (isset($_POST['upload'])) {
    $uid = get_current_user_id();
    $pid = $_POST['pid'];
    $action = $_POST['action'];
    $availcount = get_post($pid)->count;
    $query = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `meta_key`=$uid AND `meta_value`='issued'");
    $postnum = $wpdb->num_rows;

    if ($action == 'issued') {
        if ($postnum >= 1) {
    ?>
    <div class="alertbarr">First Mark the Currently Issued Book As Finished.</div>
       <?php } else {
            if (!add_post_meta($pid, $uid, 'issued', true)) {
                update_post_meta($pid, $uid, 'issued');
            }
            update_post_meta($pid, 'count', $availcount - 1);
        }
    } else if ($action == 'wishlist') {
        if (!add_post_meta($pid, $uid, 'wishlist', true)) {
            update_post_meta($pid, $uid, 'wishlist');
        }
    } 
}
?>
<?php
if (isset($_POST['sort'])) {
    $order = $_POST['order'];
    if ($order == 'az') {
        $posts = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type='books' AND post_status='publish' ORDER BY post_title ASC"); 
    } else if ($order == 'za') {
        $posts = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type='books' AND post_status='publish' ORDER BY post_title DESC");
    } else {
        header('./books.php');
    }
} ?>

<div class="container">
    <div class="coloumn">
        <form method='POST' action="#">
            <div class="row">
                <span>Sort By : </span>
                <select style="width: 200px;" name="order">
                    <option>Default</option>
                    <option id="val1" value="az">A-Z</option>
                    <option id="val2" value="za">Z-A</option>
                    <input type="submit" name="sort" value="submit">
                </select>
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="coloumn">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row">
                <div class='card'>
                    <div class="col">
                        <div class='col'>
                            <?php
                            the_post_thumbnail('medium');
                            ?>
                        </div>
                        <div class="col">
                        <div class="titles">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            </div>
                            <h5><?php
                                $author = get_post();
                                echo "By : " . $author->author;
                                $name = get_permalink();
                                ?>
                            </h5>
                            <div class="for">
                            <?php if(is_user_logged_in()){ ?>
                                <form method='POST' action="#">
                                    <span>Mark As : </span>
                                    <input id="val1" name='action' value="issued" type="radio"><span>Issue</span>
                                    <input id="val2" name='action' value="wishlist" type="radio"><span>Wishlist</span>
                                    <input name='pid' value="<?php echo $post->ID ?>" type="hidden">
                                    <input type="submit" name="upload" value="submit" style="border-radius: 50px; width:px;padding:10px;">
                                </form>
                                <?php } ?>
                            </div>
                            <h4><a href="<?php echo $name; ?>">More Details --></a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>'
    </div>
</div>
<div class="container">
    <div class="coloumn">
        <span><?php the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('<-Previous', 'textdomain'),
                    'next_text' => __('Next->', 'textdomain'),
                )); ?></span>
    </div>
</div>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>