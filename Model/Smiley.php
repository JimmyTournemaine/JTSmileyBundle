<?php
namespace JT\SmileyBundle\Model;

class Smiley
{
	protected $unicode;
	protected $name;
	protected $aliasesAscii;
	
	public function __construct($unicode = null, $name = null, array $aliases = array())
	{
		$this->unicode = $unicode;
		$this->name = $name;
		$this->aliasesAscii = $aliases;
	}
	
	public function getUnicode() {
		return $this->unicode;
	}
	public function setUnicode($unicode) {
		$this->unicode = $unicode;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getShortname() {
		return $this->shortname;
	}
	public function setShortname($shortname) {
		$this->shortname = $shortname;
		return $this;
	}
	public function getAliasesAscii() {
		return $this->aliasesAscii;
	}
	public function setAliasesAscii($aliasesAscii) {
		$this->aliasesAscii = $aliasesAscii;
		return $this;
	}
}