<?php
    namespace DAO;

    use Models\Business as Business;

    interface IBusinessDAO{
        function Add(Business $business);
        function GetAll();
    }

?>