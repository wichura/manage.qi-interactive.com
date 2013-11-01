<?php

class MataActiveForm extends CActiveForm {



	public function getFormElementBasedOnDbType($model, $attribute) {


		$column = null;
		echo "<pre>";

		foreach($model->tableSchema->columns as $dbColumn) {
			if ($dbColumn->name == $attribute) {
				$column = $dbColumn;
				break;
			}

		}

		$columnType = $column->dbType;

		if (stripos($columnType, "float") !== false) {
			return $this->textField($model, $attribute); 
		}

		
		if (stripos($columnType, "date") !== false) {
		}

		if (stripos($columnType, "enum") !== false) {
			preg_match_all("/'(.*?)'/", $columnType, $values);
			$values = $values[1];
			return $this->dropDownList($model, $attribute, $values);
		}

		return $this->textField($model, $attribute); 
		
	}

}

?>