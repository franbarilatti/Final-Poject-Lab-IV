<?php
    namespace DAO;

    use Models\Admin as Admin;

    interface IAdminDAO{
        function Add(Admin $admin);
        function GetAll();
    }

?>