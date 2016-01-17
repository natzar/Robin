# ~ Robin ~

A command line php tool to organize and run several pieces of code from different sources that extracts content from websites.
Here, the term "Robot" refers to a piece of code that does crawling and scraping in a especific way.

Some Robots are from my own, and some taken from Internet.

Dependencies (included): Simplehtmldom, PhpCrawler, UAgent.


### Available Robots

    - Pinterest: Download all images matching a search query
    - Instagram: Latest Photo, Profile photo, first 20 photos from an account
    - Twitter: Auto favorite all tweets matching your search query
    - Ebay: Download all products from a category
    - Google: SERPS matching a search query, Adwords scraping, ...
    - Vine: Un-official Vine api wrapper... Like, comment, favorite ....
    - ElPais: Spain's newspaper. Get all News from category
    - Android Market: Get app details
    
All images or other contents, will be downloaded to /downloads folder.

All other contents will be saved in a json file inside /download
####Usage: 

	php robin.php <Robot's Name> <command> <keyword|arguments|parameters>
	


For example: `php robin.php Pinterest download "garden party"`

### Install

Download the zip, uncompress it and run robin.php.  

Get the last version by forking 'develop' branch. 
Ignore Release 0.1.0, outdated.




### Thanks to

    * Simplehtmldom creators
    * PhpCrawl creators
    * PhpQuery creators
    * uagent Lib creator

### License
 DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
                    Version 2, December 2004 

 Copyright (C) 2016 Beto López <betolopezayesa@gmail.com>

 Everyone is permitted to copy and distribute verbatim or modified 
 copies of this license document, and changing it is allowed as long 
 as the name is changed. 

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 

  0. You just DO WHAT THE FUCK YOU WANT TO.
  
