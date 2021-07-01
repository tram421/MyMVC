<?php
namespace App\Models;

use Core\Model;

// SELECT province._name, district._name as name_district, ward._name as ward_name, street._name as street_name 
// FROM `province` JOIN `district` ON province.id = district._province_id JOIN `ward` ON district.id = ward._district_id 
// JOIN `street` ON district.id = street._district_id WHERE province._name LIKE '%long' ORDER BY `name_district` DESC

class Address extends Model
{
    private $province = 'province';
    private $district = 'district';
    private $ward = 'ward';

/**
 * Description: This funtion return 2 selection:
 * 1: param = NULL TO return array all province
 * 2: param has id TO return array of 1 province include: name, id, COD
 * 
 */
    public function getProvince($id = NULL)
    {
        $sql = "SELECT * from $this->province order by _name asc";

        if ($id != NULL) {
            $sql = "SELECT * from $this->province where id = $id";
            return $this->fetch($sql);
        }
        return $this->fetchArray($sql);
    }
    public function getDistrict($idProvince = NULL) {

        if (!is_null($idProvince)) {
            $sql = "SELECT * from $this->district where _province_id = $idProvince order by _name asc";
            return $this->fetchArray($sql);
        }
        return NULL;        
    }
    public function getWard($idDistrict = NULL) {

        if (!is_null($idDistrict)) {
            $sql = "SELECT * from $this->ward where _district_id = $idDistrict order by _name asc";
            return $this->fetchArray($sql);
        }
        return NULL;        
    }

}
