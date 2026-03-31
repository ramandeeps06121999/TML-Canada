<?php
/**
 * BATCH GOOGLE ADS PAGE GENERATOR
 *
 * Generates 62 location-specific Google Ads pages from template
 * Automatically substitutes location-specific variables
 *
 * Usage:
 * php batch-generate-google-ads-pages.php
 * php batch-generate-google-ads-pages.php --city=Calgary
 * php batch-generate-google-ads-pages.php --dry-run
 * php batch-generate-google-ads-pages.php --regenerate-all
 */

$options = getopt('', [
    'city:',
    'dry-run',
    'verbose',
    'regenerate-all',
    'help'
]);

if (isset($options['help'])) {
    echo "BATCH GOOGLE ADS PAGE GENERATOR\n";
    echo "================================\n\n";
    echo "Generate 62 location-specific Google Ads pages from template\n\n";
    echo "Usage:\n";
    echo "  php batch-generate-google-ads-pages.php                  # Generate all 62 pages\n";
    echo "  php batch-generate-google-ads-pages.php --city=Calgary   # Generate single city\n";
    echo "  php batch-generate-google-ads-pages.php --dry-run        # Test run (no output)\n";
    echo "  php batch-generate-google-ads-pages.php --verbose        # Detailed output\n";
    echo "  php batch-generate-google-ads-pages.php --regenerate-all # Force regenerate\n";
    exit(0);
}

define('TML_ROOT', dirname(dirname(dirname(__DIR__))));
define('VIEWS_DIR', TML_ROOT . '/php-site/deploy/views');
define('TEMPLATE_FILE', TML_ROOT . '/php-site/deploy/views/google-ads-template.php');

$singleCity = $options['city'] ?? null;
$dryRun = isset($options['dry-run']);
$verbose = isset($options['verbose']);
$regenerateAll = isset($options['regenerate-all']);

echo "🚀 BATCH GOOGLE ADS PAGE GENERATOR\n";
echo "==================================\n\n";

if (!file_exists(TEMPLATE_FILE)) {
    die("❌ Error: Template file not found at " . TEMPLATE_FILE . "\n");
}

$templateContent = file_get_contents(TEMPLATE_FILE);
echo "✅ Loaded template from " . TEMPLATE_FILE . "\n";
echo "📊 Template size: " . round(strlen($templateContent) / 1024, 1) . " KB\n\n";

