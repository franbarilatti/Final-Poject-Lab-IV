<?php
    namespace DAO;

use Models\JobOffer;

interface IJobOfferDAO{

        function Add(JobOffer $jobOffer);

        function Delete($jobOfferId);

        function Modify($jobOfferId,$title,$description,$expirateDate);

        function GetAll();

    }


?>
