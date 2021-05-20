<?php
/* Template Name: profiles  */
get_header(); ?>
<?php
$uid = get_current_user_id();

if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $availcount = get_post($pid)->count;
    update_post_meta($pid, $uid, 'finished');
    update_post_meta($pid, 'count', $availcount + 1);
   
}
$posts = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE meta_key=$uid ");
$postnum = $wpdb->num_rows;
?>
<div class="container">
    <div class="head">
        <h1>Welcome <?php echo $current_user->display_name; ?><a href="../profile">Edit Details</a></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <hr>
        <h3 style="margin-left:1rem;">BOOKS HISTORY :</h3>
        <hr>
        <table>
            <tr>
                <th>
                    <h3>Book Name</h3>
                </th>
                <th>
                    <h3>Status</h3>
                </th>
            </tr>
            <?php
            $i = 0;
            while ($i < $postnum) { ?>
                <div class="data">
                    <tr>
                        <th><a href="<?php echo get_permalink($posts[$i]->post_id) ?>"><?php echo '<span>' . get_the_title($posts[$i]->post_id) . '</span>'; ?></br></a></th>
                        <th><?php echo '<span>' . $posts[$i]->meta_value . '</span>';
                            if ($posts[$i]->meta_value == 'issued') { ?>
                                <form method="POST" action="#" id="forn">
                                    <input name='pid' value="<?php echo $posts[$i]->post_id ?>" type="hidden">
                                    <button name="update">Finished</button>
                                </form>
                            <?php } ?></br>
                        </th>
                    </tr>
                </div>
            <?php
                $i++;
            }
            ?>
        </table>
    </div>
</div>

<?php get_footer(); ?>