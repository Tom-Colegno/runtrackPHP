<?php
function bonjour($jour) {
    if (isset($jour)) {
        if ($jour) {
            ?>Bonjour<br><?php
        } else {
            ?>Bonsoir<br><?php
        }
    }
}

bonjour(true);
bonjour(false);  
?>
