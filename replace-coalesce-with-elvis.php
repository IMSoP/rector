<?php

declare (strict_types=1);

namespace HTX\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\Ternary;
use PHPStan\Type\ObjectType;
use Rector\Config\RectorConfig;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

// Rector includes this file multiple times, but to keep things simple, just define the class inline the first time
if ( ! class_exists(ReplaceCoalesceWithElvisRector::class) ) {
final class ReplaceCoalesceWithElvisRector extends AbstractRector
{
    public function getRuleDefinition() : RuleDefinition
    {
        return new RuleDefinition('"Replaces HTX_General::coalesce() usages with ?: (Elvis) operator"', [new CodeSample(<<<'CODE_SAMPLE'
class SomeClass
{
    public function getFoo()
    {
        return HTX_General::coalesce($_GET['foo'], $_POST['foo'], 'foo');
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
class SomeClass
{
    public function getFoo()
    {
        return ($_GET['foo'] ?: $_POST['foo'] ?: 'foo');
    }
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class];
    }

    /**
     * @param \PhpParser\Node\Expr\StaticCall $node
     */
    public function refactor(Node $node) : ?Node
    {
		if (!$this->isObjectType($node->class, new ObjectType(\HTX_General::class))) {
			return null;
		}
		if (!$this->isName($node->name, 'coalesce')) {
			return null;
		}

		$args = $node->getArgs();

		if (!isset($args[0])) {
			return null;
		}

		$currentNode = array_shift($args)->value;
		foreach ( $args as $arg ) {
			$currentNode = new Ternary($currentNode, null, $arg->value);
		}
        return $currentNode;
    }
}
}

return static function (RectorConfig $rectorConfig): void {
	$rectorConfig->rule(ReplaceCoalesceWithElvisRector::class);
};
