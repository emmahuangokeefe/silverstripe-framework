<?php

/**
 * A special type Int field used for primary keys.
 * 
 * @todo Allow for custom limiting/filtering of scaffoldFormField dropdown
 * 
 * @param string $name
 * @param DataOject $object The object that this is primary key for (should have a relation with $name) 
 */
class PrimaryKey extends Int {
	/**
	 * @var DataObject 
	 */
	protected $object;

	protected static $default_search_filter_class = 'ExactMatchMultiFilter';
	
	function __construct($name, $object) {
		$this->object = $object;
		parent::__construct($name);
	}
	
	public function scaffoldFormField($title = null) {
		$objs = DataObject::get($this->object->class);

		$first = $objs->First();
		$titleField = isset($first->Title) ? "Title" : "Name";

		$map = ($objs) ? $objs->toDropdownMap("ID", $titleField) : false;
		
		return new DropdownField($this->name, $title, $map, null, null, ' ');
	}
}

?>