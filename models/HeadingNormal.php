<?php
class HeadingNormal
{
    public function Draw($className)
    {
        $html = '
                <header class="blog-header lh-1 py-3 bg-primary px-5 ">
                    <nav class="nav d-flex justify-content-between align-items-baseline">
                        <div class="d-flex fs-5 gap-4">
                            <a class="p-2 link-dark text-light no-underline home" href="index.php">Zprávy</a>
                            <a class="p-2 link-dark text-light no-underline categories" href="Categories.php">Kategorie</a>
                            <a class="p-2 link-dark text-light no-underline authors" href="Authors.php">Autoři</a>
                            <a class="p-2 link-dark text-light no-underline articleAdd" href="Admin/Articles/Add.php">Přidat článek</a>
                        </div>
                        <div>
                            <a class="fs-6 btn btn-sm btn-outline-dark text-light text-primary-bg" href="Admin/AdminPage.php">Administrace článků</a>
                        </div>
                    </nav>
                </header>
                ';
        $html = str_replace($className, 'active', $html);
        echo $html;
    }
}

