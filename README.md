# mysurl
test for short url
--------------------------------------------------------
this file is set for setup on localhost only if want to
setup on hosting you must config
1. app/Congig/App.php -> set $baseURL='yoursite'
2. make your database -> set hostname, databasename, database password on app/Congig/Database.php

make database with code
---------------------------------------------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `surl_data` (
  `url_no` int(11) NOT NULL,
  `raw_url` text COLLATE utf8_unicode_ci NOT NULL,
  `shr_url` text COLLATE utf8_unicode_ci NOT NULL,
  `make_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `surl_data`
  ADD PRIMARY KEY (`url_no`);


ALTER TABLE `surl_data`
  MODIFY `url_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

----------------------------------------------------------
