<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asset
 *
 * @author wichura
 */
class Asset extends MataActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'asset';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name, OwnerUserId', 'required'),
            array('SerialNumber', 'length', 'max' => 64),
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id, true);
        $criteria->compare('DateCreated', $this->DateCreated, true);
        $criteria->compare('Name', $this->Name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            "sort" => array(
                "defaultOrder" => "Name ASC"
            )
        ));
    }

    public function getLabel() {
        return $this->Name;
    }

}

?>
