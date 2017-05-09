<?php

include_once 'rnfunctions.php';
echo '<h3>Setting up</h3>';


createTable('rnmembers', 'user VARCHAR(16), pass VARCHAR(16), INDEX(user(5))');

createTable('rnmessages', 'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
           auth VARCHAR(16), recip VARCHAR(16), pm CHAR(1),
           time INT UNSIGNED, message VARCHAR(4096),
           INDEX(auth(5)), INDEX(recip(5))');

createTable('rnfriends', 'user VARCHAR(16), friend VARCHAR(16),
        INDEX(user(5)), INDEX(friend(5))');

createTable('rnprofiles', 'user VARCHAR(16), text VARCHAR(4096), INDEX(user(5))');

?>
