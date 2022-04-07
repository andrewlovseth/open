<?php
    
    $search_term = get_search_query();
    $not_singular = $wp_query->found_posts > 1 ? 'results' : 'result'; 
    $results_count = $wp_query->found_posts;

?>

<section class="page-header grid">


    <div class="headline">
        <h1 class="page-title dark-blue">Search Results for "<?php echo $search_term; ?>"</h1>
        <span class="count"><?php echo $wp_query->found_posts . " $not_singular found"; ?></span>
    </div>    

</section>