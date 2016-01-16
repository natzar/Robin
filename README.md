# ~ Robin ~
16/1/2016 - Author: Beto López @betoayesa <betolopezayesa@gmail.com>

Crawling &amp; Scraping Toolkit in Php. Google, Instagram, Vine, Twitter, Ebay, Pinterest, and more to come.
I've developed a lot of crawlers/scrapers in the past. This repo is a way to store all of them together, having a command line wrapper to run them all. I will use the term "Robot" to describe crawling/scraping at same time.

As all of the scraping crawling tools are a mess, and websites's html is always changing, and all we really want is to use it and leave it, doesn't matter if inside you service folder you put a lot of garbage code, if on top of that you put a clean Class. Use the others robots as reference to create new ones. Use /vendor for vendor packages. 

####Usage: 

	php robin.php <Robot's Name> <command> <keyword|arguments|parameters>
	
The command argument is a method from <Robot's name> class. 

For example: `php robin.php Pinterest download "garden party"`

`download` it's a method from Pinterest class. And "garden party" is the keyword used by `download` method.


### Disclaimer
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND.
I tried to put a more practical layer on top of a bunch of git repos, libs and garbage code. But it works, that is the objective. The objective is to have a personal fast toolkit to crawl and scrape sites. Not really thought for use in production.

I used Composer, but some vendor packages I'm using aren't available through Composer, so I don't want to mess with different vendor folders.


## Install

Just download or clone this repo.


## Available robots

    - Pinterest: Download all images matching a search query
    - Twitter: Auto favorite all tweets matching your search query
    - Ebay: Download all products from a category
    - Google: SERPS matching a search query
    - Vine: Un-official Vine api wrapper... Like, comment, favorite ....
    - ElPais: Spain's newspaper. Get all News from category
    - Android Market: Get app details
    
All images or other contents, will be downloaded to /downloads folder.


## Add your Robots

    - Add a folder in /lib, capital letter. For example /lib/Pinterest
    - Create a php file inside with the same name of the folder. For example /lib/Pinterest/Pinterest.php
    - Pinterest.php must define a class Pinterest extends Robot
    - Inside you can put all the commands. For example, php robin.php Pinterest {commands that go here} and are the methods of Pinterest Class

## To-do
    - Outputs format: Json / Xml / Csv / Mysql / Email
    - More methods
    - Get help from other developers adding their crawlers/scrapers


## Thanks to

    * Simplehtmldom creators
    * PhpCrawl creators
    * PhpQuery creators
    * uagent Lib creator

### MIT License
Copyright (c) 2016 Beto López Ayesa

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.