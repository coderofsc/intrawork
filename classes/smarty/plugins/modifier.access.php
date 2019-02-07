    <?php
function smarty_modifier_access($module_id, $crud=false)
{
    return m_cuser::get_instance()->check_access($module_id, m_roles::CRUD_OWNER_MODULE, $crud);
}
    ?>