-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 14, 2026 la 04:19 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `photogallery`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_gallery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `articles`
--

INSERT INTO `articles` (`id`, `id_user`, `title`, `content`, `post_date`, `id_gallery`) VALUES
(4, 15, 'Inima Locului: Piazza di Santa Maria', 'Orice plimbare prin cartier te va conduce, inevitabil, către Piazza di Santa Maria. Aceasta găzduiește Basilica di Santa Maria in Trastevere, una dintre cele mai vechi biserici din oraș, faimoasă pentru mozaicurile sale aurii spectaculoase din secolul al XII-lea.\r\n\r\nOdată cu lăsarea serii, piața se transformă radical. Treptele fântânii centrale devin un amfiteatru ad-hoc pentru localnici și călători deopotrivă, care se adună pentru a povesti, acompaniați de muzica artiștilor stradali. Este momentul perfect pentru un Aperol Spritz la una dintre terasele din jur.', '2026-05-19 15:56:41', 1),
(6, 15, 'Alfama: Labirintul unde timpul s-a oprit', 'Alfama este cel mai vechi cartier al Lisabonei, supraviețuind miraculos marelui cutremur din 1755. Sfatul numărul unu pentru când ajungi aici? Uită de Google Maps. Cel mai bun mod de a experimenta Alfama este să te pierzi pe străzile sale incredibil de înguste, care urcă și coboară în pante abrupte.\r\nAici, viața se desfășoară încă în ritm tradițional: localnicii povestesc de la un balcon la altul, rufele proaspăt spălate sunt puse la uscat direct deasupra aleilor pietruite, iar fațadele clădirilor sunt îmbrăcate în faimoasele azulejos (plăci de ceramică pictată).', '2026-05-20 18:14:46', 2),
(7, 15, 'Dealul Philopappos (Dealul Muzelor)', 'În timp ce majoritatea turiștilor asaltează stânca Acropolei la amiază, călătorii experimentați își păstrează energia pentru sfârșitul zilei și se îndreaptă către Dealul Philopappos. Situat chiar în fața citadelei antice, acest parc natural acoperit de pini și măslini oferă o evadare neașteptată din agitația orașului.\r\nUrcarea este o plimbare lejeră de 15 minute pe alei pietruite, umbrite. Pe drum, vei trece pe lângă versanți stâncoși și locuri încărcate de legende, cum ar fi structura antică săpată în piatră cunoscută drept „Închisoarea lui Socrate”.', '2026-05-20 18:21:10', 3),
(8, 15, 'Culorile și nostalgia din cartierul Balat', 'Adevăratul farmec al acestui megalopolis care leagă două continente stă ascuns în cartierele sale istorice. Dacă ai la dispoziție doar 3 sau 4 zile, rezervă-ți o dimineață pentru Balat, cel mai fotogenic și boem secret al orașului.\r\nFost cartier evreiesc și grecesc, Balat a trecut printr-o renaștere spectaculoasă în ultimii ani. Aici, străzile pavate cu piatră cubică urcă și coboară abrupt printre clădiri vechi de peste un secol, vopsite în nuanțe aprinse de roz, galben, albastru și verde.', '2026-05-20 18:25:25', 4),
(9, 15, 'O biserică transformată în paradis verde', 'Situată la doar câteva minute de mers pe jos de Tower Bridge, St Dunstan in the East este o fostă biserică parohială cu o istorie zbuciumată. Construită inițial în perioada medievală, ea a fost parțial distrusă de Marele Incendiu din Londra din 1666, reconstruită ulterior de celebrul arhitect Sir Christopher Wren, ca mai apoi să fie aproape complet devastată de bombardamentele din timpul Blitz-ului din 1941.\r\nÎn loc să o demoleze sau să o reconstruiască, autoritățile londoneze au luat o decizie genială în anii &#039;70: au transformat ruinele într-un parc public.\r\nAstăzi, pereții de piatră cenușie care au supraviețuit, arcadele gotice spectaculoase și ferestrele uriașe (acum fără sticlă) sunt complet îmbrățișate de iedera luxuriantă, copaci exotici și flori cățărătoare. Este un peisaj care pare desprins dintr-o poveste fantasy, aflat în contrast direct cu zgârie-norii din sticlă și oțel care o înconjoară.', '2026-05-20 18:30:23', 5),
(10, 22, 'Leadenhall Market: O călătorie în timp', 'La doar 7 minute de mers pe jos spre nord, vei păși într-o capodoperă a epocii victoriene. Leadenhall Market este una dintre cele mai vechi piețe acoperite din Londra, datând încă din secolul al XIV-lea, deși structura actuală din fier și sticlă, vopsită în nuanțe spectaculoase de verde britanic și roșu grena, a fost proiectată în 1881.\r\nDacă ești fan Harry Potter, locul îți va părea extrem de familiar. Pasajul a fost folosit pentru a filma intrările spre Aleea Diagon în primul film al seriei (Harry Potter și Piatra Filozofală). Poți căuta magazinul optic de pe Bull’s Head Passage – cel care a servit drept intrare pentru faimosul pub „Căldarea Crăpată” (The Leaky Cauldron).', '2026-05-20 18:34:45', 5),
(11, 22, 'Londra de la înălțime: Merită sau nu o tură cu London Eye într-un city break?', 'Pentru un turist aflat într-un city break scurt, apare mereu întrebarea: Merită să îți consumi câteva ore și o parte din buget pentru o rotație completă? Răspunsul este un da hotărât, dar doar dacă știi cum să abordezi experiența.\r\nLondon Eye nu este o roată de parc de distracții clasică. Cu o înălțime de 135 de metri, este o operă de inginerie remarcabilă. Cele 32 de capsule complet vitrate și climatizate (care reprezintă cele 32 de districte ale Londrei) se mișcă atât de lin încât abia le simți când pornesc.\r\nO rotație completă durează exact 30 de minute – timp suficient pentru a admira peisajul, a identifica clădirile iconice și, bineînțeles, a face fotografii spectaculoase. Într-o zi senină, vizibilitatea ajunge până la 40 de kilometri, putând zări chiar și Castelul Windsor în depărtare.\r\nPont: Nu cumpăra niciodată bilet de la casieriile de la fața locului. Online este nu doar mai rapid, ci și cu aproximativ 10-15% mai ieftin.\r\nEu zic că merită!', '2026-05-20 18:40:31', 5),
(12, 22, 'Belém: Era Descoperirilor și Secretul Celor Mai Buni Pastéis de Nata din Lume', 'Dacă planifici un city break în Lisabona, există un cartier care trebuie să fie obligatoriu pe itinerariul tău: Belém. Situat pe malul estuarului râului Tejo, acest district monumental este locul de unde au plecat marii exploratori portughezi. Totuși, să fim sinceri: dincolo de istorie, mulți călători fac acest drum pentru un veritabil pelerinaj culinar.\r\nAici se află rețeta originală și locul unde vei gusta cele mai celebre și delicioase tarte din Portugalia.\r\nÎn Portugalia, oriunde mergi, vei găsi Pastéis de Nata (tarte cu cremă de ou). Însă, doar în cartierul Belém vei găsi Pastéis de Belém. Diferența nu este doar de nume, ci și de istorie și rețetă.\r\nÎn secolul al XIX-lea, călugării de la Mănăstirea Jerónimos foloseau albușuri de ou pentru a-și apreta hainele. Gălbenușurile rămase au fost transformate în aceste tarte divine pentru a evita risipa.\r\nTradiția din 1837: După închiderea mănăstirii, rețeta secretă a fost vândută unei rafinării de zahăr din apropiere, care a deschis actuala Fábrica de Pastéis de Belém în 1837.\r\nRețeta originală a rămas neschimbată și este știută doar de câțiva maeștri patiseri. Coaja este de un crocant absolut, foitajul foșnește la fiecare mușcătură, iar crema este densă, caldă și nu exagerat de dulce. Se servesc presărate cu scorțișoară și zahăr pudră, exact cum fac localnicii.', '2026-05-20 18:44:47', 2),
(13, 23, 'Atena în 48 de ore: Ghid rapid de supraviețuire', 'Atena este acel oraș genial unde poți admira un templu de 2.500 de ani în timp ce încerci să nu fii călcat de un scuter pe trotuar. 😂 Este haotică, superbă și miroase a souvlaki.\r\nPlanul de atac (Pe scurt):\r\n- Acropole: Mergi la prima oră. Marmura antică e mai alunecoasă decât gheața, deci lasă șlapii la hotel dacă nu vrei să-l vizitezi pe zeul Chirurgiei de Urgență.\r\n- Plaka și Monastiraki: Străduțe instagramabile, pisici cu atitudine de filosofi și un talcioc unde poți cumpăra de la sandale de gladiator până la magneți dubioși cu Zeus.\r\n- Mâncarea: Dieta e interzisă. Porțiile sunt uriașe, feta se pune peste tot (probabil și în cafea), iar un gyros cald rezolvă orice problemă existențială.\r\n- Apusul: Urcă pe Dealul Lycabettus. Panorama e atât de frumoasă că o să uiți cât ai gâfâit până sus.\r\n\r\nRegula de aur: Nu traversa strada crezând că trecerea de pietoni îți oferă imunitate. Te uiți în stânga, în dreapta și fugi ca și cum te urmărește o meduză mitologică. 😅', '2026-05-21 14:21:47', 3),
(14, 23, 'Bosfor: Autostrada Albastră care Împarte și Unește Lumi', 'Dacă Istanbulul este inima Turciei, atunci strâmtoarea Bosfor este, fără îndoială, sistemul său circulator. Această fâșie îngustă de apă🌊,  lungă de aproximativ 30 de kilometri, nu este doar una dintre cele mai importante căi navigabile din lume, ci și granița naturală spectaculoasă dintre două continente: Europa și Asia.\r\nBosforul este locul unde geografia devine poezie, iar istoria se scrie zilnic pe crestele valurilor.\r\nBosforul leagă Marea Neagră de Marea Marmara (și, mai departe, prin strâmtoarea Dardanele, de Marea Mediterană). Din punct de vedere strategic, a fost râvnit de imperii timp de milenii👑. Din punct de vedere vizual, este un spectacol în continuă mișcare.\r\nMalurile sale sunt unite de trei poduri suspendate uriașe 🌉 și de două tuneluri submarine, însă adevăratul farmec al strâmtorii se descoperă de la nivelul apei🚢.\r\n\r\nPentru localnici, Bosforul este un refugiu. Nu poți spune că ai înțeles Istanbulul până nu ai experimentat ritualurile sale simple:\r\nSă stai pe un scaun mic de lemn pe malul apei, în cartiere precum Ortaköy sau Üsküdar, savurând un ceai fierbinte (çay) dintr-un pahar în formă de lalea, în timp ce pescărușii roiesc deasupra feriboturilor.\r\nDe asemenea, strâmtoarea este faimoasă pentru pescarii săi care, indiferent de vreme, își aruncă undițele de pe Podul Galata sau de pe faleze, transformând pescuitul într-o formă de meditație urbană.\r\nLa apus🌅, când soarele coboară în spatele siluetelor de minarete, apele Bosforului capătă nuanțe de aur și argintiu. Este momentul în care îți dai seama că acest loc nu doar separă două continente, ci creează o lume unică, undeva la mijloc, unde timpul pare să curgă în ritmul vapoarelor care trec leneș spre zare.\r\n\r\nDacă te plimbi pe malul Bosforului, ai mare grijă la mâncare! Un turist britanic, vrând să facă fotografia perfectă pentru Instagram, a ținut un simit (covrigul tradițional cu susan) fix spre apă, cu silueta podului în fundal.\r\nN-a apucat să apese pe ecran: un pescăruș imens de pe Bosfor, antrenat în ani de „piraterie” urbană, a plonjat spectaculos și i-a smuls covrigul direct din mână🦅💨, lăsându-l doar cu o poză blurată a unor aripi. Localnicii de la cafenele doar au zâmbit și au dat din cap – pe Bosfor, pescărușii nu cer mâncare, o confiscă!😂😂', '2026-05-21 14:30:14', 4),
(15, 23, 'Roma: Orașul Etern printre Istorie și Dolce Vita', 'Roma nu este doar o capitală, ci un muzeu în aer liber unde trecutul și prezentul se intersectează la fiecare colț de stradă. De la măreția impunătoare a Colosseumului și până la detaliile baroce din Piazza Navona, „Orașul Etern” reușește să fascineze milioane de călători în fiecare an. Să te plimbi pe străduțele pietruite din Trastevere sau să savurezi o porție autentică de pasta carbonara sub soarele Italiei este, fără îndoială, definiția pură a conceptului de dolce vita.\r\n\r\nUn mic avertisment (și o pățanie amuzantă) 😅😂\r\nDacă ajungi la Colosseum, vei fi abordat de bărbați îmbrăcați în gladiatori care te invită zâmbitori la o poză. Un prieten a căzut în capcană, s-a fotografiat mândru, ca mai apoi „centurionul” să-i ceară instant 20 de euro pentru „serviciu”. În timp ce amicul meu încerca șocat să negocieze, un pescăruș roman – absolut uriaș și complet lipsit de respect – a plonjat de pe o ruină și i-a smuls din mână jumătatea de pizza pe care abia o cumpărase. Până la urmă, amicul a rămas și fără bani, și nemâncat, dar măcar a învățat pe pielea lui că în Roma, adevărații prădători nu mai sunt în arenă, ci zboară deasupra ei sau poartă sandale din plastic!', '2026-05-21 14:35:54', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `article_pictures`
--

CREATE TABLE `article_pictures` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `picture` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `article_pictures`
--

INSERT INTO `article_pictures` (`id`, `id_article`, `picture`) VALUES
(2, 4, '1779273939_Aperol_spritz_cocktail_and_Italian_pizza_on_a_piazza_Santa_Maria_in_Trastevere._Rome_._Italy.webp'),
(5, 4, '1779274350_piazza_di_santa_maria.jpg'),
(10, 6, '1779301014_alfama_islamic_lisbon_lisboa_2.jpg'),
(11, 6, '1779301014_alfama1.jpg'),
(12, 7, '1779301270_inchisoarea_socrate1.jpg'),
(13, 7, '1779301270_Philopappos_Hill_2_715x470.jpg'),
(16, 8, '1779301582_balat1.jpg'),
(17, 8, '1779301582_balat_cat.jpg'),
(18, 9, '1779301823_st_dunstan_in_the_east.jpg'),
(19, 9, '1779301823_st_dunstan.jpg'),
(20, 10, '1779302085_Leadenhall_Market_In_London___Feb_2006_rotated.jpg'),
(21, 10, '1779302129_Leadenhall_65_Luisa_Tona_reduced_scaled.webp'),
(22, 10, '1779302195_leaky_cauldron_leadenhall.jpg'),
(23, 11, '1779302431_22747_london_eye_1b_c_pod_to_pod_055_rgb_ns.jpg'),
(24, 11, '1779302431_london_eye_2_cr_getty.webp'),
(25, 12, '1779302687_in_de_rij_voor_pasteis_de_belem.jpg'),
(26, 12, '1779302687_pastel_de_belem.jpg'),
(32, 13, '1779373371_b698f96a3bf7e35418940973f33c4708_The_Acropolis_of_Athens.jpeg'),
(33, 13, '1779373382_plaka_atena_scaled.jpg'),
(34, 13, '1779373390_gyros.webp'),
(35, 13, '1779373396_andreea_melinescu_Lycabettus_Hill_andreeamelinescu_12.jpg'),
(40, 14, '1779373947_443509869.jpg'),
(41, 14, '1779373953_bosfor.jpg'),
(42, 15, '1779374154_Spaghetti_alla_carbonara_Romana_3_1_500x500.webp'),
(43, 15, '1779374163_iStock_1460324816_LOWRES.webp'),
(44, 15, '1779374296_the_gladiator_photo_scam_in_rome_1723035235.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `comment_image` varchar(127) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`id`, `id_article`, `id_user`, `parent_id`, `content`, `comment_image`, `post_date`) VALUES
(3, 4, 16, NULL, 'Wow! Ce tare!', NULL, '2026-05-20 15:10:33'),
(4, 12, 15, NULL, 'Sunt extrem de delicioși! Merg perfect cu o cafeluță.', '15_1779302770_2026_3_117.webp', '2026-05-20 18:46:10'),
(8, 7, 16, NULL, 'Deci planul e așa: evităm turiștii asudați de la amiază doar ca să ne întâlnim cu toți călătorii experimentați care au citit exact același articol, fix la apus. Măcar dacă ne prinde noaptea pe acolo, avem Închisoarea lui Socrate asigurată pentru cazare gratuită 😂', NULL, '2026-05-21 13:56:43'),
(9, 11, 16, NULL, 'Zici că se mișcă atât de lin încât abia o simți... perfect! Asta înseamnă că am la dispoziție exact 30 de minute de panică silențioasă și zâmbete false pentru pozele de pe Insta, în timp ce mă rog să nu descopăr vreo defecțiune la ingineria lor remarcabilă 😅😅', NULL, '2026-05-21 14:00:08'),
(10, 8, 21, NULL, 'Superb loc! Recomand totuși să adăugați la descriere: „A se vizita exclusiv în adidași cu talpă aderentă”. Altfel, „renașterea spectaculoasă” se va transforma într-o alunecare spectaculoasă pe piatra cubică.', '21_1779372266_balat_.avif', '2026-05-21 14:04:26'),
(11, 10, 23, NULL, 'Absolut superb! 😍 Combinația asta de istorie victoriană și magie Harry Potter face din Leadenhall Market unul dintre cele mai fotogenice locuri din Londra. Merg direct să caut Bull’s Head Passage! 🪄⚡', NULL, '2026-05-21 14:09:15'),
(12, 6, 23, NULL, 'Am fost acolo și confirm 100%!  Alfama are o energie absolut unică. Să te pierzi pe străzile alea înguste, printre clădiri cu azulejos și rufe care flutură la balcoane, e cea mai pură experiență din Lisabona. Mi s-a făcut un dor uriaș de Portugalia citind asta! 🇵🇹❤️', '23_1779372672_Bairros_de_Lisboa_Alfama_o_mais_tradicional_e_pitoresco_da_capital__vleandro_24_scaled.jpg', '2026-05-21 14:11:12'),
(13, 8, 23, 10, 'Haha, exact! „Renaștere spectaculoasă” cu ecou, când te duci de-a dura la vale și te oprești direct într-o masă cu ceai turcesc😅😂', NULL, '2026-05-21 14:14:34'),
(14, 15, 15, NULL, 'Genial! Practic, amicul tău a plătit 20 de euro pentru un show de magie live: „Cum să dispară pizza și banii în 3 secunde”. Sunt convins că gladiatorul și pescărușul au procente egale din afacerea asta și împart prada la finalul zilei. Pescărușii din Roma nu sunt păsări, sunt agenți fiscali sub acoperire! 😭😂', NULL, '2026-05-21 14:40:30'),
(15, 14, 16, NULL, 'Genial textul! Până la faza cu pescărușul eram gata să-mi iau bilet de avion, dar acum știu că trebuie să-mi apăr simitul cu prețul vieții! 🦅🥨', NULL, '2026-05-21 14:43:35'),
(16, 9, 16, NULL, '„Un peisaj desprins dintr-o poveste fantasy” – perfect spus! 😍 Am fost acolo și confirm, atmosfera este ireală, mai ales când vezi zgârie-norii pe fundal prin arcadele vechi. Textul tău a surprins perfect magia locului.', '16_1779374788_Christopher_Wrenss_Tower_St_Dunstan___s_in_the_East_City_of_London_UK.jpg', '2026-05-21 14:46:28'),
(17, 12, 22, 4, 'Total de acord!🥰', NULL, '2026-05-21 14:48:11'),
(18, 11, 22, 9, 'Nimic nu spune «experiență de neuitat» precum 30 de minute de rugăciuni intense și poze în care încerci să ascunzi că îți tremură genunchii. Mult succes! 🙈😅', NULL, '2026-05-21 14:55:51'),
(19, 4, 22, NULL, 'O descriere de nota 10! Ai redat perfect spiritul autentic din Trastevere. Locul acela are o magie a lui, mai ales seara. 🥂', NULL, '2026-05-21 14:56:51'),
(20, 13, 22, NULL, 'Exact! Haos, istorie, tzatziki și adrenalină gratuită. O ador! 💙🇬🇷', NULL, '2026-05-21 14:59:12'),
(21, 7, 15, 8, 'Bine spus! Singura diferență e că „exploratorii” de la apus miros a loțiune anti-țânțari, nu a transpirație. Ne vedem la celulă! 🥂😂', NULL, '2026-05-21 15:01:22');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `title_description` varchar(64) NOT NULL,
  `img` varchar(64) NOT NULL,
  `long_description` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `title_description`, `img`, `long_description`, `id_user`) VALUES
(1, 'Roma, Italia', 'Istorie, artă și paste la fiecare colț.', 'roma.jpg', 'Descoperă farmecul Romei, orașul unde istoria, arta și gastronomia creează un city break memorabil. Atmosfera romantică și monumentele impresionante transformă fiecare zi într-o experiență aparte.', NULL),
(2, 'Lisabona, Portugalia', 'Oraș solar cu tramvaie și vedere spre ocean', 'lisabona.jpg', 'Lisabona te întâmpină cu străzi pitorești, panorame spectaculoase și un aer relaxat, autentic. Ideală pentru un city break elegant, plin de cultură, lumină și experiențe locale memorabile.', NULL),
(3, 'Atena, Grecia', 'Leagănul civilizației și al mitologiei grecești', 'atena.jpg', 'Atena îmbină perfect vestigiile antice cu energia unui oraș modern și cosmopolit.\r\nUn city break ideal pentru iubitorii de cultură, gastronomie și atmosferă mediteraneană.', NULL),
(4, 'Istanbul, Turcia', 'Pod între Europa și Asia, plin de bazaruri', 'istanbul.jpg', 'Istanbul oferă o experiență unică între două continente, plină de culoare și rafinament.\r\nMoscheile spectaculoase, bazarurile vibrante și peisajele de pe Bosfor definesc un city break aparte.', NULL),
(5, 'Londra, Marea Britanie', 'Metropolă regală cu atmosferă cosmopolită modernă', 'londra.jpg', 'Londra impresionează prin eleganță, diversitate culturală și atracții recunoscute la nivel mondial. Perfectă pentru un city break sofisticat, cu experiențe premium, shopping și viață urbană vibrantă.', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `picture` varchar(127) NOT NULL,
  `short_title_description` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_image` varchar(64) DEFAULT NULL,
  `user_short_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `user_image`, `user_short_description`) VALUES
(1, 'admin', '$2y$10$goP61ER/Je9B9qX5rqB4iuxXlYxVX8PnBkF2tMuzq5mKUHG6maD3m', '1_1779277953_admin_image.jpg', 'Admin.'),
(15, 'vanessa', '$2y$10$2l0Uys/gZye3RyibV5ncU.u2b2qKLUpYurZwECbyoLz0XZJ67873q', '15_1779272833_dog.jpg', 'Salut! Explorez lumea :)'),
(16, 'user_1', '$2y$10$LZ88a27S4XwvNACyJg./Du4FyqWgMVZBefylQ9MR6SAl.2wA5zWGC', NULL, NULL),
(21, 'user_2', '$2y$10$9jC6lsVv4uPkkbp8ct0vJOfyre1nkl7z60.j6axnxEqBgZHQsTg2S', NULL, NULL),
(22, 'maria', '$2y$10$JeST6Vj56xUrlcWCPWuXbOuqzluVXFMmcUKfE2ZlJQ85cBAiPAhrS', '22_1779301946_download.webp', 'Ador Londra!'),
(23, 'AlexInLume', '$2y$10$2o6V30hZJ5eukdQWAtDjMuA.hRNhiQ1wfJPDqb0mq7H45yXI6wYGW', '23_1779372464_download__1_.webp', 'Îmi place să călătoresc prin lume.');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gallery` (`id_gallery`);

--
-- Indexuri pentru tabele `article_pictures`
--
ALTER TABLE `article_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_parent_comment` (`parent_id`);

--
-- Indexuri pentru tabele `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_USER_idx` (`id_user`);

--
-- Indexuri pentru tabele `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_GALLERY` (`id_gallery`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `article_pictures`
--
ALTER TABLE `article_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pentru tabele `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_gallery`) REFERENCES `galleries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`id_gallery`) REFERENCES `galleries` (`id`) ON DELETE SET NULL;

--
-- Constrângeri pentru tabele `article_pictures`
--
ALTER TABLE `article_pictures`
  ADD CONSTRAINT `article_pictures_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_parent_comment` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `FK_ID_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_ID_GALLERY` FOREIGN KEY (`id_gallery`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
