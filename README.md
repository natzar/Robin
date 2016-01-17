# ~ Robin ~

A command line php tool to organize and run several pieces of code from different sources that extracts content from websites.
Here, the term "Robot" refers to a piece of code that does crawling and scraping defined tasks.




### Available Robots

    - Pinterest: Download all images matching a search query
    - Instagram: Latest Photo, Profile photo, first 20 photos from an account
    - Twitter: Auto favorite all tweets matching your search query
    - Ebay: Download all products from a category
    - Google: SERPS matching a search query, Adwords scraping, ...
    - Vine: Un-official Vine api wrapper... Like, comment, favorite ....
    - ElPais: Spain's newspaper. Get all News from category
    - Android Market: Get app details
    
All images and data results (Json), will be saved in /downloads folder.

####Usage: 

	php robin.php <Robot's Name> <command> <keyword|arguments|parameters>
	


For example: `php robin.php Pinterest download "garden party"`

It works out of the box, you don't need to install anything. If you want to use Vine or Twitter you will need to set your credentials. Run it to get more information. Dependencies: `Simplehtmldom, PhpCrawler, UAgent` (all included).

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
  
