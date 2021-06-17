CREATE DATABASE restaurant;
-- Grant permission
GRANT ALL PRIVILEGES ON restaurant.* TO 'mysql_client' @'%';
USE restaurant;
-- DUMP OF TABLE CUSTOMERS
DROP TABLE if EXISTS `customers`;
CREATE TABLE `customers` (
    `customer_id` int unsigned NOT NULL auto_increment,
    `username` varchar(255) default NULL,
    `password` varchar(255),
    `name` varchar(255) default NULL,
    `phone` varchar(100) default NULL,
    `address` varchar(255) default NULL,
    `money` DOUBLE default NULL,
    PRIMARY KEY (`customer_id`)
) ENGINE = InnoDB;
LOCK TABLES `customers` WRITE;
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        1,
        "Audra",
        "2535",
        "Stella",
        "043-351-7753",
        "484-615 Est, Ave",
        8701116716
    ),
    (
        2,
        "Abbot",
        "4539",
        "Wylie",
        "072-596-4489",
        "P.O. Box 195, 8039 Lectus, St.",
        3491107150
    ),
    (
        3,
        "Virginia",
        "4062",
        "Ima",
        "049-195-9983",
        "P.O. Box 189, 3990 Eget, Street",
        7521929059
    ),
    (
        4,
        "Castor",
        "9890",
        "Teagan",
        "084-591-6221",
        "Ap #866-4345 Ac Avenue",
        9132639460
    ),
    (
        5,
        "Freya",
        "2313",
        "Thaddeus",
        "095-444-7260",
        "Ap #663-5810 Tortor. Ave",
        4021706657
    ),
    (
        6,
        "Ariana",
        "3501",
        "Priscilla",
        "092-389-9967",
        "Ap #748-1704 Est, Road",
        9765755121
    ),
    (
        7,
        "Lois",
        "8118",
        "Shannon",
        "092-844-1662",
        "329-283 A, Av.",
        1174132865
    ),
    (
        8,
        "Aimee",
        "5710",
        "April",
        "082-587-0281",
        "839 Accumsan St.",
        2011947138
    ),
    (
        9,
        "Bianca",
        "9807",
        "Basia",
        "079-991-7346",
        "995-5224 Ornare Street",
        3105277827
    ),
    (
        10,
        "Aaron",
        "5427",
        "Honorato",
        "065-361-3884",
        "926-9083 Cum St.",
        8761542901
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        11,
        "Arsenio",
        "6921",
        "Amela",
        "077-728-8283",
        "668-2099 Rutrum Rd.",
        3148282185
    ),
    (
        12,
        "Garth",
        "5502",
        "Darryl",
        "043-842-4422",
        "3429 Vel Road",
        81159602
    ),
    (
        13,
        "Adam",
        "8198",
        "Kennan",
        "085-597-6621",
        "5617 Magna. Av.",
        4746050708
    ),
    (
        14,
        "Lamar",
        "2310",
        "Helen",
        "085-622-9699",
        "P.O. Box 673, 955 Eget Av.",
        6492077889
    ),
    (
        15,
        "Brenda",
        "4365",
        "Amelia",
        "054-295-3184",
        "P.O. Box 822, 2124 Posuere Road",
        6656606332
    ),
    (
        16,
        "Jin",
        "4812",
        "Rooney",
        "012-267-1539",
        "486-8240 Egestas Street",
        7641943659
    ),
    (
        17,
        "Noelani",
        "7553",
        "TaShya",
        "059-858-6160",
        "P.O. Box 339, 407 Sem Ave",
        6854625114
    ),
    (
        18,
        "Silas",
        "6142",
        "Eaton",
        "095-678-7770",
        "Ap #713-5500 Urna St.",
        3671642311
    ),
    (
        19,
        "Keane",
        "7365",
        "Igor",
        "073-884-7310",
        "5541 Cursus, Avenue",
        9005294520
    ),
    (
        20,
        "Forrest",
        "3886",
        "Carissa",
        "097-968-0306",
        "6787 Tincidunt St.",
        8913720570
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        21,
        "Naida",
        "7234",
        "Hiroko",
        "084-824-3889",
        "P.O. Box 367, 2472 Vivamus Avenue",
        7065175949
    ),
    (
        22,
        "Shoshana",
        "1403",
        "Marcia",
        "015-489-7651",
        "Ap #778-9787 Commodo Rd.",
        1053912032
    ),
    (
        23,
        "Raven",
        "6246",
        "Octavius",
        "038-303-1513",
        "754-7284 Integer Av.",
        1955631732
    ),
    (
        24,
        "Maisie",
        "6358",
        "Hunter",
        "009-129-2647",
        "2121 Non, St.",
        8478705687
    ),
    (
        25,
        "Zachery",
        "9535",
        "Linus",
        "064-212-4552",
        "681-7871 Pede Avenue",
        4543517904
    ),
    (
        26,
        "Peter",
        "8857",
        "Lyle",
        "019-362-8619",
        "4880 Suspendisse Ave",
        4620678520
    ),
    (
        27,
        "Ivory",
        "7078",
        "Sean",
        "043-224-6833",
        "P.O. Box 900, 4828 Purus Rd.",
        6076558038
    ),
    (
        28,
        "Imani",
        "2891",
        "Megan",
        "044-747-9137",
        "Ap #731-6897 Tincidunt St.",
        5421688669
    ),
    (
        29,
        "Kalia",
        "7003",
        "Destiny",
        "027-569-9594",
        "P.O. Box 503, 7934 Nostra, Rd.",
        2481496750
    ),
    (
        30,
        "Bruce",
        "5983",
        "Geraldine",
        "008-161-6738",
        "Ap #694-9804 Morbi Avenue",
        8007134689
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        31,
        "Lester",
        "5287",
        "Kalia",
        "059-374-3272",
        "Ap #456-5125 Dapibus Ave",
        9450121910
    ),
    (
        32,
        "Lawrence",
        "1666",
        "Paul",
        "079-723-3566",
        "9019 Consectetuer Av.",
        4248721997
    ),
    (
        33,
        "Penelope",
        "3934",
        "Tucker",
        "031-275-0930",
        "4596 Erat St.",
        5531905143
    ),
    (
        34,
        "Tatum",
        "7812",
        "Kermit",
        "051-534-2998",
        "Ap #377-5483 Erat. Rd.",
        5553064820
    ),
    (
        35,
        "Angelica",
        "9616",
        "Channing",
        "093-159-7002",
        "6441 Lacus. Rd.",
        1103748496
    ),
    (
        36,
        "Amos",
        "1491",
        "Whoopi",
        "004-358-9733",
        "6337 Vitae Street",
        9379970226
    ),
    (
        37,
        "Kylynn",
        "9129",
        "Geraldine",
        "075-214-3231",
        "Ap #756-2314 Proin St.",
        6096055550
    ),
    (
        38,
        "Sasha",
        "6072",
        "Myra",
        "094-720-9889",
        "Ap #766-6289 Eu Ave",
        7173440783
    ),
    (
        39,
        "Reese",
        "4364",
        "Karleigh",
        "095-897-1356",
        "555-2414 Magna. Rd.",
        951981852
    ),
    (
        40,
        "Lewis",
        "1904",
        "David",
        "079-968-2516",
        "428-6264 Nec Av.",
        8837672185
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        41,
        "Catherine",
        "1719",
        "Louis",
        "021-299-3947",
        "8360 Leo Street",
        1031511251
    ),
    (
        42,
        "Brenden",
        "5951",
        "Lucian",
        "028-431-4535",
        "P.O. Box 898, 4522 Scelerisque Road",
        6984461558
    ),
    (
        43,
        "Colton",
        "9214",
        "Garrison",
        "065-293-7711",
        "120 Mauris St.",
        1778278279
    ),
    (
        44,
        "Eve",
        "4017",
        "Cyrus",
        "055-182-2405",
        "402-8149 Eu Street",
        9091056795
    ),
    (
        45,
        "Aurora",
        "1130",
        "Gareth",
        "058-230-7715",
        "992-6989 Porttitor Street",
        3207570790
    ),
    (
        46,
        "Caleb",
        "8033",
        "Yuli",
        "019-487-2173",
        "907-2627 Pede, Road",
        4265622791
    ),
    (
        47,
        "Philip",
        "1326",
        "Christopher",
        "059-628-7025",
        "Ap #659-8827 Nulla Street",
        4092364857
    ),
    (
        48,
        "Beverly",
        "5033",
        "Hakeem",
        "060-981-8501",
        "130-7818 Mauris Ave",
        9785302578
    ),
    (
        49,
        "Hyatt",
        "7735",
        "Latifah",
        "022-382-6094",
        "3517 Sit Ave",
        5914114397
    ),
    (
        50,
        "Rhiannon",
        "7851",
        "Holly",
        "015-922-2819",
        "P.O. Box 109, 2591 Amet Street",
        9753760805
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        51,
        "Venus",
        "5368",
        "Destiny",
        "022-758-5867",
        "Ap #667-7860 Cursus Rd.",
        3465410259
    ),
    (
        52,
        "Avram",
        "9569",
        "Mason",
        "023-704-5299",
        "254-3368 Pellentesque Street",
        9803037286
    ),
    (
        53,
        "Tamara",
        "4254",
        "Isaiah",
        "082-121-9856",
        "4066 Ut Rd.",
        9627138549
    ),
    (
        54,
        "Ina",
        "7848",
        "Tyler",
        "033-806-6448",
        "P.O. Box 863, 1364 Etiam Ave",
        7389803422
    ),
    (
        55,
        "Doris",
        "1172",
        "Kalia",
        "058-839-2323",
        "Ap #317-7628 Lectus, Rd.",
        2254366041
    ),
    (
        56,
        "Alexander",
        "7563",
        "Nicole",
        "081-216-2484",
        "Ap #870-3864 Magna St.",
        7967342492
    ),
    (
        57,
        "Oren",
        "9988",
        "Upton",
        "008-451-9976",
        "P.O. Box 122, 5424 Eget St.",
        858970065
    ),
    (
        58,
        "Kiayada",
        "4157",
        "Herman",
        "010-749-5854",
        "5803 Semper Road",
        1697948014
    ),
    (
        59,
        "Priscilla",
        "1654",
        "Martina",
        "084-512-0643",
        "Ap #352-2810 Morbi Av.",
        6696075389
    ),
    (
        60,
        "Ursula",
        "2342",
        "Cyrus",
        "055-807-8513",
        "P.O. Box 342, 8217 Viverra. Rd.",
        8614091538
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        61,
        "Diana",
        "1922",
        "Honorato",
        "068-859-9402",
        "Ap #793-3259 Est St.",
        6836063516
    ),
    (
        62,
        "Justine",
        "4316",
        "Holmes",
        "092-594-6037",
        "412-9756 Aliquam Ave",
        6271264524
    ),
    (
        63,
        "Jena",
        "2382",
        "Roth",
        "031-815-3588",
        "Ap #369-8824 Dictum Street",
        7559547049
    ),
    (
        64,
        "Alan",
        "2065",
        "Caldwell",
        "038-224-4007",
        "7955 Sed Avenue",
        2070785378
    ),
    (
        65,
        "Reece",
        "3235",
        "Wanda",
        "025-403-0069",
        "1530 Lacus. Road",
        5431326766
    ),
    (
        66,
        "Naomi",
        "9702",
        "Zena",
        "075-204-4165",
        "3187 Vitae St.",
        8236888215
    ),
    (
        67,
        "Regina",
        "5198",
        "Zahir",
        "034-502-2936",
        "Ap #575-9784 Amet Rd.",
        1153364516
    ),
    (
        68,
        "Darius",
        "5742",
        "Warren",
        "092-963-1990",
        "P.O. Box 732, 3607 Nisi Road",
        2340353724
    ),
    (
        69,
        "Barry",
        "5074",
        "Hamilton",
        "005-984-1953",
        "Ap #888-1274 Amet Ave",
        3757134352
    ),
    (
        70,
        "Nasim",
        "7698",
        "Karleigh",
        "032-327-5308",
        "197-4831 Libero Ave",
        7311436207
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        71,
        "Oprah",
        "2840",
        "Brian",
        "093-993-6999",
        "P.O. Box 821, 1434 In Ave",
        5945115128
    ),
    (
        72,
        "Joseph",
        "5475",
        "Hilda",
        "016-883-7375",
        "240 At Rd.",
        2991126044
    ),
    (
        73,
        "Damon",
        "1810",
        "Colorado",
        "004-668-3900",
        "Ap #967-9669 Lobortis, Av.",
        8880295488
    ),
    (
        74,
        "Fredericka",
        "7949",
        "Cleo",
        "099-249-2260",
        "Ap #155-8981 Eget, Ave",
        8951037945
    ),
    (
        75,
        "Katell",
        "7423",
        "Rahim",
        "094-389-6744",
        "7153 Faucibus Road",
        4543079290
    ),
    (
        76,
        "Raphael",
        "6561",
        "Ishmael",
        "030-567-3731",
        "502-7616 Orci St.",
        7628174649
    ),
    (
        77,
        "Amber",
        "3717",
        "Colton",
        "079-437-0783",
        "P.O. Box 237, 417 Quis Ave",
        585123324
    ),
    (
        78,
        "Xantha",
        "4194",
        "Henry",
        "091-171-6319",
        "6642 Eget Ave",
        7949062697
    ),
    (
        79,
        "Rudyard",
        "8027",
        "Zephania",
        "087-829-8080",
        "P.O. Box 105, 8494 Sit Ave",
        7740982485
    ),
    (
        80,
        "Flynn",
        "6720",
        "Uma",
        "025-108-1174",
        "Ap #327-1070 Semper Ave",
        5768193289
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        81,
        "India",
        "6753",
        "Cherokee",
        "090-498-4780",
        "P.O. Box 954, 5157 Sed Road",
        2438814487
    ),
    (
        82,
        "Kelly",
        "3659",
        "Karyn",
        "000-221-9463",
        "3366 Ultrices Av.",
        9793495320
    ),
    (
        83,
        "Nolan",
        "4534",
        "Zeus",
        "067-243-7743",
        "P.O. Box 574, 6070 Placerat, Street",
        156109393
    ),
    (
        84,
        "Imani",
        "6538",
        "Kenyon",
        "094-410-9553",
        "402-281 Tristique Ave",
        3469572737
    ),
    (
        85,
        "Raven",
        "2688",
        "Phillip",
        "080-211-2554",
        "P.O. Box 767, 7819 Velit Street",
        1483492883
    ),
    (
        86,
        "Christine",
        "2877",
        "Jeremy",
        "028-144-5714",
        "698-6197 Tellus, Road",
        5854111820
    ),
    (
        87,
        "Edan",
        "8967",
        "Amos",
        "050-680-7660",
        "Ap #588-6518 Non, Ave",
        2159672769
    ),
    (
        88,
        "Uta",
        "1676",
        "Patience",
        "057-839-1670",
        "4250 Conubia St.",
        2840185867
    ),
    (
        89,
        "Arthur",
        "6152",
        "Castor",
        "079-638-8569",
        "582-3960 Natoque St.",
        7721769595
    ),
    (
        90,
        "Sybil",
        "5538",
        "Kylee",
        "074-556-4735",
        "7976 Sapien Rd.",
        6555027012
    );
