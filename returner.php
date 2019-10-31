<?php

/* Return to page function.
 * ARGUMENTS:
 *   - page link:
 *       $page;
 * RETURNS: None.
 */
function returnToPage( $page ) {
    echo
        '<body></body>' .
        '<script>' .
        'var a = document.createElement("a");' .
        'document.body.appendChild(a);' .
        'a.style = "display: none";' .
        'a.href = \'' . $page .'\';' .
        'a.click();' .
        '</script>';
} /* End of 'returnToPage' function */
?>
