 <?php


include dirname(__FILE__)."/GoogleUrl/GoogleUrl.php";

        $googleUrl=new \GoogleUrl();
        $googleUrl->setLang('es') // lang allows to adapt the query (tld, and google local params)
            ->setNumberResults(10);                        // 10 results per page
      //  $acdcPage1=$googleUrl->setPage(0)->search("acdc"); // acdc results page 1 (results 1-10)
        //$acdcPage2=$googleUrl->setPage(1)->search("acdc"); // acdc results page 2 (results 11-20)

        $googleUrl->setNumberResults(20);
        $simpsonPage1=$googleUrl->setPage(0)->search($keyword); // simpsons results page 1 (results 1-20)




        // GET NATURAL RESULTS

        $positions=$simpsonPage1->getPositions();

        echo "results for " . $simpsonPage1->getKeywords();
        echo "<ul>";
        foreach($positions as $result){
            echo "<li>";
            echo "<ul>";
            echo "<li>position : " . $result->getPosition() . "</li>";
            echo "<li>title : "    . utf8_decode($result->getTitle())    . "</li>";
            echo "<li>website : "  . $result->getWebsite()  . "</li>";
            echo "<li>URL : <a href='" . $result->getUrl() ."'>" . $result->getUrl() . "</a></li>";
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";

        // GET ADWORDS RESULTS

        $commercialSearch = $googleUrl->setLang("fr")->setPage(0)->search("simpson tshirt");
        $adwordsPositions = $commercialSearch->getAdwords();
        echo "adwords for " . $commercialSearch->getKeywords();
        echo "<ul>";
        foreach($adwordsPositions as $result){
            echo "<li>";
            echo "<ul>";
            echo "<li>location : " . $result->getLocation() . "</li>"; // adwords can be displayed in body or in column
            echo "<li>position : " . $result->getPosition() . "</li>";
            echo "<li>title : "    . utf8_decode($result->getTitle())    . "</li>";
            echo "<li>fake url : "  . $result->getVisurl()  . "</li>";
            echo "<li>URL :" . $result->getAdwordsUrl() . "</li>";
            echo "<li>Text : " . $result->getText() . "<li>";
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";

        // we can also get only results in body
        echo "adwords <b>IN BODY</b> for " . $commercialSearch->getKeywords();
        echo "<ul>";
        foreach($adwordsPositions->getBodyResults() as $result){
            echo "<li>" . $result->getPosition() . " : " . utf8_decode($result->getTitle()) . "</li>";
        }
        echo "</ul>";


        // and obviously results in the right column
        echo "adwords <b>IN COLUMN</b> for " . $commercialSearch->getKeywords();
        echo "<ul>";
        foreach($adwordsPositions->getColumnResults() as $result){
            echo "<li>" . $result->getPosition() . " : " . utf8_decode($result->getTitle()) . "</li>";
        }
        echo "</ul>";

    