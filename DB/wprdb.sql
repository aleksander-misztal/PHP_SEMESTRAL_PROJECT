-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2021, 17:44
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wprdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nick` varchar(20) NOT NULL,
  `name_author` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname_author` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content` varchar(10000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `displays_num` int(11) NOT NULL,
  `photo_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`id_article`, `category`, `nick`, `name_author`, `surname_author`, `title`, `content`, `date`, `displays_num`, `photo_name`) VALUES
(1, 'Formula1', 'masterofdisaster', 'Aleksander', 'Misztal', 'F1 2020 – poradnik dla początkujących', 'Po włączeniu nowego poziomu trudności, to asysta sterowania zostanie przełączona na wysoką, wyjechanie poza tor poskutkuje automatycznym powrotem pomiędzy białe linie, a DRS, ERS i rodzaj paliwa będą optymalnie przestawiały się bez waszego udziału. Tryb casual pozwoli Wam skupić się przede wszystkim na prowadzeniu bolidu.\r\nNie wystarczy on oczywiście do rywalizacji na wyższych poziomach trudności. Mnogość asyst mocno spowalnia bardziej doświadczonych graczy, a weterani ostatecznie decydują się wyłączyć wszelkie ułatwienia. Chociaż poprzeczka szybuje wtedy wysoko do góry i pokonywanie nawet pozornie najprostszych zakrętów wymaga mnóstwo skupienia, to zyskujecie pełną kontrolę nad bolidem.\r\nZanim jednak zaczniecie zastanawiać się nad wyłączaniem asyst i podnoszeniem poziomu trudności, tryb casual pozwoli Wam zapoznać się z podstawami F1 bez potrzeby martwienia się o drobne szczegóły.', '2021-04-12', 0, 'article1img'),
(2, 'Formula1', 'masterofdisaster', 'Aleksander', 'Misztal', 'Max Verstappen najszybszy na obu trening', 'Formuła 1: Max Verstappen najszybszy na obu treningach\r\n26 marca 2021, 18:39\r\nTen tekst przeczytasz w mniej niż minutę\r\n Udostępnij na Facebooku\r\n Udostępnij na Twitterze\r\nMax Verstappen PAP/EPA.\r\nMax Verstappen PAP/EPA. / PAP/EPA / VALDRIN XHEMAJ\r\nHolender Max Verstappen z ekipy Red Bull był najszybszy na obu treningach przed niedzielnym wyścigiem Formuły 1 o Grand Prix Bahrajnu. Broniący tytułu Brytyjczyk Lewis Hamilton (Mercedes) był czwarty i trzeci.\r\nPodczas pierwszej sesji Verstappen wyprzedził Fina Valtteri Bottasa (Mercedes) oraz Brytyjczyków Lando Norrisa (McLaren) i Hamiltona, a podczas drugiej - Norrisa oraz Hamiltona.\r\n\r\nNiemiec Mick Schumacher, syn siedmiokrotnego mistrza świata Michaela, uzyskał w bolidzie Haasa 19. i 18. wynik w swoich pierwszych oficjalnych startach jako kierowca Formuły 1.\r\n\r\nW tym sezonie sesje treningowe zostały skrócone z 90 minut do godziny. Trzeci trening odbędzie się w sobotę tuż przed kwalifikacjami.\r\n\r\nZawody w Bahrajnie zainaugurują sezon Formuły 1. O rekordowy ósmy tytuł mistrza świata będzie walczyć Hamilton, a Robert Kubica ponownie będzie kierowcą testowym Alfa Romeo Racing Orlen.\r\n\r\nJeśli pandemia COVID-19 nie pokrzyżuje organizatorom planów, będzie to najdłuższy sezon w historii, złożony z 23 wyścigów. Miał się rozpocząć już wcześniej w Australii, ale znów dał o sobie znać koronawirus i rywalizację w Melbourne przeniesiono na listopad.', '2021-04-13', 0, 'article2img'),
(3, 'Formula1', 'matiszym', 'Mateusz', 'Szymkiewicz', 'Wolff: Nie wierzę, że Bottas rozważał od', 'Toto Wolff nie jest przekonany, czy Valtteri Bottas naprawdę rozważał odejście z Formuły 1 po Grand Prix Rosji 2018.\r\nFin podczas wyścigu na torze w Soczi ruszał z pole position i przez większość dystansu dzierżył pozycję lidera. Mimo to w końcówce Mercedes zdecydował się zastosować polecenia zespołowe, przekazując prowadzenie Hamiltonowi, który musiał zbudować przewagę w mistrzostwach nad Sebastianem Vettelem.\r\nW najnowszym sezonie serialu „Jazda o życie” Bottas odniósł się do wydarzeń w Soczi, twierdząc, że na gorąco rozważał przerwanie startów w Formule 1. To była bardzo trudna sytuacja, ciężka do zaakceptowania. Byłem zły. Naprawdę zastanawiałem się dlaczego to robię. Chodziło mi nawet po głowie, by poddać się i odejść. Bezpośrednio po wyścigu powiedziałem, że nie zrobię już tego więcej - stwierdził Fin.\r\nZupełnie inną optykę na wydarzenia z Grand Prix Rosji 2018 ma szef Mercedesa, który nie wierzy, by Bottas był bliski decyzji o odejściu z F1. Był bardzo przybity i rozumiem to, ale nie wydaje mi się, by po tym incydencie był blisko wycofania się z Formuły 1. Jest zbyt mocnym zawodnikiem. Potrafię sobie jednak wyobrazić, że na gorąco, tuż po wyścigu, mógł nie rozumieć świata.\r\nTo była dla nas katastrofalna sytuacja. Była jednak konieczna, ponieważ byliśmy bardzo blisko Sebastiana. Valtteri był na czele stawki, a za nim jechał Lewis. Nienawidzę sposobu w jaki zostało to rozstrzygnięte, ale potrafię sobie wyobrazić, że z jego perspektywy było to jeszcze gorsze. Valtteri jest całkowicie inny od Nico [Rosberga], pracuje również inaczej. Ma wielką wolę by zbliżyć się do Lewisa i pokonać go. Chce to jednak zrobić po swojemu. Wszystko zależy od własnych osiągów oraz oczekiwań, które można oprzeć na działaniach politycznych. Muszę przyznać, że to była mocna strona Nico - powiedział Toto Wolff.', '2021-04-12', 0, 'article3img'),
(4, 'Formula1', 'matiszym', 'Mateusz', 'Szymkiewicz', 'Domenicali: Formuła 1 znalazła się w jes', 'Stefano Domenicali uważa, że Formuła 1 znalazła się w tym roku w jeszcze większym kryzysie spowodowanym pandemią koronawirusa.\r\nTegoroczny sezon wystartował bez obecności kibiców na trybunach i jak ujawnił nowy dyrektor generalny serii, dynamiczny rozwój sytuacji związanej z COVID-19 wymaga od niego codziennego kontaktu z promotorami wyścigów. Według Włocha, część Grand Prix nie będzie mogła pozwolić sobie na kolejne zamknięcie trybun, mierząc się z problemami finansowymi.\r\nObecna sytuacja jest dużo bardziej skomplikowana niż w 2020 roku - powiedział Stefano Domenicali. W zeszłym roku wszyscy musieli znaleźć swoją drogę oraz nauczyć się zwalczać pandemię. Każde państwo ma swoje zasady oraz warunki. To dlatego wiele decyzji jest podejmowanych z dnia na dzień. Musimy utrzymywać elastyczność, by dokonywać nagłe zmiany.\r\nNie zdajecie sobie sprawy jak wielkie zainteresowanie budzą wyścigi i jak wiele biletów mogliby sprzedać promotorzy, gdyby tylko było to możliwe. Wszystko zależy od konkretnych regulacji ustanowionych przez rządy państw. Pierwsze wyścigi sezonu są w stu procentach potwierdzone. Jedyne pytanie brzmi jak wiele kibiców będzie mogło się pojawić. Na chwilę obecną czekają nas tylko dwie eliminacje za zamkniętymi drzwiami: Imola oraz Baku. Reszta ma niejasny status. W indywidualnych przypadkach część organizatorów może poprosić nas o pomoc. Musimy znaleźć rozwiązanie dla takich sytuacji.\r\nDyrektor komercyjny Grand Prix Belgii - Stijn de Boever, nie wyklucza, że bez zgody rządu na obecność kibiców na trybunach, tor Spa-Francorchamps zrezygnuje z miejsca w tegorocznym kalendarzu. Mamy nadzieję na korzystną decyzję, ale w tej chwili po raz trzeci mamy ogłoszony lockdown. Do połowy maja rząd musi nam udzielić ostatecznych odpowiedzi na temat tego co będzie dozwolone, jakie jest ich zdanie oraz jakie są możliwości.\r\nFormuła 1 także musi przetrwać, prawda? Rok temu to my udzieliliśmy im pomocy. Jesteśmy częścią historii tego sportu, jednym z najstarszych wyścigów. Nie czuję żadnej presji. Mimo to organizowanie Grand Prix tylko po to, by zobaczyć samochody nie jest zbyt interesujące.', '2021-04-01', 0, 'article4img'),
(5, 'Formula2', 'Wiewiór', 'Daniel', 'Wawiórka', 'Zhou wygrywa w wyścigu głównym Formuły 2', 'Guanyu Zhou zamienił pole position na zwycięstwo w niedzielnym wyścigu głównym Formuły 2 w Bahrajnie, choć do tego potrzebna była odpowiednia strategia. Drugie miejsce zajął Dan Ticktum, a na najniższym stopniu podium stanął Liam Lawson.\r\nDobrą reakcją na światłach popisał się ruszający z drugiego pola Christian Lundgaard, który wyprzedził zdobywcę pole position Guanyu Zhou na dojeździe do pierwszego zakrętu i objął prowadzenie. Z Chińczykiem uporał się również Felipe Drugovich, pokonując rywala na wyjeździe z czwartego zakrętu.\r\nWyścig został jednak szybko zneutralizowany poprzez wyjazd samochodu bezpieczeństwa spowodowany tym, że Robert Szwarcman również w czwartym zakręcie uderzył na hamowaniu w tył samochodu Roya Nissaniego, powodując odpadnięcie Izraelczyka. Za to Szwarcman otrzymał karę przejazdu przez aleję serwisową. Na incydencie ucierpiał Lirim Zendeli, którym został uderzony przez bezwładny samochód Nissaniego i musiał zjechać do boksów po nowe przednie skrzydło. Z rywalizacji odpadł również Alessio Deledda, najprawdopodobniej z powodu usterki technicznej.\r\nWyścig wznowiono na początku czwartego okrążenia. Bardzo dobry restart zaliczył Drugovich, który pokonał Lundgaarda na hamowaniu do pierwszego zakrętu, lecz Duńczyk wyprowadził skuteczny kontratak na wyjeździe z czwartego zakrętu i utrzymał prowadzenie. Świetnie pojechał również zwycięzca drugiego sobotniego sprintu Oscar Piastri, który najpierw w pierwszym zakręcie wyprzedził Richarda Verschoora, a następnie Zhou w zakręcie 10 i awansował na trzecie miejsce.\r\nPiastri prezentował bardzo dobre tempo na kolejnych okrążeniach, dzięki czemu już na siódmym kółku wyprzedził Drugovicha na hamowaniu do pierwszego zakrętu, mimo że zarówno on, jak i Brazylijczyk mieli aktywowany system DRS. Wciąż prowadzący Lundgaard co prawda był najszybszym kierowcą na torze, jednak jego przewaga nad resztą stawki urosła tylko do 1,2 sekundy. Na kolejnym kółku Marcus Armstrong uporał się ze Zhou również w pierwszym zakręcie i przesunął się na czwarte miejsce. Nowozelandczyk zaliczał świetną pierwszą część wyścigu po starcie z 13. pola.\r\nLundgaard stopniowo tracił swoją przewagę i już na 13. okrążeniu stracił prowadzenie na rzecz Piastriego. W batalię o pierwsze miejsce zaangażowany był również Drugovich, który podążał niczym cień za tą dwójką, lecz nie wykorzystał okazji do wyprzedzenia Lundgaarda i pozostał na trzeciej lokacie. Po tym manewrze wyprzedzania Lundgaard zjechał jako pierwszy z czołówki na obowiązkową zmianę opon z miękkich na twarde. Dość pechowo Duńczyk powrócił na tor w środek walki Szwarcman-Gianluca Petecof i stracił z tego powodu nieco czasu.', '2021-04-14', 0, 'article5img'),
(6, 'Formula1', 'masterofdisaster', 'Aleksander', 'Misztal', 'Binotto: Chcemy, aby nasz silnik był pun', 'Mattia Binotto przyznał, że jego zespół bardzo mocno pracuje nad nowym silnikiem, który zadebiutuje w przyszłym roku.\r\nW przeciągu ostatnich dwóch lat wiele mówiło się o silniku Ferrari. Począwszy od zachwytu w sezonie 2019, gdzie dysponowali wręcz niespotykaną mocą, po rozczarowanie w sezonie 2020 i najgorszą jednostkę napędową w stawce.  \r\nMiniona kampania, która okazała się najgorsza dla zespołu z Maranello od 40. lat, była pokłosiem umowy między FIA, a Ferrari, która nie została oficjalnie zaprezentowana opinii publicznej, ale panuje powszechne przekonanie, że dotyczyła regulacji właśnie w obszarze silnika.\r\nW obecnym sezonie Ferrari zaprojektowało wyraźnie lepszy silnik, co widać także po zespołach Alfa Romeo i Haas, które korzystają z napędów Ferrari: „Zdecydowanie jednostka napędowa uległa poprawie i cieszę się, że Alfa Romeo i Haas zanotowały progres” - powiedział Binotto. „Myślę, że z naszej strony zrobiliśmy postępy we wszystkich możliwych obszarach. Aerodynamika jest z pewnością lepsza pod względem zachowania i korelacji, ale jednostka napędowa, samochód, ogólnie rzecz biorąc, wszędzie tam, gdzie można było wprowadzić ulepszenia, staraliśmy się to zrobić”.\r\n„To cały pakiet, więc tak naprawdę nie podzieliłbym go na obszary. Ogólnie cały pakiet jest teraz lepszy i to tyle”.\r\nBinotto zgodził się z tym, że pomimo postępów Ferrari, wciąż pozostaje wiele do zrobienia, a głównym obszarem, nad którym będą się skupiać inżynierowie w Maranello ma być kolejna, nowa jednostkę napędową w sezonie 2022: „Powiedziałbym, że brakuje nam we wszystkich obszarach. Myślę, że nadal brakuje nam [osiągów] po stronie silnika, na pewno mniej niż wcześniej, przez co różnica się zmniejszyła. Myślę jednak, że się zbliżamy”.\r\n„Miejmy nadzieję, że w przyszłym roku, kiedy znów będziemy mieć nową jednostkę napędową, to nadrobimy już zaległości lub będziemy nawet punktem odniesienia dla innych. Myślę też, że jeśli chodzi o aerodynamikę, czyli docisk przy średnich i dużych prędkościach, to będzie chodziło o cały pakiet. Ale już teraz różnice są coraz mniejsze i mniejsze”.\r\n„Myślę, że ważniejsze jest teraz to, że pracujemy we właściwym kierunku, korzystając z odpowiednich narzędzi, a to uczyni nas silniejszymi w przyszłości”.', '2021-04-19', 0, 'article6img'),
(7, 'Formula1', 'masterofdisaster', 'Aleksander', 'Misztal', 'Honda spodziewa się mieszanych odczuć w ', 'Dyrektor zarządzający projektem Hondy w Formule 1 powiedział, że spodziewa się mieszanych odczuć w przyszłym roku ze względu na planowane odejście z F1 oraz przekazanie technologii jednostek napędowych Red Bull Powertrains.\r\nW październiku ubiegłego roku Honda ogłosiła, że przygoda z Formułą 1, która została wznowiona na początku sezonu 2015 dzięki współpracy z McLarenem, zakończy się pod koniec tego roku. Japoński producent doszedł jednak do porozumienia z Red Bullem, który za pomocą nowej firmy o nazwie Red Bull Powertrains przejmie technologię jednostek napędowych Hondy. Dzięki temu Red Bull oraz AlphaTauri pozostaną przy dotychczasowych silnikach do 2024 roku.\r\n„Wraz z Red Bullem osiągnęliśmy ogólny kierunek, zaś teraz znajdujemy się na etapie ustalania szczegółów, w jaki sposób Honda może wspierać program od przyszłego roku. Wciąż nad tym pracujemy” – powiedział Masashi Yamamoto z Hondy.\r\n„Osobiście bardzo się cieszę, że przynajmniej od przyszłego roku będą mieć coś, co zrobiliśmy. Jako Honda lubimy wspierać Red Bulla, oferując im konkurencyjną jednostkę napędową, która pozwala na walkę o mistrzostwa. Byłoby naprawdę świetnie, gdybyśmy mogli im to dać. Na samochodzie oraz jednostce napędowej nie będzie żadnego oznaczenia Hondy, więc widok bolidu z tym silnikiem będzie budził mieszane odczucia – sercem pojazdu jest Honda, ale tak naprawdę nie jest!”.\r\nYamamoto ma również nadzieję na to, że w tym roku uda się zorganizować domowy wyścig o Grand Prix Japonii, który został w ubiegłym sezonie anulowany z powodu pandemii.\r\n„Oczywiście chcemy się tam ścigać i kiedy tam ostatnio rywalizowaliśmy, ten tor odpowiadał Mercedesowi, więc z punktu widzenia osiągów chcielibyśmy mieć mocny samochód na Suzuce. Liczymy, że Max, Checo, Pierre i Yuki zaliczą dobry wyścig przed japońskimi wyścigami i mamy nadzieję na dobry wynik”.', '2021-04-12', 0, 'article7img');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id_comm` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `mark` int(1) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id_comm`, `id_article`, `id_user`, `mark`, `comment`, `date`) VALUES
(1, 1, 'masterofdisaster', 10, 'Bardzo fajny artykuł', '2021-04-12'),
(2, 2, 'masterofdisaster', 7, 'Siemanko kolanko eluwa sodówa', '2021-04-20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `f1_races`
--

CREATE TABLE `f1_races` (
  `id_race` int(11) NOT NULL,
  `circut_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `f1_races`
--

INSERT INTO `f1_races` (`id_race`, `circut_name`, `country`, `date`) VALUES
(2, 'Autodromo Enzo e Dino Ferrari', 'Włochy', '2021-04-18 15:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `nick` varchar(16) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`nick`, `name`, `surname`, `email`, `password`, `level`) VALUES
('dupa', 'dupa', 'dupa', 'dupa', 'dupa', 0),
('masterofdisaster', 'Aleksander', 'Misztal', 'misztal.aleksander@gmail.com', 'Dudi246612', 0),
('matiszym', 'Mateusz', 'Szymkiewicz', 'mszym@gmail.com', 'Dupa123', 1),
('mjaca', 'Michalina', 'Jackiewicz', 'mjackiewicz140@wp.pl', 'dupa1234', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comm`);

--
-- Indeksy dla tabeli `f1_races`
--
ALTER TABLE `f1_races`
  ADD PRIMARY KEY (`id_race`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nick`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `f1_races`
--
ALTER TABLE `f1_races`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