INSERT INTO `customers` (
        `customer_id`,
        `username`,
        `password`,
        `name`,
        `phone`,
        `address`,
        `money`
    )
VALUES (
        91,
        "Xander",
        "8532",
        "Howard",
        "040-991-4974",
        "P.O. Box 245, 3613 Convallis Av.",
        3346126287
    ),
    (
        92,
        "Alexander",
        "5797",
        "Ryan",
        "024-380-6201",
        "P.O. Box 591, 3085 Vitae St.",
        4433187218
    ),
    (
        93,
        "Julie",
        "4096",
        "Xerxes",
        "086-331-0783",
        "725 Vivamus Street",
        7074121279
    ),
    (
        94,
        "Troy",
        "7597",
        "Kiona",
        "035-286-8416",
        "1746 Libero. Ave",
        8803654675
    ),
    (
        95,
        "Amal",
        "8731",
        "Aladdin",
        "031-395-5178",
        "Ap #733-8928 Lacinia St.",
        5021019427
    ),
    (
        96,
        "Tucker",
        "7595",
        "Moses",
        "046-416-6815",
        "3334 Montes, St.",
        8842816803
    ),
    (
        97,
        "Cassady",
        "1563",
        "Fleur",
        "031-895-6567",
        "164-9712 Ac Rd.",
        7694027961
    ),
    (
        98,
        "Thaddeus",
        "9020",
        "Harlan",
        "084-349-7940",
        "1713 Semper St.",
        5126339314
    ),
    (
        99,
        "Jorden",
        "7602",
        "Judah",
        "081-169-7390",
        "106 Sit Av.",
        3898070909
    ),
    (
        100,
        "Vaughan",
        "2878",
        "Acton",
        "054-278-8763",
        "406-8511 Proin St.",
        5704482860
    );
