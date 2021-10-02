<?php
    namespace DAO;

    use Models\Admin as Admin;

    interface IAdminDAO{
        function Add(Admin $business);
        function GetAll();
    }

?>