<?php

namespace Azonpress\Classes\Products;

use Azonpress\Classes\ArrayHelper;
use AzonPressAmazonAPI\AmazonAPI;
use AzonPressAmazonAPI\AmazonUrlBuilder;

class Amazon
{
    private static $btnCache = [];

    public static function storeSearchIndexes()
    {
        return [
            'au' => [
                'Automotive' => 'Automotive',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty',
                'Books' => 'Books',
                'Computers' => 'Computers',
                'Electronics' => 'Electronics',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Clothing & Shoes',
                'GiftCards' => 'Gift Cards',
                'HealthPersonalCare' => 'Health, Household & Personal Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'KindleStore' => 'Kindle Store',
                'Lighting' => 'Lighting',
                'Luggage' => 'Luggage & Travel Gear',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'Movies & TV',
                'Music' => 'CDs & Vinyl',
                'OfficeProducts' => 'Stationery & Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports, Fitness & Outdoors',
                'ToolsAndHomeImprovement' => 'Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VideoGames' => 'Video Games'
            ],
            'br' => [
                'Books' => 'Livros',
                'Computers' => 'Computadores e Informática',
                'Electronics' => 'Eletrônicos',
                'HomeAndKitchen' => 'Casa e Cozinha',
                'KindleStore' => 'Loja Kindle',
                'MobileApps' => 'Apps e Jogos',
                'OfficeProducts' => 'Material para Escritório e Papelaria',
                'ToolsAndHomeImprovement' => 'Ferramentas e Materiais de Construção',
                'VideoGames' => 'Games'
            ],
            'ca' => [
                'Apparel' => 'Clothing & Accessories',
                'Automotive' => 'Automotive',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty',
                'Books' => 'Books',
                'Classical' => 'Classical Music',
                'Electronics' => 'Electronics',
                'EverythingElse' => 'Everything Else',
                'ForeignBooks' => 'English Books',
                'GardenAndOutdoor' => 'Patio, Lawn & Garden',
                'GiftCards' => 'Gift Cards',
                'GroceryAndGourmetFood' => 'Grocery & Gourmet Food',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Health & Personal Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'Industrial' => 'Industrial & Scientific',
                'Jewelry' => 'Jewelry',
                'KindleStore' => 'Kindle Store',
                'Luggage' => 'Luggage & Bags',
                'LuxuryBeauty' => 'Luxury Beauty',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'Movies & TV',
                'Music' => 'Music',
                'MusicalInstruments' => 'Musical Instruments, Stage & Studio',
                'OfficeProducts' => 'Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Shoes' => 'Shoes & Handbags',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports & Outdoors',
                'ToolsAndHomeImprovement' => 'Tools & Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VHS' => 'VHS',
                'VideoGames' => 'Video Games',
                'Watches' => 'Watches'
            ],
            'fr' => [
                'Apparel' => 'Vêtements et accessoires',
                'Appliances' => 'Gros électroménager',
                'Automotive' => 'Auto et Moto',
                'Baby' => 'Bébés & Puériculture',
                'Beauty' => 'Beauté et Parfum',
                'Books' => 'Livres en français',
                'Computers' => 'Informatique',
                'DigitalMusic' => 'Téléchargement de musique',
                'Electronics' => 'High-Tech',
                'EverythingElse' => 'Autres',
                'Fashion' => 'Mode',
                'ForeignBooks' => 'Livres anglais et étrangers',
                'GardenAndOutdoor' => 'Jardin',
                'GiftCards' => 'Boutique chèques-cadeaux',
                'GroceryAndGourmetFood' => 'Epicerie',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Hygiène et Santé',
                'HomeAndKitchen' => 'Cuisine & Maison',
                'Industrial' => 'Secteur industriel & scientifique',
                'Jewelry' => 'Bijoux',
                'KindleStore' => 'Boutique Kindle',
                'Lighting' => 'Luminaires et Eclairage',
                'Luggage' => 'Bagages',
                'LuxuryBeauty' => 'Beauté Prestige',
                'MobileApps' => 'Applis & Jeux',
                'MoviesAndTV' => 'DVD & Blu-ray',
                'Music' => 'Musique : CD & Vinyles',
                'MusicalInstruments' => 'Instruments de musique & Sono',
                'OfficeProducts' => 'Fournitures de bureau',
                'PetSupplies' => 'Animalerie',
                'Shoes' => 'Chaussures et Sacs',
                'Software' => 'Logiciels',
                'SportsAndOutdoors' => 'Sports et Loisirs',
                'ToolsAndHomeImprovement' => 'Bricolage',
                'ToysAndGames' => 'Jeux et Jouets',
                'VHS' => 'VHS',
                'VideoGames' => 'Jeux vidéo',
                'Watches' => 'Montres'
            ],
            'de' => [
                'AmazonVideo' => 'Prime Video',
                'Apparel' => 'Bekleidung',
                'Appliances' => 'Elektro-Großgeräte',
                'Automotive' => 'Auto & Motorrad',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty',
                'Books' => 'Bücher',
                'Classical' => 'Klassik',
                'Computers' => 'Computer & Zubehör',
                'DigitalMusic' => 'Musik-Downloads',
                'Electronics' => 'Elektronik & Foto',
                'EverythingElse' => 'Sonstiges',
                'Fashion' => 'Fashion',
                'ForeignBooks' => 'Bücher (Fremdsprachig)',
                'GardenAndOutdoor' => 'Garten',
                'GiftCards' => 'Geschenkgutscheine',
                'GroceryAndGourmetFood' => 'Lebensmittel & Getränke',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Drogerie & Körperpflege',
                'HomeAndKitchen' => 'Küche, Haushalt & Wohnen',
                'Industrial' => 'Gewerbe, Industrie & Wissenschaft',
                'Jewelry' => 'Schmuck',
                'KindleStore' => 'Kindle-Shop',
                'Lighting' => 'Beleuchtung',
                'Luggage' => 'Koffer, Rucksäcke & Taschen',
                'LuxuryBeauty' => 'Luxury Beauty',
                'Magazines' => 'Zeitschriften',
                'MobileApps' => 'Apps & Spiele',
                'MoviesAndTV' => 'DVD & Blu-ray',
                'Music' => 'Musik-CDs & Vinyl',
                'MusicalInstruments' => 'Musikinstrumente & DJ-Equipment',
                'OfficeProducts' => 'Bürobedarf & Schreibwaren',
                'PetSupplies' => 'Haustier',
                'Photo' => 'Kamera & Foto',
                'Shoes' => 'Schuhe & Handtaschen',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sport & Freizeit',
                'ToolsAndHomeImprovement' => 'Baumarkt',
                'ToysAndGames' => 'Spielzeug',
                'VHS' => 'VHS',
                'VideoGames' => 'Games',
                'Watches' => 'Uhren'
            ],
            'in' => [
                'Apparel' => 'Clothing & Accessories',
                'Appliances' => 'Appliances',
                'Automotive' => 'Car & Motorbike',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty',
                'Books' => 'Books',
                'Collectibles' => 'Collectibles',
                'Computers' => 'Computers & Accessories',
                'Electronics' => 'Electronics',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Amazon Fashion',
                'Furniture' => 'Furniture',
                'GardenAndOutdoor' => 'Garden & Outdoors',
                'GiftCards' => 'Gift Cards',
                'GroceryAndGourmetFood' => 'Grocery & Gourmet Foods',
                'HealthPersonalCare' => 'Health & Personal Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'Industrial' => 'Industrial & Scientific',
                'Jewelry' => 'Jewellery',
                'KindleStore' => 'Kindle Store',
                'Luggage' => 'Luggage & Bags',
                'LuxuryBeauty' => 'Luxury Beauty',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'Movies & TV Shows',
                'Music' => 'Music',
                'MusicalInstruments' => 'Musical Instruments',
                'OfficeProducts' => 'Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Shoes' => 'Shoes & Handbags',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports, Fitness & Outdoors',
                'ToolsAndHomeImprovement' => 'Tools & Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VideoGames' => 'Video Games',
                'Watches' => 'Watches'
            ],
            'it' => [
                'Apparel' => 'Abbigliamento',
                'Appliances' => 'Grandi elettrodomestici',
                'Automotive' => 'Auto e Moto',
                'Baby' => 'Prima infanzia',
                'Beauty' => 'Bellezza',
                'Books' => 'Libri',
                'Computers' => 'Informatica',
                'DigitalMusic' => 'Musica Digitale',
                'Electronics' => 'Elettronica',
                'EverythingElse' => 'Altro',
                'Fashion' => 'Moda',
                'ForeignBooks' => 'Libri in altre lingue',
                'GardenAndOutdoor' => 'Giardino e giardinaggio',
                'GiftCards' => 'Buoni Regalo',
                'GroceryAndGourmetFood' => 'Alimentari e cura della casa',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Salute e cura della persona',
                'HomeAndKitchen' => 'Casa e cucina',
                'Industrial' => 'Industria e Scienza',
                'Jewelry' => 'Gioielli',
                'KindleStore' => 'Kindle Store',
                'Lighting' => 'Illuminazione',
                'Luggage' => 'Valigeria',
                'MobileApps' => 'App e Giochi',
                'MoviesAndTV' => 'Film e TV',
                'Music' => 'CD e Vinili',
                'MusicalInstruments' => 'Strumenti musicali e DJ',
                'OfficeProducts' => 'Cancelleria e prodotti per ufficio',
                'PetSupplies' => 'Prodotti per animali domestici',
                'Shoes' => 'Scarpe e borse',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sport e tempo libero',
                'ToolsAndHomeImprovement' => 'Fai da te',
                'ToysAndGames' => 'Giochi e giocattoli',
                'VideoGames' => 'Videogiochi',
                'Watches' => 'Orologi'
            ],
            'jp' => [
                'AmazonVideo' => 'Prime Video',
                'Apparel' => 'Clothing & Accessories',
                'Appliances' => 'Large Appliances',
                'Automotive' => 'Car & Bike Products',
                'Baby' => 'Baby & Maternity',
                'Beauty' => 'Beauty',
                'Books' => 'Japanese Books',
                'Classical' => 'Classical',
                'Computers' => 'Computers & Accessories',
                'CreditCards' => 'Credit Cards',
                'DigitalMusic' => 'Digital Music',
                'Electronics' => 'Electronics & Cameras',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Fashion',
                'FashionBaby' => 'Kids & Baby',
                'FashionMen' => 'Men',
                'FashionWomen' => 'Women',
                'ForeignBooks' => 'English Books',
                'GiftCards' => 'Gift Cards',
                'GroceryAndGourmetFood' => 'Food & Beverage',
                'HealthPersonalCare' => 'Health & Personal Care',
                'Hobbies' => 'Hobby',
                'HomeAndKitchen' => 'Kitchen & Housewares',
                'Industrial' => 'Industrial & Scientific',
                'Jewelry' => 'Jewelry',
                'KindleStore' => 'Kindle Store',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'Movies & TV',
                'Music' => 'Music',
                'MusicalInstruments' => 'Musical Instruments',
                'OfficeProducts' => 'Stationery and Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Shoes' => 'Shoes & Bags',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports',
                'ToolsAndHomeImprovement' => 'DIY, Tools & Garden',
                'Toys' => 'Toys',
                'VideoGames' => 'Computer & Video Games',
                'Watches' => 'Watches'
            ],
            'mx' => [
                'Automotive' => 'Auto',
                'Baby' => 'Bebé',
                'Books' => 'Libros',
                'Electronics' => 'Electrónicos',
                'Fashion' => 'Ropa, Zapatos y Accesorios',
                'FashionBaby' => 'Ropa, Zapatos y Accesorios Bebé',
                'FashionBoys' => 'Ropa, Zapatos y Accesorios Niños',
                'FashionGirls' => 'Ropa, Zapatos y Accesorios Niñas',
                'FashionMen' => 'Ropa, Zapatos y Accesorios Hombres',
                'FashionWomen' => 'Ropa, Zapatos y Accesorios Mujeres',
                'GroceryAndGourmetFood' => 'Alimentos y Bebidas',
                'Handmade' => 'Productos Handmade',
                'HealthPersonalCare' => 'Salud, Belleza y Cuidado Personal',
                'HomeAndKitchen' => 'Hogar y Cocina',
                'IndustrialAndScientific' => 'Industria y ciencia',
                'KindleStore' => 'Tienda Kindle',
                'MoviesAndTV' => 'Películas y Series de TV',
                'Music' => 'Música',
                'MusicalInstruments' => 'Instrumentos musicales',
                'OfficeProducts' => 'Oficina y Papelería',
                'PetSupplies' => 'Mascotas',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Deportes y Aire Libre',
                'ToolsAndHomeImprovement' => 'Herramientas y Mejoras del Hogar',
                'ToysAndGames' => 'Juegos y juguetes',
                'VideoGames' => 'Videojuegos',
                'Watches' => 'Relojes'
            ],
            'sg' => [
                'Automotive' => 'Automotive',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty & Personal Care',
                'Computers' => 'Computers',
                'Electronics' => 'Electronics',
                'GroceryAndGourmetFood' => 'Grocery',
                'HealthPersonalCare' => 'Health, Household & Personal Care',
                'HomeAndKitchen' => 'Home, Kitchen & Dining',
                'OfficeProducts' => 'Office Products',
                'PetSupplies' => 'Pet Supplies',
                'SportsAndOutdoors' => 'Sports & Outdoors',
                'ToolsAndHomeImprovement' => 'Tools & Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VideoGames' => 'Video Games'
            ],
            'es' => [
                'Apparel' => 'Ropa y accesorios',
                'Appliances' => 'Grandes electrodomésticos',
                'Automotive' => 'Coche y moto',
                'Baby' => 'Bebé',
                'Beauty' => 'Belleza',
                'Books' => 'Libros',
                'Computers' => 'Informática',
                'DigitalMusic' => 'Música Digital',
                'Electronics' => 'Electrónica',
                'EverythingElse' => 'Otros Productos',
                'Fashion' => 'Moda',
                'ForeignBooks' => 'Libros en idiomas extranjeros',
                'GardenAndOutdoor' => 'Jardín',
                'GiftCards' => 'Cheques regalo',
                'GroceryAndGourmetFood' => 'Alimentación y bebidas',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Salud y cuidado personal',
                'HomeAndKitchen' => 'Hogar y cocina',
                'Industrial' => 'Industria y ciencia',
                'Jewelry' => 'Joyería',
                'KindleStore' => 'Tienda Kindle',
                'Lighting' => 'Iluminación',
                'Luggage' => 'Equipaje',
                'MobileApps' => 'Appstore para Android',
                'MoviesAndTV' => 'Películas y TV',
                'Music' => 'Música: CDs y vinilos',
                'MusicalInstruments' => 'Instrumentos musicales',
                'OfficeProducts' => 'Oficina y papelería',
                'PetSupplies' => 'Productos para mascotas',
                'Shoes' => 'Zapatos y complementos',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Deportes y aire libre',
                'ToolsAndHomeImprovement' => 'Bricolaje y herramientas',
                'ToysAndGames' => 'Juguetes y juegos',
                'Vehicles' => 'Coche - renting',
                'VideoGames' => 'Videojuegos',
                'Watches' => 'Relojes'
            ],
            'tr' => [
                'Baby' => 'Bebek',
                'Books' => 'Kitaplar',
                'Computers' => 'Bilgisayarlar',
                'Electronics' => 'Elektronik',
                'EverythingElse' => 'Diğer Her Şey',
                'Fashion' => 'Moda',
                'HomeAndKitchen' => 'Ev ve Mutfak',
                'OfficeProducts' => 'Ofis Ürünleri',
                'SportsAndOutdoors' => 'Spor',
                'ToolsAndHomeImprovement' => 'Yapı Market',
                'ToysAndGames' => 'Oyuncaklar ve Oyunlar',
                'VideoGames' => 'PC ve Video Oyunları'
            ],
            'ae' => [
                'Appliances' => 'Appliances',
                'ArtsAndCrafts' => 'Arts, Crafts & Sewing',
                'Automotive' => 'Automotive Parts & Accessories',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty & Personal Care',
                'Books' => 'Books',
                'Computers' => 'Computers',
                'Electronics' => 'Electronics',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Clothing, Shoes & Jewelry',
                'GardenAndOutdoor' => 'Home & Garden',
                'GroceryAndGourmetFood' => 'Grocery & Gourmet Food',
                'HealthPersonalCare' => 'Health, Household & Baby Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'Industrial' => 'Industrial & Scientific',
                'Lighting' => 'Lighting',
                'MusicalInstruments' => 'Musical Instruments',
                'OfficeProducts' => 'Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports',
                'ToolsAndHomeImprovement' => 'Tools & Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VideoGames' => 'Video Games'
            ],
            'uk' => [
                'AmazonVideo' => 'Amazon Video',
                'Apparel' => 'Clothing',
                'Appliances' => 'Large Appliances',
                'Automotive' => 'Car & Motorbike',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty',
                'Books' => 'Books',
                'Classical' => 'Classical Music',
                'Computers' => 'Computers & Accessories',
                'DigitalMusic' => 'Digital Music',
                'Electronics' => 'Electronics & Photo',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Fashion',
                'GardenAndOutdoor' => 'Garden & Outdoors',
                'GiftCards' => 'Gift Cards',
                'GroceryAndGourmetFood' => 'Grocery',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Health & Personal Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'Industrial' => 'Industrial & Scientific',
                'Jewelry' => 'Jewellery',
                'KindleStore' => 'Kindle Store',
                'Lighting' => 'Lighting',
                'Luggage' => 'Luggage',
                'LuxuryBeauty' => 'Luxury Beauty',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'DVD & Blu-ray',
                'Music' => 'CDs & Vinyl',
                'MusicalInstruments' => 'Musical Instruments & DJ',
                'OfficeProducts' => 'Stationery & Office Supplies',
                'PetSupplies' => 'Pet Supplies',
                'Shoes' => 'Shoes & Bags',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports & Outdoors',
                'ToolsAndHomeImprovement' => 'DIY & Tools',
                'ToysAndGames' => 'Toys & Games',
                'VHS' => 'VHS',
                'VideoGames' => 'PC & Video Games',
                'Watches' => 'Watches'
            ],
            'com' => [
                'AmazonVideo' => 'Prime Video',
                'Apparel' => 'Clothing & Accessories',
                'Appliances' => 'Appliances',
                'ArtsAndCrafts' => 'Arts, Crafts & Sewing',
                'Automotive' => 'Automotive Parts & Accessories',
                'Baby' => 'Baby',
                'Beauty' => 'Beauty & Personal Care',
                'Books' => 'Books',
                'Classical' => 'Classical',
                'Collectibles' => 'Collectibles & Fine Art',
                'Computers' => 'Computers',
                'DigitalMusic' => 'Digital Music',
                'DigitalEducationalResources' => 'Digital Educational Resources',
                'Electronics' => 'Electronics',
                'EverythingElse' => 'Everything Else',
                'Fashion' => 'Clothing, Shoes & Jewelry',
                'FashionBaby' => 'Clothing, Shoes & Jewelry Baby',
                'FashionBoys' => 'Clothing, Shoes & Jewelry Boys',
                'FashionGirls' => 'Clothing, Shoes & Jewelry Girls',
                'FashionMen' => 'Clothing, Shoes & Jewelry Men',
                'FashionWomen' => 'Clothing, Shoes & Jewelry Women',
                'GardenAndOutdoor' => 'Garden & Outdoor',
                'GiftCards' => 'Gift Cards',
                'GroceryAndGourmetFood' => 'Grocery & Gourmet Food',
                'Handmade' => 'Handmade',
                'HealthPersonalCare' => 'Health, Household & Baby Care',
                'HomeAndKitchen' => 'Home & Kitchen',
                'Industrial' => 'Industrial & Scientific',
                'Jewelry' => 'Jewelry',
                'KindleStore' => 'Kindle Store',
                'LocalServices' => 'Home & Business Services',
                'Luggage' => 'Luggage & Travel Gear',
                'LuxuryBeauty' => 'Luxury Beauty',
                'Magazines' => 'Magazine Subscriptions',
                'MobileAndAccessories' => 'Cell Phones & Accessories',
                'MobileApps' => 'Apps & Games',
                'MoviesAndTV' => 'Movies & TV',
                'Music' => 'CDs & Vinyl',
                'MusicalInstruments' => 'Musical Instruments',
                'OfficeProducts' => 'Office Products',
                'PetSupplies' => 'Pet Supplies',
                'Photo' => 'Camera & Photo',
                'Shoes' => 'Shoes',
                'Software' => 'Software',
                'SportsAndOutdoors' => 'Sports & Outdoors',
                'ToolsAndHomeImprovement' => 'Tools & Home Improvement',
                'ToysAndGames' => 'Toys & Games',
                'VHS' => 'VHS',
                'VideoGames' => 'Video Games',
                'Watches' => 'Watches',
            ]
        ];
    }

