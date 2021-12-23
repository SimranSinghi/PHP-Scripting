# PHP-Scripting
Developed a trivial photo-album application where photos are stored on the web server as files. 

A form that allows you to upload a new image (a *.jpg). Look at the class slides for a PHP example that handles uploads. These images are stored in the images directory at the the web server.
A list with the file names of the images in the image directory. Each image name is a link that, when you click it, it downloads and displays the image in the image section.
An image section that displays the current image. You can change the image by changing the src attribute value of the <img ...> element (you don't need Ajax; you just need to generate javascript along with html from your album.php). For example, a link may have onclick="display('a.jpg');", which calls your javascript function display which changes the src of the image to images/a.jpg.
When your form calls album.php with a POST method to upload a file file.jpg (see class slide s), it uploads and stores the image file on the server and then displays the above web page (which now contain s the new file).