// Location data
$locationData = [
    'Abbotsford' => ['province' => 'BC', 'population' => '0.141M', 'population_metro' => '0.141M', 'growth' => '1.2%', 'businesses' => '3,200', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Abbotsford, PPC Abbotsford, pay per click Abbotsford', 'neighborhoods' => 'Downtown Abbotsford, West Abbotsford, East Abbotsford', 'industries' => 'Agriculture, Technology, Retail, Professional Services'],
    'Airdrie' => ['province' => 'AB', 'population' => '0.068M', 'population_metro' => '0.068M', 'growth' => '4.2%', 'businesses' => '1,800', 'region' => 'AB North', 'keywords' => 'Google Ads Airdrie, PPC Airdrie, Google Ads management Airdrie', 'neighborhoods' => 'Downtown Airdrie, North Airdrie, South Airdrie', 'industries' => 'Oil & Gas, Technology, Retail'],
    'Barrie' => ['province' => 'ON', 'population' => '0.150M', 'population_metro' => '0.150M', 'growth' => '2.5%', 'businesses' => '3,400', 'region' => 'ON Central', 'keywords' => 'Google Ads Barrie, PPC Barrie, digital marketing Barrie', 'neighborhoods' => 'Downtown Barrie, North Barrie, South Barrie', 'industries' => 'Healthcare, Technology, Retail, Manufacturing'],
    'Brampton' => ['province' => 'ON', 'population' => '0.645M', 'population_metro' => '0.645M', 'growth' => '1.1%', 'businesses' => '12,400', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Brampton, PPC Brampton, paid search Brampton', 'neighborhoods' => 'Downtown Brampton, North Brampton, South Brampton', 'industries' => 'Transportation, Healthcare, Professional Services, Retail'],
    'Brandon' => ['province' => 'MB', 'population' => '0.056M', 'population_metro' => '0.056M', 'growth' => '0.5%', 'businesses' => '1,200', 'region' => 'MB Central', 'keywords' => 'Google Ads Brandon, PPC Brandon, online advertising Brandon', 'neighborhoods' => 'Downtown Brandon, North Brandon, South Brandon', 'industries' => 'Agriculture, Healthcare, Retail, Education'],
    'Brantford' => ['province' => 'ON', 'population' => '0.148M', 'population_metro' => '0.148M', 'growth' => '1.3%', 'businesses' => '2,900', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Brantford, PPC Brantford, Google Ads specialist Brantford', 'neighborhoods' => 'Downtown Brantford, North Brantford, East Brantford', 'industries' => 'Manufacturing, Healthcare, Technology, Professional Services'],
    'Burlington' => ['province' => 'ON', 'population' => '0.186M', 'population_metro' => '0.186M', 'growth' => '1.5%', 'businesses' => '3,500', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Burlington, PPC Burlington, Google advertising Burlington', 'neighborhoods' => 'Downtown Burlington, North Burlington, South Burlington', 'industries' => 'Healthcare, Finance, Professional Services, Retail'],
    'Burnaby' => ['province' => 'BC', 'population' => '0.249M', 'population_metro' => '0.249M', 'growth' => '1.2%', 'businesses' => '5,200', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Burnaby, PPC Burnaby, search advertising Burnaby', 'neighborhoods' => 'Downtown Burnaby, North Burnaby, South Burnaby', 'industries' => 'Technology, Retail, Professional Services, Healthcare'],
    'Calgary' => ['province' => 'AB', 'population' => '1.34M', 'population_metro' => '1.62M', 'growth' => '2.1%', 'businesses' => '31,500', 'region' => 'AB South', 'keywords' => 'Google Ads Calgary, PPC Calgary, paid search Calgary', 'neighborhoods' => 'Downtown Calgary, Southwest Calgary, Northeast Calgary, Northwest Calgary', 'industries' => 'Energy, Technology, Healthcare, Professional Services'],
    'Cambridge' => ['province' => 'ON', 'population' => '0.155M', 'population_metro' => '0.155M', 'growth' => '2.1%', 'businesses' => '3,100', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Cambridge, PPC Cambridge, online ads Cambridge', 'neighborhoods' => 'Downtown Cambridge, North Cambridge, South Cambridge', 'industries' => 'Manufacturing, Technology, Professional Services, Retail'],
    'Charlottetown' => ['province' => 'PE', 'population' => '0.075M', 'population_metro' => '0.075M', 'growth' => '0.8%', 'businesses' => '1,400', 'region' => 'Atlantic', 'keywords' => 'Google Ads Charlottetown, PPC Charlottetown, digital marketing Charlottetown', 'neighborhoods' => 'Downtown Charlottetown, North Charlottetown, South Charlottetown', 'industries' => 'Tourism, Healthcare, Retail, Education'],
    'Chatham' => ['province' => 'ON', 'population' => '0.042M', 'population_metro' => '0.042M', 'growth' => '0.2%', 'businesses' => '900', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Chatham, PPC Chatham, search ads Chatham', 'neighborhoods' => 'Downtown Chatham, North Chatham, East Chatham', 'industries' => 'Agriculture, Healthcare, Retail'],
    'Chilliwack' => ['province' => 'BC', 'population' => '0.088M', 'population_metro' => '0.088M', 'growth' => '2.3%', 'businesses' => '1,700', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Chilliwack, PPC Chilliwack, online advertising Chilliwack', 'neighborhoods' => 'Downtown Chilliwack, North Chilliwack, South Chilliwack', 'industries' => 'Agriculture, Healthcare, Retail, Technology'],
    'Coquitlam' => ['province' => 'BC', 'population' => '0.148M', 'population_metro' => '0.148M', 'growth' => '2.0%', 'businesses' => '3,100', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Coquitlam, PPC Coquitlam, paid search Coquitlam', 'neighborhoods' => 'Downtown Coquitlam, North Coquitlam, Coquitlam Centre', 'industries' => 'Technology, Retail, Professional Services, Healthcare'],
    'Corner Brook' => ['province' => 'NL', 'population' => '0.032M', 'population_metro' => '0.032M', 'growth' => '-0.5%', 'businesses' => '600', 'region' => 'Atlantic', 'keywords' => 'Google Ads Corner Brook, PPC Corner Brook, digital ads Corner Brook', 'neighborhoods' => 'Downtown Corner Brook, North Corner Brook, West Corner Brook', 'industries' => 'Healthcare, Retail, Education, Government'],
    'Edmonton' => ['province' => 'AB', 'population' => '1.24M', 'population_metro' => '1.59M', 'growth' => '3.0%', 'businesses' => '29,894', 'region' => 'AB Central', 'keywords' => 'Google Ads Edmonton, PPC Edmonton, pay per click Edmonton', 'neighborhoods' => 'Downtown Edmonton, West Edmonton, South Edmonton, North Edmonton', 'industries' => 'Healthcare, Oil & Gas, Technology, Professional Services, Trades'],
    'Fredericton' => ['province' => 'NB', 'population' => '0.064M', 'population_metro' => '0.064M', 'growth' => '0.5%', 'businesses' => '1,300', 'region' => 'Atlantic', 'keywords' => 'Google Ads Fredericton, PPC Fredericton, online ads Fredericton', 'neighborhoods' => 'Downtown Fredericton, North Fredericton, South Fredericton', 'industries' => 'Government, Healthcare, Education, Professional Services'],
    'Gatineau' => ['province' => 'QC', 'population' => '0.283M', 'population_metro' => '0.283M', 'growth' => '0.8%', 'businesses' => '5,200', 'region' => 'QC West', 'keywords' => 'Google Ads Gatineau, publicité Google Gatineau, PPC Gatineau', 'neighborhoods' => 'Downtown Gatineau, North Gatineau, South Gatineau', 'industries' => 'Government, Professional Services, Healthcare, Retail'],
    'Grande Prairie' => ['province' => 'AB', 'population' => '0.068M', 'population_metro' => '0.068M', 'growth' => '2.1%', 'businesses' => '1,500', 'region' => 'AB North', 'keywords' => 'Google Ads Grande Prairie, PPC Grande Prairie, digital advertising Grande Prairie', 'neighborhoods' => 'Downtown Grande Prairie, North Grande Prairie, East Grande Prairie', 'industries' => 'Oil & Gas, Agriculture, Retail, Professional Services'],
    'Guelph' => ['province' => 'ON', 'population' => '0.131M', 'population_metro' => '0.131M', 'growth' => '2.4%', 'businesses' => '2,700', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Guelph, PPC Guelph, online marketing Guelph', 'neighborhoods' => 'Downtown Guelph, North Guelph, South Guelph', 'industries' => 'Education, Technology, Manufacturing, Professional Services'],
    'Halifax' => ['province' => 'NS', 'population' => '0.426M', 'population_metro' => '0.426M', 'growth' => '1.2%', 'businesses' => '8,900', 'region' => 'Atlantic', 'keywords' => 'Google Ads Halifax, PPC Halifax, paid search Halifax', 'neighborhoods' => 'Downtown Halifax, North Halifax, South Halifax', 'industries' => 'Healthcare, Government, Tourism, Technology'],
    'Hamilton' => ['province' => 'ON', 'population' => '0.571M', 'population_metro' => '0.751M', 'growth' => '1.4%', 'businesses' => '11,200', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Hamilton, PPC Hamilton, search advertising Hamilton', 'neighborhoods' => 'Downtown Hamilton, North Hamilton, East Hamilton, West Hamilton', 'industries' => 'Manufacturing, Healthcare, Professional Services, Education'],
    'Kamloops' => ['province' => 'BC', 'population' => '0.114M', 'population_metro' => '0.114M', 'growth' => '1.8%', 'businesses' => '2,300', 'region' => 'BC Interior', 'keywords' => 'Google Ads Kamloops, PPC Kamloops, digital marketing Kamloops', 'neighborhoods' => 'Downtown Kamloops, North Kamloops, South Kamloops', 'industries' => 'Mining, Healthcare, Retail, Technology'],
    'Kelowna' => ['province' => 'BC', 'population' => '0.144M', 'population_metro' => '0.144M', 'growth' => '2.9%', 'businesses' => '3,100', 'region' => 'BC Interior', 'keywords' => 'Google Ads Kelowna, PPC Kelowna, online advertising Kelowna', 'neighborhoods' => 'Downtown Kelowna, North Kelowna, South Kelowna', 'industries' => 'Agriculture, Tourism, Healthcare, Retail'],
    'Kingston' => ['province' => 'ON', 'population' => '0.136M', 'population_metro' => '0.136M', 'growth' => '0.7%', 'businesses' => '2,500', 'region' => 'ON East', 'keywords' => 'Google Ads Kingston, PPC Kingston, paid search Kingston', 'neighborhoods' => 'Downtown Kingston, North Kingston, South Kingston', 'industries' => 'Education, Government, Healthcare, Professional Services'],
    'Kitchener' => ['province' => 'ON', 'population' => '0.568M', 'population_metro' => '0.625M', 'growth' => '2.6%', 'businesses' => '11,800', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Kitchener, PPC Kitchener, search ads Kitchener', 'neighborhoods' => 'Downtown Kitchener, North Kitchener, South Kitchener', 'industries' => 'Technology, Manufacturing, Professional Services, Retail'],
    'Langley' => ['province' => 'BC', 'population' => '0.132M', 'population_metro' => '0.132M', 'growth' => '2.1%', 'businesses' => '2,800', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Langley, PPC Langley, online marketing Langley', 'neighborhoods' => 'Downtown Langley, Langley City, Langley Township', 'industries' => 'Agriculture, Healthcare, Retail, Professional Services'],
    'Lethbridge' => ['province' => 'AB', 'population' => '0.097M', 'population_metro' => '0.097M', 'growth' => '1.5%', 'businesses' => '2,100', 'region' => 'AB South', 'keywords' => 'Google Ads Lethbridge, PPC Lethbridge, digital advertising Lethbridge', 'neighborhoods' => 'Downtown Lethbridge, North Lethbridge, South Lethbridge', 'industries' => 'Agriculture, Healthcare, Education, Retail'],
    'London (ON)' => ['province' => 'ON', 'population' => '0.402M', 'population_metro' => '0.543M', 'growth' => '1.8%', 'businesses' => '8,100', 'region' => 'ON Southwest', 'keywords' => 'Google Ads London, PPC London Ontario, search advertising London', 'neighborhoods' => 'Downtown London, North London, South London, East London', 'industries' => 'Healthcare, Education, Technology, Professional Services'],
    'Markham' => ['province' => 'ON', 'population' => '0.328M', 'population_metro' => '0.328M', 'growth' => '1.2%', 'businesses' => '6,500', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Markham, PPC Markham, online advertising Markham', 'neighborhoods' => 'Downtown Markham, North Markham, South Markham', 'industries' => 'Technology, Professional Services, Retail, Healthcare'],
    'Medicine Hat' => ['province' => 'AB', 'population' => '0.075M', 'population_metro' => '0.075M', 'growth' => '1.3%', 'businesses' => '1,700', 'region' => 'AB Southeast', 'keywords' => 'Google Ads Medicine Hat, PPC Medicine Hat, paid search Medicine Hat', 'neighborhoods' => 'Downtown Medicine Hat, North Medicine Hat, South Medicine Hat', 'industries' => 'Energy, Healthcare, Retail, Professional Services'],
    'Mississauga' => ['province' => 'ON', 'population' => '0.822M', 'population_metro' => '0.822M', 'growth' => '1.1%', 'businesses' => '15,800', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Mississauga, PPC Mississauga, search advertising Mississauga', 'neighborhoods' => 'Downtown Mississauga, North Mississauga, South Mississauga', 'industries' => 'Finance, Technology, Professional Services, Healthcare'],
    'Moncton' => ['province' => 'NB', 'population' => '0.143M', 'population_metro' => '0.143M', 'growth' => '0.9%', 'businesses' => '2,800', 'region' => 'Atlantic', 'keywords' => 'Google Ads Moncton, PPC Moncton, digital marketing Moncton', 'neighborhoods' => 'Downtown Moncton, North Moncton, South Moncton', 'industries' => 'Transportation, Healthcare, Retail, Professional Services'],
    'Montreal' => ['province' => 'QC', 'population' => '1.73M', 'population_metro' => '4.27M', 'growth' => '0.5%', 'businesses' => '38,900', 'region' => 'QC South', 'keywords' => 'Google Ads Montréal, publicité Google Montréal, PPC Montréal', 'neighborhoods' => 'Downtown Montreal, West Montreal, East Montreal, North Montreal', 'industries' => 'Aerospace, Pharmaceuticals, Technology, Healthcare'],
    'Moose Jaw' => ['province' => 'SK', 'population' => '0.035M', 'population_metro' => '0.035M', 'growth' => '0.3%', 'businesses' => '700', 'region' => 'SK Central', 'keywords' => 'Google Ads Moose Jaw, PPC Moose Jaw, online ads Moose Jaw', 'neighborhoods' => 'Downtown Moose Jaw, North Moose Jaw, South Moose Jaw', 'industries' => 'Agriculture, Healthcare, Retail'],
    'Nanaimo' => ['province' => 'BC', 'population' => '0.104M', 'population_metro' => '0.104M', 'growth' => '2.1%', 'businesses' => '2,000', 'region' => 'BC Vancouver Island', 'keywords' => 'Google Ads Nanaimo, PPC Nanaimo, digital advertising Nanaimo', 'neighborhoods' => 'Downtown Nanaimo, North Nanaimo, South Nanaimo', 'industries' => 'Tourism, Retail, Healthcare, Professional Services'],
    'New Westminster' => ['province' => 'BC', 'population' => '0.085M', 'population_metro' => '0.085M', 'growth' => '1.5%', 'businesses' => '1,600', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads New Westminster, PPC New Westminster, search ads New Westminster', 'neighborhoods' => 'Downtown New Westminster, North New Westminster', 'industries' => 'Technology, Retail, Professional Services, Healthcare'],
    'Oakville' => ['province' => 'ON', 'population' => '0.211M', 'population_metro' => '0.211M', 'growth' => '1.3%', 'businesses' => '4,100', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Oakville, PPC Oakville, online marketing Oakville', 'neighborhoods' => 'Downtown Oakville, North Oakville, South Oakville', 'industries' => 'Professional Services, Finance, Healthcare, Retail'],
    'Oshawa' => ['province' => 'ON', 'population' => '0.161M', 'population_metro' => '0.323M', 'growth' => '0.9%', 'businesses' => '3,100', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Oshawa, PPC Oshawa, paid search Oshawa', 'neighborhoods' => 'Downtown Oshawa, North Oshawa, South Oshawa', 'industries' => 'Automotive, Healthcare, Professional Services, Retail'],
    'Ottawa' => ['province' => 'ON', 'population' => '1.02M', 'population_metro' => '1.40M', 'growth' => '1.4%', 'businesses' => '21,400', 'region' => 'ON East', 'keywords' => 'Google Ads Ottawa, PPC Ottawa, digital marketing Ottawa', 'neighborhoods' => 'Downtown Ottawa, West Ottawa, East Ottawa, North Ottawa', 'industries' => 'Government, Technology, Healthcare, Professional Services'],
    'Peterborough' => ['province' => 'ON', 'population' => '0.081M', 'population_metro' => '0.081M', 'growth' => '0.8%', 'businesses' => '1,600', 'region' => 'ON Central', 'keywords' => 'Google Ads Peterborough, PPC Peterborough, online advertising Peterborough', 'neighborhoods' => 'Downtown Peterborough, North Peterborough, South Peterborough', 'industries' => 'Manufacturing, Healthcare, Professional Services, Retail'],
    'Prince Albert' => ['province' => 'SK', 'population' => '0.041M', 'population_metro' => '0.041M', 'growth' => '0.2%', 'businesses' => '900', 'region' => 'SK North', 'keywords' => 'Google Ads Prince Albert, PPC Prince Albert, digital ads Prince Albert', 'neighborhoods' => 'Downtown Prince Albert, North Prince Albert, South Prince Albert', 'industries' => 'Healthcare, Retail, Education, Government'],
    'Prince George' => ['province' => 'BC', 'population' => '0.085M', 'population_metro' => '0.085M', 'growth' => '0.3%', 'businesses' => '1,600', 'region' => 'BC North', 'keywords' => 'Google Ads Prince George, PPC Prince George, search advertising Prince George', 'neighborhoods' => 'Downtown Prince George, North Prince George, South Prince George', 'industries' => 'Forestry, Healthcare, Retail, Professional Services'],
    'Quebec City' => ['province' => 'QC', 'population' => '0.542M', 'population_metro' => '0.833M', 'growth' => '0.4%', 'businesses' => '10,800', 'region' => 'QC Central', 'keywords' => 'Google Ads Québec City, publicité Google Québec, PPC Québec', 'neighborhoods' => 'Downtown Quebec City, West Quebec City, East Quebec City', 'industries' => 'Government, Tourism, Healthcare, Professional Services'],
    'Red Deer' => ['province' => 'AB', 'population' => '0.105M', 'population_metro' => '0.105M', 'growth' => '2.2%', 'businesses' => '2,300', 'region' => 'AB Central', 'keywords' => 'Google Ads Red Deer, PPC Red Deer, online marketing Red Deer', 'neighborhoods' => 'Downtown Red Deer, North Red Deer, South Red Deer', 'industries' => 'Oil & Gas, Agriculture, Healthcare, Retail'],
    'Regina' => ['province' => 'SK', 'population' => '0.237M', 'population_metro' => '0.320M', 'growth' => '1.3%', 'businesses' => '4,800', 'region' => 'SK South', 'keywords' => 'Google Ads Regina, PPC Regina, paid search Regina', 'neighborhoods' => 'Downtown Regina, North Regina, South Regina', 'industries' => 'Government, Agriculture, Healthcare, Professional Services'],
    'Richmond Hill' => ['province' => 'ON', 'population' => '0.239M', 'population_metro' => '0.239M', 'growth' => '0.8%', 'businesses' => '4,600', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Richmond Hill, PPC Richmond Hill, online ads Richmond Hill', 'neighborhoods' => 'Downtown Richmond Hill, North Richmond Hill, South Richmond Hill', 'industries' => 'Technology, Professional Services, Healthcare, Retail'],
    'Saint John' => ['province' => 'NB', 'population' => '0.127M', 'population_metro' => '0.180M', 'growth' => '0.1%', 'businesses' => '2,500', 'region' => 'Atlantic', 'keywords' => 'Google Ads Saint John, PPC Saint John, digital marketing Saint John', 'neighborhoods' => 'Downtown Saint John, North Saint John, South Saint John', 'industries' => 'Shipping, Healthcare, Retail, Professional Services'],
    'Saskatoon' => ['province' => 'SK', 'population' => '0.320M', 'population_metro' => '0.382M', 'growth' => '2.1%', 'businesses' => '6,400', 'region' => 'SK North', 'keywords' => 'Google Ads Saskatoon, PPC Saskatoon, search advertising Saskatoon', 'neighborhoods' => 'Downtown Saskatoon, North Saskatoon, South Saskatoon', 'industries' => 'Agriculture, Potash, Healthcare, Professional Services'],
    'Sherbrooke' => ['province' => 'QC', 'population' => '0.180M', 'population_metro' => '0.228M', 'growth' => '0.6%', 'businesses' => '3,600', 'region' => 'QC East', 'keywords' => 'Google Ads Sherbrooke, publicité Google Sherbrooke, PPC Sherbrooke', 'neighborhoods' => 'Downtown Sherbrooke, North Sherbrooke, South Sherbrooke', 'industries' => 'Education, Healthcare, Manufacturing, Professional Services'],
    'St. Catharines' => ['province' => 'ON', 'population' => '0.161M', 'population_metro' => '0.440M', 'growth' => '0.5%', 'businesses' => '3,100', 'region' => 'ON Southwest', 'keywords' => 'Google Ads St. Catharines, PPC St. Catharines, digital advertising St. Catharines', 'neighborhoods' => 'Downtown St. Catharines, North St. Catharines, South St. Catharines', 'industries' => 'Automotive, Healthcare, Professional Services, Retail'],
    'St. Johns' => ['province' => 'NL', 'population' => '0.121M', 'population_metro' => '0.200M', 'growth' => '0.0%', 'businesses' => '2,300', 'region' => 'Atlantic', 'keywords' => 'Google Ads St. Johns, PPC St. Johns, online marketing St. Johns', 'neighborhoods' => 'Downtown St. Johns, North St. Johns, South St. Johns', 'industries' => 'Energy, Healthcare, Government, Professional Services'],
    'Sudbury' => ['province' => 'ON', 'population' => '0.080M', 'population_metro' => '0.080M', 'growth' => '-0.3%', 'businesses' => '1,600', 'region' => 'ON North', 'keywords' => 'Google Ads Sudbury, PPC Sudbury, paid search Sudbury', 'neighborhoods' => 'Downtown Sudbury, North Sudbury, South Sudbury', 'industries' => 'Mining, Healthcare, Education, Professional Services'],
    'Surrey' => ['province' => 'BC', 'population' => '0.568M', 'population_metro' => '0.568M', 'growth' => '2.5%', 'businesses' => '11,500', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Surrey, PPC Surrey, online advertising Surrey', 'neighborhoods' => 'Downtown Surrey, North Surrey, South Surrey, Cloverdale', 'industries' => 'Technology, Agriculture, Retail, Professional Services'],
    'Thunder Bay' => ['province' => 'ON', 'population' => '0.110M', 'population_metro' => '0.150M', 'growth' => '0.2%', 'businesses' => '2,200', 'region' => 'ON West', 'keywords' => 'Google Ads Thunder Bay, PPC Thunder Bay, digital ads Thunder Bay', 'neighborhoods' => 'Downtown Thunder Bay, North Thunder Bay, South Thunder Bay', 'industries' => 'Mining, Healthcare, Retail, Government'],
    'Toronto' => ['province' => 'ON', 'population' => '2.93M', 'population_metro' => '6.41M', 'growth' => '0.8%', 'businesses' => '45,200', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Toronto, PPC Toronto, search advertising Toronto', 'neighborhoods' => 'Downtown Toronto, North Toronto, East Toronto, West Toronto', 'industries' => 'Finance, Technology, Healthcare, Professional Services'],
    'Vaughan' => ['province' => 'ON', 'population' => '0.323M', 'population_metro' => '0.323M', 'growth' => '1.0%', 'businesses' => '6,200', 'region' => 'ON Greater Toronto Area', 'keywords' => 'Google Ads Vaughan, PPC Vaughan, online marketing Vaughan', 'neighborhoods' => 'Downtown Vaughan, North Vaughan, South Vaughan', 'industries' => 'Professional Services, Healthcare, Technology, Retail'],
    'Victoria' => ['province' => 'BC', 'population' => '0.397M', 'population_metro' => '0.397M', 'growth' => '1.4%', 'businesses' => '8,100', 'region' => 'BC Vancouver Island', 'keywords' => 'Google Ads Victoria, PPC Victoria, digital marketing Victoria', 'neighborhoods' => 'Downtown Victoria, North Victoria, South Victoria', 'industries' => 'Tourism, Government, Healthcare, Professional Services'],
    'Vancouver' => ['province' => 'BC', 'population' => '0.68M', 'population_metro' => '2.68M', 'growth' => '1.8%', 'businesses' => '28,400', 'region' => 'BC Lower Mainland', 'keywords' => 'Google Ads Vancouver, PPC Vancouver, paid search Vancouver', 'neighborhoods' => 'Downtown Vancouver, West Vancouver, East Vancouver, North Vancouver', 'industries' => 'Tech, Film & Media, Healthcare, International Trade'],
    'Waterloo' => ['province' => 'ON', 'population' => '0.233M', 'population_metro' => '0.625M', 'growth' => '2.8%', 'businesses' => '4,700', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Waterloo, PPC Waterloo, search ads Waterloo', 'neighborhoods' => 'Downtown Waterloo, North Waterloo, South Waterloo', 'industries' => 'Technology, Education, Professional Services, Manufacturing'],
    'Whitehorse' => ['province' => 'YT', 'population' => '0.039M', 'population_metro' => '0.039M', 'growth' => '1.2%', 'businesses' => '800', 'region' => 'Yukon', 'keywords' => 'Google Ads Whitehorse, PPC Whitehorse, online advertising Whitehorse', 'neighborhoods' => 'Downtown Whitehorse, North Whitehorse, South Whitehorse', 'industries' => 'Mining, Tourism, Government, Professional Services'],
    'Windsor' => ['province' => 'ON', 'population' => '0.218M', 'population_metro' => '0.427M', 'growth' => '0.4%', 'businesses' => '4,200', 'region' => 'ON Southwest', 'keywords' => 'Google Ads Windsor, PPC Windsor, digital advertising Windsor', 'neighborhoods' => 'Downtown Windsor, North Windsor, South Windsor', 'industries' => 'Automotive, Healthcare, Professional Services, Retail'],
    'Winnipeg' => ['province' => 'MB', 'population' => '0.869M', 'population_metro' => '1.000M', 'growth' => '0.9%', 'businesses' => '16,800', 'region' => 'MB Central', 'keywords' => 'Google Ads Winnipeg, PPC Winnipeg, paid search Winnipeg', 'neighborhoods' => 'Downtown Winnipeg, North Winnipeg, South Winnipeg, West Winnipeg', 'industries' => 'Transportation, Healthcare, Professional Services, Technology'],
];

$citiesToProcess = $singleCity ? [$singleCity] : array_keys($locationData);

echo "📍 Processing " . count($citiesToProcess) . " location(s)...\n";
echo "─────────────────────────────────────────────────────────\n\n";

$successCount = 0;
$errorCount = 0;
$startTime = microtime(true);

foreach ($citiesToProcess as $city) {
    $citySlug = strtolower(str_replace(' ', '-', $city));
    $locData = $locationData[$city] ?? ['province' => 'Unknown', 'population' => 'Unknown', 'growth' => 'Unknown', 'businesses' => 'Unknown'];

    $variables = [
        '{CITY}' => $city,
        '{CITY_SLUG}' => $citySlug,
        '{PROVINCE}' => $locData['province'] ?? 'Unknown',
        '{COUNTRY}' => 'Canada',
        '{POPULATION_CITY}' => $locData['population'] ?? 'Unknown',
        '{POPULATION_METRO}' => $locData['population_metro'] ?? $locData['population'] ?? 'Unknown',
        '{ANNUAL_GROWTH}' => $locData['growth'] ?? 'Unknown',
        '{TOTAL_BUSINESSES}' => $locData['businesses'] ?? 'Unknown',
        '{REGION}' => $locData['region'] ?? 'Canada',
        '{NEIGHBORHOODS}' => $locData['neighborhoods'] ?? 'Various neighborhoods',
        '{KEYWORDS}' => $locData['keywords'] ?? 'Google Ads ' . $city,
        '{TOP_INDUSTRIES}' => $locData['industries'] ?? 'Various industries',
        '{CITY_DESCRIPTION}' => ucfirst(strtolower($city)) . " is a dynamic market with growing digital advertising opportunities. More businesses are competing online, making strategic Google Ads essential for capturing high-intent customers.",
        '{META_TITLE}' => "Best Google Ads Management in $city | TML Agency | PPC Experts",
        '{META_DESCRIPTION}' => "Expert Google Ads management in $city. Certified Google Partner. Control ad spend, maximize ROI. 200+ clients. Free audit. \$2,499-\$9,999/month.",
        '{H1_TAG}' => "Best Google Ads Management in $city | Expert PPC Services",
        '{CANONICAL_URL}' => "https://townmedialabs.ca/services/google-ads-in-$citySlug/",
        '{AUTHOR_NAME}' => 'Raman Makkar',
        '{AUTHOR_ROLE}' => 'Founder & Chief Google Ads Strategist',
        '{POSTAL_CODE}' => 'T5J',
        '{CASE_STUDY_1_INDUSTRY}' => 'Local Home Services',
        '{CASE_STUDY_1_NAME}' => 'Home Renovation Company',
        '{CASE_STUDY_1_LEADS_BEFORE}' => '5',
        '{CASE_STUDY_1_LEADS_AFTER}' => '40',
        '{CASE_STUDY_1_GROWTH}' => '+700%',
        '{CASE_STUDY_1_REVENUE}' => '$950,000',
        '{CASE_STUDY_1_ROI}' => '580%',
        '{CASE_STUDY_2_INDUSTRY}' => 'Professional Services (Accounting)',
        '{CASE_STUDY_2_NAME}' => 'CPA Firm',
        '{CASE_STUDY_2_LEADS_AFTER}' => '15',
        '{CASE_STUDY_2_CLOSE_RATE}' => '40%',
        '{CASE_STUDY_2_REVENUE}' => '$320,000',
        '{CASE_STUDY_2_ROI}' => '720%',
        '{CASE_STUDY_3_INDUSTRY}' => 'E-commerce (Retail)',
        '{CASE_STUDY_3_NAME}' => 'Specialty Retail Shop',
        '{CASE_STUDY_3_REVENUE_MONTHLY}' => '$8,500',
        '{CASE_STUDY_3_GROWTH}' => '+620%',
        '{CASE_STUDY_3_ROAS}' => '4.2:1',
        '{CASE_STUDY_3_6M_REVENUE}' => '$155,000',
        '{CASE_STUDY_4_INDUSTRY}' => 'Healthcare (Dental)',
        '{CASE_STUDY_4_NAME}' => 'Dental Clinic',
        '{CASE_STUDY_4_CLIENTS}' => '150',
        '{CASE_STUDY_4_CAC}' => '$85',
        '{CASE_STUDY_4_REVENUE}' => '$450,000',
        '{CASE_STUDY_4_ROI}' => '950%',
        '{CASE_STUDY_5_INDUSTRY}' => 'B2B (Software)',
        '{CASE_STUDY_5_NAME}' => 'Business Software Platform',
        '{CASE_STUDY_5_LEADS}' => '45',
        '{CASE_STUDY_5_MRR}' => '$540,000',
        '{CASE_STUDY_5_ANNUAL_REVENUE}' => '$3.2M',
        '{CASE_STUDY_5_ROI}' => '850%',
        '{TESTIMONIAL_1_NAME}' => 'Sarah M.',
        '{TESTIMONIAL_1_BUSINESS}' => 'Home Services',
        '{TESTIMONIAL_2_NAME}' => 'James T.',
        '{TESTIMONIAL_2_BUSINESS}' => 'Accounting Firm',
        '{TESTIMONIAL_3_NAME}' => 'Michelle L.',
        '{TESTIMONIAL_3_BUSINESS}' => 'E-commerce Shop',
        '{TESTIMONIAL_4_NAME}' => 'Dr. Ahmed K.',
        '{TESTIMONIAL_4_BUSINESS}' => 'Dental Practice',
        '{TESTIMONIAL_5_NAME}' => 'Robert P.',
        '{TESTIMONIAL_5_BUSINESS}' => 'Professional Services',
    ];

    $outputFile = VIEWS_DIR . "/google-ads-in-$citySlug.php";

    if (file_exists($outputFile) && !$regenerateAll && !$verbose) {
        continue;
    }

    $pageContent = strtr($templateContent, $variables);

    if (!$dryRun) {
        if (!is_dir(VIEWS_DIR)) {
            mkdir(VIEWS_DIR, 0755, true);
        }

        if (file_put_contents($outputFile, $pageContent)) {
            $successCount++;
            if ($verbose) {
                echo "✅ Generated: $city\n";
                echo "   📄 File: $outputFile\n";
                echo "   📊 Size: " . round(strlen($pageContent) / 1024, 1) . " KB\n";
            }
        } else {
            $errorCount++;
            echo "❌ Error writing: $outputFile\n";
        }
    } else {
        $successCount++;
        if ($verbose) {
            echo "📝 DRY RUN: Would generate $city\n";
        }
    }
}

$endTime = microtime(true);
$duration = $endTime - $startTime;

echo "\n─────────────────────────────────────────────────────────\n";
echo "✅ GOOGLE ADS PAGE GENERATION COMPLETE\n";
echo "─────────────────────────────────────────────────────────\n";
echo "✨ Successfully generated: $successCount pages\n";
echo "❌ Errors: $errorCount\n";
echo "⏱️  Duration: " . round($duration, 2) . " seconds\n";
echo "🚀 Speed: " . ($successCount > 0 ? round($successCount / ($duration > 0 ? $duration : 1), 0) : 0) . " pages/second\n\n";

echo "📋 NEXT STEPS:\n";
echo "──────────────\n";
echo "1. Verify generated files in: " . VIEWS_DIR . "\n";
echo "2. Test Google Ads pages in browser\n";
echo "3. Update sitemap.xml with all 62 Google Ads URLs\n";
echo "4. Submit sitemap to Google Search Console\n";

exit($errorCount > 0 ? 1 : 0);
?>