    public static function getStoreSearchIndexes($locale)
    {
        $indexes = self::storeSearchIndexes();
        if (isset($indexes[$locale])) {
            return $indexes[$locale];
        }

        return [];
    }

    public static function getStore($storeId)
    {
        $allStores = static::getStores();
        if (isset($allStores[$storeId])) {
            return $allStores[$storeId];
        }
        return $allStores['com'];
    }

    public static function verifyAmazonApiStatus($credential)
    {
        $urlBuilder = new AmazonUrlBuilder(
            $credential['api_key'],
            $credential['api_secret'],
            $credential['tracking_id'],
            self::getStore($credential['country'])
        );

        $api = new AmazonAPI($urlBuilder, 'array');

        $item = $api->ItemSearch('Kindle');

        if ($item && !is_wp_error($item)) {
            return 'yes';
        }


        if (is_wp_error($item)) {
            throw new \Exception($item->get_error_message());
        }

        return 'no';
    }

    public static function getAmazonCredentials()
    {
        $credentials = get_option('azonpress_amazon_credentials', array());
        $defaults = array(
            'status' => 'no',
            'api_key' => '',
            'api_secret' => '',
            'country' => '',
            'tracking_id' => '',
            'multiple_store' => 'no',
            'caching_hours' => 12,
            'geo_type' => 'none',
            'onlink_code' => '',
            'stores' => array(
                'com.au' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'com.br' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'ca' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'fr' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'de' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'in' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'it' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'co.jp' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'com.mx' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'sg' =>  array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'es' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'com.tr' =>  array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'ae' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'co.uk' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
                'com' => array(
                    'tracking_id' => '',
                    'countries' => array(),
                ),
            )
        );


        $credentials = wp_parse_args($credentials, $defaults);

        $validStoreKeys = array_keys(self::getStores());

        $validStores = ArrayHelper::only($credentials['stores'], $validStoreKeys);

        $validStores = wp_parse_args($validStores, $defaults['stores']);

        $credentials['stores'] = $validStores;

        $store = self::getStore($credentials['country']);
        $credentials['locale'] = $store['locale'];

        if (defined('AZONPRESS_AMAZON_API_KEY')) {
            $credentials['api_key'] = AZONPRESS_AMAZON_API_KEY;
        }
        if (defined('AZONPRESS_AMAZON_API_SECRET')) {
            $credentials['api_secret'] = AZONPRESS_AMAZON_API_SECRET;
        }

        return apply_filters('azonpress_amazon_credentials', $credentials);
    }

