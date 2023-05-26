SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `php_news`
--
CREATE DATABASE IF NOT EXISTS `php_news` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci;
USE `php_news`;

-- --------------------------------------------------------

--
-- Struktura tabulky `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `admins`
--

INSERT INTO `admins` (`id`, `isAdmin`, `name`, `surname`, `username`, `password`) VALUES
(1, 1, 'Admin', 'Admin', 'admin', '$2a$12$eDttACNlkUrtJQdHkv0Y4OEGxF1815ldtKhrVb4D2EDIFAtJ0Ih8S'),
(2, 0, 'Editor', 'Editor', 'editor', '$2y$10$jHl8TQ.Fqh6pNwfgLlmZ2.kkZPOKFaXThENNaC5r/9vEjzys00K72');

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `intro` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `cat_id`, `author_id`, `heading`, `create_date`, `intro`, `content`, `published`) VALUES
(1, 1, 1, 'Microsoft nabídl EK ústupky, aby prošel největší obchod v herní historii', '2023-01-01 12:00:00', 'Microsoft nabídl ústupky, aby získal souhlas s převzetím společnosti Acitivison Blizzard, výrobce her Call of Duty, World of Warcraft či Candy Crush. Ukazuje to aktualizovaná dokumentace Evropské komise.', '<div class=\"bbtext\">\r\n<p>Evropská komise neposkytla k případu žádné další podrobnosti. Nyní si vyžádá zpětnou vazbu od konkurentů a od zákazníků, pak přijme konečné rozhodnutí. To by mělo padnout do 22. května.</p><p data-debug-redistribute=\"001. / 102px / 414\">Prezident Microsoftu Brad Smith uvedl, že firma je připravena nabídnout konkurentům licenční smlouvy, aby zmírnila obavy z narušení konkurence na trhu. Nechce však prodat lukrativní Call of Duty. V posledních týdnech společnost podepsala smlouvy se třemi společnostmi, které chtějí tuto hru uvést na své platformy.</p><p data-debug-redistribute=\"004. / 390px / 137\">„Stojíme si za naším slibem přinést Call of Duty více hráčům na více přístrojích. Uzavřeli jsem smlouvy o uvedení hry na konzoli Nintendo a s cloudovými službami pro streamování her firem Nvidia, Boosteroid a Ubitus,“ řekl mluvčí Microsoftu. </p><div class=\"imagelist imagelist-w230 imagelist-fr\" data-debug-redistribute=\"007. / 518px / -126\"><div class=\"cell cell-first\"><a href=\"https://www.idnes.cz/hry/novinky/activision-blizzard-evropska-komise-microsoft-ustupky.A230317_160705_bw-novinky_oma/foto/OZ4c905c_notchthumb_419688.jpg\"><samp class=\"imagespace\"><img alt=\"\" src=\"//1gr.cz/fotky/idnes/13/072/w230/OZ4c905c_notchthumb_419688.jpg\"></samp></a><p>Minecraft lze dnes hrát prakticky na čemkoliv. </p></div><div class=\"fc0\"></div></div><p>Smlouva je uzavřená na dobu deseti let a stejnou nabídku obdrželo i konkurenční Sony, které se proti akvizici vymezuje nejostřeji. Microsoft naopak argumentuje, že pokud akvizice projde, Call of Duty se dostane k více hráčům než nyní. Ostatně nakládá tak i s Minecraftem, který si v roce 2014 <a class=\"text-link\" href=\"https://www.idnes.cz/hry/novinky/microsoft-minecraft-mojang.A140915_154353_bw-novinky_oz\">pořídil za zhruba 53 miliard korun</a>. </p><p data-debug-redistribute=\"003. / 750px / 180\">Podle zdrojů agentury Reuters je pravděpodobné, že Microsoft díky těmto licenčním smlouvám a dalším opatřením získá od EU s akvizicí souhlas. V Evropě zkoumá spojení také britský antimonopolní úřad, ale tam zatím není jisté, zda ho povolí.</p><div data-redistribute=\"ad\"><div id=\"r-clanekws\" class=\"r-main m76 s_widesquare_clankovy\"><div class=\"r-head\"><span></span></div><div class=\"r-body\"><div id=\"widesquare_clankovy\"></div><div class=\"fc0\"></div></div></div></div><p data-debug-redistribute=\"002. / 878px / 361\">Microsoft oznámil záměr koupit vydavatelství Activision Blizzard za téměř 70 miliard dolarů (zhruba 1,5 bilionu korun) loni v lednu. Ačkoliv u akcionářů prošlo vše hladce, největšímu obchodu v herní historii prozatím brání regulační orgány. </p><div class=\"imagelist imagelist-w230 imagelist-fl\" data-debug-redistribute=\"006. / 1006px / -103\"><div class=\"cell cell-first\"><a href=\"https://www.idnes.cz/hry/novinky/activision-blizzard-evropska-komise-microsoft-ustupky.A230317_160705_bw-novinky_oma/foto/OZ90dbd2_x11.jpg\"><samp class=\"imagespace\"><img alt=\"\" src=\"//1gr.cz/fotky/idnes/22/012/w230/OZ90dbd2_x11.jpg\"></samp></a><p>Značky, které Microsoft získal.</p></div><div class=\"fc0\"></div></div><p>Co se konzolí týče, Microsoft s Xboxem za svými konkurenty zaostává. Sony s PlayStationem 5 i Nintendo se Switchem slaví u hráčů větší úspěchy. To by však mohla akvizice změnit. </p><p>Microsoft by totiž kromě Call of Duty získal i cenné značky World of Warcraft, Diablo, Hearthstone či mobilní továrnu na peníze Candy Crush. Rázem by se zvětšila také atraktivita předplatného Xbox Game Pass, do nějž Microsoft hned v den vydání umísťuje všechny své hry. Jenže zatímco Nintendo si jede svoji vlastní ligu, Sony by mohla vyrůst výrazně silnější konkurence. </p><div class=\"fc0\"></div>\r\n<!--<separatorArt>--></div>', 0),
(2, 2, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean vel massa quis mauris vehicula laci', '2023-05-26 23:58:51', 'Aliquam erat volutpat. Fusce consectetuer risus a nunc. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Aliquam erat volutpat. Duis viverra diam non justo. Aliquam id dolor. Nam quis nulla. Maecenas lorem. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Lorem ipsum dolor sit amet, consectetuer adipiscing ', '<p> \r\n<em>Nulla non lectus</em> sed nisl molestie malesuada. Fusce consectetuer risus a nunc. Aliquam erat volutpat. \r\nAliquam erat volutpat. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Etiam egestas wisi a erat. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Etiam neque. \r\nFusce wisi. Etiam commodo dui eget wisi. Nunc auctor. <strong>Nullam feugiat</strong>, turpis at pulvinar vulputate, erat \r\nlibero tristique tellus, nec bibendum odio risus sit amet ante. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. In rutrum.\r\n</p>\r\n<p> \r\nSed convallis magna eu sem. Etiam neque. Fusce nibh. Maecenas libero. Class aptent taciti sociosqu ad litora torquent per \r\nconubia nostra, per inceptos hymenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis \r\negestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Praesent id justo in neque\r\n elementum ultrices. Quisque porta. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Itaque earum \r\n rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus \r\n asperiores repellat. Aliquam erat volutpat. Donec quis nibh at felis congue commodo. Praesent dapibus. Aliquam erat volutpat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\nNulla quis diam. Fusce nibh. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. \r\n</p>\r\nVivamus ac leo pretium faucibus. Etiam commodo dui eget wisi. Duis sapien nunc, commodo et, interdum suscipit, \r\nsollicitudin et, dolor. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Aliquam erat volutpat.\r\n Etiam bibendum elit eget erat. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus \r\n maiores alias consequatur aut perferendis doloribus asperiores repellat.\r\nItaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut \r\nperferendis doloribus asperiores repellat. Quisque porta. Vivamus luctus egestas leo. Sed elit dui, pellentesque a,\r\n faucibus vel, interdum nec, diam. Nam quis nulla. Fusce nibh. Nunc dapibus tortor vel mi dapibus sollicitudin. Mauris \r\n metus. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat \r\n facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. In laoreet, magna id viverra tincidunt, sem odio \r\n bibendum justo, vel imperdiet sapien wisi sed libero. In rutrum. Integer lacinia. Nunc auctor. Sed ac dolor sit amet purus \r\n malesuada congue. Phasellus faucibus molestie nisl. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel \r\n imperdiet sapien wisi sed libero. Fusce nibh. Mauris dictum facilisis augue. Aliquam erat volutpat. Aenean fermentum risus id tortor. ', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Games'),
(2, 'Random category');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexy pro tabulku `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
