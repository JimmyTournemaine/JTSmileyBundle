<?php
namespace JT\SmileyBundle\Model;

class Smileys
{
	const BASIC = 'basic';
	const MORE = 'more';
	const ALL = 'all';
	
	private $smileys;
	
	public function __construct($howMany = null)
	{
		$howMany = ($howMany === null) ? self::ALL : $howMany;
		
		if(!in_array($howMany, self::possibleArguments())){
			throw new \InvalidArgumentException("JT\SmileyBundle\Model\Smileys::__construct() : Wrong Argument");
		}
		
		$smileys = array();
		
		$this->smileys = array(
				new Smiley("1F600", "grinning"),
				new Smiley("1F601", "grin"),
				new Smiley("1F602", "joy", [":')",":'-)"]),
				new Smiley("1F603", "smiley", [":D",":-D","=D"]),
				new Smiley("1F604", "smile", [":)",":-)","=]","=)",":]"]),
				new Smiley("1F605", "sweat_smile", ["':)","':-)","'=)","':D","':-D","'=D"]),
				new Smiley("1F606", "laughing", [">:)",">;)",">:-)",">=)"]),
				new Smiley("1F607", "innocent", ["O:-)","0:-3","0:3","0:-)","0:)","0;^)","O:)","O;-)","O=)","0;-)","O:-3","O:3"]),
				new Smiley("1F608", "smiling_imp"),
				new Smiley("1F47F", "imp"),
				new Smiley("1F609", "wink", [";)",";-)","*-)","*)",";-]",";]",";D",";^)"]),
				new Smiley("1F60A", "blush"),
				new Smiley("263A", "relaxed"),
				new Smiley("1F60B", "yum"),
				new Smiley("1F60C", "relieved"),
				new Smiley("1F60D", "heart_eyes"),
				new Smiley("1F60E", "sunglasses", ["B-)","B)","8)","8-)","B-D","8-D"]),
				new Smiley("1F60F", "smirk"),
				new Smiley("1F610", "neutral_face"),
				new Smiley("1F611", "expressionless", ["-_-","-__-","-___-"]),
				new Smiley("1F612", "unamused"),
				new Smiley("1F613", "sweat", ["':(","':-(","'=("]),
				new Smiley("1F614", "pensive"),
				new Smiley("1F615", "confused", [">:\\",">:/",":-/",":-.",":/",":\\","=/","=\\",":L","=L"]),
				new Smiley("1F616", "confounded"),
				new Smiley("1F617", "kissing"),
				new Smiley("1F618", "kissing_heart", [":*",":-*","=*",":^*"]),
				new Smiley("1F619", "kissing_smiling_eyes"),
				new Smiley("1F61A", "kissing_closed_eyes"),
				new Smiley("1F61B", "stuck_out_tongue", [":P",":-P","=P",":-p",":p","=p",":-Þ",":Þ",":þ",":-þ",":-b",":b","d:"]),
				new Smiley("1F61C", "stuck_out_tongue_winking_eye", [">:P","X-P","x-p"]),
				new Smiley("1F61D", "stuck_out_tongue_closed_eyes"),
				new Smiley("1F61E", "disappointed", [">:[",":-(",":(",":-[",":[","=("]),
				new Smiley("1F61F", "worried"),
				new Smiley("1F620", "angry", [">:(",">:-(",":@"]),
				new Smiley("1F621", "rage"),
				new Smiley("1F622", "cry", [":'(",":'-(",";(",";-("]),
				new Smiley("1F623", "persevere", [">.<"]),
				new Smiley("1F624", "triumph"),
				new Smiley("1F625", "disappointed_relieved"),
				new Smiley("1F626", "frowning"),
				new Smiley("1F627", "anguished"),
				new Smiley("1F628", "fearful"),
				new Smiley("1F629", "weary"),
				new Smiley("1F62A", "sleepy"),
				new Smiley("1F62B", "tired_face"),
				new Smiley("1F62C", "grimacing"),
				new Smiley("1F62D", "sob"),
				new Smiley("1F62E", "open_mouth", [":-O",":O",":-o",":o","O_O",">:O"]),
				new Smiley("1F62F", "hushed"),
				new Smiley("1F630", "cold_sweat"),
				new Smiley("1F631", "scream"),
				new Smiley("1F632", "astonished"),
				new Smiley("1F633", "flushed", [":$","=$"]),
				new Smiley("1F634", "sleeping"),
				new Smiley("1F635", "dizzy_face", ["#-)","#)","%-)","%)","X)","X-)"]),
				new Smiley("1F636", "no_mouth", [":-X",":X",":-#",":#","=X","=x",":x",":-x","=#"]),
				new Smiley("1F637", "mask"),
				new Smiley("1F641", "slight_frown"),
				new Smiley("1F642", "slight_smile"),
		);
	}

	public function getSmileys()
	{
		return $this->smileys;
	}
	
	public function getNames()
	{
		return array_map(function($e){ return $e->getName(); }, $this->smileys);
	}
	
	public function getUnicodes()
	{
		return array_map(function($e){ return $e->getUnicode(); }, $this->smileys);
	}
	
	public function getUnicodesAndNames()
	{
		$smiles = array();
		foreach($this->smileys as $smiley)
		{
			$smiles[$smiley->getUnicode()] = $smiley->getName();
		}
		
		return $smiles;
	}
	
	public function getOneByName($name)
	{
		foreach($this->smileys as $smiley){
			if($smiley->getName() == $name){
				return $smiley;
			}
		}
		
		return null;
	}
	
	public function getOneByUnicode($unicode)
	{
		foreach($this->smileys as $smiley){
			if($smiley->getUnicode() == $unicode){
				return $smiley;
			}
		}
		
		return null;
	}
	
	static public function possibleArguments()
	{
		return array(
				self::BASIC,
				self::MORE,
				self::ALL
		);
	}
}