    public static function getStores()
    {
        return array(
            'com.au' => array(
                'title' => __('Australia', 'azonpress'),
                'currency' => 'AU$',
                'marketplace' => 'www.amazon.com.au',
                'iso_2_country_code' => 'AU',
                'base_url' => 'https://amazon.com.au',
                'associate_url' => 'https://affiliate-program.amazon.com.au/',
                'api_url' => 'http://associados.amazon.com.au/gp/associates/apply/main.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/au.svg',
                'cart_url' => 'https://www.amazon.com.au/gp/aws/cart/add.html',
                'prime' => '',
                'locale' => 'au',
                'host' => 'webservices.amazon.com.au',
                'region' => 'us-west-2'
            ),
            'com.br' => array(
                'title' => __('Brazil', 'azonpress'),
                'currency' => 'R$',
                'marketplace' => 'www.amazon.com.br',
                'iso_2_country_code' => 'BR',
                'base_url' => 'https://amazon.com.br',
                'associate_url' => 'https://associados.amazon.com.br/',
                'api_url' => 'http://associados.amazon.com.br/gp/associates/apply/main.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/br.svg',
                'cart_url' => 'https://www.amazon.com.br/gp/aws/cart/add.html',
                'prime' => '',
                'locale' => 'br',
                'host' => 'webservices.amazon.com.br',
                'region' => 'us-east-1'
            ),
            'ca' => array(
                'title' => __('Canada', 'azonpress'),
                'base_url' => 'https://amazon.ca',
                'marketplace' => 'www.amazon.ca',
                'currency' => '$',
                'iso_2_country_code' => 'CA',
                'associate_url' => 'https://associates.amazon.ca/',
                'api_url' => 'https://associates.amazon.ca/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/ca.svg',
                'cart_url' => 'https://www.amazon.ca/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.ca/gp/prime',
                'locale' => 'ca',
                'host' => 'webservices.amazon.ca',
                'region' => 'us-east-1'
            ),
            'fr' => array(
                'title' => __('France', 'azonpress'),
                'currency' => '€',
                'iso_2_country_code' => 'FR',
                'associate_url' => 'https://partenaires.amazon.fr/',
                'marketplace' => 'www.amazon.fr',
                'base_url' => 'https://amazon.fr',
                'api_url' => 'https://partenaires.amazon.fr/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/fr.svg',
                'cart_url' => 'https://www.amazon.fr/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.fr/gp/prime',
                'locale' => 'fr',
                'host' => 'webservices.amazon.fr',
                'region' => 'eu-west-1'
            ),
            'de' => array(
                'title' => __('Germany', 'azonpress'),
                'currency' => '€',
                'iso_2_country_code' => 'DE',
                'base_url' => 'https://amazon.de',
                'marketplace' => 'www.amazon.de',
                'associate_url' => 'https://partnernet.amazon.de/',
                'api_url' => 'https://partnernet.amazon.de/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/de.svg',
                'cart_url' => 'https://www.amazon.de/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.de/gp/prime',
                'locale' => 'de',
                'host' => 'webservices.amazon.de',
                'region' => 'eu-west-1'
            ),
            'in' => array(
                'title' => __('India', 'azonpress'),
                'currency' => '₹',
                'iso_2_country_code' => 'IN',
                'base_url' => 'https://amazon.in',
                'marketplace' => 'www.amazon.in',
                'associate_url' => 'https://affiliate-program.amazon.in/',
                'api_url' => 'http://affiliate-program.amazon.in/gp/associates/apply/main.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/in.svg',
                'cart_url' => 'https://www.amazon.in/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.in/gp/prime',
                'locale' => 'in',
                'host' => 'webservices.amazon.in',
                'region' => 'eu-west-1'
            ),
            'it' => array(
                'title' => __('Italy', 'azonpress'),
                'currency' => '€',
                'iso_2_country_code' => 'IT',
                'base_url' => 'https://amazon.it',
                'marketplace' => 'www.amazon.it',
                'associate_url' => 'https://programma-affiliazione.amazon.it/',
                'api_url' => 'https://programma-affiliazione.amazon.it/gp/advertising/api/detail/main.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/it.svg',
                'cart_url' => 'https://www.amazon.it/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.it/gp/prime',
                'locale' => 'it',
                'host' => 'webservices.amazon.it',
                'region' => 'eu-west-1'
            ),
            'co.jp' => array(
                'title' => __('Japan', 'azonpress'),
                'currency' => '￥',
                'iso_2_country_code' => 'JP',
                'base_url' => 'https://amazon.co.jp',
                'marketplace' => 'www.amazon.co.jp',
                'associate_url' => 'https://affiliate.amazon.co.jp/',
                'api_url' => 'https://affiliate-program.amazon.com/gp/flex/advertising/api/sign-in-jp.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/jp.svg',
                'cart_url' => 'https://www.amazon.co.jp/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.co.jp/gp/prime',
                'locale' => 'jp',
                'host' => 'webservices.amazon.co.jp',
                'region' => 'us-west-2'
            ),
            'com.mx' => array(
                'title' => __('Mexico', 'azonpress'),
                'currency' => '$',
                'iso_2_country_code' => 'MX',
                'base_url' => 'https://amazon.com.mx',
                'marketplace' => 'www.amazon.com.mx',
                'associate_url' => 'https://afiliados.amazon.com.mx/gp/associates/join/landing/main.html',
                'api_url' => 'https://afiliados.amazon.com.mx/gp/advertising/api/detail/main.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/mx.svg',
                'cart_url' => 'https://www.amazon.com.mx/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.com.mx/gp/prime',
                'locale' => 'mx',
                'host' => 'webservices.amazon.com.mx',
                'region' => 'us-east-1'
            ),
            'sg' => array(
                'title' => __('Singapore', 'azonpress'),
                'currency' => 'S$',
                'iso_2_country_code' => 'SG',
                'base_url' => 'https://amazon.sg',
                'marketplace' => 'www.amazon.sg',
                'associate_url' => 'https://affiliate-program.amazon.sg/',
                'api_url' => 'https://affiliate-program.amazon.sg/',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/sg.svg',
                'cart_url' => 'https://www.amazon.sg/gp/aws/cart/add.html',
                'prime' => '',
                'locale' => 'sg',
                'host' => 'webservices.amazon.sg',
                'region' => 'us-west-2'
            ),
            'es' => array(
                'title' => __('Spain', 'azonpress'),
                'base_url' => 'https://amazon.es',
                'currency' => '€',
                'iso_2_country_code' => 'ES',
                'marketplace' => 'www.amazon.es',
                'associate_url' => 'https://afiliados.amazon.es/',
                'api_url' => 'https://afiliados.amazon.es/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/es.svg',
                'cart_url' => 'https://www.amazon.es/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.es/gp/prime',
                'locale' => 'es',
                'host' => 'webservices.amazon.es',
                'region' => 'eu-west-1'
            ),
            'com.tr' => array(
                'title' => __('Turkey', 'azonpress'),
                'currency' => '₺',
                'iso_2_country_code' => 'TR',
                'base_url' => 'https://amazon.com.tr',
                'marketplace' => 'www.amazon.com.tr',
                'associate_url' => 'https://gelirortakligi.amazon.com.tr/',
                'api_url' => 'https://gelirortakligi.amazon.com.tr/',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/tr.svg',
                'cart_url' => 'https://www.amazon.tr/gp/aws/cart/add.html',
                'prime' => '',
                'locale' => 'tr',
                'host' => 'webservices.amazon.com.tr',
                'region' => 'eu-west-1'
            ),
            'ae' => array(
                'title' => __('United Arab Emirates', 'azonpress'),
                'currency' => 'AED',
                'iso_2_country_code' => 'AE',
                'base_url' => 'https://amazon.ae',
                'marketplace' => 'www.amazon.ae',
                'associate_url' => 'https://affiliate-program.amazon.ae/',
                'api_url' => 'https://affiliate-program.amazon.ae/',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/ae.svg',
                'cart_url' => 'https://www.amazon.ae/gp/aws/cart/add.html',
                'prime' => '',
                'locale' => 'ae',
                'host' => 'webservices.amazon.ae',
                'region' => 'eu-west-1'
            ),
            'co.uk' => array(
                'title' => __('UK', 'azonpress'),
                'currency' => '£',
                'iso_2_country_code' => 'GB',
                'base_url' => 'https://amazon.co.uk',
                'marketplace' => 'www.amazon.co.uk',
                'associate_url' => 'https://affiliate-program.amazon.co.uk/',
                'api_url' => 'https://affiliate-program.amazon.co.uk/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/uk.svg',
                'cart_url' => 'https://www.amazon.co.uk/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.co.uk/gp/prime',
                'locale' => 'uk',
                'host' => 'webservices.amazon.co.uk',
                'region' => 'eu-west-1'
            ),
            'com' => array(
                'title' => __('US', 'azonpress'),
                'currency' => '$',
                'iso_2_country_code' => 'US',
                'base_url' => 'https://amazon.com',
                'marketplace' => 'www.amazon.com',
                'associate_url' => 'https://affiliate-program.amazon.com/',
                'api_url' => 'https://affiliate-program.amazon.com/gp/flex/advertising/api/sign-in.html',
                'icon_svg' => AZONPRESS_PLUGIN_URL . 'public/images/flags/us.svg',
                'cart_url' => 'https://www.amazon.com/gp/aws/cart/add.html',
                'prime' => 'https://www.amazon.com/gp/prime',
                'locale' => 'com',
                'host' => 'webservices.amazon.com',
                'region' => 'us-east-1'
            )
        );
    }

