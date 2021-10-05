<?php
    namespace DAO;

    use Models\Postulation as Postulation;

    interface IPostulationDAO{
        function Add(Postulation $postulation);
        function GetAll();
    }

?>