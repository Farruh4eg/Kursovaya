-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 15 2023 г., 21:27
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `registration`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_release_year` int(4) DEFAULT NULL,
  `book_genres` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `book_downloads` int(11) DEFAULT 0,
  `book_cover` varchar(255) NOT NULL,
  `book_file` varchar(255) NOT NULL,
  `book_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_author`, `book_release_year`, `book_genres`, `book_description`, `book_downloads`, `book_cover`, `book_file`, `book_link`) VALUES
(1, 'Outsider', 'Steven King', 2018, 'ужасы, детектив, драма, horror, detective, drama', '\'The Outsider\' is about the story of the murder investigation of an 11-year-old boy, Frankie Peterson. After DNA and the questioning of witnesses, Terry Maitland, the little league\'s coach is arrested as the primary suspect for Frankie\'s murder.', 2, 'Outsider.jpg', '/kursach/book/bookFiles/Outsider.fb2', './book/1.php'),
(3, 'Harry Potter and The Deathly Hallows', 'J.K.Rowling', 2007, 'fantasy, adventures, фэнтэзи, приключения', 'Harry is waiting in Privet Drive. The Order of the Phoenix is coming to escort him safely away without Voldemort and his supporters knowing - if they can. But what will Harry do then? How can he fulfil the momentous and seemingly impossible task that Professor Dumbledore has left him?\r\n\r\nAs he travels Harry discovers that a battle is breaking out at Hogwarts. He has to do anything to stop it even if that involves killing himself. ', 5, 'HarryPotterAndTheDeathlyHallows.jfif', '/kursach/book/bookFiles/Harry_Potter_And_The_Deathly_Hallows.epub', './book/3.php'),
(4, 'Harry Potter and The Sorcerer\'s Stone', 'J.K.Rowling', 1997, 'fantasy, adventures, фэнтэзи, приключения', 'Say you’ve spent the first 10 years of your life sleeping under the stairs of a family who loathes you. Then, in an absurd, magical twist of fate you find yourself surrounded by wizards, a caged snowy owl, a phoenix-feather wand, and jellybeans that come in every flavor, including strawberry, curry, grass, and sardine. Not only that, but you discover that you are a wizard yourself! This is exactly what happens to young Harry Potter in J. K. Rowling’s enchanting, funny debut novel, Harry Potter and the Sorcerer’s Stone. In the nonmagic human world—the world of “Muggles”—Harry is a nobody, treated like dirt by the aunt and uncle who begrudgingly inherited him when his parents were killed by the evil Voldemort. But in the world of wizards, small, skinny Harry is famous as a survivor of the wizard who tried to kill him. He is left only with a lightning-bolt scar on his forehead, curiously refined sensibilities, and a host of mysterious powers to remind him that he’s quite, yes, altogether different from his aunt, uncle, and spoiled, piglike cousin Dudley. A mysterious letter, delivered by the friendly giant Hagrid, wrenches Harry from his dreary, Muggle-ridden existence: “We are pleased to inform you that you have been accepted at Hogwarts School of Witchcraft and Wizardry.” Of course, Uncle Vernon yells most unpleasantly, “I AM NOT PAYING FOR SOME CRACKPOT OLD FOOL TO TEACH HIM MAGIC TRICKS!” Soon enough, however, Harry finds himself at Hogwarts with his owl Hedwig… and that’s where the real adventure—humorous, haunting, and suspenseful—begins. Harry Potter and the Sorcerer’s Stone, first published in England as Harry Potter and the Philosopher’s Stone, continues to win major awards in England. So far it has won the National Book Award, the Smarties Prize, the Children’s Book Award, and is short-listed for the Carnegie Medal, the U. K. version of the Newbery Medal.', 0, 'Harry_Potter_And_The_Sorcerers_Stone.jpg', '/kursach/book/bookFiles/Harry_Potter_And_The_Sorcerers_Stone', './book/4.php'),
(5, 'Dune', 'Frank Herbert', 1965, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'In the far future, manipulation of the equations necessary for interstellar travel can only be accomplished through the aid of the narcotic “spice” or “melange,” which can only be found on one planet, Arrakis—also called Dune. The galaxy is divided into aristocratic houses under the leadership of the Padishah Emperor, Shaddam IV. Fearing the rise of House Atreides of the oceanic planet Caladan, Shaddam IV orders House Atreides to take over Arrakis and spice mining from their longtime enemies House Harkonnen but plans to help the Harkonnens destroy the Atreides after their arrival on Arrakis.', 1, 'Dune.jpg', '/kursach/book/bookFiles/Dune.fb2', './book/5.php'),
(6, 'Dune Messiah', 'Frank Herbert', 1969, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'Dune Messiah continues the story of Paul Atreides, better known--and feared--as the man christened Muad\'Dib. As Emperor of the Known Universe, he possesses more power than a single man was ever meant to wield. Worshipped as a religious icon by the fanatical Fremens, Paul faces the enmity of the political houses he displaced when he assumed the throne--and a conspiracy conducted within his own sphere of influence.  And even as House Atreides begins to crumble around him from the machinations of his enemies, the true threat to Paul comes to his lover, Chani, and the unborn heir to his family\'s dynasty...', 1, 'DuneMessiah.jpg', '/kursach/book/bookFiles/Dune_Messiah.epub', './book/6.php'),
(7, 'Children of Dune', 'Frank Herbert', 1976, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'The novel takes place nine years after the events portrayed in Dune Messiah. Set within an Arrakis dealing with the loss of Muad\'Dib and a changing green environment, Children of Dune follows the twins Ghanima Atreides and Leto Atreides II and their rise to power. It also follows the conflict between the Lady Jessica and Alia Atreides, who is now possessed by the memory-consciousness of the long dead Baron Vladimir Harkonnen. ', 1, 'ChildrenOfDune.jpg', '/kursach/book/bookFiles/Children_of_Dune.epub', './book/7.php'),
(8, 'God Emperor of Dune', 'Frank Herbert', 1981, 'легкая эротика, fantasy, adventures, novel, фэнтэзи, приключения, роман', 'Millennia have passed on Arrakis, and the once-desert planet is green with life. Leto Atreides, the son of the world\'s savior, the Emperor Paul Muad\'Dib, is still alive but far from human. To preserve humanity\'s future, he sacrificed his own by merging with a sandworm, granting him near immortality as God Emperor of Dune for the past thirty-five hundred years.  Leto\'s rule is not a benevolent one. His transformation has made not only his appearance but his morality inhuman. A rebellion, led by Siona, a member of the Atreides family, has risen to oppose the despot\'s rule. But Siona is unaware that Leto\'s vision of a Golden Path for humanity requires her to fulfill a destiny she never wanted--or could possibly conceive....', 0, 'GodEmperorOfDune.jpg', '/kursach/book/bookFiles/God_Emperor_of_Dune.epub', './book/8.php'),
(9, 'Heretics of Dune', 'Frank Herbert', 1984, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', '1,500 years have passed since Leto II\'s reign ended; humanity is set firmly on the Golden Path. By crushing the aspirations of humans for 3,500 years, Leto caused The Scattering, an explosion of humanity into the unknown universe upon his death.  Now, some of those who went out into the universe are coming back into the realms of the Old Imperium, bent on conquest. Only the Bene Gesserit perceive the Golden Path, and are faced with a choice: keep to their traditional role of hidden manipulators, quietly easing tensions and guiding human progress while struggling for their own survival; or embrace the Golden Path and push humanity onward into a new future where humans are free from the threat of extinction. ', 1, 'HereticsOfDune.jpg', '/kursach/book/bookFiles/Heretics_of_Dune.epub', './book/9.php'),
(10, 'Harry Potter and the Chamber of Secrets', 'J.K.Rowling', 1998, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'Ever since Harry Potter had come home for the summer, the Dursleys had been so mean and hideous that all Harry wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he’s packing his bags, Harry receives a warning from a strange impish creature who says that if Harry returns to Hogwarts, disaster will strike.  And strike it does. For in Harry’s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor and a spirit who haunts the girls’ bathroom. But then the real trouble begins – someone is turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects… Harry Potter himself!', 0, 'HarryPotterAndTheChamberOfSecrets.jpg', '/kursach/book/bookFiles/Harry_Potter_And_the_Chamber_of_Secrets.pdf', './book/10.php'),
(11, 'Harry Potter and the Prisoner of Azkaban', 'J.K.Rowling', 1999, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'Harry Potter, along with his best friends, Ron and Hermione, is about to start his third year at Hogwarts School of Witchcraft and Wizardry. Harry can\'t wait to get back to school after the summer holidays. (Who wouldn\'t if they lived with the horrible Dursleys?) But when Harry gets to Hogwarts, the atmosphere is tense. There\'s an escaped mass murderer on the loose, and the sinister prison guards of Azkaban have been called in to guard the school...', 1, 'HarryPotterAndThePrisonerOfAzkaban.jpg', '/kursach/book/bookFiles/Harry_Potter_And_the_Prisoner_of_Azkaban.pdf', './book/11.php'),
(12, 'Harry Potter and the Goblet of Fire', 'J.K.Rowling', 2000, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'It is the summer holidays and soon Harry Potter will be starting his fourth year at Hogwarts School of Witchcraft and Wizardry. Harry is counting the days: there are new spells to be learnt, more Quidditch to be played, and Hogwarts castle to continue exploring. But Harry needs to be careful - there are unexpected dangers lurking...', 0, 'HarryPotterAndTheGobletOfFire.jpg', '/kursach/book/bookFiles/Harry_Potter_And_the_Goblet_of_Fire.pdf', './book/12.php'),
(13, 'Harry Potter and the Order of Phoenix', 'J.K.Rowling', 2003, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'Harry Potter is about to start his fifth year at Hogwarts School of Witchcraft and Wizardry. Unlike most schoolboys, Harry never enjoys his summer holidays, but this summer is even worse than usual. The Dursleys, of course, are making his life a misery, but even his best friends, Ron and Hermione, seem to be neglecting him.  Harry has had enough. He is beginning to think he must do something, anything, to change his situation, when the summer holidays come to an end in a very dramatic fashion. What Harry is about to discover in his new year at Hogwarts will turn his world upside down...', 0, 'HarryPotterAndTheOrderOfPhoenix.jpg', '/kursach/book/bookFiles/Harry_Potter_And_the_Order_of_Phoenix.pdf', './book/13.php'),
(14, 'Harry Potter and the Half-Blood Prince', 'J.K.Rowling', 2005, 'fantasy, adventures, novel, фэнтэзи, приключения, роман', 'It is the middle of the summer, but there is an unseasonal mist pressing against the windowpanes. Harry Potter is waiting nervously in his bedroom at the Dursleys\' house in Privet Drive for a visit from Professor Dumbledore himself. One of the last times he saw the Headmaster was in a fierce one-to-one duel with Lord Voldemort, and Harry can\'t quite believe that Professor Dumbledore will actually appear at the Dursleys\' of all places. Why is the Professor coming to visit him now? What is it that cannot wait until Harry returns to Hogwarts in a few weeks\' time? Harry\'s sixth year at Hogwarts has already got off to an unusual start, as the worlds of Muggle and magic start to intertwine...', 0, 'HarryPotterAndTheHalfBloodPrince_.jpg', '/kursach/book/bookFiles/Harry_Potter_And_the_Half_Blood_Prince.epub', './book/14.php'),
(15, '1984', 'George Orwell', 1949, 'fiction, novel, фантастика, роман', 'The thing that he was about to do was to open a diary. This was not illegal (nothing was illegal, since there were no longer any laws), but if detected it was reasonably certain that it would be punished by death, or at least by twenty-five years in a forced-labour camp. Winston fitted a nib into the penholder and sucked it to get the grease off. The pen was an archaic instrument, seldom used even for signatures, and he had procured one, furtively and with some difficulty, simply because of a feeling that the beautiful creamy paper deserved to be written on with a real nib instead of being scratched with an ink-pencil. Actually he was not used to writing by hand. Apart from very short notes, it was usual to dictate everything into the speak-write which was of course impossible for his present purpose. He dipped the pen into the ink and then faltered for just a second. A tremor had gone through his bowels. To mark the paper was the decisive act. In small clumsy letters he wrote: April 4th, 1984.', 0, '1984.jpg', '/kursach/book/bookFiles/1984.epub', './book/15.php'),
(16, '1984', 'Джордж Оруэлл', 1949, 'фантастика, роман', '\'1984\' - книга Джорджа Оруэлла, написанная в 1949 году. Она описывает тоталитарный режим будущего, где правительство контролирует каждого гражданина и наблюдает за ним через телевизионные экраны. Главный герой Винстон Смит борется с системой, которая жадно собирает информацию и подавляет свободу слова и мысли в каждом уголке общества.', 0, '1984rus.jpg', '/kursach/book/bookFiles/1984rus.epub', './book/16.php'),
(17, 'Jaws', 'Peter Benchley', 1974, 'horror, novel, fiction, ужасы, роман, фантастика', 'The guy is looking at the dark water with horror. The shark is somewhere there. It is swimming out of sight, planning to attack. It is invisible and this scares even more. But the story began even earlier. Amity is a small and very quiet town in the vicinity of New York. Nothing ever happens here. One warm night, a young woman decides to swim in the sea. She does not return home. Soon, the police finds her dead. One of the local police officers decides that a shark appeared near the city. This is a great white shark, which is called the man-eater. Unfortunately, closing the beaches does not work. Local people start rebelling, because the danger always seems distant. And swimming in the sea is too pleasant on a hot day. No one wants to think about any sharks.', 0, 'Jaws.jpg', '/kursach/book/bookFiles/Jaws.epub', './book/17.php'),
(18, 'C++ Primer Plus (sixth edition)', 'Stephen Prata', 2011, 'textbook, учебники', 'C++ Primer Plus is a carefully crafted, complete tutorial on one of the most significant and widely used programming languages today. An accessible and easy-to-use self-study guide, this book is appropriate for both serious students of programming as well as developers already proficient in other languages. The sixth edition of C++ Primer Plus has been updated and expanded to cover the latest developments in C++, including a detailed look at the new C++11 standard.', 1, 'CPPPrimerPlus.jpg', '/kursach/book/bookFiles/CPP_Primer_Plus.pdf', './book/18.php'),
(19, 'Собачье Сердце', 'Михаил Булгаков', 1925, 'фантастика, роман', ' \'Собачье сердце\' Михаила Булгакова - это ироническая сатира на людей, стремящихся изменить свою природу. Главный герой - профессор Филипп Филиппович Премудрый - превращает бездомную собаку Шарика в человека, в результате чего Шарик получает ум и голос, но остается с внешностью собаки. Шарик-человек становится протеже Преображенского института, который проводит над ним эксперименты. ', 1, 'Собачье_Сердце.jpg', '/kursach/book/bookFiles/Собачье_Сердце.epub', './book/19.php');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_title` (`book_title`),
  ADD KEY `book_author` (`book_author`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
