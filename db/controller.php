<?php

class Controller
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }

    function prefixv() //คำนำหน้า register.php
    {
        try {
            $sql = "SELECT * FROM tbl_prefixs";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function documents()  // dropdown เลือกใบงาน addbasicdata.php ---firststorage.php
    {
        try {
            $sql = "SELECT * FROM tbl_documents";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function datest()  // dropdown เลือกใบงาน addbasicdata.php ---firststorage.php
    {
        try {
            $sql = "SELECT * FROM tbl_provinces";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }








    function insertfirst($tap1, $tap2, $tap3, $tap4, $tap5, $tap6) //เพิ่มข้อมูลส่วนต้นของใบงาน
    {
        try {
            $sql = "INSERT INTO tbl_firststorages (statement, doc_id, objective, equipment, process, exp_benefits)
            VALUE (:statement, :doc_id, :objective, :equipment, :process, :exp_benefits)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":statement", $tap1);
            $stmt->bindParam(":doc_id", $tap2);
            $stmt->bindParam(":objective", $tap3);
            $stmt->bindParam(":equipment", $tap4);
            $stmt->bindParam(":process", $tap5);
            $stmt->bindParam(":exp_benefits", $tap6);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert1($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13) //เพิ่มข้อมูลใบงานที่ 1
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_1 (villagename, location, location_map, religion, population, numarea, education_service, education_name
            , local_government, hospital, police_station, image, pdf)
            VALUES (:villagename, :location, :location_map, :religion, :population, :numarea, :education_service, :education_name
            , :local_government, :hospital, :police_station,:image, :pdf)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':villagename', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':location', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':location_map', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':religion', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':population', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':numarea', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':education_service', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':education_name', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':local_government', $tap9, PDO::PARAM_STR);
            $stmt->bindParam(':hospital', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':police_station', $tap11, PDO::PARAM_STR);
            $stmt->bindParam(':image', $tap12, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap13, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert2($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12) //เพิ่มข้อมูลใบงานที่ 2
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_2 (
                agriculture, 
                garden, 
                farming, 
                number_animal, 
                fishing, 
                b_industry, 
                m_industry, 
                s_industry,
                commerce, 
                service, 
                image, 
                pdf)
              VALUES (:agriculture, :garden, 
              :farming, :number_animal,
              :fishing, :b_industry, 
              :m_industry, :s_industry, 
              :commerce, :service, 
              :image, :pdf)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':agriculture', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':garden', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':farming', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':number_animal', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':fishing', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':b_industry', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':m_industry', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':s_industry', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':commerce', $tap9, PDO::PARAM_STR);
            $stmt->bindParam(':service', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':image', $tap11, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap12, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13) //เพิ่มข้อมูลใบงานที่ 3
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_3 (
                terrain, 
                soilitype, 
                natural_water, 
                irrigation_water, 
                weir_slows, 
                rainfall, 
                water_demand,
                quality_water, 
                temperature,
                amount_light, 
                geographic,
                image, 
                pdf)
              VALUES (:terrain, :soilitype, 
              :natural_water, :irrigation_water,
              :weir_slows, :rainfall, 
              :water_demand, :quality_water, 
              :temperature, :amount_light, :geographic,
              :image, :pdf)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':terrain', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':soilitype', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':natural_water', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':irrigation_water', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':weir_slows', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':rainfall', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':water_demand', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':quality_water', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':temperature', $tap9, PDO::PARAM_STR);
            $stmt->bindParam(':amount_light', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':geographic', $tap11, PDO::PARAM_STR);
            $stmt->bindParam(':image', $tap12, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap13, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert4($tap1, $tap2, $tap3, $tap4, $tap5) //เพิ่มข้อมูลใบงานที่ 4
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_4 (village_history, way_life, life_recoed_life, image, pdf)
            VALUE (:village_history, :way_life, :life_recoed_life, :image, :pdf)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":village_history", $tap1);
            $stmt->bindParam(":way_life", $tap2);
            $stmt->bindParam(":life_recoed_life", $tap3);
            $stmt->bindParam(":image", $tap4);
            $stmt->bindParam(":pdf", $tap5);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12) //เพิ่มข้อมูลใบงานที่ 5
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_5 (
                data_plant, 
                food, 
                medicine_people, 
                medicine_animal, 
                furniture, 
                insecticide, 
                cultures,
                religion, 
                other,
                image1, 
                image2, 
                pdf)
              VALUES (:data_plant, 
                :food, 
                :medicine_people, 
                :medicine_animal, 
                :furniture, 
                :insecticide, 
                :cultures,
                :religion, 
                :other,
                :image1, 
                :image2, 
                :pdf)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':data_plant', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':food', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':medicine_people', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':medicine_animal', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':furniture', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':insecticide', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':cultures', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':religion', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':other', $tap9, PDO::PARAM_STR);
            $stmt->bindParam(':image1', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':image2', $tap11, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap12, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert6($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9) //เพิ่มข้อมูลใบงานที่ 6
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_6 (
                animal_species, 
                location_meet, 
                quantity, 
                history,
                feature, 
                animal_owner, 
                informant_name, 
                image,
                pdf
                )
              VALUES (:animal_species, 
                :location_meet, 
                :quantity, 
                :history, 
                :feature,
                :animal_owner, 
                :informant_name, 
                :image,
                :pdf
                )";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':animal_species', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':location_meet', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':history', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':feature', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':animal_owner', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':informant_name', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':image', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap9, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert7($tap1, $tap2, $tap3) //เพิ่มข้อมูลใบงานที่ 7
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_7 (bio_data, image, pdf)
            VALUE (:bio_data,:image, :pdf)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":bio_data", $tap1);
            $stmt->bindParam(":image", $tap2);
            $stmt->bindParam(":pdf", $tap3);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert8($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11) //เพิ่มข้อมูลใบงานที่ 8
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_8 (
                branch, 
                local_name, 
                copyright, 
                type_wisdom, 
                local_highlights, 
                wisdom_details, 
                public_relations,
                characteristic, 
                materials,
                image, 
                pdf)
              VALUES ( 
                :branch, 
                :local_name, 
                :copyright, 
                :type_wisdom, 
                :local_highlights, 
                :wisdom_details,
                :public_relations, 
                :characteristic,
                :materials,
                :image, 
                :pdf)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':branch', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':local_name', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':copyright', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':type_wisdom', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':local_highlights', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':wisdom_details', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':public_relations', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':characteristic', $tap8, PDO::PARAM_STR);
            $stmt->bindParam(':materials', $tap9, PDO::PARAM_STR);
            $stmt->bindParam(':image', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':pdf', $tap11, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert9($tap1, $tap2, $tap3, $tap4, $tap5, $tap6) //เพิ่มข้อมูลใบงานที่ 9
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_9 (archeology_site,important_resources,archeology_record, name_resources, image, pdf)
            VALUE (:archeology_site,:important_resources,:archeology_record,:name_resources, :image, :pdf)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":archeology_site", $tap1);
            $stmt->bindParam(":important_resources", $tap2);
            $stmt->bindParam(":archeology_record", $tap3);
            $stmt->bindParam(":name_resources", $tap4);
            $stmt->bindParam(":image", $tap5);
            $stmt->bindParam(":pdf", $tap6);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
