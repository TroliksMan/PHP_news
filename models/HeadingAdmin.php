<?php

class HeadingAdmin
{
    public function Draw($className)
    {
        $html = '
                <header class="blog-header lh-1 py-3 bg-info px-5 ">
                    <nav class="nav d-flex justify-content-between align-items-baseline">
                        <div class="d-flex fs-5 gap-4">
                            <a class="p-2 text-light no-underline"> ADMIN</a>
                        <a class="p-2 link-dark text-light no-underline articles" href="Articles.php">Články</a>
                            <a class="p-2 link-dark text-light no-underline categories" href="Categories.php">Kategorie</a>
                            <a class="p-2 link-dark text-light no-underline authors" href="Authors.php">Autoři</a>
                        </div>
                        <div>
                            <a class="fs-6 btn btn-sm btn-outline-dark text-light text-primary-bg" href="../index.php">Odhlásit</a>
                        </div>
                    </nav>
                </header>
                ';
        $html = str_replace($className, 'active', $html);
        echo $html;
    }
}

