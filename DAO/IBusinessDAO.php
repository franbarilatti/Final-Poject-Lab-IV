<?php
    namespace DAO;

    use Models\Business as Business;

    interface IBusinessDAO{
        function Add(Business $business);
        function GetAll();
        function Delete($businessId);
        function Modify($businessId,$businessName,$employesQuantity,$businessInfo,$adress);
    }

?>