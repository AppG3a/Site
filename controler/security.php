<?php 

/**
 * Vérifie qu'un champ de formulaire ($field) est bien rempli, en fonction du type de champ donné ($type)
 * 
 * @param string $field
 * @param string $type
 * @return boolean
 */
function fieldSecurity($field, $type)
{
    if (!empty($field))
    {
        switch($type)
        {
            case "number":
                if(ctype_digit($field))
                {
                    return true;
                }
                else 
                {
                    return false;
                }
                
            case "email":
                if(filter_var($field, FILTER_VALIDATE_EMAIL))
                {
                    return true;
                }
                else
                {
                    return false;
                }
                
            default:
                return true;
        }
    }
    else
    {
        return false;
    }
}

?>