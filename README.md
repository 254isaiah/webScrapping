# Diction & Dictionary Scrapping
 Web Scrapping -> Extracting data from websites and sorting unique words and occurrences using PHP.

# Design and Structure
### Screenshots
User is prompted to enter website url or link to scrap data from.
![Form](https://user-images.githubusercontent.com/48151518/150602586-e24d3fca-574c-43e3-8d6a-80f7133e5dd6.PNG)

On clicking scrap button, User Views a table containing all unique words and their occurrences and csv file is also downloaded containing the list of all scrapped words in all web pages visited arranged alphabetically in ascending order with their occurrences. The occurrences and unique text is also stored in the csv file to capture data from different web pages and get the similar data set by looking at alphabetic order.

![occcurence](https://user-images.githubusercontent.com/48151518/150603089-6e8bd460-14e1-40b5-b941-f326507ad6f2.PNG)
[mycsv.csv](https://github.com/254isaiah/webScrapping/files/7916704/mycsv.csv)

# Installations.
## Install composer
Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you. This package manager enables us to use guzzlehttp/guzzle - a PHP HTTP client library 

Download and run [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)

### Using guzzlehttp/guzzle
Searching for the guzzle
``
composer search guzzle
``
#### Installing guzzel
```composer require guzzlehttp/guzzle``` used to pull data. It installs the vendor folder. Pulls down our composer install and creates a folder named vendor with files in it.

## Install dom crawler
[dom crawler](https://symfony.com/doc/current/components/dom_crawler.html) docummentation in Github\
dom crawler - loops through data brought back by guzzlehttp/guzzel.Installed by\
```composer require symphony/dom-crawler``` in the terminal

# Project Description
## Source code
### index.php
Contains an input field to promp the user to enter web url.
### code.php
Gets url enterred and uses dom crawler [Node Filtering](https://symfony.com/doc/current/components/dom_crawler.html#node-filtering) to sprawl through data from the web page. I used body tags in the source to capture all content. Searched using [css selector component](https://symfony.com/doc/current/components/css_selector.html)\
Loop through the data and echo back to the screen a list of unique words in table format together with their occurrences.The occurrences and unique text is also stored in the csv file to capture data from different web pages and get the similar data set by looking at alphabetic order.

# Running the code
- Download and install wamp or xampp.
- Create a folder in the htdocs folder e.g scrapping.
- Install composer [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)\
- Open cmd and navigate to the created foldr directory and install guzzlehttp/guzzle `composer require guzzlehttp/guzzle` and dom crawler ```composer require guzzlehttp/guzzle```.\
vendor folder will be downloaded in the new directory, composer.json and composer.lock files will also be created outside vendor folder.
- Copy and paste index.php,code.php.
- Start xampp.
- In the url search **localhost/createdFolder/index.php**
- Input the web url.
- View the unique words and their occurrences.
- csv file containing all unique words sorted with their counts in aplhabetic order is downloaded and saved in the xampp project folder.
