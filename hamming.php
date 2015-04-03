<?php
/**
 * Implements the Hamming distance algorithm
 *
 */
class Hamming
{

    /**
     * Hamming distance between two strings or two numbers
     *
     * The Hamming distance is defined as the number of positions
     * at which two strings of equal length differ
     *
     * @see http://mathworld.wolfram.com/HammingDistance.html
     *
     * @param string|integer $a first parameter
     * @param string|integer $b second parameter
     *
     * @throws InvalidArgumentException if parameters are not of same type and length
     * @return integer the hamming length from string1 to string2
     *
     * @assert ('brazil', 'world') throws InvalidArgumentException
     * @assert ('brazil', 'soccer') == 4
     * @assert ('1011101', '1001001') == 2
     *
     */
    public function distance( $a, $b )
    {
        if ($this->validateStrings( $a, $b )) {
            $res = array_diff_assoc( str_split( $a ), str_split( $b ) );

            return count( $res );
        }

    }

    /**
     * Validate type and length of two given strings
     *
     * @param $a
     * @param $b
     * @return bool
     */
    private function validateStrings( $a, $b )
    {
        if (is_string( filter_var( $a, FILTER_SANITIZE_STRING ) ) === true
            && is_string( filter_var( $b, FILTER_SANITIZE_STRING ) ) === true
            && strlen( $a ) === strlen( $b )
        ) {
            return true;
        } else {
            throw new \InvalidArgumentException( 'Expecting two strings/numbers of equal length' );
        }
    }
}