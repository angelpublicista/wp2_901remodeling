<?php

?>

<div class="col-12 col-md-6 mb-2">
    <a href="<?php the_permalink(); ?>" class="card shadow p-4 d-block rounded">
        <div class="card-body ">
            <span class="card-date">Posted on <?php the_date(); ?></span>
            <h4 class="card-title mt-2"><?php the_title(); ?></h4>
        </div>
    </a>
</div>