# ~ Robin ~
Crawling &amp; Scraping Toolkit in Php. Google, Instagram, Vine, Twitter, Ebay, Pinterest, and more to come.
I've developed a lot of crawlers/scrapers in the past. This repo is a way to store all of them together, having a command line wrapper to run them all. I will use the term "Robot" to describe crawling/scraping at same time.

@author: @betoayesa / betolopezayesa@gmail.com

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND

[i] Usage: php robin.php {Robot} {command} {keyword|arguments|parameters}

## Install

Just clone this repo.

## Use it

    php robin.php {ROBOT} {COMMAND} {ARGUMENTS}

For example: php robin.php Pinterest download "garden party";

## Available robots

    - Pinterest: Download all images matching a search query
    - Twitter: Auto favorite all tweets matching your search query
    - Ebay: Download all products from a category
    - Google: SERPS matching a search query
    - Vine: Un-official Vine api wrapper... Like, comment, favorite ....
    - ElPais: Spain's newspaper. Get all News from category
    - Android Market: Get app details
    
All images or other contents, will be downloaded to /downloads folder.

### Add more Robots

See contribute section. It's easy to integrate.

### To-do
    - Outputs format: Json / Xml / Csv / Mysql / Email
    - More methods
    - Get help from other developers adding their crawlers/scrapers

### Contribute

    - Add a folder in /lib, capital letter. For example /lib/Pinterest
    - Create a php file inside with the same name of the folder. For example /lib/Pinterest/Pinterest.php
    - Pinterest.php must define a class Pinterest extends Robot
    - Inside you can put all the commands. For example, php robin.php Pinterest {commands that go here} and are the methods of Pinterest Class

As all of the scraping crawling world its a mess, and always changing, and all we really want is to use it and leave it, doesn't matter if inside you service folder you put a lot of garbage code. Try to use /vendor for vendor packages. 

I used Composer, but some vendor packages I'm using aren't available through composer , so I don't want to mess with different vendor folders.

### Thanks to

    * Simplehtmldom creators
    * PhpCrawl creators
    * PhpQuery creators
    * uagent Lib creator

### Licensed under MIT License (MIT)
Copyright (c) 2016 @betoayesa / betolopezayesa@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.