# mysurl
test for short url
make database with code

CREATE TABLE `surl_data` (
  `url_no` int(11) NOT NULL,
  `raw_url` text NOT NULL,
  `shr_url` text NOT NULL,
  `make_date` datetime NOT NULL
)
