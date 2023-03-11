<?php

class Controller
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }

    function testss() //คำนำหน้า register.php
    {
        try {
            $sql = "SELECT * FROM provinces";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
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

    function documents()  // dropdown เลือกใบงาน ---firststorage.php
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


    function provinces()  // dropdown จังหวัด
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

    function amphures()  // dropdown อำเภอ
    {
        try {
            $sql = "SELECT * FROM tbl_amphures";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function districts()  // dropdown ตำบล
    {
        try {
            $sql = "SELECT * FROM tbl_districts";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getUser() //แสดงข้อมูลผู้ใช้ แอดมิน
    {
        try {
            $sql = "SELECT * FROM tbl_users";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getcheckper() //แสดงข้อมูลผู้ใช้ แอดมิน
    {
        try {
            $sql = "SELECT * FROM tbl_users WHERE permission_id = 0";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getlogall() //แสดงข้อมูลผู้ใช้ แอดมิน
    {
        try {
            $sql = "SELECT * FROM tbl_logfile a INNER JOIN tbl_users b ON 
            a.user_id = b.user_id ORDER BY a.logfile_id DESC";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getDatastore() //ตารางข้อมูลสถานที่ที่สำรวจ
    {
        try {
            $sql = "SELECT *,concat( left(substring_index(left(a.data_store_local,255),',',1),255),' ',f.name_th ,' ', d.name_th ,' ', c.name_th ,' ', f.zip_code)as data_store_local
            FROM tbl_datastores a
            INNER JOIN tbl_users b on a.user_id = b.user_id
            LEFT JOIN tbl_provinces c ON c.code = left(substring_index(right(a.data_store_local,12),' ',1),2)
            LEFT JOIN tbl_amphures d ON d.code = left(substring_index(right(a.data_store_local,12),' ',1),4)
            LEFT JOIN tbl_districts f ON f.districts_id = left(substring_index(right(a.data_store_local,12),' ',1),6)
            ORDER BY a.data_store_id DESC
            ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function getfirst() //ส่วนต้น
    {
        try {
            $sql = "SELECT * 
            FROM tbl_firststorages a 
            INNER JOIN tbl_documents b ON a.doc_id = b.doc_id 
            INNER JOIN tbl_datastores c ON a.data_store_id = c.data_store_id 
            ORDER BY a.first_storage_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getfirst2() //ส่วนต้น
    {
        try {
            $sql = "SELECT * , b.data_store_local , concat( left(substring_index(left(b.data_store_local,255),',',1),255),' ',f.name_th ,' ', d.name_th ,' ', c.name_th ,' ', f.zip_code)as data_store_local
            FROM tbl_firststorages a
            INNER JOIN tbl_datastores b ON a.data_store_id = b.data_store_id
            INNER JOIN tbl_provinces c ON c.code = left(substring_index(right(b.data_store_local,12),' ',1),2)
            INNER JOIN tbl_amphures d ON d.code = left(substring_index(right(b.data_store_local,12),' ',1),4)
            INNER JOIN tbl_districts f ON f.districts_id = left(substring_index(right(b.data_store_local,12),' ',1),6)";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet1() //แสดงตารางชีต 1
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet1if() //แสดงตารางชีต 1
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_1 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet2() //แสดงตารางชีต 2
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_2";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet2if() //แสดงตารางชีต 2
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_2 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet3() //แสดงตารางชีต 3
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_3";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet3if() //แสดงตารางชีต 3
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_3 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet4() //แสดงตารางชีต 4
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_4";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet4if() //แสดงตารางชีต 4
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_4 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet5() //แสดงตารางชีต 5
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_5";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet5if() //แสดงตารางชีต 5
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_5 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet6() //แสดงตารางชีต 6
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_6";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet6if() //แสดงตารางชีต 6
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_6 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet7() //แสดงตารางชีต 7
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_7";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet7if() //แสดงตารางชีต 7
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_7 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet8() //แสดงตารางชีต 8
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_8";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet8if() //แสดงตารางชีต 8
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_8 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet9() //แสดงตารางชีต 9
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_9";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet9if() //แสดงตารางชีต 9
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_9 WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getDataid($id) //รับ ID ของสถานที่ แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_datastores
            WHERE data_store_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet1id($id) //รับ ID ของชีต1 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_1
            WHERE worksheet1_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet2id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_2
            WHERE worksheet2_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet3id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_3
            WHERE worksheet3_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet4id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_4
            WHERE worksheet4_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet5id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_5
            WHERE worksheet5_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet6id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_6
            WHERE worksheet6_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet7id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_7
            WHERE worksheet7_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet8id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_8
            WHERE worksheet8_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getsheet9id($id) //รับ ID ของชีต2 แล้วไปแสดงหน้า edit กับ view
    {
        try {
            $sql = "SELECT * FROM tbl_worksheet_9
            WHERE worksheet9_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getfirstid($id) //ส่วนต้น
    {
        try {
            $sql = "SELECT * FROM tbl_firststorages
            WHERE first_storage_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getuserid($id) //ส่วนต้น
    {
        try {
            $sql = "SELECT * FROM tbl_users
            WHERE user_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }















    //------------------------ ชุดคำสั่ง INSERT ของใบงาน 1-9 และ สถานที่ + ส่วนต้น -----------------------------------------//



    function insertfirst($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7) //ส่วนต้น
    {
        try {
            $sql = "INSERT INTO tbl_firststorages (statement, doc_id, objective, equipment, process, exp_benefits,data_store_id)
            VALUE (:statement, :doc_id, :objective, :equipment, :process, :exp_benefits, :data_store_id)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":statement", $tap1);
            $stmt->bindParam(":doc_id", $tap2);
            $stmt->bindParam(":objective", $tap3);
            $stmt->bindParam(":equipment", $tap4);
            $stmt->bindParam(":process", $tap5);
            $stmt->bindParam(":exp_benefits", $tap6);
            $stmt->bindParam(":data_store_id", $tap7);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function insertdata($tap1, $tap2) //สถานที่
    {
        try {
            $sql = "INSERT INTO tbl_datastores (data_store_local,user_id)
            VALUE (:data_store_local,:user_id)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":data_store_local", $tap1);
            $stmt->bindParam(":user_id", $tap2);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert1($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13, $tap14) //เพิ่มข้อมูลใบงานที่ 1
    {
        try {


            $sql = "INSERT INTO tbl_worksheet_1 (villagename, location, location_map, religion, population, numarea, education_service, education_name
            , local_government, hospital, police_station, image, pdf ,first_storage_id)
            VALUES (:villagename, :location, :location_map, :religion, :population, :numarea, :education_service, :education_name
            , :local_government, :hospital, :police_station,:image, :pdf , :first_storage_id)";
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
            $stmt->bindParam(':image', $tap12);
            $stmt->bindParam(':pdf', $tap13);
            $stmt->bindParam(':first_storage_id', $tap14, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert2($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13) //เพิ่มข้อมูลใบงานที่ 2
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
                pdf,first_storage_id)
                VALUES (:agriculture, :garden, 
                :farming, :number_animal,
                :fishing, :b_industry, 
                :m_industry, :s_industry, 
                :commerce, :service, 
                :image, :pdf ,:first_storage_id)";
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
            $stmt->bindParam(':image', $tap11);
            $stmt->bindParam(':pdf', $tap12);
            $stmt->bindParam(':first_storage_id', $tap13, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13, $tap14) //เพิ่มข้อมูลใบงานที่ 3
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
                pdf,first_storage_id)
                VALUES (:terrain, :soilitype, 
                :natural_water, :irrigation_water,
                :weir_slows, :rainfall, 
                :water_demand, :quality_water, 
                :temperature, :amount_light, :geographic,
                :image, :pdf,:first_storage_id)";
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
            $stmt->bindParam(':first_storage_id', $tap14, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert4($tap1, $tap2, $tap3, $tap4, $tap5, $tap6) //เพิ่มข้อมูลใบงานที่ 4
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_4 (village_history, way_life, life_recoed_life, image, pdf,first_storage_id)
            VALUE (:village_history, :way_life, :life_recoed_life, :image, :pdf,:first_storage_id)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":village_history", $tap1);
            $stmt->bindParam(":way_life", $tap2);
            $stmt->bindParam(":life_recoed_life", $tap3);
            $stmt->bindParam(":image", $tap4);
            $stmt->bindParam(":pdf", $tap5);
            $stmt->bindParam(":first_storage_id", $tap6);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13) //เพิ่มข้อมูลใบงานที่ 5
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
                pdf,first_storage_id)
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
                :pdf,:first_storage_id)";
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
            $stmt->bindParam(':first_storage_id', $tap13, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert6($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10) //เพิ่มข้อมูลใบงานที่ 6
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
                pdf,first_storage_id
                )
                VALUES (:animal_species, 
                :location_meet, 
                :quantity, 
                :history, 
                :feature,
                :animal_owner, 
                :informant_name, 
                :image,
                :pdf,:first_storage_id
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
            $stmt->bindParam(':first_storage_id', $tap10, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert7($tap1, $tap2, $tap3, $tap4) //เพิ่มข้อมูลใบงานที่ 7
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_7 (bio_data, image, pdf,first_storage_id)
            VALUE (:bio_data,:image, :pdf,:first_storage_id)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":bio_data", $tap1);
            $stmt->bindParam(":image", $tap2);
            $stmt->bindParam(":pdf", $tap3);
            $stmt->bindParam(":first_storage_id", $tap4);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert8($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12) //เพิ่มข้อมูลใบงานที่ 8
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
                pdf,first_storage_id)
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
                :pdf,:first_storage_id)";
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
            $stmt->bindParam(':first_storage_id', $tap12, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insert9($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7) //เพิ่มข้อมูลใบงานที่ 9
    {
        try {
            $sql = "INSERT INTO tbl_worksheet_9 (archeology_site,important_resources,archeology_record, name_resources, image, pdf,first_storage_id)
            VALUE (:archeology_site,:important_resources,:archeology_record,:name_resources, :image, :pdf,:first_storage_id)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":archeology_site", $tap1);
            $stmt->bindParam(":important_resources", $tap2);
            $stmt->bindParam(":archeology_record", $tap3);
            $stmt->bindParam(":name_resources", $tap4);
            $stmt->bindParam(":image", $tap5);
            $stmt->bindParam(":pdf", $tap6);
            $stmt->bindParam(":first_storage_id", $tap7);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }




    //---------------------------------------------- ชุดคำสั่ง UPDATE ของใบงาน 1-9 และ สถานที่ + ส่วนต้น -----------------------------------------//

    function update1($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap14, $tap15) //เพิ่มข้อมูลใบงานที่ 1
    {
        try {
            $sql = "UPDATE tbl_worksheet_1 SET villagename=:villagename, location=:location, 
            location_map=:location_map, religion=:religion ,
            population=:population, numarea=:numarea ,
            education_service=:education_service, education_name=:education_name ,
            local_government=:local_government, hospital=:hospital ,
            police_station=:police_station, status=:status
            WHERE worksheet1_id=:worksheet1_id";
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
            $stmt->bindParam(':worksheet1_id', $tap14, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap15, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function update2($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10,  $tap13, $tap14) //เพิ่มข้อมูลใบงานที่ 2
    {
        try {
            $sql = "UPDATE tbl_worksheet_2 SET agriculture=:agriculture, garden=:garden, 
            farming=:farming, number_animal=:number_animal ,
            fishing=:fishing, b_industry=:b_industry ,
            m_industry=:m_industry, s_industry=:s_industry ,
            commerce=:commerce, service=:service ,status=:status
            WHERE worksheet2_id=:worksheet2_id";
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

            $stmt->bindParam(':worksheet2_id', $tap13, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap14, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11,  $tap14, $tap15) //เพิ่มข้อมูลใบงานที่ 3
    {
        try {
            $sql = "UPDATE tbl_worksheet_3 SET terrain=:terrain, soilitype=:soilitype, 
            natural_water=:natural_water, irrigation_water=:irrigation_water ,
            weir_slows=:weir_slows, rainfall=:rainfall ,
            water_demand=:water_demand, quality_water=:quality_water ,
            temperature=:temperature, amount_light=:amount_light ,geographic=:geographic,status=:status
            WHERE worksheet3_id=:worksheet3_id";
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
            $stmt->bindParam(':worksheet3_id', $tap14, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap15, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update4($tap1, $tap2, $tap3, $tap6, $tap7) //เพิ่มข้อมูลใบงานที่ 4
    {
        try {
            $sql = "UPDATE tbl_worksheet_4 SET village_history=:village_history, 
            way_life=:way_life, 
            life_recoed_life=:life_recoed_life,
            status=:status
            WHERE worksheet4_id=:worksheet4_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":village_history", $tap1);
            $stmt->bindParam(":way_life", $tap2);
            $stmt->bindParam(":life_recoed_life", $tap3);
            $stmt->bindParam(":worksheet4_id", $tap6);
            $stmt->bindParam(":status", $tap7);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9,$tap13, $tap14) //เพิ่มข้อมูลใบงานที่ 5
    {
        try {
            $sql = "UPDATE tbl_worksheet_5 SET data_plant=:data_plant, 
            food=:food, medicine_people=:medicine_people, 
            medicine_animal=:medicine_animal, furniture=:furniture, 
            insecticide=:insecticide, 
            cultures=:cultures, 
            religion=:religion, 
            other=:other, status=:status
            WHERE worksheet5_id=:worksheet5_id";
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
            $stmt->bindParam(':worksheet5_id', $tap13, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap14, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }








    function update6($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7,$tap10, $tap11) //เพิ่มข้อมูลใบงานที่ 6
    {
        try {
            $sql = "UPDATE tbl_worksheet_6 SET animal_species=:animal_species, location_meet=:location_meet, 
            quantity=:quantity, history=:history ,
            feature=:feature, animal_owner=:animal_owner ,
            informant_name=:informant_name,status=:status
            WHERE worksheet6_id=:worksheet6_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':animal_species', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':location_meet', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':history', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':feature', $tap5, PDO::PARAM_STR);
            $stmt->bindParam(':animal_owner', $tap6, PDO::PARAM_STR);
            $stmt->bindParam(':informant_name', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':worksheet6_id', $tap10, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap11, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update7($tap1, $tap4, $tap5) //เพิ่มข้อมูลใบงานที่ 7
    {
        try {
            $sql = "UPDATE tbl_worksheet_7 SET bio_data=:bio_data, status=:status
            WHERE worksheet7_id=:worksheet7_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':bio_data', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':worksheet7_id', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap5, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update8($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap12, $tap13) //เพิ่มข้อมูลใบงานที่ 6
    {
        try {
            $sql = "UPDATE tbl_worksheet_8 SET branch=:branch, local_name=:local_name, 
            copyright=:copyright, type_wisdom=:type_wisdom,
            local_highlights=:local_highlights, wisdom_details=:wisdom_details,
            public_relations=:public_relations, characteristic=:characteristic,
            materials=:materials,status=:status
            WHERE worksheet8_id=:worksheet8_id";
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
            $stmt->bindParam(':worksheet8_id', $tap12, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap13, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function update9($tap1, $tap2, $tap3, $tap4, $tap7, $tap8) //เพิ่มข้อมูลใบงานที่ 9
    {
        try {
            $sql = "UPDATE tbl_worksheet_9 SET archeology_site=:archeology_site, important_resources=:important_resources, 
            archeology_record=:archeology_record, name_resources=:name_resources,
            status=:status
            WHERE worksheet9_id=:worksheet9_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':archeology_site', $tap1, PDO::PARAM_STR);
            $stmt->bindParam(':important_resources', $tap2, PDO::PARAM_STR);
            $stmt->bindParam(':archeology_record', $tap3, PDO::PARAM_STR);
            $stmt->bindParam(':name_resources', $tap4, PDO::PARAM_STR);
            $stmt->bindParam(':worksheet9_id', $tap7, PDO::PARAM_STR);
            $stmt->bindParam(':status', $tap8, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function update11($tap1, $tap3, $tap4, $tap5, $tap6, $tap8) //ส่วนต้น
    {
        try {
            $sql = "UPDATE tbl_firststorages SET statement=:statement,
            objective=:objective, equipment=:equipment ,
            process=:process, exp_benefits=:exp_benefits
            WHERE first_storage_id=:first_storage_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":statement", $tap1);
            $stmt->bindParam(":objective", $tap3);
            $stmt->bindParam(":equipment", $tap4);
            $stmt->bindParam(":process", $tap5);
            $stmt->bindParam(":exp_benefits", $tap6);
            $stmt->bindParam(":first_storage_id", $tap8);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateuser($tap1, $tap2, $tap3, $tap4, $tap5, $tap6) //เพิ่มข้อมูลใบงานที่ 4
    {
        try {
            $sql = "UPDATE tbl_users SET user_firstname=:user_firstname, 
            user_lastname=:user_lastname, 
            user_email=:user_email,
            user_name=:user_name,permission_id=:permission_id
            WHERE user_id=:user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_firstname", $tap1);
            $stmt->bindParam(":user_lastname", $tap2);
            $stmt->bindParam(":user_email", $tap3);
            $stmt->bindParam(":user_name", $tap4);
            $stmt->bindParam(":user_id", $tap5);
            $stmt->bindParam(":permission_id", $tap6);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
