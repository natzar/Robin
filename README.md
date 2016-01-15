# Robin
Collaborative Crawling &amp; Scraping Toolkit in Php. Google, Instagram, Vine, Twitter, Ebay, Pinterest, ...
@author: @betoayesa / betolopezayesa@gmail.com

I will use the term "Robot" to describe crawling/scraping at same time.

## Install

Just clone this repo.

## Use it

    php robin.php {ROBOT} {COMMAND} {ARGUMENTS}

For example: php robin.php Pinterest download "garden party";

## Add more Robots

See contribute section. It's easy to integrate.

## Contribute

1- Add a folder in /lib, capital letter. For example /lib/Pinterest
2- Create a php file inside with the same name of the folder. For example /lib/Pinterest/Pinterest.php
3- Pinterest.php must define a class Pinterest extends Robot
4- Inside you can put all the commands. For example, php robin.php Pinterest {commands that go here} and are the methods of Pinterest Class

As all of the scraping crawling world its a mess, and always changing, and all we really want is to use it and leave it, doesn't matter if inside you service folder you put a lot of garbage code. Try to use /vendor for vendor packages. 

I used Composer, but some vendor packages I'm using aren't available through composer , so I don't want to mess with different vendor folders.

## Thanks to

All /vendor people :)