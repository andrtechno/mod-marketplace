<?php

use panix\engine\widgets\Pjax;
use panix\engine\grid\GridView;

?>
<div class="container-fluid">
    <div class="row">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5>Новая почта</h5>
                    <span class="badge badge-success">sds</span>
                </div>
                <div class="card-body">
                    <img src="https://via.placeholder.com/500" class="img-fluid"/>
                    <p class="m-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>30$</h4>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="#" class="btn btn-success">Купить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