UNLOCK TABLES;
-- DUMP OF TABLE PRODUCT
/* CREATE TABLE */
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`(
    `product_id` INT UNSIGNED PRIMARY KEY NOT NULL,
    NAME VARCHAR(100),
    `image_url` VARCHAR(100),
    `price` DOUBLE,
    `category` INT
) ENGINE = InnoDB;
-- category
-- 1 - Chicken
-- 2 - Dessert
-- 3 - drinks
-- 4 - rice disks
-- 5- light food
-- 6 - burger
LOCK TABLES `products` WRITE;
INSERT INTO `products`(
        `product_id`,
        `name`,
        `image_url`,
        `price`,
        `category`
    )
VALUES
    /* INSERT QUERY NO: 1 */
    (
        1,
        '2 pcs Fried Chicken Meal',
        'https://mcdonalds.vn/uploads/2018/2-ga-ran.png',
        86000,
        1
    ),
    /* INSERT QUERY NO: 2 */
    (
        2,
        'Chicken McWings™ (10 pcs)',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/10-wings.png',
        175000,
        1
    ),
    /* INSERT QUERY NO: 3 */
    (
        3,
        '4 Chicken McNuggets',
        'https://mcdonalds.vn/uploads/2018/4nuggets.png',
        36000,
        1
    ),
    /* INSERT QUERY NO: 4 */
    (
        4,
        '1pc Fried Chicken - 183 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/1-ga-ran.png',
        36000,
        1
    ),
    /* INSERT QUERY NO: 5 */
    (
        5,
        '9pcs Fried Chickens',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/9-ga-ran.png',
        289000,
        1
    ),
    /* INSERT QUERY NO: 6 */
    (
        6,
        '20 Chicken McNuggets™',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/20pcs_chicken_mcwings.png',
        115000,
        1
    ),
    /* INSERT QUERY NO: 7 */
    (
        7,
        '9 Chicken McNuggets™',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/9pcs-chicken-mcnuggets.png',
        69000,
        1
    ),
    /* INSERT QUERY NO: 8 */
    (
        8,
        '3pcs Fried Chickens',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/3-ga-ran.png',
        99000,
        1
    ),
    /* INSERT QUERY NO: 9 */
    (
        9,
        '6 Chicken McNuggets™',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/6pcs_chicken_mcnuggets.png',
        49000,
        1
    ),
    /* INSERT QUERY NO: 10 */
    (
        10,
        '5pcs Fried Chickens',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/5-ga-ran.png',
        169000,
        1
    ),
    /* INSERT QUERY NO: 11 */
    (
        11,
        'Chicken McWings™',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/6-wings.png',
        125000,
        1
    ),
    /* INSERT QUERY NO: 12 */
    (
        12,
        '3 Chicken McWings™',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/3pcs_chicken_mcwings.png',
        69000,
        1
    ),
    /* INSERT QUERY NO: 13 */
    (
        13,
        'Oreo™ McFlurry™',
        'https://mcdonalds.vn/uploads/2018/food/desserts/oreo_mcflurrt.png',
        36000,
        2
    ),
    /* INSERT QUERY NO: 14 */
    (
        14,
        'Apple Pie',
        'https://mcdonalds.vn/uploads/2018/food/desserts/apple-hotpie.png',
        25000,
        2
    ),
    /* INSERT QUERY NO: 15 */
    (
        15,
        'McDonalds® Cone',
        'https://mcdonalds.vn/uploads/2018/food/desserts/mcdonalds_cone.png',
        10000,
        2
    ),
    /* INSERT QUERY NO: 16 */
    (
        16,
        'Mc Sundae™ Chocolate',
        'https://mcdonalds.vn/uploads/2018/food/desserts/hotfudge_mcsundae.png',
        29000,
        2
    ),
    /* INSERT QUERY NO: 17 */
    (
        17,
        'McSundae Strawberry',
        'https://mcdonalds.vn/uploads/2018/food/desserts/strawberry-mcsundae.png',
        29000,
        2
    ),
    /* INSERT QUERY NO: 18 */
    (
        18,
        'TH True Milk  - 108 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/beverage/th-true-milk-copy.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 19 */
    (
        19,
        'Lychee Black Tea',
        'https://mcdonalds.vn/uploads/2018/lychee.png',
        45000,
        3
    ),
    /* INSERT QUERY NO: 20 */
    (
        20,
        'Teppy™ Orange Drink - 188 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/beverage/teppy_orange_drink.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 21 */
    (
        21,
        'Sprite®',
        'https://mcdonalds.vn/uploads/2018/food/beverage/Product_thumb_Sprite.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 22 */
    (
        22,
        'Milo™ - 110 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/beverage/milo.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 23 */
    (
        23,
        'Dasani® Water',
        'https://mcdonalds.vn/uploads/2018/food/beverage/dasani_water.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 24 */
    (
        24,
        'Fanta®',
        'https://mcdonalds.vn/uploads/2018/food/beverage/hero-pdt-Fanta-201703_0.png',
        15000,
        3
    ),
    /* INSERT QUERY NO: 25 */
    (
        25,
        'Can of Coca-Cola® Light',
        'https://mcdonalds.vn/uploads/2018/food/beverage/coke-light.png',
        25000,
        3
    ),
    /* INSERT QUERY NO: 26 */
    (
        26,
        'Coca-Cola® - 150 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/beverage/mcd-food-beverages-soft-drinks-coke.png',
        20000,
        3
    ),
    /* INSERT QUERY NO: 27 */
    (
        27,
        'Phần ăn cơm thịt nướng ốp la',
        'https://mcdonalds.vn/uploads/2018/food/rice/MEAL_porkeggrice.png',
        66000,
        4
    ),
    /* INSERT QUERY NO: 28 */
    (
        28,
        'Grilled Pork Rice',
        'https://mcdonalds.vn/uploads/2018/food/rice/grilled_pork_rice.png',
        39000,
        4
    ),
    /* INSERT QUERY NO: 29 */
    (
        29,
        'Phần ăn Cơm thịt gà chiên',
        'https://mcdonalds.vn/uploads/2018/food/rice/MEAL_chickrice.png',
        46000,
        4
    ),
    /* INSERT QUERY NO: 30 */
    (
        30,
        'Grilled Pork Rice with Egg',
        'https://mcdonalds.vn/uploads/2018/food/rice/grilled_porkegg_rice.png',
        49000,
        4
    ),
    /* INSERT QUERY NO: 31 */
    (
        31,
        'McSpicy Chicken Rice',
        'https://mcdonalds.vn/uploads/2018/food/rice/mcspicy_chicken_rice.png',
        76000,
        4
    ),
    /* INSERT QUERY NO: 32 */
    (
        32,
        'Phần ăn Cơm thịt nướng',
        'https://mcdonalds.vn/uploads/2018/food/rice/MEAL_porkrice.png',
        46000,
        4
    ),
    /* INSERT QUERY NO: 33 */
    (
        33,
        'Chicken Rice',
        'https://mcdonalds.vn/uploads/2018/food/rice/chicken_rice.png',
        39000,
        4
    ),
    /* INSERT QUERY NO: 34 */
    (
        34,
        'Phần ăn Cơm phi lê gà cay',
        'https://mcdonalds.vn/uploads/2018/food/rice/MEAL_mcspicyrice.png',
        90000,
        4
    ),
    /* INSERT QUERY NO: 35 */
    (
        35,
        'Fried Chicken Rice',
        'https://mcdonalds.vn/uploads/2018/food-categories/com-ga.png',
        42000,
        4
    ),
    /* INSERT QUERY NO: 36 */
    (
        36,
        'French fries (small size) - 206 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/regular_world_famous_fries.png',
        16000,
        5
    ),
    /* INSERT QUERY NO: 37 */
    (
        37,
        'Cheese Burger - 323 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/cheeseburger.png',
        39000,
        5
    ),
    /* INSERT QUERY NO: 38 */
    (
        38,
        'French fries (medium size)',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/medium_world_famous_fries.png',
        26000,
        5
    ),
    /* INSERT QUERY NO: 39 */
    (
        39,
        'Apple Pie',
        'https://mcdonalds.vn/uploads/2018/food/desserts/apple-hotpie.png',
        25000,
        5
    ),
    /* INSERT QUERY NO: 40 */
    (
        40,
        'Mc Sundae™ Chocolate',
        'https://mcdonalds.vn/uploads/2018/food/desserts/hotfudge_mcsundae.png',
        29000,
        5
    ),
    /* INSERT QUERY NO: 41 */
    (
        41,
        'French fries (large size)',
        'https://mcdonalds.vn/uploads/2018/food/ga-ran/large_world_famous_fries.png',
        36000,
        5
    ),
    /* INSERT QUERY NO: 42 */
    (
        42,
        'Pork Burger  - 337 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/pork_burger.png',
        32000,
        5
    ),
    /* INSERT QUERY NO: 43 */
    (
        43,
        'McSundae Strawberry',
        'https://mcdonalds.vn/uploads/2018/food/desserts/strawberry-mcsundae.png',
        29000,
        5
    ),
    /* INSERT QUERY NO: 44 */
    (
        44,
        'Chicken Burger',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/chicken_burger.png',
        32000,
        5
    ),
    /* INSERT QUERY NO: 45 */
    (
        45,
        'Hamburger',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/hamburger.png',
        32000,
        5
    ),
    /* INSERT QUERY NO: 46 */
    (
        46,
        'Pork Burger  - 337 Kcal',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/pork_burger.png',
        32000,
        6
    ),
    /* INSERT QUERY NO: 47 */
    (
        47,
        'McRoyal Deluxe',
        'https://mcdonalds.vn/uploads/2018/mcroyal_deluxe.png',
        79000,
        6
    ),
    /* INSERT QUERY NO: 48 */
    (
        48,
        'Double Cheeseburger',
        'https://mcdonalds.vn/uploads/2018/food/burgers/double-cheese-burger.png',
        59000,
        6
    ),
    /* INSERT QUERY NO: 49 */
    (
        49,
        'Big Mac™',
        'https://mcdonalds.vn/uploads/2018/food/burgers/bigmac.png',
        69000,
        6
    ),
    /* INSERT QUERY NO: 50 */
    (
        50,
        'McSpicy™ Deluxe',
        'https://mcdonalds.vn/uploads/2018/food/burgers/mcspicy-deluxe.png',
        79000,
        6
    ),
    /* INSERT QUERY NO: 51 */
    (
        51,
        'McChicken',
        'https://mcdonalds.vn/uploads/2018/mcchicken-2.png',
        59000,
        6
    ),
    /* INSERT QUERY NO: 52 */
    (
        52,
        'Filet - O - Fish',
        'https://mcdonalds.vn/uploads/2018/food-categories/CSO_1063.png',
        49000,
        6
    ),
    /* INSERT QUERY NO: 53 */
    (
        53,
        'McChicken™ Deluxe',
        'https://mcdonalds.vn/uploads/2018/food/burgers/mcchicken-deluxe.png',
        69000,
        6
    ),
    /* INSERT QUERY NO: 54 */
    (
        54,
        'Cheeseburger Deluxe',
        'https://mcdonalds.vn/uploads/2018/food/burgers/cheese-burger-deluxe.png',
        49000,
        6
    ),
    /* INSERT QUERY NO: 55 */
    (
        55,
        'McRoyal™ Deluxe',
        'https://mcdonalds.vn/uploads/2018/food/burgers/mcroyal-deluxe.png',
        79000,
        6
    ),
    /* INSERT QUERY NO: 56 */
    (
        56,
        'Chicken Burger',
        'https://mcdonalds.vn/uploads/2018/food/mon-an-chung/chicken_burger.png',
        32000,
        6
    ),
    /* INSERT QUERY NO: 57 */
    (
        57,
        'McRoyal™ with Cheese',
        'https://mcdonalds.vn/uploads/2018/food/burgers/mcroyal-with-cheese.png',
        69000,
        6
    ) ON DUPLICATE KEY
UPDATE product_id = product_id + 1;
UNLOCK TABLES;
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
    `employee_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(20) NOT NULL DEFAULT '',
    `password` VARCHAR(20) NOT NULL DEFAULT '',
    `name` VARCHAR(50) DEFAULT NULL,
    `is_manager` BOOLEAN DEFAULT false,
    PRIMARY KEY(`employee_id`)
) ENGINE = InnoDB;
LOCK TABLE `employees` WRITE;
INSERT INTO `employees`
VALUES(1, 'dungnt', '123456', 'Dung NT', true),
    (2, 'duyna', '123456', 'Duy NT', false),
    (3, 'hahm', '123456', 'Ha HM', false),
    (4, 'hahm2', '123456', 'Ha HM 2', false),
    (5, 'tungbt', '123456', 'Tung BT 1', false),
    (6, 'tungbt2', '123456', 'Tung BT 2', false);
