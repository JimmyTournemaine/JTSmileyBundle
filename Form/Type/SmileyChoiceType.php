<?php
namespace JT\SmileyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\InvalidArgumentException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use JT\SmileyBundle\Form\DataTransformer\SmileyToStringTransformer;
use JT\SmileyBundle\Model\Smileys;
use JT\SmileyBundle\Model\Smiley;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class SmileyChoiceType extends AbstractType
{	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
				'label' => 'feeling',
				'smileys' => 'all',
				'translation_domain' => 'JTSmileyBundle',
				'choices' => $this->listSmileys()
		));
	}
	
	public function getParent()
	{
		return 'choice';
	}
	
	public function getName()
	{
		return 'smiley';
	}
	
	private function listSmileys($qt = null)
	{
		$smileys = new Smileys($qt);
		return $smileys->getUnicodesAndNames();
	}
}