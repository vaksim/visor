<?php
class SC
{
    static public function show($constant)
    {
        if (defined($constant)) {
            return constant($constant);
        } else {
            return $constant;
        }
    }
}
?>
