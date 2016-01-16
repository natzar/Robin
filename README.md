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

    - Add a folder in /lib, capital letter. For example /lib/Pinterest
    - Create a php file inside with the same name of the folder. For example /lib/Pinterest/Pinterest.php
    - Pinterest.php must define a class Pinterest extends Robot
    - Inside you can put all the commands. For example, php robin.php Pinterest {commands that go here} and are the methods of Pinterest Class

As all of the scraping crawling world its a mess, and always changing, and all we really want is to use it and leave it, doesn't matter if inside you service folder you put a lot of garbage code. Try to use /vendor for vendor packages. 

I used Composer, but some vendor packages I'm using aren't available through composer , so I don't want to mess with different vendor folders.

## Thanks to

All /vendor people :)

##The MIT License (MIT)
Copyright (c) 2016 @betoayesa / betolopezayesa@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.