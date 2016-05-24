<?php

function render_extracted_code($title, $data){
  ?>
  <div class="list-wrapper">
    <h1 class="list-title">
      <span><? echo $title; ?></span>
    </h1>
    <ul class="uk-list product-list">
      <?php for($i=0; $i<count($data);$i++){ ?>
        <li class="uk-grid uk-grid-match">
          <div class="uk-width-medium-1-5 uk-row-first">
            <div class="list-image">
              <span class="uk-thumbnail uk-border-circle">
                <img width="149" height="150" src="http://demo.themefuse.com/theflavour/wp-content/uploads/2014/05/10.jpg" class="uk-border-circle" alt="10">
              </span>
            </div>
          </div>
          <div class="uk-width-medium-4-5">
            <div class="list-content">
              <h2 class="list-content-title">
                <span><? echo $data[$i]->title; ?></span>
                <span class="list-value"><? echo $data[$i]->value; ?></span>
              </h2>
              <p><? echo $data[$i]->description; ?></p>
            </div>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
<?php }