    public static function getGeoTargetingType()
    {
        $credentials = self::getAmazonCredentials();
        return ArrayHelper::get($credentials, 'geo_type', 'none');
    }

    public static function getAppearanceSettings($scope = 'public')
    {
        $settings = get_option('azonpress_appearance_settings', array());

        $globalDefaults = array(
            'new_tab' => 'yes',
            'nofollow' => 'yes',
            'noindex' => 'no',
            'hide_label' => 'no',
            'hide_price' => 'no',
            'ui_styles' => 'azp_modern',
            'hide_prime_status' => 'no',
            'buy_now_btn' => 'custom_1',
            'add_to_cart_btn' => 'buy1',
            'disclaimer_visibility' => 'no',
            'disclaimer_text' => "Last update on %last_update% // Source: Amazon Affiliates",
            'add_to_cart_btn_text' => __('Buy On Amazon', 'azonpress'),
            'buy_now_btn_text' => __('Buy On Amazon', 'azonpress')
        );

        if (!isset($settings['global']['ui_styles'])) {
            $settings['global']['ui_styles'] = 'azp_modern';
        }

        if (!isset($settings['global']['add_to_cart_btn'])) {
            $settings['global']['add_to_cart_btn'] = $globalDefaults['add_to_cart_btn'];
        }

        if (!isset($settings['global']['buy_now_btn'])) {
            $settings['global']['buy_now_btn'] = $globalDefaults['buy_now_btn'];
        }

        if (!isset($settings['global']['buy_now_btn_text'])) {
            $settings['global']['buy_now_btn_text'] = 'Buy On Amazon';
        }

        $settings = wp_parse_args($settings, array(
            'global' => $globalDefaults
        ));

        if (!isset($settings['global']['button_styles'])) {
            $settings['global']['button_styles'] = [
                'normal_styles' => [
                    'backgroundColor' => '',
                    'color' => '',
                    'borderColor' => '',
                    'borderRadius' => '',
                    'minWidth' => '',
                    'lineHeight' => ''
                ],
                'hover_styles' => [
                    'backgroundColor' => '',
                    'color' => '',
                    'borderColor' => ''
                ],
                'use_shadow' => 'no',
                'extra_css_class' => ''
            ];
        }

        return apply_filters('azonpress_appearance_settings', $settings);
    }

