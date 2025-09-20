<?php include_once( __DIR__ . '/include/modal/modal_registration.php' ); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
		  data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="/index.php">Главная</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
				</ul>
            </li>
          </ul-->
			
			<?php if (!$user->isLoggedin()) { ?>
             
			<form class="navbar-form navbar-right" method="POST" action="login.php">
				<div class="form-group">
				  <input type="text" name="email" placeholder="Введите email" class="form-control searchpolocka">
				</div>
				<div class="form-group">
				  <input type="password" name="password" placeholder="Введите пароль" class="form-control searchpolocka">
				</div>
				<button type="submit" class="btn btn-success">Войти</button>
			</form>
			
		    
			
			<ul class="nav navbar-nav">
           		<li><a href="#">О программе</a></li>
			</ul>
			
            <?php } else { ?>
                <ul class="nav navbar-nav">
                    <li><a href="#">О программе</a></li>
                    <li class="dropdown">
                    <?php $treeMenu->getMenuHtml(); ?>
                 </ul>
            <form class="navbar-form navbar-left" id="formsearch" method="POST" action="search.php">
                <div class="form-group">
                    <input type="text" name="searchText" placeholder="Поиск..." class="form-control searchpolocka">
                </div>
                    <button type="submit" class="btn btn-success">Найти</button>
                
            </form>
						
			
            
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?=$user->getName(); ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-profile">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?=$user->getName(); ?></strong></p>
                                        <p class="text-left small"><?=$user->getEmail(); ?></p>
                                        <!-- <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Мой профиль</a>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Выход</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
			<?php } ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
