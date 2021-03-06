<?php
define("TOKEN_ID","id");
define("TOKEN_VALUE","value");

/**
 * Retrieve session token
 * If it does not exist, generate new one
 * @param string $token_id
 * @return array
 */

function get_token($token_id)
{
    if (has_session_var($token_id)) {
        $value = get_session_var($token_id);
    } else {
        $value = generate_token($token_id);
        set_session_var($token_id, $value);
    }
    return array(TOKEN_ID => $token_id, TOKEN_VALUE => $value);
}

/**
 * @param string $token_id
 * @return array
 */

function update_token($token_id)
{
    $value = generate_token($token_id);
    set_session_var($token_id, $value);
    return array(TOKEN_ID => $token_id, TOKEN_VALUE => $value);
}

/**
 * Remove token from session
 * @param string $token_id
 * @return mixed
 */

function remove_token($token_id)
{
    return delete_session_var($token_id);
}

/**
 * Check whether token is valid
 * @param string $token
 * @return bool
 */

function is_token_valid($token){

    if (!has_session_var($token[TOKEN_ID])) {
        return false;
    }else{
        return comparison_between_hash(get_session_var($token[TOKEN_ID]),$token[TOKEN_VALUE]);
    }
}