    public static function getButtonStyles()
    {
        $buttons = array(
            'buy1' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/buy1.gif'
            ),
            'buy2' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/buy2.gif'
            ),
            'buy3' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/buy3.gif'
            ),
            'buy4' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/buy4.gif'
            ),
            'buy5' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/buy5.gif'
            ),
            'custom_1' => array(
                'type' => 'image',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/custom_1.png',
            ),
            'custom_3' => array(
                'type' => 'custom',
                'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/custom_3.png',
                'btn_class' => 'azp_custom_btn_3',
                'btn_text' => 'Buy On Amazon'
            )
        );

        $buttons = apply_filters('azonpress_button_styles', $buttons);
        $buttons['default'] = array(
            'type' => 'custom',
            'url' => AZONPRESS_PLUGIN_URL . 'public/images/amazon_buttons/custom_2.png',
            'btn_class' => 'azp_custom_btn_1',
            'btn_text' => 'Buy On Amazon'
        );
        return $buttons;
    }

    public static function getPageIndex()
    {
        $appearanceSettings = self::getAppearanceSettings('public');
        $appearanceSettings = $appearanceSettings['global'];
        return ArrayHelper::get($appearanceSettings, 'noindex');
    }

    public static function getButtonStyle($type = 'buy', $btn_type = '', $btn_text = '')
    {
        $key = $type . '_' . $btn_type . '_' . $btn_text;
        if (isset(self::$btnCache[$key])) {
            return self::$btnCache[$key];
        }

        $appearanceSettings = self::getAppearanceSettings('public');

        $appearanceSettings = $appearanceSettings['global'];

        if ($type == 'buy') {
            $buttonStyle = $appearanceSettings['buy_now_btn'];
            // if button text not set then
            if (isset($appearanceSettings['buy_now_btn_text'])) {
                $buttonText = $appearanceSettings['buy_now_btn_text'];
            } else {
                $buttonText = "";
            }
        } else {
            $buttonStyle = ArrayHelper::get($appearanceSettings, 'add_to_cart_btn');
            $buttonText = ArrayHelper::get($appearanceSettings, 'add_to_cart_btn_text');
        }

        if ($btn_type) {
            $buttonStyle = $btn_type;
        }
        if ($btn_text) {
            $buttonText = $btn_text;
        }

        $buttonStyles = self::getButtonStyles();

        if (isset($buttonStyles[$buttonStyle])) {
            $button = $buttonStyles[$buttonStyle];
        } else {
            $button = $buttonStyles['default'];
        }

        if ($btn_text) {
            $button['btn_text'] = $btn_text;
        }

        $attributes = [
            'class' => 'azp-url azp_button_url azp_button_type_' . $button['type']
        ];

        if (isset($appearanceSettings['nofollow']) && $appearanceSettings['nofollow'] == 'yes') {
            $attributes['rel'] = 'nofollow noopener';
        }

        if (isset($appearanceSettings['new_tab']) && $appearanceSettings['new_tab'] == 'yes') {
            $attributes['target'] = '_blank';
        }

        if ($button['type'] == 'custom') {
            if (!$buttonText) {
                $buttonText = __('Buy on Amazon', 'azonpress');
            }
            $button['btn_text'] = $buttonText;

            $extra_class = ArrayHelper::get($appearanceSettings, 'button_styles.extra_css_class');
            if ($extra_class) {
                $attributes['class'] .= ' ' . $extra_class;
            }
            $attributes['class'] .= ' ' . ArrayHelper::get($button, 'btn_class');
        }

        $atts = ' ';

        foreach ($attributes as $atKey => $atValue) {
            $atts .= $atKey . '="' . $atValue . '" ';
        }

        $button['atts'] = $atts;

        $button['custom_styles'] = ArrayHelper::get($appearanceSettings, 'button_styles');

        self::$btnCache[$key] = $button;

        return self::$btnCache[$key];
    }

    public static function getCountries()
    {
        $countries = array();
        foreach (require __DIR__ . "/CountryList.php" as $key => $value) {
            $countries[] = array('label' => $value, 'value' => $key);
        }
        return (object)$countries;
    }

    public static function getAssociateTag()
    {
        $credential = self::getAmazonCredentials();
        return $credential['tracking_id'];
    }

    public static function getPrimaryStore()
    {
        $credential = self::getAmazonCredentials();
        $country = $credential['country'];
        $stores = self::getStores();
        if (isset($stores[$country])) {
            return $stores[$country];
        }

        return $stores['com'];
    }

    public static function getProductCategories()
    {
        $credential = self::getAmazonCredentials();
        return self::getStoreSearchIndexes($credential['locale']);
    }

    public static function getCurrentStore()
    {
        $credential = self::getAmazonCredentials();
        $country = $credential['country'];
        return self::getStore($country);
    }
}
