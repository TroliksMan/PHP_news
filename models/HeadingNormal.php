<?php

class HeadingNormal
{
    public function Draw($className)
    {
        if (!isset($_SESSION))
            session_start();
        $html = '
                <header class="blog-header lh-1 py-3 bg-primary px-5 ">
                    <nav class="nav d-flex justify-content-between align-items-baseline">
                        <div class="d-flex fs-5 gap-4">
                            <a class="p-2 link-dark text-light no-underline home" href="index.php">Zprávy</a>
                            <a class="p-2 link-dark text-light no-underline categories" href="Categories.php">Kategorie</a>
                            <a class="p-2 link-dark text-light no-underline authors" href="Authors.php">Autoři</a>
                        </div>
                        ';
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'];
            $html .= '  <div class="d-flex align-items-baseline gap-2">
                            <p class="text-white fst-italic">' . $name . '</p>
                            <a class="fs-6 btn btn-sm btn-outline-dark text-light text-primary-bg" href="Admin/Articles.php">Administrace</a>
                            <a class="fs-6 btn btn-sm btn-outline-dark text-light text-primary-bg" href="Admin/Logout.php">Odhlásit</a>
                        </div>';
        } else {
            $html .= '<div>
                          <a class="fs-6 btn btn-sm btn-outline-dark text-light text-primary-bg" href="Admin/Login.php">Přihlášení</a>
                      </div>
                ';
        }
        $html .= '
                </nav>
            </header>';
        $html = str_replace($className, 'active', $html);
        echo $html;
    }
}

