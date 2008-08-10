<?php
/**
 * @package sapphire
 * @subpackage search
 */

/**
 * Selects textual content with an exact match between columnname and keyword.
 *
 * @todo case sensitivity switch
 * @todo documentation
 * 
 * @package sapphire
 * @subpackage search
 */
class ExactMatchFilter extends SearchFilter {
	
	/**
	 * Applies an exact match (equals) on a field value.
	 *
	 * @return unknown
	 */
	public function apply(SQLQuery $query) {
		if($this->getValue()) {
			$query = $this->applyRelation($query);
			return $query->where("{$this->getDbName()} = '{$this->getValue()}'");
		}
	}
	
}
?>