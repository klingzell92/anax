<?php
/**
 * Get value from GET variable or return default value.
 *
 * @param string $key     to look for
 * @param mixed  $default value to set if key does not exists
 *
 * @return mixed value from GET or the default value
 */
function getGet($key, $default = null)
{
    return isset($_GET[$key])
        ? $_GET[$key]
        : $default;
}



/**
 * Get value from POST variable or return default value.
 *
 * @param mixed $key     to look for, or value array
 * @param mixed $default value to set if key does not exists
 *
 * @return mixed value from POST or the default value
 */
function getPost($key, $default = null)
{
    if (is_array($key)) {
        // $key = array_flip($key);
        // return array_replace($key, array_intersect_key($_POST, $key));
        foreach ($key as $val) {
            $post[$val] = getPost($val);
        }
        return $post;
    }

    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}



/**
 * Check if key is set in POST.
 *
 * @param mixed $key     to look for
 *
 * @return boolean true if key is set, otherwise false
 */
function hasKeyPost($key)
{
    return array_key_exists($key, $_POST);
}
