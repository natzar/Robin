# ~ Robin ~
16/1/2016 - Author: Beto López @betoayesa <betolopezayesa@gmail.com>

Crawling &amp; Scraping Php Toolkit and command line wrapper. Google, Instagram, Vine, Twitter, Ebay, Pinterest, and more to come.
Here, the term "Robot" refers to a piece of code that does crawling and scraping of one or more urls in the same domain.

The Robots are some from my own, and some taken from Internet.
Dependencies (included): Using Simplehtmldom, PhpCrawler, UAgent.

####Usage: 

	php robin.php <Robot's Name> <command> <keyword|arguments|parameters>
	
The command argument is a method from <Robot's name> class. 

For example: `php robin.php Pinterest download "garden party"`

`download` it's a method from Pinterest class. And "garden party" is the keyword used by `download` method.

## Install

Get the last version by forking 'develop' branch. Release 0.1.0 it's pretty basic and buggy.
Master branch is equal to release 0.1.0.


### Available robots

    - Pinterest: Download all images matching a search query
    - Instagram: Profile photo, first 20 photos from an account
    - Twitter: Auto favorite all tweets matching your search query
    - Ebay: Download all products from a category
    - Google: SERPS matching a search query
    - Vine: Un-official Vine api wrapper... Like, comment, favorite ....
    - ElPais: Spain's newspaper. Get all News from category
    - Android Market: Get app details
    
All images or other contents, will be downloaded to /downloads folder.

All other contents will be saved in a json file inside /download


### Add your Robots

    - Add a folder in /robots, capital letter. For example /robots/Pinterest
    - Create a php file inside with the same name of the folder. For example /robots/Pinterest/Pinterest.php
    - Pinterest.php must define a class Pinterest extends Robot
    - Inside you can put all the commands. For example, php robin.php Pinterest {commands that go here} and are the methods of Pinterest Class

### To-do
    - Outputs format: Json / Xml / Csv / Mysql / Email
    - More methods
    - Get help from other developers adding their crawlers/scrapers


### Thanks to

    * Simplehtmldom creators
    * PhpCrawl creators
    * PhpQuery creators
    * uagent Lib creator

### MIT License
Copyright (c) 2016 Beto López Ayesa

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
