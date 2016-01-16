#Robots Folder

Here you can add more Robots

    - Create a folder with your Robot's name (= website)
    - Create a file inside that folder, with the same name of the folder
    
## Sample: Content of Pinterest.php Robot
    
    class Pinterest extends Robot{
        
        function getImages(){
        
        }
                
    }
    
Now you have the command getImages in robot Pinterest. 

You can run it: `php robin.php Pinterest getImages`