UNLOCK TABLES;
-- DUMP TABLE INGREDIENTS
/* Showing results for ingredient.xlsx */
/* CREATE TABLE */
DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients`(
    `ingredient_id` INT UNSIGNED not NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `quantity` INT,
    `price_unit` DOUBLE,
    PRIMARY KEY (`ingredient_id`)
) ENGINE = InnoDB;
LOCK TABLE `ingredients` WRITE;
INSERT INTO ingredients(ingredient_id, name, quantity, price_unit)
VALUES
    /* INSERT QUERY NO: 1 */
    (1, 'potato', 20, 5000),
    /* INSERT QUERY NO: 2 */
    (2, 'griddle cake', 20, 5000),
    /* INSERT QUERY NO: 3 */
    (3, 'folded egg', 20, 2000),
    /* INSERT QUERY NO: 4 */
    (4, 'sausage patty', 20, 5000),
    /* INSERT QUERY NO: 5 */
    (5, 'biscuit', 20, 5000),
    /* INSERT QUERY NO: 6 */
    (6, 'new grilled chicken fillet', 20, 10000),
    /* INSERT QUERY NO: 7 */
    (7, 'bakery style bun', 20, 2000),
    /* INSERT QUERY NO: 8 */
    (8, 'new crispy chicken fillet', 20, 10000),
    /* INSERT QUERY NO: 9 */
    (9, 'tomato slice', 20, 2000),
    /* INSERT QUERY NO: 10 */
    (10, 'Chicken McNuggets', 20, 15000),
    /* INSERT QUERY NO: 11 */
    (11, 'White boneless chicken', 20, 5000),
    /* INSERT QUERY NO: 12 */
    (
        12,
        'Chicken breast strips with rib meat',
        20,
        3000
    ),
    /* INSERT QUERY NO: 13 */
    (13, 'milo', 20, 1500),
    /* INSERT QUERY NO: 14 */
    (14, 'egg', 20, 1500),
    /* INSERT QUERY NO: 15 */
    (15, 'English muffin', 20, 2000),
    /* INSERT QUERY NO: 16 */
    (16, 'light cream', 20, 2000),
    /* INSERT QUERY NO: 17 */
    (17, 'salad mix', 20, 10000),
    /* INSERT QUERY NO: 18 */
    (18, 'cheese', 20, 5000),
    /* INSERT QUERY NO: 19 */
    (19, 'Fruit Yogurt Parfait', 20, 5000),
    /* INSERT QUERY NO: 20 */
    (20, 'strawberries', 20, 10000),
    /* INSERT QUERY NO: 21 */
    (21, 'snack', 20, 5000),
    /* INSERT QUERY NO: 22 */
    (22, 'coffee', 20, 2000),
    /* INSERT QUERY NO: 23 */
    (23, 'iced tea', 20, 3000),
    /* INSERT QUERY NO: 24 */
    (24, 'sweet tea', 20, 3000),
    /* INSERT QUERY NO: 25 */
    (25, 'milk', 20, 5000),
    /* INSERT QUERY NO: 26 */
    (26, 'cookie', 20, 1000),
    /* INSERT QUERY NO: 27 */
    (27, 'premium breast strip', 20, 5000),
    /* INSERT QUERY NO: 28 */
    (28, 'McChicken Patty', 20, 10000),
    /* INSERT QUERY NO: 29 */
    (29, 'Leaf Lettuce', 20, 1000),
    /* INSERT QUERY NO: 30 */
    (30, 'Mayonnaise Dressing', 20, 2000),
    /* INSERT QUERY NO: 31 */
    (31, 'Flavours', 20, 5000),
    /* INSERT QUERY NO: 32 */
    (32, 'Bacon', 20, 20000) ON DUPLICATE KEY
UPDATE ingredient_id = ingredient_id + 1;
UNLOCK TABLES;
-- DUMP TABLE ORDER
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`(
    `order_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `customer_id` INT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `employee_id` INT UNSIGNED NOT NULL,
    `status` INT UNSIGNED NOT NULL DEFAULT 0,
    -- 0: unprocessed, 1: accepted, 2: rejected
    PRIMARY KEY(`order_id`),
    KEY `customer_id`(`customer_id`),
    KEY `employee_id`(`employee_id`),
    CONSTRAINT `orders_ibfk_1` FOREIGN KEY(`customer_id`) REFERENCES `customers`(`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `orders_ibfk_2` FOREIGN KEY(`employee_id`) REFERENCES `employees`(`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) AUTO_INCREMENT = 1;
LOCK TABLE `orders` WRITE;
INSERT INTO `orders`(
        `order_id`,
        `customer_id`,
        `employee_id`,
        `status`
    )
VALUES(0, '1', '2', '0'),
    (0, '2', '2', '0'),
    (0, '3', '1', '0'),
    (0, '1', '1', '0'),
    (0, '2', '1', '0'),
    (0, '3', '1', '0'),
    (0, '4', '1', '0'),
    (0, '5', '1', '0') ON DUPLICATE KEY
UPDATE order_id = order_id + 1;
UNLOCK TABLES;
-- DUMP OF TABLE order_items
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`(
    `product_id` INT UNSIGNED NOT NULL,
    `order_id` INT UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    `unit_price` DOUBLE NOT NULL DEFAULT 0,
    PRIMARY KEY(`order_id`, `product_id`),
    UNIQUE INDEX(`order_id`, `product_id`),
    CONSTRAINT fk_1 FOREIGN KEY(`product_id`) REFERENCES `products`(`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_2 FOREIGN KEY(`order_id`) REFERENCES `orders`(`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
LOCK TABLE `order_items` WRITE;
INSERT INTO `order_items`
VALUES(1, 1, 2, 50000),
    (2, 1, 2, 50000),
    (3, 1, 2, 50000),
    (14, 1, 2, 50000),
    (14, 2, 2, 50000),
    (14, 3, 2, 50000),
    (10, 1, 2, 50000),
    (12, 1, 2, 50000),
    (15, 2, 2, 50000),
    (15, 3, 2, 50000),
    (16, 2, 2, 50000),
    (16, 3, 2, 50000),
    (16, 1, 2, 50000),
    (16, 4, 2, 50000),
    (16, 5, 2, 50000);
UNLOCK TABLES;
-- DUMP OF TABLE Importment_requests
DROP TABLE IF EXISTS `importment_requests`;
CREATE TABLE `importment_requests`(
    `request_id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `created_by` INT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `status` INT UNSIGNED NOT NULL DEFAULT 0
);
LOCK TABLE `importment_requests` WRITE;
INSERT INTO `importment_requests`(`request_id`, `created_by`)
VALUES (0, 2),
    (0, 3),
    (0, 2);
UNLOCK TABLES;
-- DUMP OF TABLE import_items
DROP TABLE IF EXISTS `import_items`;
CREATE TABLE `import_items`(
    `request_id` INT UNSIGNED NOT NULL,
    `ingredient_id` INT UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    `unit_price` DOUBLE NOT NULL,
    PRIMARY KEY(`request_id`, `ingredient_id`),
    UNIQUE INDEX(`request_id`, `ingredient_id`),
    FOREIGN KEY(`request_id`) REFERENCES `importment_requests`(`request_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(`ingredient_id`) REFERENCES `ingredients`(`ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;
LOCK TABLE `import_items` WRITE;
INSERT INTO `import_items`(
        `request_id`,
        `ingredient_id`,
        `quantity`,
        `unit_price`
    )
VALUES (1, 1, 10, 5000),
    (1, 2, 5, 5000),
    (2, 5, 5, 5000),
    (2, 6, 5, 5000),
    (2, 7, 5, 5000),
    (3, 5, 5, 6000),
    (3, 8, 5, 6000);
UNLOCK TABLES;
-- DUMP OF TABLE product_include --
DROP TABLE IF EXISTS `product_include`;
CREATE TABLE `product_include`(
    `product_id` INT UNSIGNED NOT NULL,
    `ingredient_id` INT UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    PRIMARY KEY(`product_id`, `ingredient_id`),
    UNIQUE INDEX(`product_id`, `ingredient_id`),
    FOREIGN KEY(`product_id`) REFERENCES `products`(`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(`ingredient_id`) REFERENCES `ingredients`(`ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;
LOCK TABLE `product_include` WRITE;
INSERT INTO `product_include`(
        `product_id`,
        `ingredient_id`,
        `quantity`
    )
VALUES(1, 28, 5),
    (2, 9, 4),
    (3, 12, 4),
    (4, 3, 3),
    (5, 17, 3),
    (6, 9, 3),
    (7, 11, 3),
    (8, 25, 5),
    (9, 19, 4),
    (10, 16, 2),
    (11, 18, 3),
    (12, 16, 5),
    (13, 26, 1),
    (14, 8, 2),
    (15, 23, 5),
    (16, 7, 5),
    (17, 22, 4),
    (18, 16, 4),
    (19, 8, 3),
    (20, 9, 3),
    (21, 16, 2),
    (22, 5, 2),
    (23, 18, 3),
    (24, 25, 1),
    (25, 20, 2),
    (26, 26, 3),
    (27, 2, 1),
    (28, 18, 3),
    (29, 1, 1),
    (30, 22, 3),
    (31, 25, 2),
    (32, 22, 4),
    (33, 22, 2),
    (34, 10, 3),
    (35, 22, 2),
    (36, 12, 5),
    (37, 23, 4),
    (38, 23, 1),
    (39, 18, 1),
    (40, 21, 5),
    (41, 14, 4),
    (42, 31, 3),
    (43, 6, 4),
    (44, 13, 5),
    (45, 10, 5),
    (46, 12, 2),
    (47, 5, 4),
    (48, 25, 1),
    (49, 9, 4),
    (50, 28, 2),
    (51, 3, 3),
    (52, 25, 4),
    (53, 5, 3),
    (54, 29, 3),
    (55, 1, 5),
    (56, 11, 3),
    (57, 21, 4),
    (17, 13, 1),
    (4, 18, 3),
    (10, 13, 3),
    (9, 20, 4),
    (30, 27, 4),
    (23, 5, 3),
    (47, 17, 3),
    (40, 30, 1),
    (39, 8, 2),
    (53, 17, 1),
    (10, 17, 5),
    (13, 32, 4),
    (23, 31, 3),
    (1, 7, 2),
    (39, 20, 5),
    (12, 4, 2),
    (40, 10, 4),
    (46, 23, 4),
    (33, 15, 1),
    (7, 30, 1),
    (45, 18, 1),
    (5, 4, 2),
    (7, 9, 3),
    (26, 21, 3),
    (54, 28, 2),
    (48, 29, 4),
    (51, 22, 5),
    (26, 11, 1),
    (23, 7, 3),
    (18, 9, 3),
    (5, 1, 5),
    (35, 15, 5),
    (57, 6, 1),
    (44, 1, 5),
    (19, 1, 5),
    (3, 8, 3),
    (20, 12, 1),
    (35, 3, 4),
    (22, 19, 4),
    (13, 20, 4),
    (31, 20, 2),
    (12, 26, 2),
    (10, 2, 5),
    (2, 18, 4),
    (43, 9, 3),
    (53, 22, 5),
    (36, 15, 2),
    (41, 16, 3),
    (14, 27, 3),
    (17, 23, 5),
    (57, 31, 2),
    (2, 4, 4),
    (52, 16, 1),
    (52, 30, 4),
    (40, 31, 5),
    (9, 22, 4),
    (56, 4, 1),
    (36, 26, 1),
    (1, 26, 2),
    (20, 11, 4),
    (45, 7, 4),
    (8, 21, 2),
    (57, 10, 2),
    (12, 12, 2),
    (29, 19, 3),
    (34, 3, 1),
    (12, 30, 1),
    (41, 5, 2),
    (25, 10, 5),
    (9, 7, 4),
    (16, 20, 4),
    (9, 13, 2),
    (22, 24, 4),
    (44, 16, 1),
    (9, 17, 2),
    (57, 9, 1),
    (10, 9, 5),
    (16, 6, 1),
    (23, 28, 3),
    (15, 27, 1),
    (35, 23, 2),
    (18, 6, 4),
    (24, 6, 3),
    (5, 20, 1),
    (50, 16, 5),
    (26, 3, 4),
    (56, 12, 5),
    (13, 12, 3),
    (22, 7, 2),
    (45, 1, 3),
    (16, 27, 2),
    (33, 27, 3),
    (27, 7, 1);
UNLOCK TABLES;