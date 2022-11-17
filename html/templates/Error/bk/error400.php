<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */

use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
  $this->layout = 'dev_error';

  $this->assign('title', $message);
  $this->assign('templateName', 'error400.php');

  $this->start('file');

?>
  <?php if (!empty($error->queryString)) : ?>
    <p class="notice">
      <strong>SQL Query: </strong>
      <?= h($error->queryString) ?>
    </p>
  <?php endif; ?>
  <?php if (!empty($error->params)) : ?>
    <strong>SQL Query Params: </strong>
    <?php Debugger::dump($error->params) ?>
  <?php endif; ?>
  <?= $this->element('auto_table_warning') ?>
<?php
  $this->end();
endif;
?>


<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <?= $this->Html->meta('icon') ?>
  <?= $this->Html->css(['bootstrap.min', 'style', 'sunburst']) ?>
  <style>
    footer+a {
      display: none;
    }
  </style>
</head>

<body class="text-white position-relative" style="background-color: #7F6197;">
  <header id="header" class="position-fixed w-100 top-0 position-relative" style="z-index: 1000;">
    <div class="px-4 py-md-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-0 my-md-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <?= $this->Html->image('brand-icon.png', ['alt' => 'Brand logo', 'width' => '24px', 'height' => '24px']) ?>
            <?= $this->Html->image('brand-logo_white.png', ['alt' => 'Brand logo', 'width' => '130px', 'height' => '32px']) ?>
          </a>
          <!-- nav menu for display sm -->
          <button id="toggleNavBtn" type="button" class="bg-dark border-0 d-md-none justify-content-center" aria-label="toggle button" style="width: 48px; height: 48px;" aria-expanded="false" aria-controls="toggleNavMenu">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
          </button>

          <nav id="toggleNavMenu" class="nav col-12 col-lg-auto ms-auto text-small d-md-none position-absolute bg-dark top-100 end-0 w-100">
            <ul class="m-0 p-0 mx-auto text-center">
              <li class="mb-3">
                <a href="/blog" class="nav-link text-white">
                  Blog
                </a>
              </li>
              <li class="mb-3">
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
              <li class="mb-3">
                <form action="/blog" method="post" class="py-1 align-items-center">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1; margin-bottom: 2px;" xml:space="preserve">
                    <style type="text/css">
                      .st0 {
                        fill: #4B4B4B;
                      }
                    </style>
                    <g>
                      <path class="st0" d="M499.436,225.905L295.858,24.536c-16.623-16.438-43.428-16.305-59.866,0.328
                    c-16.438,16.613-16.294,43.418,0.329,59.856l130.356,128.958H42.329C18.956,213.679,0,232.624,0,255.997
                    c0,23.383,18.956,42.328,42.329,42.328h324.347L236.321,427.273c-16.623,16.438-16.767,43.254-0.329,59.867
                    c16.438,16.622,43.243,16.766,59.866,0.328l203.578-201.368c8.044-7.963,12.564-18.792,12.564-30.102
                    C512,244.685,507.479,233.866,499.436,225.905z" style="fill: rgb(153, 153, 153);"></path>
                    </g>
                  </svg>
                  <input type="text" placeholder="検索" class="header-search bg-dark text-white border-0 py-0" nama="search">
                  <button type="button" class="del-btn bg-dark" aria-label="button delete serch word for desktop">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 8px; height: 8px; opacity: 1;" xml:space="preserve">
                      <style type="text/css">
                        .st0 {
                          fill: #4B4B4B;
                        }
                      </style>
                      <g>
                        <polygon class="st0" points="511.998,70.682 441.315,0 256.002,185.313 70.685,0 0.002,70.692 185.316,256.006 0.002,441.318 
                        70.69,512 256.002,326.688 441.315,512 511.998,441.318 326.684,256.006 	" style="fill: rgb(153, 153, 153);"></polygon>
                      </g>
                    </svg>
                  </button>
                  <input id="csrf" type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
                </form>
              </li>

            </ul>
          </nav>
          <!-- nav bar for display md and up -->
          <nav class="nav col-12 col-lg-auto my-md-0 text-small d-none d-md-inline-block">
            <ul class="d-flex align-items-center justify-content-center m-0 ms-5 ps-5 p-0 ">
              <li>
                <a href="/blog" class="nav-link text-white">
                  Blog
                </a>
              </li>
              <li>
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
              <li class="ms-3">
                <form action="/blog" method="post" class="py-1 px-2 align-items-center">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1; margin-bottom: 2px;" xml:space="preserve">
                    <style type="text/css">
                      .st0 {
                        fill: #4B4B4B;
                      }
                    </style>
                    <g>
                      <path class="st0" d="M499.436,225.905L295.858,24.536c-16.623-16.438-43.428-16.305-59.866,0.328
                    c-16.438,16.613-16.294,43.418,0.329,59.856l130.356,128.958H42.329C18.956,213.679,0,232.624,0,255.997
                    c0,23.383,18.956,42.328,42.329,42.328h324.347L236.321,427.273c-16.623,16.438-16.767,43.254-0.329,59.867
                    c16.438,16.622,43.243,16.766,59.866,0.328l203.578-201.368c8.044-7.963,12.564-18.792,12.564-30.102
                    C512,244.685,507.479,233.866,499.436,225.905z" style="fill: rgb(153, 153, 153);"></path>
                    </g>
                  </svg>
                  <input type="text" placeholder="検索" class="header-search bg-dark text-white border-0 py-0 px-2" nama="search">
                  <button type="button" class="del-btn bg-dark" aria-label="button delete serch word for desktop">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 8px; height: 8px; opacity: 1;" xml:space="preserve">
                      <style type="text/css">
                        .st0 {
                          fill: #4B4B4B;
                        }
                      </style>
                      <g>
                        <polygon class="st0" points="511.998,70.682 441.315,0 256.002,185.313 70.685,0 0.002,70.692 185.316,256.006 0.002,441.318 
                        70.69,512 256.002,326.688 441.315,512 511.998,441.318 326.684,256.006 	" style="fill: rgb(153, 153, 153);"></polygon>
                      </g>
                    </svg>
                  </button>
                  <input id="csrf" type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
                </form>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
      <div class="container px-0 mx-auto text-center">
        <div class="row d-flex">
          <div class="col-lg-6 errorImageArea">
            <div class="errorImage mx-auto"></div>
            <h1 class="error-statusCode mt-5 mb-3 fw-bold">404 Not Found</h1>
            <p>お探しのページが見つかりません。</p>
          </div>
          <div class="col-lg-6 errorMesArea">
            <div class="inkArea mb-5">
              <ul class="text-center my-5">
                <li><a href="/blogs/java/"><span class="catTag me-3" style="background-color:#F89820;">java</span></a></li>
              </ul>
            </div>
          </div>
          <div class="btn-wrapper ls-1 pt-5">
              <a href="/blogs/" class="btn-long d-block position-relative border border-white text-white text-nowrap w-100 py-2 px-0 my-0 mx-auto">ブログ一覧を見る</a>
          </div>
        </div>
      </div>
  <?= $this->Html->script(['index']) ?>
  <?= $this->Html->script(['bootstrap.bundle.min']) ?>
</body>
<footer class="py-3 mt-4 bg-dark text-white position-fixed w-100" style="bottom: 0;">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/blog" class="nav-link px-2 text-muted">Blog</a></li>
      <li class="nav-item"><a href="<?= URL_GITHUB ?>" class="nav-link px-2 text-muted">GitHub</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link px-2 text-muted">Contact</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2022 devil code</p>
</footer>

</html>